<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix' => '/api'], function () use ($router) {

    $router->group(['prefix' => '/pessoas'], function () use ($router) {
        $controller = 'Pessoas';
        $router->post('', $controller . '@create');
        $router->get('', $controller . '@index');
        $router->get('{id}', $controller . '@show');
        $router->put('{id}', $controller . '@update');
        $router->delete('{id}', $controller . '@delete');
    });

    $router->group(['prefix' => '/operacoes'], function () use ($router) {
        $controller = 'Operacoes';
        $router->post('', $controller . '@create');
        $router->get('', $controller . '@index');
        $router->get('{id}', $controller . '@show');
        $router->put('{id}', $controller . '@update');
        $router->delete('{id}', $controller . '@delete');
    });
});
