<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;

use App\Models\User;

use function Symfony\Component\String\s;

class RegisterController extends Controller
{
    protected function generateAccessToken($user)
    {
        $token = $user->createToken($user->email. '-'.now());
        return $token->accessToken;
    }

    protected function registerUser(RegisterRequest $request)
    {
        $user = User:: create([
            'name' => $request->name,
            'email'=> $request->email,
            'password' => bcrypt($request->password)
        ]);
        return $user;
    }
}
