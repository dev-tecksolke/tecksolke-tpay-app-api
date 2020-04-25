<?php


namespace TPay\API\API;

use Exception;
use TPay\API\Traits\CentralProcessingGate;
use TPay\API\Urls\Urls;

class AppC2BSTKPush
{
    use CentralProcessingGate;

    /**
     * ----------------------------------------------
     * Make request to the c2b here to the t-pay
     * ----------------------------------------------
     * @param array $options
     * @return mixed
     * @throws Exception
     */
    public function appC2BSTKPush(array $options)
    {
        try {
            return json_decode($this->processRequest(Urls::$app_c2b_stk_url, $this->setRequestOptions($options)));

        } catch (Exception $exception) {
            throw  new Exception($exception->getMessage());
        }
    }
}
