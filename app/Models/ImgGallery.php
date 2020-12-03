<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImgGallery extends Model
{
    public function img(){
        return $this->hasMany('App\Models\Img');
    }
    use HasFactory;
}
