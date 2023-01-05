@extends('template')

@section('title', 'MovieList | WatchList')

@section('css')
<link rel="stylesheet" href="{{ asset('css/watchlist.css') }}">
@endsection

@section('content')
<div class="row g-3">
  <div class="col">
    <form action="/watchlists">
        <div class="input-group">
            <input type="search" name="search" class="form-control" placeholder="Search Actors" aria-describedby="button-addon2">
            <button class="btn btn-outline-secondary" type="submit" id="button-addon2"><i class="fa fa-search"></i></button>
        </div>
    </form>
  </div>
</div>
<div class="row row-cols-1 row-cols-md-5 g-3">
    <table class="table table-dark table-borderless table-hover">
        <th>
            <td>Poster</td>
            <td>Title</td>
            <td>Status</td>
            <td>Action</td>
        </th>
        @forelse ($movies as $m)
            <tr>
                <td><img src="{{Storage::url('public/'.$m->img_url)}}" class="img-row" alt="..."></td>
                <td>{{$m->title}}</td>
                <td> Ehe </td>
                {{-- <td>{{$m->status}}</td> --}}
                <td>-</td>
            </tr>
        @empty
            No watchlist found.
        @endforelse
        </table>
</div>

<ul class="pagination d-flex justify-content-end">
    <li class="page-item">
        <a class="page-link" href="{{$movies->previousPageUrl()}}" aria-label="Previous">
          <span aria-hidden="true">&laquo;</span>
        </a>
    </li>
    <li class="page-item">
        <a class="page-link" href="{{$movies->nextPageUrl()}}" aria-label="Next">
          <span aria-hidden="true">&raquo;</span>
        </a>
    </li>
</ul>
@endsection
