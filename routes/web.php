<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|   Anotações para reforçar
|   php -S localhost:8000 -t public => -S server, -t Target pasta public
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix' => 'api'], function () use ($router) {
    $router->group(['prefix' => 'animes'], function () use ($router) {
        $router->post('', 'AnimesController@store');
        $router->get('', 'AnimesController@index');
        $router->get('{id}', 'AnimesController@show');
        $router->put('{id}', 'AnimesController@update');
        $router->delete('{id}', 'AnimesController@destroy');
    });

    $router->group(['prefix' => 'episodes'], function () use ($router) {
        $router->post('', 'EpisodesController@store');
        $router->get('', 'EpisodesController@index');
        $router->get('{id}', 'EpisodesController@show');
        $router->put('{id}', 'EpisodesController@update');
        $router->delete('{id}', 'EpisodesController@destroy');
    });
});
