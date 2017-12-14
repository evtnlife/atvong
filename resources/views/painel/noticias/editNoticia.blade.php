@extends('painel.painelIndex')

@section('content-painel')
    <div class="container content-index">
        @if(isset(Auth::user()->nivel) and Auth::user()->nivel == 1)
            <h1>Editar Noticia</h1>
            <br/>
            @if(session('message'))
                <span class="alert-success"><p>{{session('message')}}</p></span>
            @endif
            @if($errors)
                @foreach($errors->all() as $error)
                    <span class="alert-warning"><p>{{$error}}</p></span>
                @endforeach
            @endif
            <form method="post" action="/noticias/select/{{$notice[0]->id}}/store" class="form-group">
                {!! csrf_field() !!}
                <input name="user_id" id="user_id" type="hidden" value="{{Auth::user()->id}}">
                <input type="text" name="title" class="form-control" placeholder="Titulo da Noticia"
                       value="{{$notice[0]->title}}"/>
                <br/>

                <textarea name="notice" id="summernote">{{$notice[0]->notice}}</textarea>
                <br/>
                <button type="submit" class="btn btn-primary">Editar Noticia</button>
            </form>
            <br/>
        @else
            <p>Você não tem permição para acessar está área</p>>
        @endif
    </div>
@endsection