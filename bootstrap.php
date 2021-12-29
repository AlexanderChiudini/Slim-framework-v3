<?php

session_start();

require "vendor/autoload.php";

use Slim\App;
use app\src\Whoops;

$config['displayErrorDetails'] = true;

$app = new app(['settings' => $config]);

(new Whoops)->run($app);