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

$router->get('/', 'HomeController@index');
$router->post('/data', 'HomeController@data');

$router->get('/consulta-cep', 'HomeController@consultaCep');
$router->get('/tem-cobertura', 'HomeController@consultaCep');
$router->post('/obrigado', 'HomeController@obrigado');
$router->post('/verificar-cobertura', 'HomeController@verificarCobertura');

$router->post('/web-service', 'WebServiceController@index');

$router->post('/atendimento-net','AtendimentoNetController@consulta');

$router->get('/test', function () {

//    $lead = \App\Lead::query()->where('email','=','ti@terra.com.br')->get()->first();

    return json_encode(\App\AtendimentoNet::temCobertura("04905-000"));

});
