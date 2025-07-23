<?php 

require_once "vendor/autoload.php";

use App\Middleware\JsonBodyParserMiddleware;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Server\RequestHandlerInterface as Handler;
use Slim\Factory\AppFactory;

// Middleware 
// Global -> a todas las request del backend

$app->add(function(Request $req, Handler $han ): Response{
    $response = $han->handle($req);
    return $response->withHeader('Content-Type', 'application/json');
});

$app->add(new JsonBodyParserMiddleware());

$app->run();