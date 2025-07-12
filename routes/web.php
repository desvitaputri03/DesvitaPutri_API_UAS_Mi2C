<?php

/** @var \Laravel\Lumen\Routing\Router $router */

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix' => 'api/perpustakaan'], function () use ($router) {
    $router->get('/', 'PerpustakaanController@index');
    $router->get('{id}', 'PerpustakaanController@show');
    $router->post('/', 'PerpustakaanController@store');
    $router->put('{id}', 'PerpustakaanController@update');
    $router->delete('{id}', 'PerpustakaanController@destroy');
});

// Untuk handle CORS
$router->options('/{any:.*}', function () {
    return response()->json([], 200);
});
