<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;

class eventsController extends Controller
{
    protected $event;

    public function __construct(Event $event){
        $this->event = $event;
    }

    public function index(){
        $title = 'Pagina de eventos';
        $events = $this->event->where('active', '=', 1)->paginate(15);

        return view('site.events.eventsPaginate', compact('title', 'events'));
    }

    public function show($id){
        $title = 'Pagina de eventos';
        $events = $this->event->where('id', '=', $id)->get();
        if($events->count()>0)
            return view('site.events.event', compact('title', 'events'));
        else {
            $eventsError = "Não foi possivel encontrar está noticias";
            return view('site.events.event', compact('title', 'eventsError'));
        }
    }

    public function create()
    {
        $title = 'Criação de eventos';
        return view('painel.events.createEvent', compact('title'));
    }

    public function store(Request $request){
        $data = $request->all();
        $title = 'Pagina de store';
        $this->validate($request,$this->event->rules);
        $db = $this->event->create($data);
        if($db)
            return redirect('eventos/createEvent')->with('goodEvent', 'Incluido com sucesso. =D')->with(compact('title'));
        else
            return redirect('eventos/createEvent')->with('badEvent','Falha ao salvar no banco de dados =(');
    }

    public function editView(){
        $title = 'Editar Noticias';
        $events = $this->event->orderBy('updated_at', 'desc')->paginate(15);
        return view('painel.events.eventPainel', compact('title', 'events'));
    }

    public function editShow($id){
        return view('painel.events.editEvent');
    }

    public function editStore(){
        return view('painel.events.editEvent');
    }
}
