<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    public function loginUser(LoginRequest $request)
    {

        $credentials = $request->only('email', 'password');

        if(Auth::attempt($credentials)) {
            $user = Auth::user();
            $token = $user->createToken($user->email.'-'.now());

            return [
                'token' => $token->accessToken
            ];
        }
        return 'Incorrect login or password';
    }
}
