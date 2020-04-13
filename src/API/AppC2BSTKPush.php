<?php


namespace TPay\API\API;

use Exception;
use TPay\API\Urls\Urls;

class AppC2BSTKPush
{
    /**
     * ----------------------------------------------
     * Make request to the c2b here to the t-pay
     * ----------------------------------------------
     * @param array $options
     * @return mixed
     * @throws Exception
     */
    public static function appC2BSTKPush(array $options)
    {
        try {
            return json_decode((new TPayGateWay())->processRequest(Urls::$app_c2b_stk_url, (new TPayGateWay())->setRequestOptions($options)));

        } catch (Exception $exception) {
            throw  new Exception($exception->getMessage());
        }
    }
}
