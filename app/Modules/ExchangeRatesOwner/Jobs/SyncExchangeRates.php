<?php

namespace App\Modules\ExchangeRatesOwner\Jobs;

use App\Modules\ExchangeRatesOwner\Models\ExchangeRatesEntity;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SyncExchangeRates implements ShouldQueue
{
    /**
     * @var ExchangeRatesEntity
     */
    protected $model;

    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * SyncExchangeRates constructor.
     * @param ExchangeRatesEntity $model
     */
    public function __construct(ExchangeRatesEntity $model)
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
     * @return ExchangeRatesEntity
     */
    protected function createNewRecord(float $euroToDollarRate, float $poundToDollarRate) : ExchangeRatesEntity
    {
        return $this->model->create([
            'euro_to_dollar_rate' => $euroToDollarRate,
            'pound_to_dollar_rate' => $poundToDollarRate,
            'date' => date('Y-m-d')
        ]);
    }
}
