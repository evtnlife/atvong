@extends('painel.painelIndex')

@section('content-painel')
    <div class="content-index container-fluid">
        <h3>Área destinada a editar ou deletar eventos existentes!</h3>
        <br/>
        <table class="table table-striped">
            <thead>
            <tr >
                <th>ID</th>
                <th>Titulo</th>
                <th>Data Postagem</th>
                <th>Edit | Delete</th>
            </tr>
            </thead>
            <tbody>
            @foreach($events as $event)
                <tr>
                    <td>{{$event->id}}</td>
                    <td>{{$event->title}}</td>
                    <td>{{$event->updated_at->format('d/m h:m')}}</td>
                    <td>
                        <span class="oi oi-pencil iconsNoticia" title="Editar" onclick="window.location.href='/noticias/select/{{$event->id}}/edit'" aria-hidden="true"> </span>
                        |<span class="oi oi-trash iconsNoticia" onclick="window.location.href='/noticias/select/{{$event->id}}/delete'" title="Deletar" aria-hidden="true"></span>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{$events->links()}}
    </div>
@endsection