<?php

namespace App\Http\Controllers\Materi;

use App\Models\User;
use App\Models\Materi;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\MateriResource;
use Illuminate\Support\Facades\Validator;

class MateriController extends Controller
{
    public function addMateri(Request $request)
    {
        $request->validate([
                'title' => 'required',
                'link_image'  => 'required',
                'kesulitan'  => 'required',
                'sinopsis'  => 'required',
            ]   
        );
        $files = $request->link_image;
        if ($files) {
            //store file into document folder
            $name = Str::slug($request->title.'-'.Str::random(5)).'.png';
            $new = 'public/materi/';
            $file = $request->link_image->storeAs($new,$name);
            $new = 'materi/';
            $link = $new . $name;
            //store your file into database
            $materi = Materi::create([
                'title'         => $request->title,
                'link_image'    => $link,
                'kesulitan'     => $request->kesulitan,
                'sinopsis'      => $request->sinopsis,
            ]);
            return response()->json([
                "success" => true,
                "message" => "File successfully uploaded",
                "materi" => $materi->id
            ]);
        }
    }
    public function getMateri(Request $request)
    {
        $materi = Materi::find($request->id);
        $temp_idSoal = $materi->soal()->get('id');
        $id_soal= [];

        $id_soal = $temp_idSoal->toArray();
        $id_soal = Arr::pluck($id_soal, 'id');
        return response()->json([$materi, $id_soal], 200);
    }
    public function deleteMateri(Request $request)
    {
        $materi = Materi::find($request->id);
        $materi->delete();
        $materi->soal()->delete();
        return response()->json(['status'=>'success'],200);
    }
    public function getAllMateri(Request $request)
    {
        $materi = Materi::where('kesulitan',$request->mode)->get();
        $nilai = Auth::user()->nilai->sortByDesc('nilai')->first();
        return MateriResource::collection($materi, $nilai);
        // return response()->json([$materi, $nilai], 200);

        // return response()->json("$materi", 200);

    }
}
