<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function logout(Request $request)
    {
        if( Auth::check() ) {
            $request->user()->token()->revoke();

        return response()->json(["message" => "Successfully logged out"]);
        }

        return response()->json(["success" => "false",
                                 "code"    => "401",
                                 "message" => "HTTP_UNAUTHORIZED"]);
    }
}
