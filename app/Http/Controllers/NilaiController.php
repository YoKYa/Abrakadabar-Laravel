<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Materi;
use App\Models\Jawaban;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NilaiController extends Controller
{
    public function getNilai(Request $request)
    {
        $text = Materi::find($request->materi_id)->soal()->get('keyword');
        $textArray = Arr::pluck($text, 'keyword');
        $textUwu = "";
        foreach ($textArray as $value) {
            if ($textUwu == "") {
                $textUwu = $value;
            }else {
                $textUwu = $textUwu.",".$value ;
            }
        }
        $arrText = $arrText = explode(',',$textUwu);;
        $length = count($arrText);

        $jawaban = Jawaban::where('user_id', Auth::user()->id)->where('materi_id', $request->materi_id)->get('jawaban');
        $jawabanArray = Arr::pluck($jawaban, 'jawaban');
        $angka = 0;
        for ($i=0; $i < count($textArray); $i++) { 
           $keywordArray[$i] = explode(',',$textArray[$i]);
           for ($j=0; $j < count($keywordArray[$i]); $j++) { 
               if (strpos(strtolower($jawabanArray[$i]), strtolower($keywordArray[$i][$j])) !== false) {
                   ++$angka;
               }
           }
        }
        $nilai = $angka/$length;
        $nilainya = Auth::user()->nilai()->create(
            [
                'materi_id' => $request->materi_id,
                'nilai' => $nilai*100
            ]
        );
        return response()->json($nilainya, 200);
    }
    public function getNilaiUser(Request $request)
    {
        $data = User::find($request->user_id)->nilai()->with('materi')->orderBy('id','DESC')->get(['nilai','materi_id']);
        return response()->json($data,200);
    }
}
