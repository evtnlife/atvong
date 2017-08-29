@extends('template.app')

@section('content')
    <div id="carouselIndex" class="container-fluid">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="..." alt="First slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="..." alt="Second slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="..." alt="Third slide">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>

    <div class="container content-index">
        <div id="news">
            <h1>Noticias Recentes</h1>
            <table class="table table-hover table-sm ">
                <thead>
                <tr>
                    <th width="15%">Data</th>
                    <th width="60%">Noticia</th>
                    <th>Autor</th>
                </tr>
                </thead>
                @foreach($noticias as $news)

                        <tr>
                            <td><a class="" href="/noticias/show/{{$news->id}}">{{$news->updated_at}} </a></td>
                            <td><a class="" href="/noticias/show/{{$news->id}}">{{$news->title}}</a></td>
                            <td><a class="" href="/noticias/show/{{$news->id}}">{{$news->users}}</a></td>
                        </tr>

                @endforeach
                <tbody>
                </tbody>
            </table>
        </div>
        <div id="Eventos">
            <h1>Proximos Eventos</h1>
        </div>

        <div id="recent-photos">
            <h1>Fotos Recentes</h1>
        </div>
    </div>
@endsection