<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wisata extends Model
{
    protected $primaryKey = 'idwisatas';
    protected $fillable = [
        'idkota','namaWisata', 'shortDescriptionWisata','descriptionWisata', 'imageSmallWisata','imageBigWisata','videoWisata',
    ];

    // public function wisata(){
    //     return $this->belongsTo('App\Models\Kota','idkotas', 'idkota');
    // }
}
