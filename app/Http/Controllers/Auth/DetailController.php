<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Auth\DetailRequest;

class DetailController extends Controller
{

    public function __invoke(DetailRequest $request)
    {
        $validated = $request->validated();
        Auth::user()->update($validated);
        return response('Update Berhasil',200);
    }
}
