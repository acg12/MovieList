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
    <form action="/actors">
        <div class="input-group">
            <input type="search" name="search" class="form-control" placeholder="Search Actors" aria-label="Recipient's username" aria-describedby="button-addon2">
            <button class="btn btn-outline-secondary" type="submit" id="button-addon2"><i class="fas fa-search"></i></button>
        </div>
    </form>
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
            @if ($a->movies->isEmpty())
                No movies yet.
            @else
                {{substr($a->movies[0]->title, 0, 35)}}
            @endif
          </p>
        </div>
      </div>
    </div>
  @empty
    No actors yet.
  @endforelse
</div>
@endsection
