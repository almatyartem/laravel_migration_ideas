<?php

namespace App\Modules\ExchangeRatesOwner\Jobs;

use App\Modules\ExchangeRatesOwner\Models\ExchangeRates;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SyncExchangeRates implements ShouldQueue
{
    /**
     * @var ExchangeRates
     */
    protected $model;

    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * SyncExchangeRates constructor.
     * @param ExchangeRates $model
     */
    public function __construct(ExchangeRates $model)
    {
        $this->model = $model;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
    }

    /**
     * @param float $euroToDollarRate
     * @param float $poundToDollarRate
     * @return ExchangeRates
     */
    protected function createNewRecord(float $euroToDollarRate, float $poundToDollarRate) : ExchangeRates
    {
        return $this->model->create([
            'euro_to_dollar_rate' => $euroToDollarRate,
            'pound_to_dollar_rate' => $poundToDollarRate
        ]);
    }
}
