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
    </div>
    @endfor
    @endif
</div>
</div>
<div class="container-fluid px-5 py-4">
    <h1 class="h5 text-start">Popular</h1>
</div>
<div class="container">
    <div class="d-flex flex-wrap row flex-md-row justify-content-md-between">
        @forelse ($popular as $p)
        <div class="card" style="width: 12rem;">
            <img src="{{ Storage::url($p->img_url) }}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title fs-6">{{ $p->title }}</h5>
                <p class="card-text fs-6">{{ $p->getReleaseYear() }}}</p>
            </div>
        </div>
        @empty
        @endforelse
    </div>
</div>

@endsection