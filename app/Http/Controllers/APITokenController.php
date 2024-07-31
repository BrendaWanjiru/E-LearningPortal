<?php

namespace App\Http\Controllers;

use App\Services\TokenService;
use Illuminate\Http\Request;

class APITokenController extends Controller
{
    protected $tokenService;

    public function __construct(TokenService $tokenService)
    {
        $this->tokenService = $tokenService;
    }

    public function generate(Request $request)
    {
        $token = $this->tokenService->generateToken($request->user());
        return response()->json(['token' => $token]);
    }
}
