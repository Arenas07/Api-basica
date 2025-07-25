<?php

namespace App\Infrastructure\Repositories;

use App\Domain\Models\User;
use App\Domain\Repositories\UserRepositoyInterface;
use Exception;

class EloquentUserRepository implements UserRepositoyInterface{

    public function create(array $data): User{
        $exists = User::where('email', $data['email'])->first();

        if($exists){
            throw new Exception('Error el usuario ya existe');
        }
        return User::create($data);
    }
}