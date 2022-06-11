@extends('layouts.frontbase')

@section('title','posts of '. $user->name)


@section('content')
    <main>

        <div class="main-wrapper">
            <div class="profile-banner-large bg-img" data-bg="{{Storage::url($user->background_picture)}}"></div>
            <div class="profile-menu-area bg-white">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-3 col-md-3">
                            <div class="profile-picture-box">
                                <figure class="profile-picture">
                                    <div href="profile.html">
                                        <img style="height: 125px; width: 125px;"
                                             src="{{Storage::url($user->profile_picture)}}" alt="profile picture">
                                    </div>
                                </figure>
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-6 offset-lg-1">
                            <div class="profile-menu-wrapper">
                                <div class="main-menu-inner header-top-navigation">
                                    <nav>
                                        <ul class="main-menu">
                                            <li class="active"><a href="#">timeline</a></li>
                                            <li>
                                                <a href="{{route('userpanel.comment', ['uid'=>$user->id])}}">comments</a>
                                            </li>
                                            @if(!$visitorFlag)
                                                <li><a href="{{route('userpanel.friend')}}">friends</a></li>
                                                <li><a href="{{route('userpanel.edit')}}">edit profile</a></li>
                                            @elseif(\Illuminate\Support\Facades\Auth::check() && !$isRequested)

                                                <li style="float: right"><a
                                                        href="{{route('userpanel.friendrequest', ['fid'=>$user->id])}}"
                                                        class="btn btn-primary ">
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
                                <h4 class="widget-title">{{$user -> name}}</h4>
                                <div class="widget-body">
                                    <div class="about-author">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci blanditiis
                                            tempora unde?</p>
                                        <ul class="author-into-list">
                                            <li><a href="#"><i class="bi bi-office-bag"></i>Web Developer</a></li>
                                            <li><a href="#"><i class="bi bi-home"></i>Melbourne, Australia</a></li>
                                            <li><a href="#"><i class="bi bi-location-pointer"></i>Pulshar, Melbourne</a>
                                            </li>
                                            <li><a href="#"><i class="bi bi-heart-beat"></i>Travel, Swimming</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- widget single item end -->
                        </aside>
                    </div>

                    <div class="col-lg-9 order-1 order-lg-2">
                    @if(!$visitorFlag)
                        <!-- share box start -->
                            <div class="card card-small">
                                <div class="share-box-inner">
                                    <!-- share content box start -->
                                    <div class="share-content-box w-100">
                                        <form class="share-text-box">
                                            <textarea name="share" class="share-text-field" aria-disabled="true"
                                                      placeholder="Say Something" data-bs-toggle="modal"
                                                      data-bs-target="#textbox" id="email"></textarea>
                                            <div data-bs-toggle="modal" data-bs-target="#textbox" class="btn-share">
                                                share
                                            </div>
                                        </form>
                                    </div>
                                    <!-- share content box end -->
                                    <!-- Modal start -->
                                    <div class="modal fade" id="textbox" aria-labelledby="textbox">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Share Your Mood</h5>
                                                    <button type="button" class="close" data-bs-dismiss="modal"
                                                            aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form class="share-text-box" action="{{route('storepost')}}"
                                                      enctype="multipart/form-data" method="post">
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
                                                        <input type="text" class="gui-input" id="uploader2"
                                                               placeholder="Select File">
                                                        <input hidden type="text" name="user_id"
                                                               value="{{$user->id}}">
                                                        <input hidden type="text" name="title"
                                                               value="{{$user->name}}">


                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="post-share-btn"
                                                                data-bs-dismiss="modal">cancel
                                                        </button>
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
                                                <img
                                                    src="{{\Illuminate\Support\Facades\Storage::url($user->profile_picture)}}"
                                                    alt="profile picture">
                                            </figure>
                                        </a>
                                    </div>
                                    <!-- profile picture end -->

                                    <div class="posted-author">
                                        <h6 class="author"><a href="profile.html">{{$rs->user->name}}</a></h6>
                                        <span class="post-time">{{$rs->created_at}}</span>
                                    </div>
                                    @if(!$visitorFlag)
                                        <div class="post-settings-bar">
                                            <span></span>
                                            <span></span>
                                            <span></span>
                                            <div class="post-settings arrow-shape">
                                                <ul>
                                                    <li><a href="{{route('userpanel.postdestroy', ['pid'=>$rs->id])}}">Delete
                                                            post</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    @endif
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
                                        <button class="post-meta-like">
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
                </div>
            </div>
        </div>

    </main>
@endsection
