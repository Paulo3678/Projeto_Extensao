<?php

require_once 'vendor/autoload.php';
require_once 'config/routes.php';
require_once 'config/constants.php';

use FastRoute\Dispatcher;
use Laminas\Diactoros\ServerRequestFactory;
use Laminas\HttpHandlerRunner\Emitter\SapiEmitter;

session_start();
$request = ServerRequestFactory::fromGlobals();
$routeInfo = $dispatcher->dispatch($request->getMethod(), $request->getUri()->getPath());
$requestUri = $request->getUri()->getPath();
switch ($routeInfo[0]) {
    case Dispatcher::NOT_FOUND:
        echo "Página não encontrada";
        exit;
    case Dispatcher::METHOD_NOT_ALLOWED:
        header("Location: /");
    case Dispatcher::FOUND:

        $handler = $routeInfo[1];

        $vars = $routeInfo[2];
        list($controllerName, $methodName) = explode('@', $handler);
        $controllerName = "App\\Controllers\\" . $controllerName;
        $controllerInstance = new $controllerName;

        if (method_exists($controllerInstance, $methodName)) {
            $response = call_user_func_array([$controllerInstance, $methodName], $vars);
        } else {
            echo "Método não encontrado";
            $response = call_user_func_array([$controllerInstance, $methodName], $vars);
        }
        break;
}
(new SapiEmitter())->emit($response);
