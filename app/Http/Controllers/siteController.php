<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Noticia;

class siteController extends Controller
{
    public function index(){
        $noticias = Noticia::orderBy('updated_at', 'desc')->take(5)->get();
        return view('index', compact('noticias'));
    }
}
