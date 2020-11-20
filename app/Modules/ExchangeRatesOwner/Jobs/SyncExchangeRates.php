<?php

namespace App\Modules\ExchangeRatesOwner\Jobs;

use App\Contracts\ExchangeRatesApiContract;
use App\Contracts\ExchangeRatesEntityContract;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SyncExchangeRates implements ShouldQueue
{
    /**
     * @var ExchangeRatesApiContract
     */
    protected $api;

    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * @param ExchangeRatesApiContract $api
     */
    public function handle(ExchangeRatesApiContract $api)
    {
        $api->createNewRecord(1.1, 1.2, date('Y-m-d'));
    }

    /**
     * @param float $euroToDollarRate
     * @param float $poundToDollarRate
     * @return ExchangeRatesEntityContract
     */
    protected function createNewRecord(float $euroToDollarRate, float $poundToDollarRate) : ExchangeRatesEntityContract
    {
        return $this->api->createNewRecord($euroToDollarRate, $poundToDollarRate, date('Y-m-d'));
    }
}
