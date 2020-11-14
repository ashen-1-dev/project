<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    protected function loginUser(LoginRequest $request)
    {

        $credentials = $request->only('email', 'password');

        if(Auth::attempt($credentials)) {
            $user = Auth::user();
            $token = $user->createToken($user->email.'-'.now());

            return [
                'token' => $token->accessToken
            ];
        }
        return response()->json(["success" => "false",
                                 "code"    => "422",
                                 "message" => "HTTP_UNPROCESSABLE_ENTITY"]);
    }
}
