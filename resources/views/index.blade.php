@extends('template')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('title', 'MovieList | Home')

@section('content')

@if(Auth::check() && Auth::user()->role == 'admin')
<button type="button" class="btn btn-danger"><a href="/movies/add">Add Movie</a></button>
@endif

@endsection