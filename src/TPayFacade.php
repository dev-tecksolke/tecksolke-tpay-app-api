<?php


namespace TPay\API;


use Illuminate\Support\Facades\Facade;

class TPayFacade extends Facade {
    /**
     * ------------------------------------------
     * Get the registered name of the component.
     * ------------------------------------------
     *
     * @return string
     */
    protected static function getFacadeAccessor() {
        return 'tpay';
    }
}
