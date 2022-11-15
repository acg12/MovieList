@extends('template')

@section('title', 'MovieList | Create Movie Page')

@section('css')
<link rel="stylesheet" href="{{ asset('css/addmovie.css') }}">
@endsection

@section('content')
<div class="fs-3 text fw-bolder">Add Movie</div>
<form action="/add/movie" method="post" enctype="multipart/form-data" class="row g-3">
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
        <label for="genre" class="form-label">Genre</label>
        <input type="text" name="genre" class="form-control">
    </div>
    <div class="col-12">
        <label for="#">Actors</label>
    </div>
    <div class="col-12 row g-3" id="actor-fields">
        <div class="col-md-6">
            <label for="actors[]" class="form-label">Actor</label>
            <select name="actors[]" class="form-select">
                <option selected>-- Open this select menu --</option>
                <option>...</option>
            </select>
        </div>
        <div class="col-md-6">
            <label for="characters[]" class="form-label">Character Name</label>
            <input type="text" class="form-control" name="characters[]">
        </div>
        <div class="col-md-6">
            <label for="actors[]" class="form-label">Actor</label>
            <select name="actors[]" class="form-select">
                <option selected>-- Open this select menu --</option>
                <option>...</option>
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
        <input class="form-control" type="file" id="imgUrl">
    </div>
    <div class="mb-3">
        <label for="backgroundUrl" class="form-label">Background Url</label>
        <input class="form-control" type="file" id="backgroundUrl">
    </div>
    <div class="d-grid gap-2">
        <button class="btn btn-danger" type="button">Create</button>
    </div>
</form>
@endsection

@section('scripts')
<script type="text/javascript">
    document.getElementById('btn-add-actor').addEventListener('click', function() {
        document.getElementById('actor-fields').innerHTML += '<div class="col-md-6"><label for="actors[]" class="form-label">Actor</label><select name="actors[]" class="form-select"> \
                <option selected>-- Open this select menu --</option>option>...</option></select></div> \
                <div class="col-md-6"><label for="characters[]" class="form-label">Character Name</label> \
                <input type="text" class="form-control" name="characters[]"></div>'
    })
</script>
@endsection