<?php

namespace App\Repositories;

use App\User;

class UserRepository
{
    public function getAllUsers()
    {
        return User::all();
    }

    public function findByEmailAndMatric($email, $matric)
    {
        return User::where('email', $email)->where('matric', $matric)->first();
    }
}
