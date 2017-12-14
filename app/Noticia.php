<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Noticia extends Model
{
    protected $fillable = [
        'title',
        'notice',
        'user_id',
        'photos_id'
    ];

    protected function user(){
        return $this->belongsTo('App\User');
    }

    public $rules = [
        'title'  => 'min:5|max:70|required',
        'notice' => 'min:10|required'
    ];

    protected $guarded = [
        'id',
        'nivel'
    ];
//
//    public function photos(){
//        return $this->hasMany('app\Photo1]');
//    }
}
