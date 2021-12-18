<?php

namespace App\helpers;

use SoapClient;
use SoapFault;

/**
 *
 */
class ExchangeRateHelper
{
    /**
     * @var ExchangeRateHelper|null
     */
    private static ?ExchangeRateHelper $instance = null;
    /**
     * @var string
     */
    private string $api;
    /**
     * @var array
     */
    /**
     * @var array
     */
    private array $options, $data;
    /**
     * @var mixed
     */
    private mixed $client;

    /**
     * ExchangeRateHelper constructor
     */
    private function __construct() {}

    /**
     * Get instance of ExchangeRateHelper
     *
     * @return ExchangeRateHelper
     */
    public static function getInstance(): ExchangeRateHelper
    {
        if (is_null(static::$instance)) {
            static::$instance = new ExchangeRateHelper();
        }
        return static::$instance;
    }

    /**
     * Build this object with all attributes
     *
     * @return $this
     * @throws SoapFault
     */
    public function build(): ExchangeRateHelper
    {
        $this->setApi("https://servicios.bcn.gob.ni/Tc_Servicio/ServicioTC.asmx?WSDL");
        $this->setOptions([
            'cache_wsdl'     => WSDL_CACHE_NONE,
            'trace'          => 1,
            'stream_context' => stream_context_create([
                'ssl' => [
                    'verify_peer'       => false,
                    'verify_peer_name'  => false,
                    'allow_self_signed' => true
                ]]
            )
        ]);
        $this->setClient(new SoapClient($this->getApi(), $this->getOptions()));
        $this->setData(['Ano' => date('Y'), 'Mes' => date('m'), 'Dia' => date('d')]);
        return $this;
    }

    /**
     * @return mixed
     */
    public function get(): mixed
    {
        $result = $this->getClient()->RecuperaTC_Dia($this->getData());
        return $result->RecuperaTC_DiaResult;
    }

    /**
     * @param array $options
     */
    private function setOptions(array $options): void
    {
        $this->options = $options;
    }

    /**
     * @param string $api
     */
    private function setApi(string $api): void
    {
        $this->api = $api;
    }

    /**
     * @return array
     */
    private function getOptions(): array
    {
        return $this->options;
    }

    /**
     * @return string
     */
    private function getApi(): string
    {
        return $this->api;
    }

    /**
     * @return array
     */
    private function getData(): array
    {
        return $this->data;
    }

    /**
     * @param array $data
     */
    private function setData(array $data): void
    {
        $this->data = $data;
    }

    /**
     * @return mixed
     */
    private function getClient(): mixed
    {
        return $this->client;
    }

    /**
     * @param mixed $client
     */
    private function setClient(mixed $client): void
    {
        $this->client = $client;
    }
}
