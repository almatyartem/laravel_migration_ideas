<?php

namespace App\Modules\MultiCurrencies\Jobs;

use App\Contracts\Repositories\Services\CurrenciesRepositoryContract;
use App\Contracts\Repositories\Services\ExchangeRatesRepositoryContract;
use App\Contracts\Search\Services\CurrenciesSearchContract;
use App\Contracts\Search\Services\ExchangeRatesSearchContract;
use App\Exceptions\ValidationException;
use App\Modules\MultiCurrencies\Events\NewCurrencyAdded;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SyncExchangeRates implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * @param ExchangeRatesRepositoryContract $exchangeRatesRepository
     * @param ExchangeRatesSearchContract $exchangeRatesSearch
     * @param CurrenciesRepositoryContract $currenciesRepository
     * @param CurrenciesSearchContract $currenciesSearch
     * @throws ValidationException
     */
    public function handle(ExchangeRatesRepositoryContract $exchangeRatesRepository, ExchangeRatesSearchContract $exchangeRatesSearch,
                           CurrenciesRepositoryContract $currenciesRepository, CurrenciesSearchContract $currenciesSearch)
    {
        $exchangeRates = $this->getExchangeRatesFromThirdPartyApi();
        $date = date('Y-m-d');

        foreach($exchangeRates as $currencyCode => $exchangeRateValue){
            $currency = $currenciesSearch->byCode($currencyCode)->first();
            if(!$currency) {
                $currency = $currenciesRepository->create($currencyCode);
                event(new NewCurrencyAdded($currency));
            }
            if(!$exchangeRatesSearch->byDate($date)->byCurrencyId($currency->id)->first()){
                $exchangeRatesRepository->add($currency->id, $exchangeRateValue, $date);
            }
        }
    }

    /**
     * @return array
     */
    protected function getExchangeRatesFromThirdPartyApi() : array
    {
        return [
            'EUR' => '1.2',
            'GBP' => '1.5',
            'test' => 3
        ];
    }
}
