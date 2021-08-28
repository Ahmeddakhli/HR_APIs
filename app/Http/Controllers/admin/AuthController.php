<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
//use Illuminate\Http\Request;
use App\Models\User;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\users\StoreUserRequest;

use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{ 

    public function register(StoreUserRequest $request)
    {
       

        $user = User::create([
            'name' => $request['name'],
            'password' => bcrypt($request['password']),
            'email' => $request['email']
        ]);

        return $this->success([
            'token' => $user->createToken('API Token')->plainTextToken
        ],"The HR user has been created successfully, but you must keep the token in a safe place because you cannot request it again ");
    }

    public function login(LoginRequest $request)
    {
        

        if (!Auth::attempt($request->all())) {
            return $this->error('Credentials not match', 401);
        }

        return $this->success([
            'token' => auth()->user()->createToken('API Token')->plainTextToken
        ]);
    }

    public function logout()
    {
        auth()->user()->tokens()->delete();

        return [
            'message' => 'Tokens Revoked Hr user successfully logout'
        ];
    }
}
