@extends('template')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/form.css') }}">
@endsection

@section('title', 'MovieList | Login')

@section('content')
    <h1>Hello, Welcome back to<img id="logo-h1" src="{{ asset('assets/logo.png') }}" alt=""></h1>
    <form action="">
        <div class="input-group mb-3">
            <label for="email" class="input-group-text c_form-label" >Email</label>
            <input type="text" class="form-control c_form-input" placeholder="Enter your email" id="email"  name="email" aria-label="Username" aria-describedby="basic-addon1">
        </div>
        <div class="input-group mb-3">
            <label for="password" class="input-group-text c_form-label" >Password</label>
            <input type="password" class="form-control c_form-input" placeholder="Enter your password" id="password"  name="password" aria-label="Username" aria-describedby="basic-addon1">
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
            <label class="form-check-label" for="flexCheckDefault"> Remember me </label>
        </div>
        <div class="d-grid gap-2">
            <button class="btn btn-primary c_btn" type="button">Login <i class="fa fa-arrow-right"></i></button>
        </div>
        <h6>Don't have an account? <a href="/registerPage"><span class="red-text">Register now!</span></a></h6>
    </form>
@endsection
