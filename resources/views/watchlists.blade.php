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
        <tr>
            <th>Poster</th>
            <th>Title</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        @forelse ($movies as $m)
            <tr>
                <td><img src="{{Storage::url('public/'.$m->img_url)}}" class="img-row" alt="..."></td>
                <td>{{$m->title}}</td>
                <td>
                    <?php $temp = $m->watchStatus(Auth::user()->id) ?>
                    @if ($temp == 'Planning')
                        <p class="green">{{$temp}}</p>
                    @elseif ($temp == 'Watching')
                        <p class="yellow">{{$temp}}</p>
                    @else
                        <p class="red">{{$temp}}</p>
                    @endif
                </td>
                <td>
                    <button class="edit_status">
                    <a class="profile" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                        <i class="fa fa-pencil"></i>
                    </a>
                    </button>
                </td>
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

<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        @if ($errors->any())
        <h4>{{$errors->first()}}</h4>
        @endif
        <form action="/watchlists/changeStatus" method="post">
            @csrf
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Change Status</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <select name="status" class="form-select" aria-label="Default select example">
                    <option value="Planning">Planning</option>
                    <option value="Watching">Watching</option>
                    <option value="Finished">Finished</option>
                    <option value="Remove">Remove</option>
                </select>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button class="btn btn-primary c_btn" type="submit" name="btn-submit" value="submit"> Save Changes </button>
            </div>
        </form>
      </div>
    </div>
</div>
@endsection
