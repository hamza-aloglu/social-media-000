<html>
<head>
    <title>App Name - @yield('title')</title>
    @yield('head')
</head>
<body>
@include('home.header')

@section('sidebar')

@show

@section('slider')

@show

@yield('content')

@include('home.footer')
</body>
</html>
