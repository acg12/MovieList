@extends('template')

@section('css')
<link rel="stylesheet" href="{{ asset('css/movieDetails.css') }}">
@endsection

@if($movie == null)
@section('title', 'Movie not found')
@else
@section('title', 'MovieList | '.$movie->title)
@endif

@section('content')
@if($movie == null)
<div class="container-fluid" style="height: 50vh;">
    <h4>Oops, looks like we don't have that movie yet!</h4>
</div>
@else
<div class="banner">
    <img src="{{ Storage::url($movie->img_url) }}" alt="" class="background-img">
    <div class="gradient-block"></div>
    <div class="details d-flex flex-row justify-content-around align-items-center flex-wrap">
        <div class="card" style="width: 18rem;">
            <img class="card-img" src="{{ Storage::url($movie->img_url) }}" alt="">
        </div>
        <div class="col-6 text-start">
            <p class="h1">{{ $movie->title }}</p>
            <div class="flex-row my-4">
                @foreach($movie->genres as $genre)
                <span class="genre">{{ $genre->genre }}</span>
                @endforeach
            </div>
            <p class="fs-6 m-0">Release Year</p>
            <p class="fw-bold fs-5">{{ $movie->getReleaseYear() }}</p>
            <p class="h5">Storyline</p>
            <p class="fs-6">{{ $movie->description }}</p>
            <p class="h5">{{ $movie->director }}</p>
            <p class="fs-6">Director</p>
        </div>
    </div>
</div>
<div class="container-fluid flex-col mx-5 my-3">
    <div class="text-start h4 section-title c">
        Cast
    </div>
    <div class="row row-cols-1 row-cols-md-5 g-3">
        @forelse ($movie->actors as $a)
        <div class="col">
            <a href="/actors/view/{{$a->id}}">
                <div class="card h-100">
                    <img class="actor-img" src="{{Storage::url('public/'.$a->img_url)}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{$a->name}}</h5>
                        <p class="card-text">
                            {{substr($a->movies[0]->title, 0, 35)}}
                        </p>
                    </div>
                </div>
            </a>
        </div>
        @empty
        No actors available.
        @endforelse
    </div>
    <div class="text-start h4 section-title py-2 my-3">
        More
    </div>
</div>
@endif
@endsection