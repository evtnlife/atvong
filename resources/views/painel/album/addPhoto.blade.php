@extends('painel.painelIndex')

@section('content-painel')
    <div class="container-fluid content-index">
        @if(Session('message'))
                <p>{{Session('message')}}</p>
        @endif

        <form class="form-group" method="post" enctype="multipart/form-data" action="{{route('photoStore')}}">
            {!! csrf_field() !!}
            <input name="album_id" type="hidden" value="{{$id}}"/>
            <input class="form-control-sm" type="file" name="photo[]" multiple />
            <button type="submit" class="btn btn-primary">Enviar Fotos</button>
        </form>
    </div>
@endsection