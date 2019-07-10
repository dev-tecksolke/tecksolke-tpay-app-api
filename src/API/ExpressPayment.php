<?php


namespace TPay\API\API;


use TPay\API\Urls\Urls;

class ExpressPayment {
    /**
     * ------------------------------------
     * Express Payment Page Redirection
     * ------------------------------------
     * Here pass the required
     * parameters to be used by the
     * express payment here
     * @param array $options
     * @return mixed
     * @throws \Exception
     */
    public static function expressPayment(array $options) {
        try {
            $response = json_decode((new TPayGateWay())->processRequest(Urls::$express_payment_url, (new TPayGateWay())->setRequestOptions($options)));

            return $response;

        } catch (\Exception $exception) {
            throw  new \Exception($exception->getMessage());
        }
    }
}
