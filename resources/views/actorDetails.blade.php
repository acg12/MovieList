@extends('template')

@section('title', 'MovieList | View Actors')

@section('css')
<link rel="stylesheet" href="{{ asset('css/actorDetails.css') }}">
@endsection

@section('content')
<div class="row g-3">
  <div class="col-sm-5 c_col">
      @if (Auth::check() && Auth::user()->role == 'admin')
        <img src="{{Storage::url('public/'.$actor->img_url)}}" class="img-fluid img-thumbnail img_dark" alt="...">
        <div class="overlay">
          <div class="d-flex justify-content-end">
            <button type="button" class="btn btn-danger btn_img"><i class="far fa-edit"><a href="/actors/edit/{{$actor->id}}"></a></i></button>
            <button type="button" class="btn btn-danger btn_img"><i class="far fa-trash-alt"><a href="/actors/remove/{{$actor->id}}"></a></i></button>
          </div>
        </div>
        @else
        <img src="{{Storage::url('public/'.$actor->img_url)}}" class="img-fluid img-thumbnail" alt="...">
      @endif
      <div class="box">
        <div class="fs-3 fw-bolder">Personal Info</div>
        <div class="box">
          <p class="fw-bold">Popularity</p>
          <p class="fw-light">{{$actor->popularity}}</p>
        </div>
        <div class="box">
          <p class="fw-bold">Gender</p>
          <p class="fw-light">{{$actor->gender}}</p>
        </div>
        <div class="box">
          <p class="fw-bold">Birthday</p>
          <p class="fw-light">{{$actor->date_of_birth}}</p>
        </div>
        <div class="box">
          <p class="fw-bold">Place of Birth</p>
          <p class="fw-light">{{$actor->place_of_birth}}</p>
        </div>
      </div>
  </div>
  <div class="col">
    <div class="fs-3 fw-bolder">{{$actor->name}}</div>
      <div class="box">
        <p class="fs-5 fw-bold">Biography</p>
        <p class="fw-light text-justify">{{$actor->biography}}</p>
      </div>
      <div class="box">
        <p class="fs-5 fw-bold">Known For</p>
        <div class="row row-cols-1 row-cols-md-3">
          @forelse ($actor->movies as $a)
            <div class="col">
              <div class="card h-100">
                <img src="{{Storage::url('public/'.$a->img_url)}}" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">{{$a->title}}</h5>
                </div>
              </div>
            </div>
          @empty
          @endforelse
        </div>
        
    <!-- <div class="d-flex flex-wrap row flex-md-row justify-content-md-start">
        @foreach ($actor->movies as $p)
        <div class="card mx-3" style="width: 12rem;">
            <img src="{{ Storage::url($p->img_url) }}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title fs-6">{{ $p->title }}</h5>
            </div>
        </div>
        @endforeach
    </div> -->
</div>
      </div>
    </div>
  </div>
</div>
@endsection