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
$router->get('/api', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix' => '/api'], function () use ($router) {
    $router->group(['prefix' => '/pessoas'], function () use ($router) {
        $router->post('/', 'Pessoas@create');
        $router->get('/', 'Pessoas@index');
        $router->get('/{id}', 'Pessoas@show');
        $router->put('/{id}', 'Pessoas@update');
        $router->delete('/{id}', 'Pessoas@delete');
    });
    $router->group(['prefix' => '/operacoes'], function () use ($router) {
        $router->post('/', 'Operacoes@create');
        $router->get('/', 'Operacoes@index');
        $router->get('/{id}', 'Operacoes@show');
        $router->put('/{id}', 'Operacoes@update');
        $router->delete('/{id}', 'Operacoes@delete');
    });
});


