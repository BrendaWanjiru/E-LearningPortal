<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Auth\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Image;
use JWTAuthException;
use JWTAuth;


class UserController extends Controller
{

    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function index()
    {
        $students = User::all();
        return view('admin.student.all', ['student'=> $students]);
    }

    public function home()
    {
        return view('admin/home');
    }

    public function course(Request $request)
    {
        return view('user/course');
    }

    // create user and authenticate
    public function create(Request $request)
    {
        $user = User::create([

            'firstname' => $request['firstname'], 'lastname' => $request['lastname'], 'email' => $request['email'], 'matric' => $request['matric'],
            'department' => $request['department'],'level' => $request['level'], 'password' => Hash::make($request['password']),
        ]);

        $token = JWTAUTH::fromUser($user);

        if($token){
            return response()->json([
              'success' => 'Yo! registeration succesful !',
              'access_token' => $token,
              'token_type'   => 'bearer',
		    ], 200);
        }else{
            return response()->json([
                'fail' => 'Registeration failed'
            ], 401);
        }
    }

    // signin registered user
    public function signin(Request $request)
    {
        $credentials = $request->only('email', 'password');

        try {
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json(['fail' => 'invalid_credentials'], 400);
            }
        } catch (JWTException $e) {
            return response()->json(['fail' => 'could_not_create_token'], 500);
        }

        return response([
            'success' => 'Login Successful',
            'token' => $token,
            'credentials' => $credentials

        ], 200);
    }


    // current current loggedin user details
    public function currentLoggedin(Request $request)
    {
        $user = User::find(Auth::user()->id);
        return response([
            'result' => $user,
            'status' => 'success',
        ]);
    }

    // checks to make sure token is still active
    public function refresh()
    {
    return response([
            'status' => 'success'
        ]);
    }

    // user logout and token is destroyed
    public function logout()
    {
        JWTAuth::invalidate();
        return response([
                'success' => 'Logged out Successfully',
            ], 200);
    }

    // admin image upload section
    public function store(Request $request)
    {
        if($request->hasFile('avatar')){
            $avatar = $request->file('avatar');
            $filename = time() .'.'. $avatar ->getClientOriginalExtension();
            Image::make($avatar)->resize(200, 200)->save(public_path('admin/upload/avatar/'. $filename));

            $user = Auth::user();
            $user->avatar = $filename;
            $user->save();
        }
        return view('admin/home', array('user' => Auth::user()));
    }

}
