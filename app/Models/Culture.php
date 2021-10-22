<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Culture extends Model
{
    protected $primaryKey = 'idcultures';
    protected $fillable = [
        'idkota','namaCulture', 'shortDescriptionCulture','descriptionCulture', 'imageSmallCulture','imageBigCulture','videoCulture',
    ];
}
