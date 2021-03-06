<?php

namespace app\src;

use Dopesong\Slim\Error\Whoops as WhoopsError;
use Whoops\Handler\PrettyPageHandler;

class Whoops extends WhoopsError {

    /**
     * Customização do erro no Slim
     */
    private function slim($app) {
        $container = $app->getContainer();

        $container['phpErrorHandler'] = $container['errorHandler'] = function() {
            return $this;
        };
    }

    /**
     * Customização do erro no PHP
     */
    private function php() {
        $this->pushHandler(new PrettyPageHandler);
        $this->register();
    }

    /**
     * Execução da classe
     */
    public function run($app) {
        $this->php();
        $this->slim($app);
    }

}