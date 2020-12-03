<?php

namespace App\Modules\MultiCurrencies\Jobs;

use App\Contracts\Storage\Services\DataProviders\CurrenciesDataProviderContract;
use App\Contracts\Storage\Services\DataProviders\ExchangeRatesDataProviderContract;
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
     * @param ExchangeRatesDataProviderContract $exchangeRatesDP
     * @param CurrenciesDataProviderContract $currenciesDP
     */
    public function handle(ExchangeRatesDataProviderContract $exchangeRatesDP, CurrenciesDataProviderContract $currenciesDP)
    {
        $exchangeRates = $this->getExchangeRatesFromThirdPartyApi();
        $date = date('Y-m-d');

        foreach($exchangeRates as $currencyCode => $exchangeRateValue){
            $currency = $currenciesDP->search()->byCode($currencyCode)->first();
            if(!$currency) {
                $currency = $currenciesDP->create($currencyCode);
                event(new NewCurrencyAdded($currency));
            }
            if(!$exchangeRatesDP->search()->byDate($date)->byCurrencyId($currency->id)->first()){
                $exchangeRatesDP->add($currency->id, $exchangeRateValue, $date);
            }
        }
    }

    protected function getExchangeRatesFromThirdPartyApi()
    {
        return [
            'EUR' => '1.2',
            'GBP' => '1.5',
            'test' => 3
        ];
    }
}
