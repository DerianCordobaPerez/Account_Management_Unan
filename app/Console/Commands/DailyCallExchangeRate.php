<?php

namespace App\Console\Commands;

use App\Models\ExchangeRate;
use App\Services\ExchangeRateService;
use Illuminate\Console\Command;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Support\Facades\App;
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
     */
    public function handle(): int
    {
        $exchangeRateService = App::make(ExchangeRateService::class);
        $value = $exchangeRateService->set();

        if(ExchangeRate::all()->count() > 0) {
            // Delete all records
            ExchangeRate::truncate();
        }

        ExchangeRate::create(['value' => $exchangeRateService->get()]);

        return $value;
    }
}
