<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coursel extends Model
{
    protected $fillable = [
        'path',
        'thumbPath',
        'message'
    ];
}
