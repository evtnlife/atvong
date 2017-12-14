<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Noticia;
use Illuminate\Support\Facades\Storage;
use App\User;

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
        $title = 'Pagina de noticias';
        $news = $this->noticia->where('id','=',$id)->get();

        if($news)
            return view('site.noticias.carregaNoticia',compact('title', 'news'));
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
    public function editView(){
        $news = $this->noticia->orderBy('updated_at', 'desc')->paginate(15);
        return view('painel.noticias.noticiasPainel', compact('news'));
    }

    public function editShow($id){
        $notice = $this->noticia->where('id', '=', $id)->get();
        return view('painel.noticias.editNoticia', compact('notice'));
    }
    public function editStore($id, Request $request){
        $data = $request->all();
        $this->validate($request, $this->noticia->rules);

        $notice = $this->noticia->where('id', '=', $id)->update([
            'user_id' => $data['user_id'],
            'title' => $data['title'],
            'notice' => $data['notice']
        ]);
        if($notice)
            return redirect()->back()->with('message', 'Você editou com sucesso a noticia!');
        else
            return redirect()->back()->with('message', 'Falha ao editar noticia');
    }

    public function delete($id){
        if(Auth::user()->nivel > 0)
            $notice = $this->noticia->where('id', $id)->delete();
        else
            $notice = false;
        if($notice)
            return redirect()->back()->with('message', 'Notícia deletada com sucesso');
        else
            return redirect()->back()->with('message', 'Falha ao deletar notícia!');
    }
}
