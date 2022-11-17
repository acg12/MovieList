@extends('template')

@section('title', 'MovieList | View Actors')

@section('css')
<link rel="stylesheet" href="{{ asset('css/viewActors.css') }}">
@endsection

@section('content')
<div class="row g-3">
  <div class="col-sm-7">
    <div class="fs-3 text fw-bolder">Actors</div>
  </div>
  <div class="col">
    <div class="input-group mb-3">
      <form action="{{url('/view/search')}}">
        <input class="form-control me-2" type="search" placeholder="Search" name="search">
        <button class="btn btn-outline-success" type="submit"><span class="fas fa-search"></span></button>
      </form>
    </div>
  </div>
  @if (Auth::check() && Auth::user()->role == 'admin')
    <div class="col-auto">
      <button type="button" class="btn btn-danger"><a href="/actors/add">Add Actor</a></button>
    </div>
  @endif
</div>
<div class="row row-cols-1 row-cols-md-5 g-3">
  @forelse ($actors as $a)
    <div class="col">
      <div class="card h-100">
        <img src="{{Storage::url('public/'.$a->img_url)}}" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">{{$a->name}}</h5>
          <p class="card-text">
            {{substr($a->movies[0]->title, 0, 35)}}
          </p>
        </div>
      </div>
    </div>
  @empty
      
  @endforelse
</div>
@endsection