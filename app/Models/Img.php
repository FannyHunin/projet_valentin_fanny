<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Img extends Model
{
    public function imgGallery(){
        return $this->belongsTo('App\Models\ImgGallery');
    }
    use HasFactory;
}
