@extends('template.app')

@section('content')
    <div class="container content-index">
        @foreach($news as $news1)
            <h1>{{$news1['title']}}</h1>
            <p>{!! $news1['noticia'] !!}<p>
        @endforeach
    </div>
@endsection