<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materi extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function soal()
    {
        return $this->hasMany(Soal::class);
    }
    public function nilai()
    {
        return $this->hasMany(Nilai::class);
    }
    
}
