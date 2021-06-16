<?php


namespace App\Http\Controllers\Materi;

use App\Models\Soal;
use App\Models\Materi;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SoalController extends Controller
{
    public function saveSoal(Request $request)
    {
        if (isset($request->link_image)) {
            $request->validate(
                [
                    'link_image' => 'required',
                    'keyword' => 'required',
                    'petunjuk' => 'required',
                ]
            );
            $name = Str::slug(Str::random(10)).'.png';
            $new = 'public/soal/';
            $file = $request->link_image->storeAs($new,$name);
            $new = 'soal/';
            $link = $new . $name;
            $materi = Materi::find($request->materi_id);
            $materi->soal()->create([
                'link_image' => $link,
                'keyword' => $request->keyword,
                'petunjuk' => $request->petunjuk,
            ]);
        }
        
        
        if (isset($request->publish)) {
            $materi->update([
                'publish' => $request->publish
            ]);
        }
        return response()->json(['status'=>'success'],200);
    }
    public function getSoals(Request $request)
    {
        $soals = Soal::where('materi_id',$request->materi_id)->get();
        return response()->json("$soals", 200);
    }
    public function getSoal(Request $request)
    {
        $soal = Soal::where('materi_id',$request->materi_id)->where('id',$request->soal_id)->first();
        return response()->json($soal, 200);
    }
}
