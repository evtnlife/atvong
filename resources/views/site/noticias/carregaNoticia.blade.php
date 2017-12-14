@extends('template.app')

@section('content')
    <div class="container content-index">
        @if(isset($news) and $news->count() > 0)
            @foreach($news as $news1)
                <br/>
                <h1>{{$news1['title']}}</h1>
                <br/>
                <div class="container col-12" >
                    <h6 class="col-6" style="float: left">Autor: {{$news1->user->name}}</h6>
                    <h6 class="col-6" style="float: left" >Data Publicação: {{$news1->updated_at->format('d/m/Y - h:i')}}</h6>
                </div>
                <br/>
                <p>{!! $news1['notice'] !!}<p>
            @endforeach
        @else
             <span class="alert-warning"><p>Falha noticia não encontrada!</p></span>
        @endif
    </div>
@endsection