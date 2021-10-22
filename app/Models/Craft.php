<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Craft extends Model
{
    protected $primaryKey = 'idcrafts';
    protected $fillable = [
        'idkota','namaCraft', 'shortDescriptionCraft','descriptionCraft', 'imageSmallCraft','imageBigCraft','videoCraft',
    ];
}
