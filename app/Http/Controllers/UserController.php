<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Http\Request;
use JWTAuth;

class StudentController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function homepage()
    {
        return view('user.home');
    }

    public function show()
    {
        $students = $this->userService->getAllUsers();
        return view('user.register', ['students' => $students]);
    }

    public function login()
    {
        return view('user.login');
    }

    public function signin(Request $request)
    {
        $credentials = $request->only('email', 'matric');
        return $this->userService->login($credentials);
    }

    public function logout()
    {
        return $this->userService->logout();
    }

    public function loggedUser()
    {
        $user = $this->userService->getLoggedUser();
        return response()->json([$user], 200);
    }

    public function blog()
    {
        return view('user.blog');
    }
}
