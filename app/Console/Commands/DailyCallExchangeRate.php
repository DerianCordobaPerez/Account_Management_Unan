<?php

namespace App\Console\Commands;

use App\Helpers\ExchangeRateHelper;
use App\Services\ExchangeRateService;
use Illuminate\Console\Command;
use Illuminate\Contracts\Container\BindingResolutionException;
use SoapFault;

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
     * @throws BindingResolutionException
     * @throws SoapFault
     */
    public function handle(): int
    {
        $exchangeRateService = app()->make(ExchangeRateService::class);
        return $exchangeRateService->build()->set();
    }
}
