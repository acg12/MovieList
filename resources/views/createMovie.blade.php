@extends('template')

@section('title', 'MovieList | Create Movie Page')

@section('css')
<link rel="stylesheet" href="{{ asset('css/addmovie.css') }}">
@endsection

@section('content')
@if ($errors->any())
<h4>{{$errors->first()}}</h4>
@endif
<div class="fs-3 text fw-bolder">Add Movie</div>
<form action="/movies/add" method="post" enctype="multipart/form-data" class="row g-3">
    @csrf
    <div class="col-12">
        <label for="title" class="form-label">Title</label>
        <input type="text" name="title" class="form-control">
    </div>
    <div class="col-12">
        <label for="description" class="form-label">Description</label>
        <textarea class="form-control" name="description" rows="3"></textarea>
    </div>
    <div class="col-12">
        <label for="genre[]" class="form-label">Genre</label>
        <select name="genre[]" class="form-select" multiple>
            @foreach($genres as $g)
                <option value="{{ $g->genre }}">{{ $g->genre }}</option>
            @endforeach
        </select>
        <!-- @foreach($genres as $g)
        <div class=" form-check">
                <input class="form-check-input" type="checkbox" name="genre" value="{{ $g->genre }}" id="flexCheckChecked">
                <label class="form-check-label" for="flexCheckChecked">
                    {{ $g->genre }}
                </label>
    </div>
    @endforeach -->
    <!-- https://stackoverflow.com/questions/41966620/laravel-get-values-of-checkboxes
        $genre = $req->input('genre'); -->
    </div>
    <div class="col-12">
        <label for="#">Actors</label>
    </div>
    <div class="col-12 row g-3" id="actor-fields">
        <div class="col-md-6">
            <label for="actors[]" class="form-label">Actor</label>
            <select name="actors[]" class="form-select">
                @foreach($actors as $a)
                    <option value="{{ $a->name }}">{{ $a->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-6">
            <label for="characters[]" class="form-label">Character Name</label>
            <input type="text" class="form-control" name="characters[]">
        </div>
    </div>
    <div class="col-md-4">
        <button type="button" id="btn-add-actor" class="btn btn-primary">Add more</button>
    </div>
    <div class="col-12">
        <label for="director" class="form-label">Director</label>
        <input type="text" name="director" class="form-control">
    </div>
    <div class="col-12">
        <label for="releaseDate" class="form-label">Release Date</label>
        <input type="date" name="releaseDate" class="form-control">
    </div>
    <div class="mb-3">
        <label for="imgUrl" class="form-label">Image Url</label>
        <input class="form-control" type="file" name="imgUrl">
    </div>
    <div class="mb-3">
        <label for="backgroundUrl" class="form-label">Background Url</label>
        <input class="form-control" type="file" name="backgroundUrl">
    </div>
    <div class="d-grid gap-2">
        <button class="btn btn-danger" type="submit">Create</button>
    </div>
</form>
@endsection

@section('scripts')
<script src="{{ asset('js/createMovie.js') }}"></script>
@endsection