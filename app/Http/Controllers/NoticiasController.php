<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Noticia;

class NoticiasController extends Controller
{
    private $noticia;

    public function __construct(Noticia $noticia)
    {
        $this->noticia = $noticia;
    }

    public function index()
    {
        $title = 'Seja bem vindo ao painel';
        return view('painel.painel', compact('title'));
    }

    public function show($id)
    {
        $title = 'Pagina de noticia';
        $news = $this->noticia->where('id',$id)->get();

        if($news)
            return view('painel.noticias.carregaNoticia',compact('title', 'news'));
        else
            return 'errors';
    }

    public function create()
    {
        $title = 'Criação de Noticias';
        return view('painel.noticias.createNoticia', compact('title'));
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $this->validate($request, $this->noticia->rules);
        $include = $this->noticia->create($data);

        if ($include)
            return redirect()->route('noticias.create')->with('news-status', 'Noticia Adicionada com sucesso!');
        else
            return redirect()->route('painel.create')->with('news-status', 'Falha ao adicionar News');
    }
}
