<?php

namespace App\Services;

trait ApiTrait
{
    protected string $api;
    protected array $options, $data;
    protected mixed $client;

    protected function getApi(): string
    {
        return $this->api;
    }

    protected function setApi(string $api)
    {
        $this->api = $api;
    }

    public function getOptions(): array
    {
        return $this->options;
    }

    protected function setOptions(array $options)
    {
        $this->options = $options;
    }

    protected function setClient(mixed $client)
    {
        $this->client = $client;
    }

    protected function getClient(): mixed
    {
        return $this->client;
    }

    protected function setData(array $data)
    {
        $this->data = $data;
    }

    protected function getData(): array
    {
        return $this->data;
    }
}
