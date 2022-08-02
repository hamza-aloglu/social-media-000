<!DOCTYPE html>
<html>
<head>
    <!-- Meta and Title -->
    <meta charset="utf-8">
    <title> @yield('title') </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{asset('assets-admin')}}/img/favicon.png">
    <!-- Angular material -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets-admin')}}/skin/css/angular-material.min.css">
    <!-- CSS - theme -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets-admin')}}/skin/default_skin/less/theme.css">

    @yield('head')
</head>
<body class="@yield('body-class')">
<!-- Body Wrap  -->
<div id="main">
    @include('admin.header')
    @include('admin.sidebar')
    <!-- Main Wrapper -->
    <section id="content_wrapper">
        @yield('topbar')
        <section id="content" class="@yield('section-content-class')">
            @yield('content')
        </section>
        @include('admin.footer')
    </section>
    <!-- /Main Wrapper -->
</div>
<!-- /Body Wrap  -->
    <!-- Scripts -->
    <!-- jQuery -->
    <script src="{{asset('assets-admin')}}/js/jquery/jquery-1.12.3.min.js"></script>
    <script src="{{asset('assets-admin')}}/js/jquery/jquery_ui/jquery-ui.min.js"></script>
    <!-- Theme Scripts -->
    <script src="{{asset('assets-admin')}}/js/utility/utility.js"></script>
    <script src="{{asset('assets-admin')}}/js/demo/demo.js"></script>
    <script src="{{asset('assets-admin')}}/js/main.js"></script>
    <script src="{{asset('assets-admin')}}/js/demo/widgets_sidebar.js"></script>
    <script src="{{asset('assets-admin')}}/js/pages/dashboard1.js"></script>
    <script src="{{asset('assets-admin')}}/js/demo/widgets.js"></script>
    @yield('foot')
</body>
</html>
