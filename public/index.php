<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require "../bootstrap.php";

/* $app->get('/', function(Request $request, Response $response, array $args) {
    dd($response);
});

$app->group('/admin', function() use($app) {
    $app->get('/login', function() {
        echo 'login';
    });
});

$app->group('/site', function() use($app) {
    $app->get('/contato', function() {
        echo 'contato';
    });
}); */

$app->get('/', 'app\controllers\HomeController:index');
$app->get('/contato', 'app\controllers\ContatoController:index');
$app->get('/posts', 'app\controllers\PostsController:index');

$app->post('/user/subscribe', 'app\controllers\SubscribeController:store');

$app->run();