<?php

namespace App\Strategies\Interfaces;

interface TokenStrategyInterface
{
    public function generateToken($user);
}
