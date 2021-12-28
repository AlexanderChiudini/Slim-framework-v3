<?php

require "vendor/autoload.php";

use Slim\App;

$config['displayErrorDetails'] = true;

$app = new app(['settings' => $config]);