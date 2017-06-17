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

$app->get('/', function () use ($app) {
    return "Lumen";
});
$app->group(['prefix'=>'api/v1'], function($app){
    $app->get('books', 'BookController@index');
    $app->get('book/{id}', 'BookController@show');
    $app->post('book', 'BookController@store');
    $app->put('book/{id}', 'BookController@update');
    $app->delete('book/{id}', 'BookController@delete');
});
