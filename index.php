<?php

require_once "vendor/autoload.php";

use App\Infrastructure\Database\Connection;
use Slim\Factory\AppFactory;
use Dotenv\Dotenv;


// Variables .env
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

// Se carga el container de PHP-DI
$container = require_once 'bootstrap/container.php';

// Asignamos a Slim el contenedor
AppFactory::setContainer($container);

// Iniciar la coneccion con la DB

Connection::init();

$app = AppFactory::create();


(require_once 'public/index.php')($app);
(require_once 'routes/camper.php')($app);
(require_once 'routes/user.php')($app);

$app->run();
