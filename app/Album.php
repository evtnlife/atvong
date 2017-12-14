<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rule;

class Album extends Model
{
    protected $fillable = [
        'title',
        'description',
        'user_id'
    ];

    public $rules = [
        'title' => 'required|unique:albums,title'
    ];

    public function photo(){
        return $this->hasMany('App\Photo');
    }
}
