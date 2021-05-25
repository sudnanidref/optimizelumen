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
|
*/

$router->get('/', 'AuthController@index');

$router->group(['prefix' => 'api'], function () use ($router) {
    $router->post('check_ticket', [
        'as' => 'ticket', 'uses' => 'AuthController@checkTicket'
    ]);

    $router->post('refresh_token', [
        'as' => 'refresh_token', 'uses' => 'AuthController@refreshToken'
    ]);

    // atucheticate jwt
    $router->group(['middleware' => 'jwt.verify'], function() use ($router) {
        $router->get('webinar', [
            'as' => 'webinar', 'uses' => 'WebinarController@index'
        ]);
    });
});

// $router->group(['middleware' => 'throttle:2,300'], function () use ($router) {
//     $router->get('/', function () use ($router) {
//         return $router->app->version();
//     });
// });
