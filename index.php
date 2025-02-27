<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once 'init.inc.php';

spl_autoload_register(function($class) {
    $prefix = 'App\\';
    $base_dir = __DIR__ . '/src/';
    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0) {
        return;
    }
    $relative_class = substr($class, $len);
    $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';
    if (file_exists($file)) {
        require $file;
    }
});

$routes = require __DIR__ . '/routes.php';

$request = new App\Http\Request();

$router = new App\Http\Router($request, $routes);
$router->dispatch();
