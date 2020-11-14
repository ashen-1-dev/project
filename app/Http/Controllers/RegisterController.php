<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;



class RegisterController extends Controller
{
    protected function registerUser(RegisterRequest $request)
    {
        $user = User:: create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => bcrypt($request->password)
        ]);
        return $user;
    }
}
