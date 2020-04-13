<?php


namespace TPay\API\API;


use Exception;
use TPay\API\Urls\Urls;

class AppBalances
{
    /**
     * -----------------------
     * Get app balances here
     * ------------------------
     * @param array $options
     * @return mixed
     * @throws Exception
     */
    public static function appBalances(array $options)
    {
        try {
            return json_decode((new TPayGateWay())->processRequest(Urls::$app_balances_url, (new TPayGateWay())->setRequestOptions($options), 'GET'));

        } catch (Exception $exception) {
            throw  new Exception($exception->getMessage());
        }
    }
}
