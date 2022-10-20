@extends('template')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('title', 'MovieList | Home')

@section('content')
<div id="carousel"></div>
<div class="container">
    <div class="container-title">
        <strong>Popular</strong>
    </div>
    <div id="popular">
        <div class="popular-card">
            <div class="card-img"></div>
            <div class="title">Dummy title</div>
            <div class="year">2000</div>
        </div>
        <div class="popular-card">
            <div class="card-img"></div>
            <div class="title">Dummy title</div>
            <div class="year">2000</div>
        </div>
    </div>
</div>
@endsection