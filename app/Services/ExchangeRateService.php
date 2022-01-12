<?php

namespace App\Services;

use App\Models\ExchangeRate;
use SoapClient;
use SoapFault;

class ExchangeRateService
{
    use ApiTrait;

    protected mixed $exchangeRate;

    /**
     * @throws SoapFault
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

    public function get()
    {
        return $this->exchangeRate->RecuperaTC_DiaResult;
    }

    public function set(): int
    {
        try {
            $this->exchangeRate = $this->getClient()->RecuperaTC_Dia($this->getData());
            return 1;
        } catch (SoapFault $e) {
            return 0;
        }
    }
}
