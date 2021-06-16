<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Soal extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function materi()
    {
        return $this->belongsTo(Materi::class, 'materi_id');
    }
    public function jawaban()
    {
        return $this->hasMany(Materi::class);
    }
    
}
