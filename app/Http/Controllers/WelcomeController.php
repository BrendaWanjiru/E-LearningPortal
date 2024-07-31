<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        $welcomeMessage = __('messages.welcome');
        return view('welcome', compact('welcomeMessage'));
    }
}
