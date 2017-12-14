@extends('template.app')

@section('content')
    <div class="container content-index">
        @if(isset($events) and $events->count() > 0)
            @foreach($events as $event)
                <h3>{!! $event->title !!}</h3>
                <div class="container col-12" >
                    <h6 class="col-6" style="float: left">Autor: {{$event->user->name}}</h6>
                    <h6 class="col-6" style="float: left" >Data Publicação: {{$event->updated_at->format('d/m/Y - h:i')}}</h6>
                </div>
                <h6>{!! $event->description !!}</h6>
            @endforeach
        @else
            <br/><p>Não existem eventos a serem mostrados!</p>
        @endif
    </div>
@endsection