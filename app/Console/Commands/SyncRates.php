<?php

namespace App\Console\Commands;

use App\Modules\MultiCurrencies\Jobs\SyncExchangeRates;
use Illuminate\Console\Command;

class SyncRates extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sync:exchange_rates';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        SyncExchangeRates::dispatch();

        return 0;
    }
}
