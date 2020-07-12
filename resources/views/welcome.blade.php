@extends('layouts.app')
@section('content')
    <h1>Videos</h1>
    <div class="row justify-content-center">
        @foreach ($videos as $video)
        <div class="col-12 col-md-6">
            <div class="card border-0 bg-transparent">
                <div class="card-img-top position-relative">
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        {{-- <ol class="carousel-indicators">
                            @foreach ($video->medias as $k => $media)
                            <li data-target="#carouselExampleIndicators" data-slide-to="{{ $k }}" class="{{ $k === 0 ? 'active' : null }}"></li>
                            @endforeach
                        </ol> --}}
                        <div class="carousel-inner">
                            @foreach ($video->medias as $k => $media)
                                <div class="carousel-item {{ $k === 0 ? 'active' : null }}">
                                    <img class="card-img-top shadow-sm rounded-sm" src="{{ $media->getImage() }}" alt="{{ $video->name }}">
                                </div>
                             @endforeach
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

                <div class="card-body mx-4 mt-n5 bg-light shadow-lg rounded-sm position-relative">
                    <div class="card-title">
                        {{ $video->name }}
                    </div>
                    <div class="card-text">
                       Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium non sunt earum vitae consequuntur laborum neque pariatur? Architecto accusamus dolor deleniti, accusantium nisi ab ex itaque ad temporibus soluta unde?
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
@endsection
