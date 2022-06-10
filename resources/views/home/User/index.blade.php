@extends('layouts.frontbase')

@section('title','posts of '. $user->name)


@section('content')
    <main>

        <div class="main-wrapper">
            <div class="profile-banner-large bg-img" data-bg="assets/images/banner/profile-banner.jpg">
            </div>
            <div class="profile-menu-area bg-white">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-3 col-md-3">
                            <div class="profile-picture-box">
                                <figure class="profile-picture">
                                    <a href="profile.html">
                                        <img src="../../../public/assets/images/profile/profile-1.jpg" alt="profile picture">
                                    </a>
                                </figure>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-6 offset-lg-1">
                            <div class="profile-menu-wrapper">
                                <div class="main-menu-inner header-top-navigation">
                                    <nav>
                                        <ul class="main-menu">
                                            <li class="active"><a href="#">timeline</a></li>
                                            <li><a href="{{route('userpanel.comment', ['uid'=>$user->id])}}">comments</a></li>
                                            @if(!$visitorFlag)
                                                <li><a href="{{route('userpanel.friend')}}">friends</a></li>
                                                <li><a href="{{route('userpanel.edit')}}">edit profile</a></li>
                                            @elseif(\Illuminate\Support\Facades\Auth::check() && !$isRequested)

                                                <li style="float: right"><a href="{{route('userpanel.friendrequest', ['fid'=>$user->id])}}" class="btn btn-primary ">
                                                        Add Friend
                                                    </a></li>
                                            @endif
                                            <li>@include('home.messages')</li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 order-2 order-lg-1">
                        <aside class="widget-area profile-sidebar">
                            <!-- widget single item start -->
                            <div class="card widget-item">
                                <h4 class="widget-title">Erik Jhonson</h4>
                                <div class="widget-body">
                                    <div class="about-author">
                                        <p>I Don’t know how? But i believe that it is possible one day if i stay with my dream all time</p>
                                        <ul class="author-into-list">
                                            <li><a href="#"><i class="bi bi-office-bag"></i>Web Developer</a></li>
                                            <li><a href="#"><i class="bi bi-home"></i>Melbourne, Australia</a></li>
                                            <li><a href="#"><i class="bi bi-location-pointer"></i>Pulshar, Melbourne</a></li>
                                            <li><a href="#"><i class="bi bi-heart-beat"></i>Travel, Swimming</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- widget single item end -->

                            <!-- widget single item start -->
                            <div class="card widget-item">
                                <h4 class="widget-title">Sweets Memories</h4>
                                <div class="widget-body">
                                    <div class="sweet-galley img-gallery">
                                        <div class="row row-5">
                                            <div class="col-4">
                                                <div class="gallery-tem">
                                                    <figure class="post-thumb">
                                                        <a class="gallery-selector" href="../../../public/assets/images/gallery/gallery-1.jpg">
                                                            <img src="../../../public/assets/images/gallery/gallery-1.jpg" alt="sweet memory">
                                                        </a>
                                                    </figure>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="gallery-tem">
                                                    <figure class="post-thumb">
                                                        <a class="gallery-selector" href="../../../public/assets/images/gallery/gallery-2.jpg">
                                                            <img src="../../../public/assets/images/gallery/gallery-2.jpg" alt="sweet memory">
                                                        </a>
                                                    </figure>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="gallery-tem">
                                                    <figure class="post-thumb">
                                                        <a class="gallery-selector" href="../../../public/assets/images/gallery/gallery-3.jpg">
                                                            <img src="../../../public/assets/images/gallery/gallery-3.jpg" alt="sweet memory">
                                                        </a>
                                                    </figure>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="gallery-tem">
                                                    <figure class="post-thumb">
                                                        <a class="gallery-selector" href="../../../public/assets/images/gallery/gallery-4.jpg">
                                                            <img src="../../../public/assets/images/gallery/gallery-4.jpg" alt="sweet memory">
                                                        </a>
                                                    </figure>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="gallery-tem">
                                                    <figure class="post-thumb">
                                                        <a class="gallery-selector" href="../../../public/assets/images/gallery/gallery-5.jpg">
                                                            <img src="../../../public/assets/images/gallery/gallery-5.jpg" alt="sweet memory">
                                                        </a>
                                                    </figure>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="gallery-tem">
                                                    <figure class="post-thumb">
                                                        <a class="gallery-selector" href="../../../public/assets/images/gallery/gallery-6.jpg">
                                                            <img src="../../../public/assets/images/gallery/gallery-6.jpg" alt="sweet memory">
                                                        </a>
                                                    </figure>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="gallery-tem">
                                                    <figure class="post-thumb">
                                                        <a class="gallery-selector" href="../../../public/assets/images/gallery/gallery-7.jpg">
                                                            <img src="../../../public/assets/images/gallery/gallery-7.jpg" alt="sweet memory">
                                                        </a>
                                                    </figure>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="gallery-tem">
                                                    <figure class="post-thumb">
                                                        <a class="gallery-selector" href="../../../public/assets/images/gallery/gallery-8.jpg">
                                                            <img src="../../../public/assets/images/gallery/gallery-8.jpg" alt="sweet memory">
                                                        </a>
                                                    </figure>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="gallery-tem">
                                                    <figure class="post-thumb">
                                                        <a class="gallery-selector" href="../../../public/assets/images/gallery/gallery-9.jpg">
                                                            <img src="../../../public/assets/images/gallery/gallery-9.jpg" alt="sweet memory">
                                                        </a>
                                                    </figure>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- widget single item end -->

                            <!-- widget single item start -->
                            <div class="card widget-item">
                                <h4 class="widget-title">page you may like</h4>
                                <div class="widget-body">
                                    <ul class="like-page-list-wrapper">
                                        <li class="unorder-list">
                                            <!-- profile picture end -->
                                            <div class="profile-thumb">
                                                <a href="#">
                                                    <figure class="profile-thumb-small">
                                                        <img src="../../../public/assets/images/profile/profile-35x35-1.jpg" alt="profile picture">
                                                    </figure>
                                                </a>
                                            </div>
                                            <!-- profile picture end -->

                                            <div class="unorder-list-info">
                                                <h3 class="list-title"><a href="#">Travel The World</a></h3>
                                                <p class="list-subtitle"><a href="#">adventure</a></p>
                                            </div>
                                            <button class="like-button active">
                                                <img class="heart" src="../../../public/assets/images/icons/heart.png" alt="">
                                                <img class="heart-color" src="../../../public/assets/images/icons/heart-color.png" alt="">
                                            </button>
                                        </li>
                                        <li class="unorder-list">
                                            <!-- profile picture end -->
                                            <div class="profile-thumb">
                                                <a href="#">
                                                    <figure class="profile-thumb-small">
                                                        <img src="../../../public/assets/images/profile/profile-35x35-11.jpg" alt="profile picture">
                                                    </figure>
                                                </a>
                                            </div>
                                            <!-- profile picture end -->

                                            <div class="unorder-list-info">
                                                <h3 class="list-title"><a href="#">Foodcort Nirala</a></h3>
                                                <p class="list-subtitle"><a href="#">food</a></p>
                                            </div>
                                            <button class="like-button">
                                                <img class="heart" src="../../../public/assets/images/icons/heart.png" alt="">
                                                <img class="heart-color" src="../../../public/assets/images/icons/heart-color.png" alt="">
                                            </button>
                                        </li>
                                        <li class="unorder-list">
                                            <!-- profile picture end -->
                                            <div class="profile-thumb">
                                                <a href="#">
                                                    <figure class="profile-thumb-small">
                                                        <img src="../../../public/assets/images/profile/profile-35x35-15.jpg" alt="profile picture">
                                                    </figure>
                                                </a>
                                            </div>
                                            <!-- profile picture end -->

                                            <div class="unorder-list-info">
                                                <h3 class="list-title"><a href="#">Rolin Theitar</a></h3>
                                                <p class="list-subtitle"><a href="#">drama</a></p>
                                            </div>
                                            <button class="like-button">
                                                <img class="heart" src="../../../public/assets/images/icons/heart.png" alt="">
                                                <img class="heart-color" src="../../../public/assets/images/icons/heart-color.png" alt="">
                                            </button>
                                        </li>
                                        <li class="unorder-list">
                                            <!-- profile picture end -->
                                            <div class="profile-thumb">
                                                <a href="#">
                                                    <figure class="profile-thumb-small">
                                                        <img src="../../../public/assets/images/profile/profile-35x35-18.jpg" alt="profile picture">
                                                    </figure>
                                                </a>
                                            </div>
                                            <!-- profile picture end -->

                                            <div class="unorder-list-info">
                                                <h3 class="list-title"><a href="#">Active Mind</a></h3>
                                                <p class="list-subtitle"><a href="#">fitness</a></p>
                                            </div>
                                            <button class="like-button">
                                                <img class="heart" src="../../../public/assets/images/icons/heart.png" alt="">
                                                <img class="heart-color" src="../../../public/assets/images/icons/heart-color.png" alt="">
                                            </button>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- widget single item end -->
                        </aside>
                    </div>

                    <div class="col-lg-6 order-1 order-lg-2">
                        @if(!$visitorFlag)
                        <!-- share box start -->
                        <div class="card card-small">
                            <div class="share-box-inner">
                                <!-- profile picture end -->
                                <div class="profile-thumb">
                                    <a href="#">
                                        <figure class="profile-thumb-middle">
                                            <img src="../../../public/assets/images/profile/profile-small-37.jpg" alt="profile picture">
                                        </figure>
                                    </a>
                                </div>
                                <!-- profile picture end -->


                                <!-- share content box start -->
                                <div class="share-content-box w-100">
                                    <form class="share-text-box">
                                        <textarea name="share" class="share-text-field" aria-disabled="true" placeholder="Say Something" data-bs-toggle="modal" data-bs-target="#textbox" id="email"></textarea>
                                        <div data-bs-toggle="modal" data-bs-target="#textbox" class="btn-share">share</div>
                                    </form>
                                </div>
                                <!-- share content box end -->
                                <!-- Modal start -->
                                <div class="modal fade" id="textbox" aria-labelledby="textbox">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Share Your Mood</h5>
                                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form class="share-text-box" action="{{route('storepost')}}" enctype="multipart/form-data" method="post">
                                                @csrf
                                                <div class="modal-body custom-scroll">
                                                <textarea name="detail" class="share-field-big custom-scroll"
                                                          placeholder="Say Something"></textarea>
                                                    <h5>category</h5>
                                                    <select hidden name="category_id" class="">
                                                        @foreach($categories as $rs)
                                                            <option value="{{$rs->id}}">{{\App\Http\Controllers\AdminPanel\CategoryController::
                                                    getParentsTree($rs, $rs->title)}}</option>
                                                        @endforeach
                                                    </select>
                                                    <input type="file" class="gui-file" name="image" id="file2"
                                                           onchange="document.getElementById('uploader2').value = this.value;">
                                                    <input type="text" class="gui-input" id="uploader2" placeholder="Select File">
                                                    <input hidden type="text" name="user_id"
                                                           value="{{$user->id}}">
                                                        <input hidden type="text" name="title"
                                                               value="{{$user->name}}">


                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="post-share-btn" data-bs-dismiss="modal">cancel</button>
                                                    <button type="submit" class="post-share-btn">post</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- Modal end -->
                            </div>
                        </div>
                        <!-- share box end -->
                        @endif

                        <!-- post status start -->
                        @foreach($postlist1 as $rs)
                            <div class="card">
                                <!-- post title start -->
                                <div class="post-title d-flex align-items-center">
                                    <!-- profile picture end -->
                                    <div class="profile-thumb">
                                        <a href="#">
                                            <figure class="profile-thumb-middle">
                                                <img src="{{asset('assets')}}/images/profile/profile-small-1.jpg"
                                                     alt="profile picture">
                                            </figure>
                                        </a>
                                    </div>
                                    <!-- profile picture end -->

                                    <div class="posted-author">
                                        <h6 class="author"><a href="profile.html">{{$rs->user->name}}</a></h6>
                                        <span class="post-time">{{$rs->created_at}}</span>
                                    </div>

                                    <div class="post-settings-bar">
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                        <div class="post-settings arrow-shape">
                                            <ul>
                                                <li><button>copy link to adda</button></li>
                                                <li><button>edit post</button></li>
                                                <li><button>embed adda</button></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- post title start -->
                                <div class="post-content">
                                    <a class="" href="{{route('post', ['id'=>$rs->id])}}" style="color: inherit">
                                        <p class="post-desc">
                                            {!! $rs->detail !!}
                                        </p>
                                    </a>
                                    @if($rs -> image)
                                        <div class="post-thumb-gallery img-gallery">
                                            <figure class="post-thumb">
                                                <a class="" href="{{route('post', ['id'=>$rs->id])}}">
                                                    <img src="{{Storage::url($rs->image)}}" alt="post image">
                                                </a>
                                            </figure>
                                        </div>
                                    @endif
                                    <div class="post-meta">
                                        <button  class="post-meta-like">
                                            <i class="bi bi-heart-beat"></i>
                                            <span>{{$rs -> likes}}</span>
                                            <strong>201</strong>
                                        </button>
                                        @php
                                            $average = $rs->comments->average('rate')
                                        @endphp
                                        <ul class="comment-share-meta">
                                            <li>
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div class="ratings">
                                                        @for($i = 0; $i < $average; $i++)
                                                            <i class="fa fa-star rating-color"></i>
                                                        @endfor
                                                        <span>{{number_format($average, 0)}}</span>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <a href="{{route('post', ['id'=>$rs->id])}}" class="post-comment">
                                                    <i class="bi bi-chat-bubble"></i>
                                                    <span>{{$rs -> comments -> count('id')}}</span>
                                                </a>
                                            </li>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                    @endforeach
                        <!-- post status end -->
                    </div>

                    <div class="col-lg-3 order-3">
                        <aside class="widget-area">
                            <!-- widget single item start -->
                            <div class="card widget-item">
                                <h4 class="widget-title">Recent Notifications</h4>
                                <div class="widget-body">
                                    <ul class="like-page-list-wrapper">
                                        <li class="unorder-list">
                                            <!-- profile picture end -->
                                            <div class="profile-thumb">
                                                <a href="#">
                                                    <figure class="profile-thumb-small">
                                                        <img src="../../../public/assets/images/profile/profile-35x35-9.jpg" alt="profile picture">
                                                    </figure>
                                                </a>
                                            </div>
                                            <!-- profile picture end -->

                                            <div class="unorder-list-info">
                                                <h3 class="list-title"><a href="#">Any one can join with us if you want</a></h3>
                                                <p class="list-subtitle">5 min ago</p>
                                            </div>
                                        </li>
                                        <li class="unorder-list">
                                            <!-- profile picture end -->
                                            <div class="profile-thumb">
                                                <a href="#">
                                                    <figure class="profile-thumb-small">
                                                        <img src="../../../public/assets/images/profile/profile-35x35-8.jpg" alt="profile picture">
                                                    </figure>
                                                </a>
                                            </div>
                                            <!-- profile picture end -->

                                            <div class="unorder-list-info">
                                                <h3 class="list-title"><a href="#">Any one can join with us if you want</a></h3>
                                                <p class="list-subtitle">10 min ago</p>
                                            </div>
                                        </li>
                                        <li class="unorder-list">
                                            <!-- profile picture end -->
                                            <div class="profile-thumb">
                                                <a href="#">
                                                    <figure class="profile-thumb-small">
                                                        <img src="../../../public/assets/images/profile/profile-35x35-7.jpg" alt="profile picture">
                                                    </figure>
                                                </a>
                                            </div>
                                            <!-- profile picture end -->

                                            <div class="unorder-list-info">
                                                <h3 class="list-title"><a href="#">Any one can join with us if you want</a></h3>
                                                <p class="list-subtitle">18 min ago</p>
                                            </div>
                                        </li>
                                        <li class="unorder-list">
                                            <!-- profile picture end -->
                                            <div class="profile-thumb">
                                                <a href="#">
                                                    <figure class="profile-thumb-small">
                                                        <img src="../../../public/assets/images/profile/profile-35x35-6.jpg" alt="profile picture">
                                                    </figure>
                                                </a>
                                            </div>
                                            <!-- profile picture end -->

                                            <div class="unorder-list-info">
                                                <h3 class="list-title"><a href="#">Any one can join with us if you want</a></h3>
                                                <p class="list-subtitle">25 min ago</p>
                                            </div>
                                        </li>
                                        <li class="unorder-list">
                                            <!-- profile picture end -->
                                            <div class="profile-thumb">
                                                <a href="#">
                                                    <figure class="profile-thumb-small">
                                                        <img src="../../../public/assets/images/profile/profile-35x35-5.jpg" alt="profile picture">
                                                    </figure>
                                                </a>
                                            </div>
                                            <!-- profile picture end -->

                                            <div class="unorder-list-info">
                                                <h3 class="list-title"><a href="#">Any one can join with us if you want</a></h3>
                                                <p class="list-subtitle">39 min ago</p>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- widget single item end -->

                            <!-- widget single item start -->
                            <div class="card widget-item">
                                <h4 class="widget-title">Advertizement</h4>
                                <div class="widget-body">
                                    <div class="add-thumb">
                                        <a href="#">
                                            <img src="../../../public/assets/images/banner/advertise.jpg" alt="advertisement">
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!-- widget single item end -->

                            <!-- widget single item start -->
                            <div class="card widget-item">
                                <h4 class="widget-title">Friends Zone</h4>
                                <div class="widget-body">
                                    <ul class="like-page-list-wrapper">
                                        <li class="unorder-list">
                                            <!-- profile picture end -->
                                            <div class="profile-thumb">
                                                <a href="#">
                                                    <figure class="profile-thumb-small">
                                                        <img src="../../../public/assets/images/profile/profile-35x35-1.jpg" alt="profile picture">
                                                    </figure>
                                                </a>
                                            </div>
                                            <!-- profile picture end -->

                                            <div class="unorder-list-info">
                                                <h3 class="list-title"><a href="#">arfim bolt</a></h3>
                                                <p class="list-subtitle"><a href="#">10 mutual</a></p>
                                            </div>
                                            <button class="like-button">
                                                <img class="heart" src="../../../public/assets/images/icons/heart.png" alt="">
                                                <img class="heart-color" src="../../../public/assets/images/icons/heart-color.png" alt="">
                                            </button>
                                        </li>
                                        <li class="unorder-list">
                                            <!-- profile picture end -->
                                            <div class="profile-thumb">
                                                <a href="#">
                                                    <figure class="profile-thumb-small">
                                                        <img src="../../../public/assets/images/profile/profile-35x35-2.jpg" alt="profile picture">
                                                    </figure>
                                                </a>
                                            </div>
                                            <!-- profile picture end -->

                                            <div class="unorder-list-info">
                                                <h3 class="list-title"><a href="#">marry wither</a></h3>
                                                <p class="list-subtitle"><a href="#">02 mutual</a></p>
                                            </div>
                                            <button class="like-button active">
                                                <img class="heart" src="../../../public/assets/images/icons/heart.png" alt="">
                                                <img class="heart-color" src="../../../public/assets/images/icons/heart-color.png" alt="">
                                            </button>
                                        </li>
                                        <li class="unorder-list">
                                            <!-- profile picture end -->
                                            <div class="profile-thumb">
                                                <a href="#">
                                                    <figure class="profile-thumb-small">
                                                        <img src="../../../public/assets/images/profile/profile-35x35-3.jpg" alt="profile picture">
                                                    </figure>
                                                </a>
                                            </div>
                                            <!-- profile picture end -->

                                            <div class="unorder-list-info">
                                                <h3 class="list-title"><a href="#">Rolin Theitar</a></h3>
                                                <p class="list-subtitle"><a href="#">drama</a></p>
                                            </div>
                                            <button class="like-button">
                                                <img class="heart" src="../../../public/assets/images/icons/heart.png" alt="">
                                                <img class="heart-color" src="../../../public/assets/images/icons/heart-color.png" alt="">
                                            </button>
                                        </li>
                                        <li class="unorder-list">
                                            <!-- profile picture end -->
                                            <div class="profile-thumb">
                                                <a href="#">
                                                    <figure class="profile-thumb-small">
                                                        <img src="../../../public/assets/images/profile/profile-35x35-4.jpg" alt="profile picture">
                                                    </figure>
                                                </a>
                                            </div>
                                            <!-- profile picture end -->

                                            <div class="unorder-list-info">
                                                <h3 class="list-title"><a href="#">Active Mind</a></h3>
                                                <p class="list-subtitle"><a href="#">fitness</a></p>
                                            </div>
                                            <button class="like-button">
                                                <img class="heart" src="../../../public/assets/images/icons/heart.png" alt="">
                                                <img class="heart-color" src="../../../public/assets/images/icons/heart-color.png" alt="">
                                            </button>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- widget single item end -->
                        </aside>
                    </div>
                </div>
            </div>
        </div>

    </main>
@endsection
