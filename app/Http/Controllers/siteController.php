<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Photo;
use App\Noticia;
use App\Event;
use App\Coursel;

class siteController extends Controller
{
    public function index(){
        $noticias = Noticia::orderBy('updated_at', 'desc')->take(5)->get();
        $photos = Photo::orderBy('updated_at', 'desc')->take(5)->get();
        $events = Event::orderBy('updated_at', 'desc')->take(5)->get();
        $photosCoursel = Coursel::orderBy('updated_at', 'desc')->get()->take(3);

        return view('index', compact('noticias', 'photos', 'events', 'photosCoursel'));
    }

    public function sobre(){
        $title = 'Sobre nós';
        return view('site.sobre', compact('title'));
    }

    public function eventos() {
        $title = 'Eventos';
        return view('site.eventos',compact('title'));
    }

    public function contato(){
        $title = 'Pagina de contatos';
        return view('site.contact.contact', compact('title'));
    }

}
