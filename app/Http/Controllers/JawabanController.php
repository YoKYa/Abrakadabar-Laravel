<?php

namespace App\Http\Controllers;

use App\Models\Jawaban;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JawabanController extends Controller
{
    public function saveJawaban(Request $request)
    {
        $request->validate([
            'jawaban' => 'required',
        ]);
        $uwu = Auth::user()->jawaban()->where('materi_id',$request->materi_id)->where('soal_id',$request->soal_id)->first();
        if ($uwu == null) {
            Auth::user()->jawaban()->create([
                'materi_id' => $request->materi_id,
                'soal_id' => $request->soal_id,
                'jawaban' => $request->jawaban,
            ]);
        }else{
            $uwu->update([
                'materi_id' => $request->materi_id,
                'soal_id' => $request->soal_id,
                'jawaban' => $request->jawaban,
            ]);
        }
        return "Oke";
        // dd($uwu);
        // Jawaban::updateOrCreate([
        //     'user_id' => Auth::user()->id,
        //     'materi_id' => $request->materi_id,
        //     'soal_id' => $request->soal_id,
        //     'jawaban' => $request->jawaban,
        // ]);
        // Auth::user()->jawaban()->updateOrCreate([

        // ]);
    }
}
