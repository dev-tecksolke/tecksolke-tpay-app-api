<?php


namespace TPay\API\API;


use Exception;
use TPay\API\Traits\CentralProcessingGate;
use TPay\API\Urls\Urls;

class AppBalances
{
    use CentralProcessingGate;

    /**
     * -----------------------
     * Get app balances here
     * ------------------------
     * @param array $options
     * @return mixed
     * @throws Exception
     */
    public function appBalances(array $options)
    {
        try {
            return json_decode($this->processRequest(Urls::$app_balances_url, $this->setRequestOptions($options), 'GET'));

        } catch (Exception $exception) {
            throw  new Exception($exception->getMessage());
        }
    }
}
