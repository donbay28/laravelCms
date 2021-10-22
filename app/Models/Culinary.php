<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Culinary extends Model
{
    public $table = "culinary";
    protected $primaryKey = 'idculinary';
    protected $fillable = [
        'idkota','namaCulinary', 'shortDescriptionCulinary','descriptionCulinary', 'imageSmallCulinary','imageBigCulinary','videoCulinary',
    ];
}
