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
         * ---------------------------
         * load package routes here
         * ---------------------------
         */
        $this->loadRoutesFrom(__DIR__ . '/routes/api.php');

        /**
         * -------------------------------------------------
         * load all the configurations for the package here
         * -------------------------------------------------
         */
        $this->mergeConfigFrom(
            __DIR__ . '/config/tpay.php', 'tpay'
        );

        /**
         * -----------------------------------------
         * publishing configurations of the package
         * -----------------------------------------
         */
        $this->publishes([
            __DIR__ . '/config/tpay.php' => config_path('tpay.php'),
        ]);
    }

    /**
     * ----------------------
     * define the register
     * method here too
     * ---------------------
     */
    public function register() {
        $this->app->bind('tpay', function () {
            return new TPay();
        });
    }

}
