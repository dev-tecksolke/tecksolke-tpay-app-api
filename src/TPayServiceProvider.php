<?php

namespace TPay\API;

use Illuminate\Support\ServiceProvider;

class TPayServiceProvider extends ServiceProvider {
    /**
     * --------------------
     * define the boot
     * method here
     * --------------------
     */
    public function boot() {
        /**
         * -------------------------------------------------
         * load all the configurations for the package here
         * -------------------------------------------------
         */
        $this->mergeConfigFrom(
            __DIR__ . '/config/t-pay.php', 'tpay'
        );

        /**
         * -----------------------------------------
         * publishing configurations of the package
         * -----------------------------------------
         */
        $this->publishes([
            __DIR__ . '/config/t-pay.php' => config_path('t-pay.php'),
        ], 'config');
    }

    /**
     * ----------------------
     * define the register
     * method here too
     * ---------------------
     */
    public function register() {
        //TODO Nothing.....
    }

}
