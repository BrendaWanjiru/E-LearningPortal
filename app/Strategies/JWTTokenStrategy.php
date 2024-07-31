<?php

namespace App\Strategies;

use App\Strategies\Interfaces\TokenStrategyInterface;
use Firebase\JWT\JWT;

class JWTTokenStrategy implements TokenStrategyInterface
{
    public function generateToken($user)
    {
        $payload = [
            'iss' => "your-issuer",
            'sub' => $user->id,
            'iat' => time(),
            'exp' => time() + 60*60 // Token expiration time
        ];

        return JWT::encode($payload, env('JWT_SECRET'));
    }
}
