<?php

use App\Domain\Repositories\CamperRepositoryInterface;
use App\Infrastructure\Repositories\EloquentCamperRepository;
use App\Infrastructure\Repositories\EloquentUserRepository;
use App\Domain\Repositories\UserRepositoyInterface;
use DI\Container;

$container = new Container();

$container->set(CamperRepositoryInterface::class, function(){
    return new EloquentCamperRepository();
});

$container->set(UserRepositoyInterface::class, function() {
    return new EloquentUserRepository();
});

return $container;