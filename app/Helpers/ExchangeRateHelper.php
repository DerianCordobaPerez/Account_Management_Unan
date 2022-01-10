<?php

namespace App\Helpers;

use SoapClient;
use SoapFault;

/**
 *
 */
class ExchangeRateHelper
{
    use SingletonHelper;

    /**
     * @var string
     */
    private string $api;

    private mixed $exchangeRate;

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
        return $this->exchangeRate->RecuperaTC_DiaResult;
    }

    public function set(): int
    {
        $command = 0;
        echo 'Dia '.date('d').' del mes '.date('m').' del año '.date('Y')." Cambio del dolar a cordoba: C$";
        try {
            $this->exchangeRate = $this->getClient()->RecuperaTC_Dia($this->getData());
            echo $this->get();
        } catch (SoapFault $e) {
            echo $e->getMessage();
            $command = 1;
        }

        return $command;
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

    /**
     * @throws SoapFault
     */
    public function query(): mixed
    {
        return $this->build()->get();
    }
}
