@extends('painel.painelIndex')

@section('content-painel')
    <div class="container content-index">
        @if(isset(Auth::user()->nivel) and Auth::user()->nivel == 1)
            <h3>Crie agora mesmo um Evento!</h3>
            @if(session('goodEvent') or session('badEvent'))
                <span class="alert-info"><p>{{ session('goodEvent')?session('goodEvent'):session('badEvent') }}</p></span>
            @endif
            <form method="post" action="{{route('eventos.store')}}" class="form-group">
                @if($errors)
                    @foreach($errors->all() as $error)
                        <span class="alert-warning"><p>{{$error}}</p></span>
                    @endforeach
                @endif
                {!! csrf_field() !!}
                <input type="text" name="title" placeholder="Titulo do Evento" class="form-control" value="{{old('title')}}"/>
                <input name="dataEvent" placeholder="Data do Evento" class="form-control" type="datetime-local" value="" id="example-datetime-local-input">
                <textarea name="description" id="summernote">{{old('description')}}</textarea>
                <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                <input type="hidden" name="active" value="1" />
                </br>
                <button type="submit" class="btn btn-primary">Criar Evento</button>
            </form>
        @else
            <span class="alert-warning"><p>Você não tem permição para acessar está área!</p></span>
        @endif
    </div>
@endsection