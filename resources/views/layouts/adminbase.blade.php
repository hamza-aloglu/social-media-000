<!DOCTYPE html>
<html>
<head>
    <!-- Meta and Title -->
    <meta charset="utf-8">
    <title> @yield('title') </title>
    <meta name="keywords" content="HTML5, Bootstrap 3, Admin Template, UI Theme" />
    <meta name="description" content="AdminK - A Responsive HTML5 Admin UI Framework">
    <meta name="author" content="ThemeREX">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Favicon -->
    <link rel="shortcut icon" href="assets-admin/img/favicon.png">
    <!-- Angular material -->
    <link rel="stylesheet" type="text/css" href="assets-admin/skin/css/angular-material.min.css">
    <!-- Icomoon -->
    <link rel="stylesheet" type="text/css" href="assets-admin/fonts/icomoon/icomoon.css">
    <!-- AnimatedSVGIcons -->
    <link rel="stylesheet" type="text/css" href="assets-admin/fonts/animatedsvgicons/css/codropsicons.css">
    <!-- Magnific popup -->
    <link rel="stylesheet" type="text/css" href="assets-admin/js/plugins/magnific/magnific-popup.css">
    <!-- c3charts -->
    <link rel="stylesheet" type="text/css" href="assets-admin/js/plugins/c3charts/c3.min.css">
    <!-- CSS - allcp forms -->
    <link rel="stylesheet" type="text/css" href="assets-admin/allcp/forms/css/forms.css">
    <!-- mCustomScrollbar -->
    <link rel="stylesheet" type="text/css" href="assets-admin/js/utility/malihu-custom-scrollbar-plugin-master/jquery.mCustomScrollbar.min.css">
    <!-- CSS - theme -->
    <link rel="stylesheet" type="text/css" href="assets-admin/skin/default_skin/less/theme.css">

    @yield('head')
</head>
<body class="dashboard-page with-customizer">
<!-- Body Wrap  -->
<div id="main">
    @include('admin.header')
    @include('admin.sidebar')
    <!-- Main Wrapper -->
    <section id="content_wrapper">
        @yield('topbar')
        <section id="content" class="table-layout animated fadeIn">
            @yield('content')
            @include('admin.footer')
        </section>

    </section>
    <!-- /Main Wrapper -->
</div>
<!-- /Body Wrap  -->
@section('scripts')
    <!-- Scripts -->
    <!-- jQuery -->
    <script src="assets-admin/js/jquery/jquery-1.12.3.min.js"></script>
    <script src="assets-admin/js/jquery/jquery_ui/jquery-ui.min.js"></script>
    <!-- AnimatedSVGIcons -->
    <script src="assets-admin/fonts/animatedsvgicons/js/snap.svg-min.js"></script>
    <script src="assets-admin/fonts/animatedsvgicons/js/svgicons-config.js"></script>
    <script src="assets-admin/fonts/animatedsvgicons/js/svgicons.js"></script>
    <script src="assets-admin/fonts/animatedsvgicons/js/svgicons-init.js"></script>
    <!-- Scroll -->
    <script src="assets-admin/js/utility/malihu-custom-scrollbar-plugin-master/jquery.mCustomScrollbar.concat.min.js"></script>
    <!-- HighCharts Plugin -->
    <script src="assets-admin/js/plugins/highcharts/highcharts.js"></script>
    <!-- Magnific Popup Plugin -->
    <script src="assets-admin/js/plugins/magnific/jquery.magnific-popup.js"></script>
    <!-- Plugins -->
    <script src="assets-admin/js/plugins/c3charts/d3.min.js"></script>
    <script src="assets-admin/js/plugins/c3charts/c3.min.js"></script>
    <script src="assets-admin/js/plugins/circles/circles.js"></script>
    <!-- Jvectormap JS -->
    <script src="assets-admin/js/plugins/jvectormap/jquery.jvectormap.min.js"></script>
    <script src="assets-admin/js/plugins/jvectormap/assets/jquery-jvectormap-us-lcc-en.js"></script>
    <script src="assets-admin/js/plugins/jvectormap/assets/jquery-jvectormap-world-mill-en.js"></script>
    <!-- Theme Scripts -->
    <script src="assets-admin/js/utility/utility.js"></script>
    <script src="assets-admin/js/demo/demo.js"></script>
    <script src="assets-admin/js/main.js"></script>
    <script src="assets-admin/js/demo/widgets_sidebar.js"></script>
    <script src="assets-admin/js/pages/dashboard1.js"></script>
    <script src="assets-admin/js/demo/widgets.js"></script>
    <!-- /Scripts -->
@show
</body>
</html>
