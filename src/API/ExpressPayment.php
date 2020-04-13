<?php


namespace TPay\API\API;


use Exception;
use TPay\API\Urls\Urls;

class ExpressPayment
{
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
    public static function expressPayment(array $options)
    {
        try {
            return json_decode((new TPayGateWay())->processRequest(Urls::$express_payment_url, (new TPayGateWay())->setRequestOptions($options)));

        } catch (Exception $exception) {
            throw  new Exception($exception->getMessage());
        }
    }
}
