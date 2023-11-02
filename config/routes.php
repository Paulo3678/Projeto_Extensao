<?php

use FastRoute\RouteCollector;
use App\Middleware\AuthMiddleware;
use function FastRoute\simpleDispatcher;


$dispatcher = simpleDispatcher(function (RouteCollector $r) {
    $r->addRoute('GET', '/', 'HomeController@index');
    $r->addRoute('POST', '/enviar-contato', 'HomeController@enviarContato');
});
