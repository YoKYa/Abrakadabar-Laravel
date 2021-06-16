<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __invoke(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        if (!$token = Auth::attempt($request->only('username','password'))) {
        
            return response( ["errors" => ["error" => ["Username atau password salah"]]], 401);
        }
        return response()->json(compact('token'));
    }
}
