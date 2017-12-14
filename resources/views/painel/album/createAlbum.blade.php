@extends('painel.painelIndex')

@section('content-painel')
    <div style="max-width: 500px" class="container-fluid content-index">
        @if(isset(Auth::user()->nivel) and Auth::user()->nivel > 0)
            <h3>Vamos criar um album?</h3>
        @if(isset($errors))
            @foreach($errors->all() as $error)
                <p>{{$error}}</p>
            @endforeach
        @endif

        @if(Session('message'))
            <p>{{Session('message')}}</p>
        @endif
        <form method="post" action="{{route('album.store')}}" enctype="multipart/form-data" class="form-group">
            {!! csrf_field() !!}
            <div class="form-group">

                <label for="title" class="label">Titulo do Album</label>
                <input id="title" class="form-control" type="text" name="title" value="{{old('title')}}" placeholder="Meu titulo é titulo =D" />
            </div>
            <div class="form-group">
                <label for="description" class="label">Descrição do album</label>
                <input id="description" class="form-control" type="text"
                       name="description" value="{{old('description')}}"
                       maxlength="200" placeholder="Está é uma descrição respeitavel!" />
            </div>
            <div class="form-group">
                <input type="file" class="form-control-file" value="{{old('photo')}}"name="photo[]" multiple>
            </div>
                <input type="hidden" name="user_id" value="{{Auth::user()->id}}" />

            <button type="submit" class="btn btn-primary">Criar Album</button>
        </form>
        @else
            <br/>
            <p>Você não tem permissão para acessar está área!</p>
        @endif

    </div>
@endsection