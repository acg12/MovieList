@extends('template')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('title', 'MovieList | Home')

@section('content')
<div id="carousel-outer" class="carousel slide" data-bs-ride="carousel">
    <div class="gradient-block"></div>
    <div class="carousel-inner">
        @if ($carousels != null)
        <div class="carousel-item active">
            <img src="{{ Storage::url($carousels[0]->img_url) }}" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <p class="small text-start">{{ $carousels[0]->genres[0]->genre }} | {{ $carousels[0]->getReleaseYear() }}</p>
                <h1 class="h2 text-start">{{ $carousels[0]->title }}</h1>
                <p class="small text-start">
                    {{ $carousels[0]->description }}
                </p>
            </div>
        </div>
        @endif
        @if (count($carousels) > 1)
        @for ($i = 1; $i < count($carousels); $i++) <div class="carousel-item">
            <img src="{{ Storage::url($carousels[$i]->img_url) }}" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <p class="small text-start">{{ $carousels[$i]->genres[0]->genre }} | {{ $carousels[$i]->getReleaseYear() }}</p>
                <h1 class="h2 text-start">{{ $carousels[$i]->title }}</h1>
                <p class="small text-start">
                    {{ $carousels[$i]->description }}
                </p>
            </div>
        @endfor
        @endif
    </div>
</div>
</div>
<div class="container-fluid px-5 py-4">
    <h1 class="h5 text-start">Popular</h1>
</div>
<div class="container">
    <div class="d-flex flex-wrap row flex-md-row justify-content-md-start">
        @foreach ($popular as $p)
        <div class="card mx-3" style="width: 12rem;">
            <img src="{{ Storage::url($p->img_url) }}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title fs-6">{{ $p->title }}</h5>
                <p class="card-text fs-6">{{ $p->getReleaseYear() }}</p>
            </div>
        </div>
        @endforeach
    </div>
</div>
<div id="shows" class="container-fluid navbar px-5 py-4">
    <div>
        <h1 class="h5 text-start">Show</span>
    </div>
    <form class="d-flex" role="search">
        <input class="me-2" name="search" type="search" placeholder="Search" aria-label="Search" value="{{ isset($query) ? $query : null }}">
        <button class="btn btn-outline-success" type="submit">Search</button>
    </form>
</div>
@if(isset($query))
<div class="container-fluid px-5 pb-4 text-end">
    <a href="/#shows">Clear search results</a>
</div>
@endif
<div class="d-flex flex-row flex-wrap px-5">
    <form>
        @foreach($genres as $g)
        @if (isset($genre))
        <!-- if genre is active (lagi milih genre) -->
        @if ($genre == $g->genre)
        <button name="genre" value="{{ $g->genre }}" type="submit" class="btn btn-primary active genre px-4 py-1">{{ $g->genre }}</button>
        @else
        <button name="genre" value="{{ $g->genre }}" type="submit" class="btn btn-primary genre px-4 py-1">{{ $g->genre }}</button>
        @endif
        @else
        <button name="genre" value="{{ $g->genre }}" type="submit" class="btn btn-primary genre px-4 py-1">{{ $g->genre }}</button>
        @endif
        @endforeach
    </form>
    @if(isset($genre))
    <a class="py-2 px-5" href="/#shows">Clear filter</a>
    @endif
</div>
<div class="d-flex flex-row flex-wrap px-5">
    <p>Sort by:</p>
    <form>
        @if (isset($sort))
        @if ($sort == "latest")
        <button name="sort" value="latest" type="submit" class="btn btn-primary active sort px-4 py-1">Latest</button>
        <button name="sort" value="ascending" type="submit" class="btn btn-primary sort px-4 py-1">A-Z</button>
        <button name="sort" value="descending" type="submit" class="btn btn-primary sort px-4 py-1">Z-A</button>
        @elseif ($sort == "ascending")
        <button name="sort" value="latest" type="submit" class="btn btn-primary sort px-4 py-1">Latest</button>
        <button name="sort" value="ascending" type="submit" class="btn btn-primary active sort px-4 py-1">A-Z</button>
        <button name="sort" value="descending" type="submit" class="btn btn-primary sort px-4 py-1">Z-A</button>
        @elseif ($sort == "descending")
        <button name="sort" value="latest" type="submit" class="btn btn-primary sort px-4 py-1">Latest</button>
        <button name="sort" value="ascending" type="submit" class="btn btn-primary sort px-4 py-1">A-Z</button>
        <button name="sort" value="descending" type="submit" class="btn btn-primary active sort px-4 py-1">Z-A</button>
        @endif
        @else
        <button name="sort" value="latest" type="submit" class="btn btn-primary sort px-4 py-1">Latest</button>
        <button name="sort" value="ascending" type="submit" class="btn btn-primary sort px-4 py-1">A-Z</button>
        <button name="sort" value="descending" type="submit" class="btn btn-primary sort px-4 py-1">Z-A</button>
        @endif
    </form>
    @if(isset($sort))
    <a class="py-2 px-5" href="/#shows">Clear sort by</a>
    @endif
</div>
<div class="container">
    <div class="d-flex flex-wrap row flex-md-row justify-content-md-start">
        @foreach ($movies as $m)
        <div class="card mx-3" style="width: 12rem;">
            <img src="{{ Storage::url($m->img_url) }}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title fs-6">{{ $m->title }}</h5>
                <p class="card-text fs-6">{{ $m->getReleaseYear() }}</p>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
