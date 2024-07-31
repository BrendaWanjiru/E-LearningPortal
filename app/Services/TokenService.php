<?php

namespace App\Services;

use App\Strategies\Interfaces\TokenStrategyInterface;

class TokenService
{
    protected $tokenStrategy;

    public function __construct(TokenStrategyInterface $tokenStrategy)
    {
        $this->tokenStrategy = $tokenStrategy;
    }

    public function generateToken($user)
    {
        return $this->tokenStrategy->generateToken($user);
    }
}
