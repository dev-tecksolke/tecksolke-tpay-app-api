<?php
/**
 * ------------------------------
 * define all the api requests
 * ------------------------------
 */

use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => 't-pay/v1',
    'namespace' => 'TPay\API\Http\Controllers',
], function () {
    //generate access token here
    Route::get('token', 'TpayController@getAccessToken')->name('t-pay-token');

    //request for balance here
    Route::get('balance', 'TpayController@getAppBalance')->name('t-pay-app-balance');
});
