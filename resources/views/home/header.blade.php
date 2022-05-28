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
                                                    <a href="{{route('about')}}">about</a>
                                                 </div>
                                                <!-- message content end -->
                                            </li>
                                            <li class="msg-list-item d-flex justify-content-between">
                                                <!-- message content start -->
                                                <div class="msg-content">
                                                    <a href="{{route('references')}}">references</a>
                                                </div>
                                                <!-- message content end -->
                                            </li>
                                            <li class="msg-list-item d-flex justify-content-between">
                                                <!-- message content start -->
                                                <div class="msg-content">
                                                    <a href="{{route('contact')}}">contact</a>
                                                </div>
                                                <!-- message content end -->
                                            </li>
                                            <li class="msg-list-item d-flex justify-content-between">
                                                <!-- message content start -->
                                                <div class="msg-content">
                                                    <a href="{{route('faq')}}">FAQ</a>
                                                </div>
                                                <!-- message content end -->
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                @php
                                    $mainCategories = \App\Http\Controllers\HomeController::maincategorylist();
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
                                                    <a href="{{route('postcategory', ['id' => $rs -> id, 'slug' => $rs -> title])}}">{{$rs -> title}}</a>
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
                                        <img src="{{asset('assets')}}/images/profile/profile-35x35-1.jpg" alt="profile picture">
                                    </figure>
                                </a>
                                <div class="profile-dropdown">
                                    <div class="profile-head">
                                        <h5 class="name"><a href="#">{{\Illuminate\Support\Facades\Auth::user()->name}}</a></h5>
                                        <a class="mail" href="#">{{\Illuminate\Support\Facades\Auth::user()->email}}</a>
                                    </div>
                                    <div class="profile-body">
                                        <ul>
                                            <li><a href="profile.html"><i class="flaticon-user"></i>Profile</a></li>
                                            <li><a href="#"><i class="flaticon-message"></i>Inbox</a></li>
                                            <li><a href="#"><i class="flaticon-document"></i>Activity</a></li>
                                        </ul>
                                        <ul>
                                            <li><a href="#"><i class="flaticon-settings"></i>Setting</a></li>
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
                <a href="index.html">
                    <img src="{{asset('assets')}}/images/logo/logo-white.png" alt="logo">
                </a>
            </div>
            <div class="mobile-menu w-100">
                <ul>
                    <li>
                        <button class="notification request-trigger"><i class="flaticon-users"></i>
                            <span>03</span>
                        </button>
                        <ul class="frnd-request-list">
                            <li>
                                <div class="frnd-request-member">
                                    <figure class="request-thumb">
                                        <a href="profile.html">
                                            <img src="{{asset('assets')}}/images/profile/profile-midle-1.jpg" alt="proflie author">
                                        </a>
                                    </figure>
                                    <div class="frnd-content">
                                        <h6 class="author"><a href="profile.html">merry watson</a></h6>
                                        <p class="author-subtitle">Works at HasTech</p>
                                        <div class="request-btn-inner">
                                            <button class="frnd-btn">confirm</button>
                                            <button class="frnd-btn delete">delete</button>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="frnd-request-member">
                                    <figure class="request-thumb">
                                        <a href="profile.html">
                                            <img src="{{asset('assets')}}/images/profile/profile-midle-2.jpg" alt="proflie author">
                                        </a>
                                    </figure>
                                    <div class="frnd-content">
                                        <h6 class="author"><a href="profile.html">merry watson</a></h6>
                                        <p class="author-subtitle">Works at HasTech</p>
                                        <div class="request-btn-inner">
                                            <button class="frnd-btn">confirm</button>
                                            <button class="frnd-btn delete">delete</button>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="frnd-request-member">
                                    <figure class="request-thumb">
                                        <a href="profile.html">
                                            <img src="{{asset('assets')}}/images/profile/profile-midle-3.jpg" alt="proflie author">
                                        </a>
                                    </figure>
                                    <div class="frnd-content">
                                        <h6 class="author"><a href="profile.html">merry watson</a></h6>
                                        <p class="author-subtitle">Works at HasTech</p>
                                        <div class="request-btn-inner">
                                            <button class="frnd-btn">confirm</button>
                                            <button class="frnd-btn delete">delete</button>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <button class="notification"><i class="flaticon-notification"></i>
                            <span>03</span>
                        </button>
                    </li>
                    <li>
                        <button class="chat-trigger notification"><i class="flaticon-chats"></i>
                            <span>04</span>
                        </button>
                        <div class="mobile-chat-box">
                            <div class="live-chat-title">
                                <!-- profile picture end -->
                                <div class="profile-thumb">
                                    <a href="profile.html">
                                        <figure class="profile-thumb-small profile-active">
                                            <img src="{{asset('assets')}}/images/profile/profile-35x35-13.jpg" alt="profile picture">
                                        </figure>
                                    </a>
                                </div>
                                <!-- profile picture end -->
                                <div class="posted-author">
                                    <h6 class="author"><a href="profile.html">Robart Marloyan</a></h6>
                                    <span class="active-pro">active now</span>
                                </div>
                                <div class="live-chat-settings ml-auto">
                                    <button class="chat-settings"><img src="{{asset('assets')}}/images/icons/settings.png" alt=""></button>
                                    <button class="close-btn"><img src="{{asset('assets')}}/images/icons/close.png" alt=""></button>
                                </div>
                            </div>
                            <div class="message-list-inner">
                                <ul class="message-list custom-scroll">
                                    <li class="text-friends">
                                        <p>Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text</p>
                                        <div class="message-time">10 minute ago</div>
                                    </li>
                                    <li class="text-author">
                                        <p>Many desktop publishing packages and web page editors</p>
                                        <div class="message-time">5 minute ago</div>
                                    </li>
                                    <li class="text-friends">
                                        <p>packages and web page editors </p>
                                        <div class="message-time">2 minute ago</div>
                                    </li>
                                    <li class="text-friends">
                                        <p>Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text</p>
                                        <div class="message-time">10 minute ago</div>
                                    </li>
                                    <li class="text-author">
                                        <p>Many desktop publishing packages and web page editors</p>
                                        <div class="message-time">5 minute ago</div>
                                    </li>
                                    <li class="text-friends">
                                        <p>packages and web page editors </p>
                                        <div class="message-time">2 minute ago</div>
                                    </li>
                                </ul>
                            </div>
                            <div class="chat-text-field mob-text-box">
                                <textarea class="live-chat-field custom-scroll" placeholder="Text Message"></textarea>
                                <button class="chat-message-send" type="submit" value="submit">
                                    <img src="{{asset('assets')}}/images/icons/plane.png" alt="">
                                </button>
                            </div>
                        </div>
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
                    <a href="javascript:void(0)" class="profile-triger">
                        <figure class="profile-thumb-middle">
                            <img src="{{asset('assets')}}/images/profile/profile-small-1.jpg" alt="profile picture">
                        </figure>
                    </a>
                    <div class="profile-dropdown text-left">
                        <div class="profile-head">
                            <h5 class="name"><a href="#">Madison Howard</a></h5>
                            <a class="mail" href="#">mailnam@mail.com</a>
                        </div>
                        <div class="profile-body">
                            <ul>
                                <li><a href="profile.html"><i class="flaticon-user"></i>Profile</a></li>
                                <li><a href="#"><i class="flaticon-message"></i>Inbox</a></li>
                                <li><a href="#"><i class="flaticon-document"></i>Activity</a></li>
                            </ul>
                            <ul>
                                <li><a href="#"><i class="flaticon-settings"></i>Setting</a></li>
                                <li><a href="signup.html"><i class="flaticon-unlock"></i>Sing out</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- profile picture end -->
            </div>
        </div>
    </div>
</header>
<!-- header area end -->
