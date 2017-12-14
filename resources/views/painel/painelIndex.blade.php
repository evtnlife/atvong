@extends('template.app')

@section('content')
    <div class="container content-index">
        @if(isset(Auth::user()->nivel) and Auth::user()->nivel>0)
            <br/>
        <h4>Olá {{Auth::user()->name}}, Seja bem vindo ao painel!</h4>
        <nav class="navbar navbar-expand-lg navbar-light " >

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarTogglerDemo02" >
                <ul style="margin: 0 auto;" class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <li class="nav-item active">
                        <button style="width: 100%" type="button" onclick="window.location.href='/sobre/create'" class="btn btn-secondary">
                            Sobre Nós
                        </button>
                    </li>
                    <li class="nav-item">
                        <button style="width: 100%" type="button" class="btn btn-secondary">Contato</button>
                    </li>
                    <li class="nav-item">
                        <div style="width: 100%" class="btn-group" role="group">
                            <button style="width: 100%" id="btnGroupDrop1" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Eventos
                            </button>
                            <div class="dropdown-menu" style="background-color: #092E20;" aria-labelledby="btnGroupDrop1">
                                <a class="dropdown-item" href="/eventos/create">Adicionar nova</a>
                                <a class="dropdown-item" href="/eventos/select/view">Editar / Deletar</a>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item">
                        <div style="width: 100%; " class="btn-group" role="group">
                            <button style="width: 100%" id="btnGroupDrop1" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Noticias
                            </button>
                            <div class="dropdown-menu" style="background-color: #092E20;" aria-labelledby="btnGroupDrop1">
                                <a class="dropdown-item" href="/noticias/create">Adicionar novo</a>
                                <a class="dropdown-item" href="/noticias/select/view">Editar / Deletar</a>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item">
                        <div style="width: 100%; background-color: #092E20;" class="btn-group" role="group" >
                            <button style="width: 100%" id="btnGroupDrop1" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Album
                            </button>
                            <div class="dropdown-menu" style="background-color: #092E20;" aria-labelledby="btnGroupDrop1">
                                <a class="dropdown-item" href="/album/create">Criar Album</a>
                                <a class="dropdown-item" href="#">Adicionar fotos</a>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item">
                        <div style="width: 100%; background-color: #092E20;" class="btn-group" role="group" >
                            <button style="width: 100%" id="btnGroupDrop1" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Coursel
                            </button>
                            <div class="dropdown-menu" style="background-color: #092E20;" aria-labelledby="btnGroupDrop1">
                                <a class="dropdown-item" href="/coursel/create">Adicionar foto</a>
                                <a class="dropdown-item" href="#">Deletar Foto</a>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>

        <div class="container-fluid">
            <br/>
            @yield('content-painel')
        </div>
        @endif
    </div>

@endsection