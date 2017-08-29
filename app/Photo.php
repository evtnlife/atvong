<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable = [
        'image',
        'image_type',
        'news_id'
    ];

    public function news_photos(){
        return $this->belongsTo('app\Noticia');
    }
}
