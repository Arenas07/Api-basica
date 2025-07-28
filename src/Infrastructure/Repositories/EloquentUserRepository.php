<?php

namespace App\Infrastructure\Repositories;

use App\Domain\Models\User;
use App\Domain\Repositories\UserRepositoyInterface;
use Exception;
use App\DTOs\UserDTO;

class EloquentUserRepository implements UserRepositoyInterface{

    public function create(UserDTO $dto): User{

        $data = $dto->toArray();
        $exists = User::where('email', $data['email'])->first();

        if($exists){
            throw new Exception('Error el usuario ya existe');
        }
        return User::create($data);
    }
}