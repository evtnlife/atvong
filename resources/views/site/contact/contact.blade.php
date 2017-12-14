@extends('template.app')

@section('content')
    <div class="content-index container-fluid">
        <h2>Área de Contato</h2>
        <p>Atenção as mensagens serão lidas pela nossa equipe e respondidas assim que possivel!</p>
        <form class="form-group" method="post" action="">
            {!! csrf_field() !!}
            <div class="form-group">
                <input class="form-control" type="text" placeholder="Titulo da Mensagem" id="title" name="title" />
            </div>

            <div class="form-group">
                <input class="form-control" placeholder="Email" name="email" />
            </div>

            <div class="form-group">
                <textarea name="description" id="summernote"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Enviar Mensagem</button>
        </form>
        <div class="container">
            <h4>Outras formas de contato:</h4>
            <ul style="text-align: left">
                <li>Telefone: ......</li>
                <li>Instragram: ......</li>
                <li>Facebook: ......</li>
            </ul>
        </div>
    </div>
@endsection