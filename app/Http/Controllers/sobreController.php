<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sobre;

class sobreController extends Controller
{
    private $sobre;

    public function __construct(Sobre $sobre){
        $this->sobre = $sobre;
    }

    public function index(){
        $sobre = $this->sobre->all()->take(1);
        $title = 'Sobre nós!';
        return view('site.sobre', compact('sobre', 'title'));
    }

    public function create(){
        $title = 'Edição pagina sobre';
        return view('painel.sobre.create', compact('title'));
    }
    public function store(Request $request){
        $dataRequest = $request->all();
        $data = $this->sobre->create($dataRequest);

        if($data) {
            return redirect('sobre/create')->with('aboutBad', 'Sobre Editado com sucesso!');
        } else{
            return redirect('sobre/create')->with('aboutGood', 'Falha ao editar');
        }
    }
}
