<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jawaban extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function materi()
    {
        return $this->belongsTo(Materi::class, 'materi_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function soal()
    {
        return $this->belongsTo(Soal::class, 'soal_id');
    }
}
