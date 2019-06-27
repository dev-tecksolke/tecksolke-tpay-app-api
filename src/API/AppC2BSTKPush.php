<?php


namespace TPay\API\API;

use GuzzleHttp\Exception\GuzzleException;
use TPay\API\Urls\Urls;

class AppC2BSTKPush {
    /**
     * ----------------------------------------------
     * Make request to the c2b here to the t-pay
     * ----------------------------------------------
     * @param array $options
     * @return \Exception|GuzzleException|string
     * @throws \Exception
     */
    public static function appC2BSTKPush(array $options) {
        try {
            $response = (new TPayGateWay())->processRequest(Urls::$app_c2b_stk_url, (new TPayGateWay())->setRequestOptions($options));

            return $response;

        } catch (\Exception $exception) {
            throw  new \Exception($exception->getMessage());
        }
    }
}
