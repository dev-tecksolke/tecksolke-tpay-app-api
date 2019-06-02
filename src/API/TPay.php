<?php


namespace TPay\API\API;


use TPay\API\Http\Controllers\TpayController;

class TPay {
    /**
     * -----------------------------
     * get the access token here
     * ----------------------------
     * @throws \Exception
     */
    public function getAccessToken() {
        (new TpayController())->getAccessToken();
    }


    /**
     * -----------------
     * get balance
     * ----------------
     * @throws \Exception
     */
    public function getAppBalance() {
        (new TpayController())->getAppBalance();
    }
}
