@extends('template.app')

@section('content')
    <div id="carouselIndex" class="container-fluid">
        @if(isset($photosCoursel) and $photosCoursel->count() > 0)
        <div id="slide" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                @for($i = 0; $i < $photosCoursel->count(); $i++)
                    <li data-target="#slide" data-slide-to="{{$i}}" class="{{$i==0?'active':''}}"></li>
                @endfor
            </ol>
            <div class="carousel-inner">
                <?php $cont = 0; ?>
                @foreach($photosCoursel as $photo)
                <div class="carousel-item {{$cont==0?'active':''}}">
                    <img style="margin: 0 auto;"  class="d-block img-fluid"  src="{{$photo->path}}" alt="{{$photo['message']}}">
                    <div class="carousel-caption d-none d-md-block">
                        <p class="alert-light" style="background-color:black; opacity: 0.5; font-size:20px;"><span style="color: white;">{{$photo->message}}</span></p>
                    </div>
                </div>
                    <?php $cont++; ?>
                @endforeach
            </div>

            <a class="carousel-control-prev" href="#slide" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next " href="#slide" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>

        </div>
        @endif
    </div>

    <div class="container content-index">
        <div id="news">
            <h1>Noticias Recentes</h1>
            <table class="table table-hover table-sm" >
                <thead>
                <tr >
                    <th>DATA</th>
                    <th>NOTÍCIA</th>
                    <th>AUTOR</th>
                </tr>
                </thead>
                @foreach($noticias as $news)
                        <tr>
                            <td><a class="linkNews" href="/noticias/{{$news->id}}">{{$news->updated_at->format('d/m - h:i')}} </a></td>
                            <td><a class="linkNews" href="/noticias/{{$news->id}}">{{$news->title}}</a></td>
                            <td><a class="linkNews" href="/noticias/{{$news->id}}">{{$news->user->name}}</a></td>
                        </tr>
                @endforeach
                <tbody>
                </tbody>
            </table>
        </div>
        <div id="Eventos">
            @foreach($events as $event)
                <tr class="linkNews">
                    <td><a class="linkNews" href="/event/{{$news->id}}">{{$news->updated_at->format('d/m - h:i')}} </a></td>
                    <td><a class="linkNews" href="/eventos/{{$news->id}}">{{$news->title}}</a></td>
                    <td><a class="linkNews" href="/noticias/{{$news->id}}">{{$news->user->name}}</a></td>
                </tr>
            @endforeach
        </div>

        <div id="recent-photos">
            <h1>Fotos Recentes</h1>
            <figure class="figure">
                <img src="..." class="figure-img img-fluid rounded" alt="A generic square placeholder image with rounded corners in a figure.">
                <figcaption class="figure-caption text-right">A caption for the above image.</figcaption>
            </figure>
        </div>

    </div>


@endsection