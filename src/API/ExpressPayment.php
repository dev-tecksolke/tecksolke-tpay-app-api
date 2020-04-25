<?php


namespace TPay\API\API;


use Exception;
use TPay\API\Traits\CentralProcessingGate;
use TPay\API\Urls\Urls;

class ExpressPayment
{
    use CentralProcessingGate;

    /**
     * ------------------------------------
     * Express Payment Page Redirection
     * ------------------------------------
     * Here pass the required
     * parameters to be used by the
     * express payment here
     * @param array $options
     * @return mixed
     * @throws Exception
     */
    public function expressPayment(array $options)
    {
        try {
            return json_decode($this->processRequest(Urls::$express_payment_url, $this->setRequestOptions($options)));

        } catch (Exception $exception) {
            throw  new Exception($exception->getMessage());
        }
    }
}
