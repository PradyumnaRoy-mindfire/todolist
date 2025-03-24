<?php 
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__.'/../routes.php';
require_once __DIR__ . '/../db/config.php';


$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$method = $_SERVER['REQUEST_METHOD'];
$matchedRoute = null;

foreach ($routes as $route) {
    if ($route['url'] === $url && $route['method'] === $method) {
        $matchedRoute = $route;
        break;
    }
}

if ($matchedRoute) {
    $controller = $matchedRoute['controller'];
    $function = $matchedRoute['function'];

    $controllerName = "app\\controllers\\".$controller;

    if (class_exists($controllerName)) {
        $call = new $controllerName($conn);
        
        if (method_exists($call, $function)) {
            $call->$function();
        } else {
            http_response_code(404);
            echo json_encode(['status' => 'Error 404' , 'message' => "Method '$function' not found in controller '$controller'."]); // if controller found but the method nto found
        }
    } else {
        http_response_code(404);
        echo json_encode(['status' => 'Error 404' , 'message' => "Controller '$controller' not found"]);
    }
} else {
    http_response_code(404);
    echo json_encode(['status' => 'Error 404' , 'message' => 'page not found']);
}

