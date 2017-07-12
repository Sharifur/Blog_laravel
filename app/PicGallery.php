<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PicGallery extends Model
{
    protected $table = 'pic_galleries';
    protected $fillable=[
      'url','picture'  
    ];
}
