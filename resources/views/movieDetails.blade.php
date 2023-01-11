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
        <img class="card-img" src="{{ Storage::url($movie->img_url) }}" alt="">
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
    <div class="container-fluid px-5 py-3">
    <div class="d-flex flex-wrap row flex-md-row justify-content-md-start">
        @foreach ($more as $m)
        <div class="card mx-3" style="width: 12rem;">
            <img src="{{ Storage::url($m->img_url) }}" class="card-img-top" alt="...">
            <div class="card-body">
                <a href="/movies/view/{{ $m->id }}" class="movie-link">
                    <h5 class="card-title fs-6">{{ $m->title }}</h5>
                </a>
                <div class="d-flex flex-row flex-wrap justify-content-between">
                    <p class="card-text fs-6">{{ $m->getReleaseYear() }}</p>
                    @auth
                    @if(Auth::user()->role == "member" && !Auth::user()->inUserWatchlist($m->id))
                    <!-- <button name="addMovie" value="{{ $m->id }}" class="btn btn-primary" type="submit" aria-label="add"><i class="bi bi-plus-lg"></i></button> -->
                    <a style="color: white" href="watchlist/add/{{ $m->id }}"><i class="bi bi-plus-lg"></i></a>
                    @elseif(Auth::user()->role == "member" && Auth::user()->inUserWatchlist($m->id))
                    <!-- <button name="removeMovie" value="{{ $m->id }}" class="btn btn-danger" type="submit" aria-label="add"><i class="bi bi-check-lg"></i></button> -->
                    <a style="color: red;" href="watchlist/remove/{{ $m->id }}"><i class="bi bi-check-lg"></i></a>
                    @endif
                    @endauth
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
</div>
@endif
@endsection