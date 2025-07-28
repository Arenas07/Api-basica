<?php

use App\Domain\Repositories\CamperRepositoryInterface;
use App\Infrastructure\Repositories\EloquentCamperRepository;
use App\Infrastructure\Repositories\EloquentUserRepository;
use App\Domain\Repositories\UserRepositoyInterface;
use App\Handler\CustomErrorHandler;
use DI\Container;
use Psr\Http\Message\ResponseFactoryInterface;
use Slim\Interfaces\ErrorHandlerInterface;

$container = new Container();

$container->set(CamperRepositoryInterface::class, function(){
    return new EloquentCamperRepository();
});

$container->set(UserRepositoyInterface::class, function() {
    return new EloquentUserRepository();
});

// Manejador

$container->set(ErrorHandlerInterface::class, function () use ($container) {
    return new CustomErrorHandler(
        $container->get(ResponseFactoryInterface::class)
    );
});

return $container;