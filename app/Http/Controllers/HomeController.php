<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Noticia;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $noticias = Noticia::orderBy('updated_at', 'desc')->take(5)->get();
        return view('index', compact('noticias'));
    }
}
