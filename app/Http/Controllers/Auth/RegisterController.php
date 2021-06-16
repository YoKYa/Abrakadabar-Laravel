<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;

class RegisterController extends Controller
{
    
    public function __invoke(RegisterRequest $request)
    {
        $validated = $request->validated();
        $validated['password'] = bcrypt($validated['password']);
        User::create($validated);
        return response('Daftar Berhasil',200);
    }
}
