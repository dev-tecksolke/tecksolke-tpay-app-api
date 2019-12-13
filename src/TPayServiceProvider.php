<?php

namespace TPay\API;

use Illuminate\Support\ServiceProvider;

class TPayServiceProvider extends ServiceProvider
{
    /**
     * --------------------
     * define the boot
     * method here
     * --------------------
     */
    public function boot()
    {
        /**
         * -------------------------------------------------
         * load all the configurations for the package here
         * -------------------------------------------------
         */
        $this->mergeConfigFrom(
            __DIR__ . '/config/tpay.php', 'tpay'
        );

        /**
         * ----------------------------------------------
         * publishing configurations of the package
         * For developer to change the app configuration
         * ----------------------------------------------
         */
        $this->publishes([
            __DIR__ . '/config/tpay.php' => config_path('tpay.php'),
        ], 'config');
    }

    /**
     * ----------------------
     * define the register
     * method here too
     * ---------------------
     */
    public function register()
    {
        //TODO Nothing.....
    }

}
