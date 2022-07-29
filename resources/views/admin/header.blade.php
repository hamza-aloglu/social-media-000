<!-- Header  -->
<header class="navbar navbar-fixed-top">
    <ul class="nav navbar-nav navbar-left">
        <li class="hidden-xs">
            <div class="navbar-btn btn-group">
                <button class="btn-hover-effects navbar-fullscreen toggle-active btn si-icons si-icons-default"><span
                        class="fa fa-arrows-alt"></span></button>
            </div>
        </li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
        <li class="dropdown dropdown-fuse">
            <div class="navbar-btn btn-group">
                <button class="btn-hover-effects dropdown-toggle btn" data-toggle="dropdown">
                    <img src="{{asset('assets-admin')}}/img/sprites/uk.png" alt="">
                </button>
                <ul class="dropdown-menu" role="menu">
                    <li>
                        <a href="javascript:void(0);"> English </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);"> Spanish </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);"> Italian </a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="dropdown dropdown-fuse navbar-user">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img class="btn-hover-effects"
                     src="{{\Illuminate\Support\Facades\Storage::url(\Illuminate\Support\Facades\Auth::user()->profile_photo_path)}}"
                     alt="avatar">
                <span class="hidden-xs">
                        <span class="name">{{Auth::user()->name}}</span>
                        </span>
                <span class="fa fa-caret-down hidden-xs"></span>
            </a>
            <ul class="dropdown-menu list-group keep-dropdown w230" role="menu">
                <li class="dropdown-header clearfix">
                    <div class="pull-left">
                        <select id="user-status">
                            <optgroup label="Current Status:">
                                <option value="1-1">Away</option>
                                <option value="1-2">Busy</option>
                                <option value="1-3" selected="selected">Online</option>
                                <option value="1-4">Offline</option>
                            </optgroup>
                        </select>
                    </div>
                    <div class="pull-right">
                        <select id="user-role">
                            <optgroup label="Logged in As:">
                                <option value="1-1" selected="selected">Admin</option>
                                <option value="1-2">Editor</option>
                                <option value="1-3">User</option>
                            </optgroup>
                        </select>
                    </div>
                </li>
                <li class="dropdown-footer text-center">
                    <a href="{{route('logoutuser')}}" class="btn btn-warning">
                        logout
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</header>
<!-- /Header -->
