<?php

require 'vendor/autoload.php';
require 'config.php';

//Instanciation de l'application
$app = new \Slim\App(["settings" => $config]);
$container = $app->getContainer();

//autoload de mes classes
require 'autoload.php';

//connexion db
$container['db'] = function ($c) {
    $db = $c['settings']['db'];
    $pdo = new PDO("mysql:host=" . $db['host'] . ";dbname=" . $db['dbname'],
        $db['user'], $db['pass']);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    return $pdo;
};

$container["jwt"] = function ($container) {
    return new StdClass;
};

// JWT Middleware
$app->add(new \Slim\Middleware\JwtAuthentication([
    //"path" => "/api",
    //"passthrough" => ["/api/token"],
    "secure" => true,
    "relaxed" => ["localhost"],
    "secret" => "manApiProjectLPMulti2016",
    "callback" => function ($request, $response, $arguments) use ($container) {
        $container["jwt"] = $arguments["decoded"];
    }
]));

//Mes routes
require 'routes/routing.php';
//lancement de l'application
$app->run();