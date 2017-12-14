<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class painelController extends Controller
{
    public function index(){
        return view('painel.painelIndex');
    }
}
