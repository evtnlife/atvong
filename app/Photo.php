<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    public $fillable = [
        'imagePath',
        'thumbPath',
        'album_id',
    ];

    public function album(){
        return $this->belongsTo('App\Album');
    }
}
