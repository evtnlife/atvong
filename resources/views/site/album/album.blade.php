@extends('template.app')

@section('content')
    <div class="container-fluid content-index">
        @if(isset($albums) and $albums->count() > 0)
            <br/>
            <h3>Selecione um album para visualizar as fotos</h3>
            </br>
            <div id="figures">
                <div id="fig">
                    @foreach($albums as $album)
                        @foreach($album->photo as $photo)
                                <figure class="figImage">
                                    <img class="img-responsive"
                                         src="{{ elixir($photo['thumbPath']) }}" />
                                        <figcaption onclick="window.location.href ='/album/{{$album->id}}'" >
                                            <h5>{{$album->title}}</h5>
                                            <p>{{$album->description}}</p>
                                        </figcaption>
                                </figure>
                            @break;
                        @endforeach
                    @endforeach
                </div>
            </div>
        @else
            <br/>
            <p>Ainda não existem albuns disponiveis!</p>
        @endif
    </div>
@endsection