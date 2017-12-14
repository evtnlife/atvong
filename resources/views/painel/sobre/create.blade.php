@extends('painel.painelIndex')

@section('content-painel')
    <div class="container content-index">
        @if(isset(Auth::user()->nivel) and Auth::user()->nivel == 1)
            <div class="container">
            @if(session('aboutBad'))
                <span class="alert-warning"><p>{!! session('aboutBad')!!}</p></span>
            @endif

            @if(session('aboutGood'))
                <span class="alert-success"><p>{!! session('aboutGood') !!}</p></span>
            @endif
            </div>
            <h1>Adicionar sobre nós</h1>
            <br/>

            @if($errors)
                @foreach($errors->all() as $error)
                    <span class="alert-warning"><p>{{$error}}</p></span>
                @endforeach
            @endif
            <form method="post" action="{{route('sobre.store')}}" class="form-group">
                {!! csrf_field() !!}
                <textarea name="text" id="summernote">{{old('text')}}</textarea>
                <br/>
                <button type="submit" class="btn btn-primary">Criar sobre nós</button>
            </form>
            <br/>
        @else
            <span class="alert-warning">Você não tem permição para acessar está área</span>
        @endif
    </div>
@endsection