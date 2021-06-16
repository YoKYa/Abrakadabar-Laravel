<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getUsers(Request $request)
    {
        $users = User::where('status', $request->status)->orderBy('name','ASC')->get();
        return response()->json("$users", 200);
    }
    public function accGuru(Request $request)
    {
        $user = User::find($request->id);
        $user->update(
            ['cek' => 1]
        );
        return response('Update Berhasil',200);
    }
    public function delUser(Request $request)
    {
        $user = User::find($request->id);
        $user->delete();
        return response('Berhasil dihapus',200);
    }
}
