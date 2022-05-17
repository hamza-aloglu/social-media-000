<!-- Sidebar  -->
<aside id="sidebar_left" class="nano affix">
    <!-- Sidebar Left Wrapper  -->
    <div class="sidebar-left-content nano-content">
        <!-- Sidebar Header -->
        <header class="sidebar-header">
            <!-- Sidebar - Logo -->
            <div class="sidebar-widget logo-widget">
                <div class="media">
                    <a class="logo-image" href="index.html">
                        <!-- <img src="{{asset('assets-admin')}}/img/logo.png" alt="" class="img-responsive"> -->
                    </a>
                    <div class="logo-slogan">
                        <div>MicroOffice<span class="text-info"></span></div>
                    </div>
                </div>
            </div>
        </header>
        <!-- /Sidebar Header -->
        <!-- Sidebar Menu  -->
        <ul class="nav sidebar-menu">
            <li class="sidebar-label pt30">Navigation</li>
            <li>
                <a class="" href="/admin">
                    <span class="caret"></span>
                    <span class="sidebar-title">Home</span>
                    <span class="sb-menu-icon fa fa-home"></span>
                </a>
            </li>
            <li>
                <a class="" href="{{route('admin.category.index')}}">
                    <span class="caret"></span>
                    <span class="sidebar-title">Category</span>
                    <span class="sb-menu-icon fa fa-star-half-full "></span>
                </a>

            </li>
            <li class="sidebar-label pt25">Tools</li>
            <li>
                <a class="text-green-300" href="{{route('admin.post.index')}}">
                    <span class="caret"></span>
                    <span class="sidebar-title ">Posts</span>
                    <span class="sb-menu-icon fa fa-share-square-o "></span>
                </a>
            </li>
            <li>
                <a class="" href="/admin/user">
                    <span class="caret"></span>
                    <span class="sidebar-title">Users</span>
                    <span class="sb-menu-icon fa fa-desktop"></span>
                </a>
                <!-- You can add subfiles to users from template.   -->
            </li>
            <li>
                <a class="" href="/admin/setting">
                    <span class="caret"></span>
                    <span class="sidebar-title">Settings</span>
                    <span class="sb-menu-icon fa fa-wrench"></span>
                </a>
            </li>
            <li>
                <a class="" href="/admin/comment">
                    <span class="caret"></span>
                    <span class="sidebar-title">Comments</span>
                    <span class="sb-menu-icon fa fa-list-ul"></span>
                </a>
            </li>
            <li class="sidebar-label pt25">Elements</li>
            <li class="">
                <a href="{{route('admin.message.index')}}">
                    <span class="sidebar-title">Messages</span>
                    <span class="sb-menu-icon fa fa-envelope"></span>
                </a>
            </li>
            <li>
                <a class="" href="/admin/faq">
                    <span class="caret"></span>
                    <span class="sidebar-title">FAQ</span>
                    <span class="sb-menu-icon fa fa-file-text-o"></span>
                </a>
            </li>
            <!-- Sidebar Progress Bars -->
            <li class="sidebar-label pt25 pb20">Stats</li>
            <li class="sidebar-stat">
                <a href="#" class="fs11 pln">
                    <span class="fs13 pl35 fa fa-calendar-o text-info"></span>
                    <span class="sidebar-title text-muted text-uppercase">September earnings</span>
                    <span class="pull-right mr30 text-muted">$1158</span>
                    <div id="high-column4" class="mt10 pl5 pr10" style="height: 150px;"></div>
                </a>
            </li>
            <li class="sidebar-stat pt10">
                <a href="#" class="fs11 pln">
                    <span class="fs13 pl35 fa fa-calendar text-info"></span>
                    <span class="sidebar-title text-muted text-uppercase">August earnings</span>
                    <span class="pull-right mr30 text-muted">$1001</span>
                    <div id="high-column5" class="mt10 pl5 pr10" style="height: 150px;"></div>
                </a>
            </li>
        </ul>
        <!-- /Sidebar Menu  -->
    </div>
    <!-- /Sidebar Left Wrapper  -->
</aside>
<!-- /Sidebar -->
