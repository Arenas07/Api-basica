<?php

namespace App\Domain\Repositories;

use App\Domain\Models\User;

interface UserRepositoyInterface {

    public function create(array $data): User;
}