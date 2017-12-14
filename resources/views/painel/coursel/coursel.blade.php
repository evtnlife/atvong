@extends('painel.painelIndex')

@section('content-painel')
    <div class="container-fluid content-index">
        @if(isset($coursels) and $coursels->count() > 0)
            <h3>Fotos armazenadas</h3>
            </br>
            <div id="figures">
                <div id="fig">
                    @foreach($coursels as $coursel)
                            <figure class="figImage">
                                <img class="img-responsive"
                                     src="{{ elixir($coursel['thumbPath']) }}" />
                                <figcaption >
                                    <p>{{$coursel['message']}}</p>
                                </figcaption>
                            </figure>
                    @endforeach
                </div>
            </div>
        @else
            <span class="alert-info"><p>Não existe imagens para ser exibidas :(</p></span>
            <a href="/coursel/create" class="btn btn-primary">Clique aqui para adicionar algumas!</a>
        @endif
    </div>
@endsection