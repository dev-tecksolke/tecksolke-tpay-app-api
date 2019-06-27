<?php


namespace TPay\API\API;


use GuzzleHttp\Exception\GuzzleException;
use TPay\API\Urls\Urls;

class AppBalances {
    /**
     * -----------------------
     * Get app balances here
     * ------------------------
     * @param array $options
     * @return \Exception|GuzzleException|string
     * @throws \Exception
     */
    public static function appBalances(array $options) {
        try {
            $response = (new TPayGateWay())->processRequest(Urls::$app_balances_url, (new TPayGateWay())->setRequestOptions($options), 'GET');

            return $response;

        } catch (\Exception $exception) {
            throw  new \Exception($exception->getMessage());
        }
    }
}
