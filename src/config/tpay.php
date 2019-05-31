<?php
/**
 * ----------------------
 * define the t-pay
 * request options here
 *
 * -------------------------------------------------------------
 *
 * TODO the t-pay token session expires after every 10min
 *
 * -------------------------------------------------------------
 */

return [
    /**
     * ------------------------------------------------------------------
     * The end point url.
     * This is the url that points to the api source, where the requests
     * are sent and responses given back.
     * -------------------------------------------------------------------
     */
    'end_point_url' => env('T_PAY_END_POINT_URL', 'https://tpay.co.ke/'),//This contains the end point url

    /**
     * ---------------------------------------------------
     * The app key is a unique key given or each app.
     * This key acts as a unique identifier for the app.
     * ---------------------------------------------------
     *
     * The provided key is only for testing purposes don't use
     * it in a production environment.
     * -------------------------------------------------------------
     */
    'app_key' => env('T_PAY_APP_KEY', 'TP43C020782F'),//This is the app key for the specific app you are authenticating

    /**
     * ---------------------------------------------------------------------------------------------------
     * Token session is the time given for the access token.
     * In simple words after every 10 minutes you have to get a new access token to authenticate your app.
     * Note that the access token is a bearer access token.
     * ---------------------------------------------------------------------------------------------------
     */
    'token_session' => env('T_PAY_TOKEN_SESSION', 10),//The access token session lifetime is in min i.e 10 minutes

    /**
     * ---------------------------------------------------------------------------------------------------
     * The timeout is the time given for the response to be given if no response is given
     * in 120 seconds the request is dropped.
     * You are free to set your timeout
     * ---------------------------------------------------------------------------------------------------
     */
    'timeout' => env('T_PAY_RESPONSE_TIMEOUT', 120), // Response timeout 120sec

    /**
     * ---------------------------------------------------------------------------------------------------
     * The connection timeout is the time given for the request to acquire full connection to the
     * end point url. So if not connection is made in 60 seconds the request is dropped.
     * Your free to set your own connection timeout.
     * ---------------------------------------------------------------------------------------------------
     */
    'connect_timeout' => env('T_PAY_CONNECTION_TIMEOUT', 60), // Connection timeout 60sec
];