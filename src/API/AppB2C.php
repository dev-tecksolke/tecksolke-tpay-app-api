<?php


namespace TPay\API\API;


use GuzzleHttp\Exception\GuzzleException;
use TPay\API\Urls\Urls;

class AppB2C {
    /**
     * -------------------------
     * Make B2c Request here
     * -------------------------
     * @param array $options
     * @return \Exception|GuzzleException|string
     * @throws \Exception
     */
    public static function appB2C(array $options) {
        try {
            $response = json_decode((new TPayGateWay())->processRequest(Urls::$app_b2c_url, (new TPayGateWay())->setRequestOptions($options)));

            return $response;

        } catch (\Exception $exception) {
            throw  new \Exception($exception->getMessage());
        }
    }
}
