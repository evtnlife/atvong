<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Noticia extends Model
{
    protected $fillable = [
        'title',
        'noticia',
        'user_id',
        'photos_id'
    ];

    protected function user(){
        return $this->hasOne('App\User');
    }

    public $rules = [
        'title'  => 'min:10|max:100|required',
        'noticia' => 'min:100|required'
    ];

    protected $guarded = [
        'id',
        'nivel'
    ];
//
//    public function photos(){
//        return $this->hasMany('app\Photo');
//    }
}
