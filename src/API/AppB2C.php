<?php


namespace TPay\API\API;


use Exception;
use TPay\API\Traits\CentralProcessingGate;
use TPay\API\Urls\Urls;

class AppB2C
{
    use CentralProcessingGate;

    /**
     * -------------------------
     * Make B2c Request here
     * -------------------------
     * @param array $options
     * @return mixed
     * @throws Exception
     */
    public function appB2C(array $options)
    {
        try {
            return json_decode($this->processRequest(Urls::$app_b2c_url, $this->setRequestOptions($options)));

        } catch (Exception $exception) {
            throw  new Exception($exception->getMessage());
        }
    }
}
