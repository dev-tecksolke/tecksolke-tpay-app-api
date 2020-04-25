<?php


namespace TPay\API\Urls;


class Urls
{
    /**
     * -------------------------------------------------
     * Define all urls here for the t-pay endpoints
     * ------------------------------------------------
     */
    public static $app_access_token_url = 'access-token';//This is Get Requests
    public static $app_balances_url = 'app-balances';//Get LumenFormRequest
    public static $app_c2b_stk_url = 'app-stk-deposit';//Post LumenFormRequest
    public static $app_c2b_url = '';//Post LumenFormRequest
    public static $app_b2c_url = 'app-b2c-withdraw';//Post LumenFormRequest
    public static $express_payment_url = 'express-payment';//GET LumenFormRequest
}
