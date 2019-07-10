<?php


namespace TPay\API\Urls;


class Urls {
    /**
     * -------------------------------------------------
     * Define all urls here for the t-pay endpoints
     * ------------------------------------------------
     */
    public static $app_access_token_url = 'access-token';//This is Get Requests
    public static $app_balances_url = 'app-balances';//Get Request
    public static $app_c2b_stk_url = 'app-stk-deposit';//Post Request
    public static $app_c2b_url = '';//Post Request
    public static $app_b2c_url = 'app-b2c-withdraw';//Post Request
    public static $express_payment_url = 'express-payment';//GET Request
}
