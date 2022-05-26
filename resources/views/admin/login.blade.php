<!DOCTYPE html>
<html>
<head>
    <!-- Meta and Title -->
    <meta charset="utf-8">
    <title>MicroOffice - A Responsive Bootstrap 3 Admin Dashboard Template</title>
    <meta name="keywords" content="HTML5, Bootstrap 3, Admin Template, UI Theme"/>
    <meta name="description" content="AdminK - A Responsive HTML5 Admin UI Framework">
    <meta name="author" content="ThemeREX">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{asset('assets-admin')}}/img/favicon.png">
    <!-- Angular material -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets-admin')}}/skin/css/angular-material.min.css">
    <!-- Icomoon -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets-admin')}}/fonts/icomoon/icomoon.css">
    <!-- AnimatedSVGIcons -->
    <!-- c3charts -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets-admin')}}/js/plugins/c3charts/c3.min.css">
    <!-- CSS - allcp forms -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets-admin')}}/allcp/forms/css/forms.css">
    <!-- mCustomScrollbar -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets-admin')}}/js/utility/malihu-custom-scrollbar-plugin-master/jquery.mCustomScrollbar.min.css">
    <!-- CSS - theme -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets-admin')}}/skin/default_skin/less/theme.css">
</head>
<body class="utility-page sb-l-c sb-r-c">
<!-- Body Wrap -->
<div id="main" class="animated fadeIn">
    <!-- Main Wrapper -->
    <section id="content_wrapper">
        <div id="canvas-wrapper">
            <canvas id="demo-canvas"></canvas>
        </div>
        <!-- Content -->
        <section id="content">
            <!-- Login Form -->
            <div class="theme-primary w-100 row">
                <div class="col-12 text-center">
                    <div class="bg-primary text-center mb20 br3 pt15 pb10 ">
                    <div class="logo-widget">
                        <div class="logo-slogan mtn">
                            <div>Adda Admin<span class="text-info"></span></div>
                            <h1 class="mb-4 text-danger">@include('home.messages')</h1>
                        </div>
                    </div>
                </div>
                </div>
                <div class="col-12 text-center">
                    <div class="panel mw320" style="margin: 0 auto">
                        <form method="post" action="{{route('loginadmincheck')}}">
                        @csrf
                        <div class="panel-body pn mv10">
                            <div class="section">
                                <label for="username" class="field prepend-icon">
                                    <input type="email" name="email" id="username" class="gui-input">
                                    <span class="field-icon">
                                        <i class="fa fa-user"></i>
                                    </span>
                                </label>
                            </div>
                            <!-- /section -->
                            <div class="section">
                                <label for="password" class="field prepend-icon">
                                    <input type="text" name="password" id="password" class="gui-input"
                                           placeholder="Password">
                                    <span class="field-icon">
                                        <i class="fa fa-lock"></i>
                                    </span>
                                </label>
                            </div>
                            <!-- /section -->
                            <div class="section">
                                <div class="bs-component pull-left pt5">
                                    <div class="radio-custom radio-primary mb5 lh25">
                                        <input type="radio" id="remember" name="remember">
                                        <label for="remember">Remember me</label>
                                    </div>
                                </div>
                                <input type="submit" class="btn btn-bordered btn-primary pull-right" value="log-in">
                            </div>
                            <!-- /section -->
                        </div>
                        <!-- /Form -->
                    </form>
                </div>
                </div>
                <!-- /Panel -->
            </div>
            <!-- /Spec Form -->
        </section>
        <!-- /Content -->
    </section>
    <!-- /Main Wrapper -->
</div>
<!-- /Body Wrap  -->
<!-- Scripts -->
<!-- jQuery -->
<!-- Scripts -->
<!-- jQuery -->
<script src="{{asset('assets-admin')}}/js/jquery/jquery-1.12.3.min.js"></script>
<script src="{{asset('assets-admin')}}/js/jquery/jquery_ui/jquery-ui.min.js"></script>
<!-- AnimatedSVGIcons -->
<script src="{{asset('assets-admin')}}/fonts/animatedsvgicons/js/svgicons-config.js"></script>
<script src="{{asset('assets-admin')}}/fonts/animatedsvgicons/js/svgicons.js"></script>
<script src="{{asset('assets-admin')}}/fonts/animatedsvgicons/js/svgicons-init.js"></script>


<!-- Jvectormap JS -->
<script src="{{asset('assets-admin')}}/js/plugins/jvectormap/jquery.jvectormap.min.js"></script>
<script src="{{asset('assets-admin')}}/js/plugins/jvectormap/assets/jquery-jvectormap-us-lcc-en.js"></script>
<script src="{{asset('assets-admin')}}/js/plugins/jvectormap/assets/jquery-jvectormap-world-mill-en.js"></script>
<!-- Theme Scripts -->
<script src="{{asset('assets-admin')}}/js/demo/demo.js"></script>
<script src="{{asset('assets-admin')}}/js/main.js"></script>
<script src="{{asset('assets-admin')}}/js/demo/widgets_sidebar.js"></script>
<script src="{{asset('assets-admin')}}/js/pages/dashboard1.js"></script>
<script src="{{asset('assets-admin')}}/js/demo/widgets.js"></script>
<script src="{{asset('assets-admin')}}/js/pages/dashboard_init.js"></script>
<!-- /Scripts -->
</body>
</html>
