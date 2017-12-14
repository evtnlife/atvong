<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'title',
        'description',
        'dataEvent',
        'active',
        'user_id'
    ];

    public $rules = [
        'title' => 'min:3|max:100',
        'description' => 'min:10',
        'dataEvent' => 'required|date|after:tomorrow'
    ];

    protected $dates = [
        'dataEvent'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }
}
