<!DOCTYPE html>
<html>
<head>
    <!-- Meta and Title -->
    <meta charset="utf-8">
    <title>MicroOffice - A Responsive Bootstrap 3 Admin Dashboard Template</title>
    <meta name="keywords" content="HTML5, Bootstrap 3, Admin Template, UI Theme" />
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
    <link rel="stylesheet" type="text/css" href="{{asset('assets-admin')}}/fonts/animatedsvgicons/css/codropsicons.css">
    <!-- CSS - allcp forms -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets-admin')}}/allcp/forms/css/forms.css">
    <!-- Plugins -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets-admin')}}/js/utility/malihu-custom-scrollbar-plugin-master/jquery.mCustomScrollbar.min.css">
    <!-- CSS - theme -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets-admin')}}/skin/default_skin/less/theme.css">
</head>
<body class="tables-basic" data-spy="scroll" data-target="#nav-spy" data-offset="300">
<!-- Body Wrap -->
<div id="main">
    <!-- Main Wrapper -->
    <section id="content_wrapper" style="width: 100%; margin: 0">
        <!-- Content -->
        <section id="content" class="table-layout animated fadeIn">

            <!-- Column Center -->
            <div class="chute chute-center">
                <div class="row mt10" style="background-color: rgba(207, 202, 188, 0.2); padding: 20px; border-radius: 7px">
                    <div class="col-xs-12" >
                        <h3 style="margin: 0px;">Add image</h3>
                        <form action="{{route('admin.image.store', ['pid' => $post -> id])}}" method="post"
                        enctype="multipart/form-data" style="margin: 0px; padding: 5px 100px;);
                        font-family: 'Open Sans',Helvetica,Arial,sans-serif;">
                            @csrf
                            <div class="col-md-6 ">
                                <div class="section">
                                    <h4>Title</h4>
                                    <input type="text" name="title" class="gui-input" style="width: 100%; padding: 2px" placeholder="Title">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="section">
                                    <h3 style="margin: 0">Image</h3>
                                    <input type="file" class="gui-file" name="image" id="file2" onchange="document.getElementById('uploader2').value = this.value;">
                                    <input type="text" class="gui-input" id="uploader2" placeholder="Select File">
                                    <i class="fa fa-upload"></i>
                                </div>
                            </div>
                            <br>
                            <div class="col-md-12 ">
                                <input type="submit" class="button btn-info" style="display: block;padding: 5px 15px; margin: 10px 0;
                                    border: 1px solid gray;" value="upload">
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row mt10">
                    <div class="col-xs-12">
                        <div class="panel" id="spy1">
                            <div class="panel-heading">
                                <span class="panel-title pn">Basic Table</span>
                                <div class="pull-right">
                                    <code class="mr20">.table</code>
                                </div>
                            </div>
                            <div class="panel-body pn mt20">
                                <div class="table-responsive">
                                    <div class="bs-component">
                                        <table class="table btn-gradient-grey">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Title</th>
                                                <th>Image</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($images as $rs)
                                                <tr>
                                                    <td>{{$rs -> id}}</td>
                                                    <td>{{$rs -> title}}</td>
                                                    <td class="">
                                                        @if($rs -> image)
                                                            <img src="{{Storage::url($rs -> image)}}" alt="{{$rs->title}}" style="height: 50px">
                                                        @endif
                                                    </td>
                                                    <td class="">
                                                        <div class="btn-group text-right">
                                                            <button type="button" class="btn btn-info br2 btn-xs fs10 fw700 dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> Select action
                                                                <span class="caret"></span>
                                                            </button>
                                                            <ul class="dropdown-menu" role="menu">
                                                                <!--<li>
                                                                    <a href={{route('admin.image.update', ['pid' => $post->id ,'id' => $rs -> id])}}>Update</a>
                                                                </li>-->
                                                                <li>
                                                                    <a href={{route('admin.image.delete', ['pid' => $post->id ,'id' => $rs -> id])}}>Delete</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Column Center -->
        </section>
        <!-- /Content -->
    </section>
    <!-- /Main Wrapper -->
</div>
<!-- /Body Wrap  -->
<!-- Scripts -->
<!-- jQuery -->
<script src="{{asset('assets-admin')}}/js/jquery/jquery-1.12.3.min.js"></script>
<script src="{{asset('assets-admin')}}/js/jquery/jquery_ui/jquery-ui.min.js"></script>
<!-- AnimatedSVGIcons -->
<script src="{{asset('assets-admin')}}/fonts/animatedsvgicons/js/snap.svg-min.js"></script>
<script src="{{asset('assets-admin')}}/fonts/animatedsvgicons/js/svgicons-config.js"></script>
<script src="{{asset('assets-admin')}}/fonts/animatedsvgicons/js/svgicons.js"></script>
<script src="{{asset('assets-admin')}}/fonts/animatedsvgicons/js/svgicons-init.js"></script>
<!-- Scroll -->
<script src="{{asset('assets-admin')}}/js/utility/malihu-custom-scrollbar-plugin-master/jquery.mCustomScrollbar.concat.min.js"></script>
<!-- HighCharts Plugin -->
<script src="{{asset('assets-admin')}}/js/plugins/highcharts/highcharts.js"></script>
<!-- Plugins -->
<script src="{{asset('assets-admin')}}/js/plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- Theme Scripts -->
<script src="{{asset('assets-admin')}}/js/utility/utility.js"></script>
<script src="{{asset('assets-admin')}}/js/demo/demo.js"></script>
<script src="{{asset('assets-admin')}}/js/main.js"></script>
<script src="{{asset('assets-admin')}}/js/demo/widgets_sidebar.js"></script>
<script src="{{asset('assets-admin')}}/js/pages/tables-basic.js"></script>
<!-- /Scripts -->
</body>
</html>
