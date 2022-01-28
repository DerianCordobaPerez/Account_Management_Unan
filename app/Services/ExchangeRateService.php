<?php

namespace App\Services;

use Exception;
use SoapClient;
use SoapFault;

class ExchangeRateService
{
    use ApiTrait;

    protected mixed $exchangeRate;

    /**
     * @throws Exception
     */
    public function __construct() {
        $this->build()->set();
    }

    /**
     * @throws SoapFault
     */
    public function build(): ExchangeRateService
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
            ]])
        ]);
        $this->setClient(new SoapClient($this->getApi(), $this->getOptions()));
        $this->setData(['Ano' => date('Y'), 'Mes' => date('m'), 'Dia' => date('d')]);
        return $this;
    }

    public function get(): mixed
    {
        return $this->exchangeRate->RecuperaTC_DiaResult;
    }

    /**
     * @throws Exception
     */
    public function set()
    {
        try {
            $this->exchangeRate = $this->getClient()->RecuperaTC_Dia($this->getData());
        } catch (SoapFault $e) {
            throw new Exception($e->getMessage());
        }
    }
}
