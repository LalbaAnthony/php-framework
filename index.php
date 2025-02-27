<?php
// index.php - Point d'entrée de l'API

// Active l'affichage des erreurs en développement (désactivez en production)
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once 'init.inc.php';

// Autoloading simple conforme à une logique PSR-4
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

// Chargement du tableau des routes
$routes = require __DIR__ . '/routes.php';

// Instanciation de la Request
$request = new App\Http\Request();

var_dump($request);

// Instanciation du Router avec les routes définies
$router = new App\Http\Router($request, $routes);
$router->dispatch();
