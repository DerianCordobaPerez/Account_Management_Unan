<?php

namespace App\Repositories\ExchangeRate;

use App\Repositories\RepositoryInterface;
use App\Services\ExchangeRateService;
use Exception;

class ExchangeRateRepository implements RepositoryInterface
{
    protected ExchangeRateService $exchangeRateService;

    public function __construct(ExchangeRateService $exchangeRateService)
    {
        $this->exchangeRateService = $exchangeRateService;
    }

    /**
     * @throws Exception
     */
    protected function update(): void
    {
        $this->exchangeRateService->build()->set();
    }

    /**
     * @throws Exception
     */
    public function get()
    {
        $this->update();
        return $this->exchangeRateService->get();
    }
}
