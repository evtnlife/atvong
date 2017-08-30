<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>{{$title or 'Pagina Inicial'}}</title>

    <link rel="stylesheet" href="{{ elixir('assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ elixir('assets/css/app.css') }}">
    <link rel="stylesheet" href="{{ elixir('assets/plugins/summernote/summernote.css') }}">

</head>
<body>
<div id="container" class="container-fluid">
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #CACAA1;">
        <a class="navbar-brand" href="#">ACATV</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link classBtnHover" href="{{route('indexPrincipal')}}">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link classBtnHover" href="#">Sobre nós</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link classBtnHover" href="#">Eventos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link classBtnHover" href="#">Album de Fotos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link classBtnHover" href="#">Contato</a>
                </li>
            </ul>
            @if($errors->has('email'))
                <div class="container" style="max-width: 150px">
                    <p style="margin: 0 auto; text-align: center">Email ou senha invalido</p>
                </div>
            @endif
            <ul id="loginPanel" class="nav navbar-nav navbar-right">
                @if(Auth::guest())
                    <form class="form-inline my-2 my-lg-0" method="POST" action="{{route('login')}}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input name="email" class="form-control mr-sm-2" type="text" placeholder="Email">
                        <input name="password" class="form-control mr-sm-2" type="password" placeholder="Password">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Login</button>
                    </form>

                @else

                    <div class="btn-group">
                        <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </button>
                        <div class="dropdown-menu dropdown-menu-right" style="background-color: #CACAA1;">
                            @if(Auth::user()->nivel == 1)
                            <button class="dropdown-item" type="button">Painel</button>
                            <button class="dropdown-item" type="button">Mensagens</button>
                            @endif
                            <button class="dropdown-item" type="button">Perfil</button>

                            <button href="{{route('logout')}}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit()"
                                    class="dropdown-item" type="button">Logout</button>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </div>
                    </div>
                @endif
            </ul>
        </div>
    </nav>
    <section id="contents-section">
        <div id="content">
            @yield('content')
        </div>
    </section>
    <footer id="footer" class="footer container-fluid" style="background-color: #CACAA1;">
        Desenvolvido por Everton Silva
    </footer>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"
        integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="{{ elixir('assets/js/bootstrap.min.js' )}}"></script>
<script src="{{ elixir('assets/plugins/summernote/summernote.min.js' )}}"></script>
<script>
    $(document).ready(function() {
        $('#summernote').summernote({
            height: 300,
            maxHeight: 500
        });
    });
</script>
</body>
</html>