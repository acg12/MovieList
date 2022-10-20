<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/template.css') }}">
    @yield('css')
    <title>@yield('title')</title>
</head>
<body>
    <nav>
        <img id="logo-navbar" src="{{ asset('assets/logo.png') }}" alt="">
        <div class="menu">
            <a href="#">Home</a>
            <a href="#">Movies</a>
            <a href="#">Actors</a>
            <a href="#">Register</a>
            <a href="#">Login</a>
        </div>
    </nav>
    @yield('content')
    <footer>
        <img id="logo-footer" src="{{ asset('assets/logo.png') }}" alt="">
        <p>MovieList is a website that contains list of movies</p>
        <div id="soc-med">
            <img class="logo-soc-med" src="{{ asset('assets/logo-ig.webp') }}" alt="">
            <img class="logo-soc-med" src="{{ asset('assets/logo-fb.webp') }}" alt="">
            <img class="logo-soc-med" src="{{ asset('assets/logo-reddit.png') }}" alt="">
            <img class="logo-soc-med" src="{{ asset('assets/logo-yt.png') }}" alt="">
            <img class="logo-soc-med" src="{{ asset('assets/logo-twitter.webp') }}" alt="">
        </div>
        <div>
            Privacy Policy | Terms of Service | Contact Us | About Us
        </div>
        <div>
            Copyright &copy 2022
            <img src="{{ asset('assets/logo.png') }}" alt="" id="logo-footer-small">
            All Rights Reserved
        </div>
    </footer>
</body>
</html>
