<?php

namespace App\Repositories\ExchangeRate;

use App\Repositories\RepositoryInterface;
use Illuminate\Cache\CacheManager;

class ExchangeRateCacheRepository implements RepositoryInterface
{
    protected ExchangeRateRepository $repo;
    protected CacheManager $cache;
    protected const ttl = 1440;

    public function __construct(ExchangeRateRepository $repo, CacheManager $cache)
    {
        $this->repo = $repo;
        $this->cache = $cache;
    }

    public function get()
    {
        return $this->cache->remember('exchange_rates', self::ttl, function () {
            return $this->repo->get();
        });
    }
}
