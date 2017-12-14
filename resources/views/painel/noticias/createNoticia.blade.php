@extends('painel.painelIndex')

@section('content-painel')
    <div class="container content-index">
        @if(isset(Auth::user()->nivel) and Auth::user()->nivel == 1)
            <h1>Adicionar Noticia</h1>
            <br/>
            @if(session('news-status'))
                <span class="alert-success"><p>{{session('news-status')}}</p></span>
            @endif
            @if($errors)
                @foreach($errors->all() as $error)
                    <span class="alert-warning"><p>{{$error}}</p></span>
                @endforeach
            @endif
            <form method="post" action="{{route('noticias.store')}}" class="form-group">
                {!! csrf_field() !!}
                <input name="user_id" id="user_id" type="hidden" value="{{Auth::user()->id}}">
                <input type="text" name="title" class="form-control" placeholder="Titulo da Noticia"
                       value="{{old('title')}}"/>
                <br/>

                <textarea name="notice" id="summernote">{{old('notice')}}</textarea>
                <br/>
                <button type="submit" class="btn btn-primary">Criar Noticia</button>
            </form>
            <br/>
        @else
            <span class="alert-warning">Você não tem permição para acessar está área</span>
        @endif
    </div>
@endsection