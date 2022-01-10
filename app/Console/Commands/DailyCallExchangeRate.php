<?php

namespace App\Console\Commands;

use App\Helpers\ExchangeRateHelper;
use Illuminate\Console\Command;

class DailyCallExchangeRate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'call:exchange-rate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Daily call exchange rate';

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
    public function handle(): int
    {
        $exchangeRate = ExchangeRateHelper::getInstance();
        return $exchangeRate->build()->set();
    }
}
