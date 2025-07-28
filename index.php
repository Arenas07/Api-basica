<?php

require_once "vendor/autoload.php";

use App\Infrastructure\Database\Connection;
use Slim\Factory\AppFactory;
use Dotenv\Dotenv;
use Psr\Http\Message\ResponseFactoryInterface;
use Slim\Interfaces\ErrorHandlerInterface;

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

//Inyectamos ResponseFactory que necesita nuestro CustomErrorHandler
$container->set(ResponseFactoryInterface::class, $app->getResponseFactory());

// Definimos quien maneja los errores

$errorHandler = $app->addErrorMiddleware(true, true, true);
$errorHandler->getDefaultErrorHandler($container->get(ErrorHandlerInterface::class));


//public/
(require_once 'public/index.php')($app);
//routes/
(require_once 'routes/camper.php')($app);
(require_once 'routes/user.php')($app);

$app->run();
