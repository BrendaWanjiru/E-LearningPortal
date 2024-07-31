<?php

namespace App\Observers;

use App\User;

class UserObserver
{
    public function created(User $user)
    {
        // Logic to handle after a user is created
    }

    public function deleted(User $user)
    {
        // Logic to handle after a user is deleted
    }
}
