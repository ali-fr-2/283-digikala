<!DOCTYPE html>
<html lang="en">

@include('home.layout.head')

<body>
@include('home.layout.header')

@include('home.layout.menu')

@yield('content')

@include('home.layout.startfooter')

@include('home.layout.footer-tag')

@include('home.layout.js')
</body>
</html>
