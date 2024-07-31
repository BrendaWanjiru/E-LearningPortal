<?php

namespace App\Services;

use App\Repositories\UserRepository;
use JWTAuth;
use JWTAuthException;

class UserService
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function getAllUsers()
    {
        return $this->userRepository->all();
    }

    public function login(array $credentials)
    {
        try {
            if (!$token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'Invalid credentials'], 401);
            }
        } catch (JWTAuthException $e) {
            return response()->json(['error' => 'Could not create token'], 500);
        }

        $user = $this->userRepository->findByCredentials($credentials);
        session(['matric' => $user->matric]);

        return response()->json([
            'success' => 'Login successful!',
            'user' => $user,
            'token' => $token
        ], 200);
    }

    public function logout()
    {
        JWTAuth::invalidate();
        return response()->json([
            'status' => 'success',
            'msg' => 'Logged out successfully.'
        ], 200);
    }

    public function getLoggedUser()
    {
        $matric = session('matric');
        return User::where('matric', $matric)->first();
    }
}
