@extends('template.app')

@section('content')
    <div class="container-fluid content-index">
        @if(isset($events) and $events->count() >0 )
        <div id="news">
            <h1>Eventos</h1>
            @if(isset($events))
            <table class="table table-hover table-sm" >
                <thead>
                    <tr >
                        <th width="20%">Data</th>
                        <th width="60%">Titulo do evento</th>
                        <th>Autor</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($events as $event)
                    <tr>
                        <td><a class="linkNews" href="/eventos/{{$event->id}}">{{$event->dataEvent->format('d/m/Y - h:m')}} </a></td>
                        <td><a class="linkNews" href="/eventos/{{$event->id}}">{{$event->title}}</a></td>
                        <td><a class="linkNews" href="/eventos/{{$event->id}}">{{$event->user->name}}</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
                {{$events->links()}}
            @else
                <span class="alert-info"><p>Sem eventos no momento</p></span>
            @endif
        </div>
        @else
            <br/><p>Não existem eventos a serem exibidos!</p>
        @endif
    </div>
@endsection