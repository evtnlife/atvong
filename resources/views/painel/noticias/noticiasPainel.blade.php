@extends('painel.painelIndex')

@section('content-painel')
    <div class="content-index container-fluid" >
        @if(isset(Auth::user()->nivel) and Auth::user()->nivel >0)

        @if(Session('message'))
            <p>{{Session('message')}}</p>
        @endif
        <h3>Área destinada a editar ou deletar noticias existentes!</h3>
        <br/>
        <table class="table table-striped">
            <thead>
                <tr >
                    <th>ID</th>
                    <th>TITULO</th>
                    <th>DATA POST</th>
                    <th>EDIT|DELETE</th>
                </tr>
            </thead>
            <tbody>
                @foreach($news as $n)
                    <tr>
                        <td>{{$n->id}}</td>
                        <td>{{$n->title}}</td>
                        <td>{{$n->updated_at->format('d/m h:m')}}</td>
                        <td>
                            <img width="16px" height="16px" src="{{elixir('/assets/plugins/glyph/svg/si-glyph-pencil.svg')}}"
                            onclick="window.location.href='/noticias/select/{{$n->id}}/edit'" title="Editar" />
                            <img width="16px" height="16px" src="{{elixir('/assets/plugins/glyph/svg/si-glyph-trash.svg')}}"
                                 onclick="window.location.href='/noticias/select/{{$n->id}}/delete'" title="Deletar" />

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{$news->links()}}
        @else
            <p>Você não tem autorização para acessar está pagina!</p>
        @endif
    </div>
@endsection