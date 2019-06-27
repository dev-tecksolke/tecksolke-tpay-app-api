# <p align="center"><a href="https://tpay.co.ke/" target="_blank"><img src="https://tpay.co.ke/img/logo-black.png"></a></p>

<p align="center">
  <b>Make It Happen</b><br>
  <a href="https://github.com/dev-TecksolKE/tecksolke-tpay-app-api/issues">
  <img src="https://img.shields.io/github/issues/dev-TecksolKE/tecksolke-tpay-app-api.svg">
  </a>
  <a href="https://github.com/dev-TecksolKE/tecksolke-tpay-app-api/network/members">
  <img src="https://img.shields.io/github/forks/dev-TecksolKE/tecksolke-tpay-app-api.svg">
  </a>
  <a href="https://github.com/dev-TecksolKE/tecksolke-tpay-app-api/stargazers">
  <img src="https://img.shields.io/github/stars/dev-TecksolKE/tecksolke-tpay-app-api.svg">
  </a>
  <br><br>
  <img src="http://s.4cdn.org/image/title/105.gif">
</p>

T-Pay API is REST-API that makes it easy for one to make request to the T-Pay Payment Gateway for his/her App.

- The API is simple and easy to install.
- Has both B2C and C2B API for your App's.
- The API can only be used by those having apps, in T-Pay Payment Gateway.
- The API is based on PHP *[Laravel Framework](https://laravel.com/)*
- One can change the API to accomplish his/her needs.

## Help and docs

- [API Documentation](https://tpay.co.ke/)


## Installing

The recommended way to install tpay-api is through
[Composer](http://getcomposer.org).

```bash
# Install package via composer
composer require tecksolke-tpay/app-api
```

Next, run the Composer command to install the latest stable version of *tpay/api*:

```bash
# Update package via composer
 composer update tecksolke-tpay/app-api --lock
```

After installing, the package will be auto discovered, But if need you may run:

```php
# run for auto discovery <-- If the package is not detected automatically -->
composer dump-autoload
```

Then run this, to get the *config/tpay.php* for api configurations:

```php
# run this to get the configuartion file at config/tpay.php <-- read through it -->
php artisan vendor:publish --provider="TPay\API\TPayServiceProvider"
```

You will have to provide this in the *.env* for the api configurations:

```php
# https://tpay.co.ke/
T_PAY_END_POINT_URL=

# TP4*****82F <-- keep this key secret -->
T_PAY_APP_KEY=

# 10 <-- The access token session lifetime is in min i.e 10 minutes -->
T_PAY_TOKEN_SESSION=

# 120 <-- Response timeout 120 seconds -->
# This is not a must you may choose to use the dafault value defined in the config/tpay.php;
T_PAY_RESPONSE_TIMEOUT=

# 60 <-- Connection timeout 60 seconds -->
# This is not a must you may choose to use the dafault value defined in the config/tpay.php;
T_PAY_CONNECTION_TIMEOUT=
```

## Usage
Follow the steps below on how to use the api:

#### Direct Access
We call ths TPayController to access the functions.

```php
    /**
     * ------------------------------------
     * Getting access token via the API.
     * ------------------------------------
     *
     * To get the access token call
     * the function as shown here.
     *
     * -------------------------------------------
     * Note that for this you have to cache token
     */
    try {
        return (new \TPay\API\Http\Controllers\TpayController())->getAccessToken();
    } catch (Exception $exception) {
        //catch exception here i.e do what you what if an exception occurs
    }

    /**
     * ------------------------------------------------
     * Or you can use a route to get the access token
     * as shown.
     * ------------------------------------------------
     * If you use the route to get the access token
     * remember to cache it with the defined token_session in the
     * config/tpay.php file
     * --------------------------------------------------------------
     */
    return route('t-pay-token');//http://hostname/t-pay/v1/token


    /**
     * -------------------------------------
     * Getting the app balance
     * -------------------------------------
     * Getting the app balance do this
     * as shown here.
     *
     * --------------------------------------------------------------------------------------------------
     * We recommend to use this to access the app balance. Since here all the access token and cache is
     * managed for you out of the box, so please follow this.
     * --------------------------------------------------------------------------------------------------
     */
    try {
        return (new \TPay\API\Http\Controllers\TpayController())->getAppBalance();
    } catch (Exception $exception) {
        //catch exception here i.e do what you what if an exception occurs
    }

    /**
     * -------------------------------
     * Get balance form the route url
     * -------------------------------
     *
     * --------------------------------------------------------------------
     * Also requesting balance via here does the same everything is already
     * done for you.
     * --------------------------------------------------------------------
    */
    return route('t-pay-app-balance');//http://hostname/t-pay/v1/balance
    
    
```
#### Using Aliases
We call the TPayAPI to access the api functions as shown here :-

```php
 /**
     * ------------------------------------
     * Getting access token via the API.
     * ------------------------------------
     *
     * To get the access token call
     * the function as shown here.
     *
     * -------------------------------------------
     * Note that for this you have to cache token
     */
    try {
        return TPayAPI::getAccessToken();
    } catch (Exception $exception) {
        //catch exception here i.e do what you what if an exception occurs
    }
    
    
       /**
         * -------------------------------------
         * Getting the app balance
         * -------------------------------------
         * Getting the app balance do this
         * as shown here.
         *
         * --------------------------------------------------------------------------------------------------
         * We recommend to use this to access the app balance. Since here all the access token and cache is
         * managed for you out of the box, so please follow this.
         * --------------------------------------------------------------------------------------------------
         */
        try {
            return TPayAPI::getAppBalance();
        } catch (Exception $exception) {
            //catch exception here i.e do what you what if an exception occurs
        }
        
        
```

## Version Guidance

| Version | Status     | Packagist           | Namespace    | Repo                |
|---------|------------|---------------------|--------------|---------------------|
| 1.x     | Latest     | `tecksolke-tpay/app-api` | `TPay\API` | [v1.0.0](https://github.com/dev-TecksolKE/tecksolke-tpay-app-api/tree/1.0)|

[tpay-api-1-repo]: https://github.com/dev-TecksolKE/tpay-api.git

## Security Vulnerabilities
 For any security vulnerabilities, please email to [TecksolKE](mailto:client@tecksol.co.ke).
