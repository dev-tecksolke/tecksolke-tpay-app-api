<?php


namespace TPay\API\API;


use Exception;
use TPay\API\Urls\Urls;

class AppB2C
{
    /**
     * -------------------------
     * Make B2c LumenFormRequest here
     * -------------------------
     * @param array $options
     * @return mixed
     * @throws Exception
     */
    public static function appB2C(array $options)
    {
        try {
            return json_decode((new TPayGateWay())->processRequest(Urls::$app_b2c_url, (new TPayGateWay())->setRequestOptions($options)));

        } catch (Exception $exception) {
            throw  new Exception($exception->getMessage());
        }
    }
}
