<!-- header area start -->
<header>
    <div class="header-top sticky bg-white d-none d-lg-block">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-5">
                    <!-- header top navigation start -->
                    <div class="header-top-navigation">
                        <nav>
                            <ul>
                                <li class="active"><a href="{{route('home')}}">home</a></li>
                                <li class="msg-trigger"><a class="msg-trigger-btn" href="#a">Settings</a>
                                    <div class="message-dropdown" id="a">
                                        <ul class="dropdown-msg-list">
                                            <li class="msg-list-item d-flex justify-content-between">
                                                <!-- message content start -->
                                                <div class="msg-content">
                                                    <a href="{{route('contact')}}">contact</a>
                                                </div>
                                                <!-- message content end -->
                                            </li>

                                        </ul>
                                    </div>
                                </li>
                                @php
                                    $mainCategories = \App\Http\Controllers\HomePanel\HomeController::maincategorylist();
                                @endphp
                                <li class="notification-trigger"><a class="msg-trigger-btn" href="#b">Category</a>
                                    <div class="message-dropdown" id="b">
                                        <div class="dropdown-title">
                                            <p class="recent-msg">Categories</p>
                                            <button>
                                                <i class="flaticon-settings"></i>
                                            </button>
                                        </div>
                                        <ul class="dropdown-msg-list">
                                            @foreach($mainCategories as $rs)
                                            <li class="msg-list-item d-flex justify-content-between">
                                                <!-- profile picture end -->
                                                <div class="profile-thumb">
                                                    <figure class="profile-thumb-middle">
                                                        @if($rs -> image)
                                                            <img src="{{\Illuminate\Support\Facades\Storage::url($rs->image)}}" alt="profile picture">
                                                        @else
                                                            <img src="{{asset('assets')}}/images/profile/profile-small-3.jpg" alt="profile picture">
                                                        @endif

                                                    </figure>
                                                </div>
                                                <!-- profile picture end -->

                                                <!-- message content start -->
                                                <div class="msg-content notification-content">
                                                    <a href="{{route('postcategory', ['category'=>$rs -> id])}}">{{$rs -> title}}</a>
                                                    <p>{{$rs -> keywords}}</p>

                                                    @if(count($rs->children))
                                                        <p>
                                                            @include('home.categorytree', ['children'=>$rs->children])
                                                        </p>
                                                    @endif
                                                </div>
                                                <!-- message content end -->

                                                <!-- message time start -->
                                                <div class="msg-time">
                                                    <p>{{$rs -> created_at}}</p>
                                                </div>
                                                <!-- message time end -->
                                            </li>
                                            @endforeach
                                        </ul>
                                        <div class="msg-dropdown-footer">
                                            <button>See all in messenger</button>
                                            <button>Mark All as Read</button>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <!-- header top navigation start -->
                </div>

                <div class="col-md-2">
                    <!-- brand logo start -->
                    <div class="brand-logo text-center">
                        <a href="{{route('home')}}">
                            <img src="{{asset('assets')}}/images/logo/logo.png" alt="brand logo">
                        </a>
                    </div>
                    <!-- brand logo end -->
                </div>

                <div class="col-md-5">
                    <div class="header-top-right d-flex align-items-center justify-content-end">
                        <!-- header top search start -->
                        @guest
                        <div class="header-top-search">
                            <form class="top-search-box">
                                <a class="fs-5 " href="{{route('loginuser')}}">Login</a>
                            </form>
                        </div>
                        @endguest
                        <!-- header top search end -->

                        @auth()
                        <!-- profile picture start -->
                        <div class="profile-setting-box">
                            <div class="profile-thumb-small">
                                <a href="javascript:void(0)" class="profile-triger">
                                    <figure>
                                        <img src="{{\Illuminate\Support\Facades\Auth::user()->profile_photo_path}}"
                                             alt="profile picture">
                                    </figure>
                                </a>
                                <div class="profile-dropdown">
                                    <div class="profile-head">
                                        <h5 class="name"><div href="#">{{\Illuminate\Support\Facades\Auth::user()->name}}</div></h5>
                                        <div class="mail" href="#">{{\Illuminate\Support\Facades\Auth::user()->email}}</div>
                                    </div>
                                    <div class="profile-body">
                                        <ul>
                                            <li><a href="{{route('userpanel.index', ['user'=>\Illuminate\Support\Facades\Auth::id()])}}"><i class="flaticon-user"></i>Profile</a></li>
                                        </ul>
                                        <ul>
                                            <li><a href="{{route('logoutuser')}}"><i class="flaticon-unlock"></i>Sign out</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- profile picture end -->
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- header area end -->
<!-- header area start(mobile) -->
<header>
    <div class="mobile-header-wrapper sticky d-block d-lg-none">
        <div class="mobile-header position-relative ">
            <div class="mobile-logo">
                <a href="{{route('home')}}">
                    <img src="{{asset('assets')}}/images/logo/logo.png" alt="logo">
                </a>
            </div>
            <div class="mobile-menu w-100">
                <ul>
                    <li>
                        <button href="" class="notification request-trigger"><i class="flaticon-settings"></i>
                            <span>04</span>
                        </button>
                        <ul class="frnd-request-list">
                            <li class="msg-list-item d-flex justify-content-between">
                                <!-- message content start -->
                                <div class="msg-content">
                                    <a href="{{route('contact')}}">contact</a>
                                </div>
                                <!-- message content end -->
                            </li>
                        </ul>
                    </li>
                    <li>
                        <button class="search-trigger">
                            <i class="search-icon flaticon-search"></i>
                            <i class="close-icon flaticon-cross-out"></i>
                        </button>
                        <div class="mob-search-box">
                            <form class="mob-search-inner">
                                <input type="text" placeholder="Search Here" class="mob-search-field">
                                <button class="mob-search-btn"><i class="flaticon-search"></i></button>
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="mobile-header-profile">
                <!-- profile picture end -->
                <div class="profile-thumb profile-setting-box">
                    <!-- header top search start -->
                    @guest
                        <div class="header-top-search">
                            <form class="top-search-box">
                                <a class="fs-5 " href="{{route('loginuser')}}">Login</a>
                            </form>
                        </div>
                    @endguest
                <!-- header top search end -->

                    @auth()
                    <!-- profile picture start -->
                        <div class="profile-setting-box">
                            <div class="profile-thumb-small">
                                <a href="javascript:void(0)" class="profile-triger">
                                    <figure>
                                        <img src="{{\Illuminate\Support\Facades\Storage::url(\Illuminate\Support\Facades\Auth::user()->profile_picture)}}"
                                             alt="profile picture">
                                    </figure>
                                </a>
                                <div class="profile-dropdown">
                                    <div class="profile-head">
                                        <h5 class="name"><div href="#">{{\Illuminate\Support\Facades\Auth::user()->name}}</div></h5>
                                        <div class="mail" href="#">{{\Illuminate\Support\Facades\Auth::user()->email}}</div>
                                    </div>
                                    <div class="profile-body">
                                        <ul>
                                            <li><a href="{{route('userpanel.index', ['user'=>\Illuminate\Support\Facades\Auth::id()])}}"><i class="flaticon-user"></i>Profile</a></li>
                                        </ul>
                                        <ul>
                                            <li><a href="{{route('logoutuser')}}"><i class="flaticon-unlock"></i>Sign out</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- profile picture end -->
                    @endauth
                </div>
                <!-- profile picture end -->
            </div>
        </div>
    </div>
</header>
<!-- header area end -->
