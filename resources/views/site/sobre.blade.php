@extends('template.app')

@section('content')
    <div class="container content-index">
        @if(isset($sobre) and $sobre->count() > 0)
            <br/>
            @foreach($sobre as $about)
                {!! $about->text !!}
            @endforeach
        @else
            <p>Atenção administrador adicione uma informação para está área!</p>
        @endif
    </div>
@endsection