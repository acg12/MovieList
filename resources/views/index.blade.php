@extends('template')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('title', 'MovieList | Home')

@section('content')

@auth
    {{Auth::user()->name}}
    {{Auth::user()->role}}
@endif

@endsection
