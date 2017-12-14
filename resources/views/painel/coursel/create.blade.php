@extends('painel.painelIndex')

@section('content-painel')

    <div class="container-fluid content-index">
        @if(isset($message) or isset($message_s))
            @if(isset($message))
                <span class="alert-warning">
                <p>{{$message}}</p>
            </span>
            @else
                <span class="alert-info">
                <p>{{$message_s}}</p>
            </span>

            @endif
        @endif
        <h5>Vamos adicionar uma nova imagem no coursel?</h5><br/>
        <form class="form-group" method="post" enctype="multipart/form-data" action="{{route('coursel.store')}}">
            {!! csrf_field() !!}
            <input class="form-control" placeholder="Mensagem a ser exibida na imagem" type="text" name="message" maxlength="100" />
            <input class="form-control-sm" type="file" name="photo" /><br/><br/>
            <button type="submit" class="btn btn-primary">Enviar Foto</button>
        </form>
    </div>
@endsection