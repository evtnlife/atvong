@extends('template.app')

@section('content')
    <div class="container-fluid content-index">
        @if(isset($photos) and $photos->count() > 0)
            <br/>
            <h3>{{$photos[0]->album->title}}</h3>
            <br/>
            <div id="photos" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    @for($i = 0; $i<$photos->count(); $i++)
                        <li data-target="#photos" data-slide-to="{{$i}}" class="{{$i==0?'active':''}}"></li>
                    @endfor
                </ol>
                <div class="carousel-inner" role="listbox">
                    <?php $cont = 0; $id = 0; $album_id = 0; ?>
                    @foreach($photos as $photo)
                        <div class="carousel-item {{$cont==0?'active':''}}">
                            <img style="margin: 0 auto;"  class="d-block img-fluid" src="{{$photo->imagePath}}" alt="First slide" />
                            <div class="carousel-caption d-none d-md-block">
                                <p class="alert-light" style="background-color:black; opacity: 0.5; font-size:20px;"><span style="color: white;">{{($photo->album->description)}}</span></p>
                            </div>

                        </div>
                        <?php
                            $id = $photo->id;
                            $album_id = $photo->album_id;
                            $cont++;
                        ?>
                    @endforeach
                </div>
                <a class="carousel-control-prev" href="#photos" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#photos" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>

            </div>
            @if(isset(Auth::user()->id) and Auth::user()->nivel > 0)
                <br/>
                <a class="btn btn-secondary" href="/album/{{$id}}/delete">Delete</a>
                <a class="btn btn-secondary" href="/album/{{$album_id}}/photo/add">Adicionar Foto (s)</a>
            @endif
        @else
            <br/>
            <p>Não existem photos</p>
        @endif
    </div>
@endsection