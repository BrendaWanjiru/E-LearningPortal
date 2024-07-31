<?php

namespace App\Strategies;

use App\Strategies\Interfaces\TokenStrategyInterface;
use Illuminate\Support\Str;

class SimpleTokenStrategy implements TokenStrategyInterface
{
    public function generateToken($user)
    {
        return Str::random(60);
    }
}
