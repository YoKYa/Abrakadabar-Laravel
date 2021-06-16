<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CekDetailController extends Controller
{
    public function __invoke()
    {
        if ( Auth::user()->pluck('detail')->first() == null ) {
            return true;
        }else{
            return false;
        }
    }
}
