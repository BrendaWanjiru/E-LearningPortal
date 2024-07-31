<?php

namespace App\Repositories;

use App\User;

class UserRepository
{
    public function all()
    {
        return User::all();
    }

    public function findByCredentials(array $credentials)
    {
        return User::where($credentials)->first();
    }
}
