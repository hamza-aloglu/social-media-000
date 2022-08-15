@extends('layouts.frontbase')


@section('content')

    <main>
        <div class="main-wrapper pt-80">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 order-2 order-lg-1">
                        <aside class="widget-area">
                        @auth
                            <!-- widget single item start -->
                                <div class="card card-profile widget-item p-0">
                                    <div class="profile-banner">
                                        <figure class="profile-banner-small">
                                            <div class="profile-thumb-1">
                                                <img
                                                    src="{{\Illuminate\Support\Facades\Auth::user()->background_photo_path}}"
                                                    alt="">
                                            </div>

                                            <div href="profile.html" class="profile-thumb-2">
                                                <img
                                                    src="{{\Illuminate\Support\Facades\Auth::user()->profile_photo_path}}" style="border-radius: 50%"
                                                    alt="">
                                            </div>
                                        </figure>
                                        <div class="profile-desc text-center">
                                            <h6 class="author">
                                                <div>{{\Illuminate\Support\Facades\Auth::user()->name}}</div>
                                            </h6>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A assumenda
                                                culpa eos laborum magni repellendus?</p>
                                        </div>

                                    </div>
                                </div>
                                <!-- widget single item start -->
                            @endauth

                        </aside>

                    </div>

                    <div class="col-lg-6 order-1 order-lg-2">
                        <!-- share box start -->
                        <div class="card card-small">
                            <div class="share-box-inner">
                                <!-- share content box start -->
                                <div class="share-content-box w-100">
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <form class="share-text-box">
                                        <textarea name="share" class="share-text-field" aria-disabled="true"
                                                  placeholder="Say Something" data-bs-toggle="modal"
                                                  data-bs-target="#textbox" id="email"></textarea>
                                        <div data-bs-toggle="modal" data-bs-target="#textbox" class="btn-share">share
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
                                                    @auth
                                                        <input hidden type="text" name="user_id"
                                                               value="{{\Illuminate\Support\Facades\Auth::id()}}">
                                                    @endauth


                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="post-share-btn"
                                                            data-bs-dismiss="modal">cancel
                                                    </button>
                                                    @auth
                                                        <button type="submit" class="post-share-btn">post</button>
                                                    @else
                                                        <a href="/login" class="post-share-btn">post</a>
                                                    @endauth
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- Modal end -->
                            </div>
                        </div>
                        <!-- share box end -->

                        <!-- post status start -->
                        @foreach($postlist1 as $rs)
                            <div class="card">
                                <!-- post title start -->
                                <div class="post-title d-flex align-items-center">
                                    <!-- profile picture end -->
                                    <div class="profile-thumb">
                                        <a href="{{route('userpanel.index', ['user'=>$rs->user->id])}}">
                                            <figure class="profile-thumb-middle">
                                                <img
                                                    src="{{$rs->user->profile_photo_path}}" style="border-radius: 50%"
                                                    alt="profile picture">
                                            </figure>
                                        </a>
                                    </div>
                                    <!-- profile picture end -->
                                    <div class="posted-author">
                                        <h6 class="author"><a
                                                href="{{route('userpanel.index', ['user'=>$rs->user->id])}}">{{$rs->user->name}}</a>
                                        </h6>
                                        <span class="post-time">{{$rs->created_at->format('H:m:s - F')}}</span>
                                    </div>
                                </div>
                                <!-- post title start -->
                                <div class="post-content">
                                    <a class="" href="{{route('post', ['post'=>$rs->id])}}" style="color: inherit">
                                        <p class="post-desc">
                                            {!! $rs->detail !!}
                                        </p>
                                    </a>
                                    @if($rs -> image)
                                        <div class="post-thumb-gallery img-gallery">
                                            <figure class="post-thumb">
                                                <a class="" href="{{route('post', ['post'=>$rs->id])}}">
                                                    <img src="{{$rs->image}}" alt="post image">
                                                </a>
                                            </figure>
                                        </div>
                                    @endif
                                    <div class="post-meta">
                                        @include('home.like-count', ['model' => $rs])
                                        <ul class="comment-share-meta ">
                                            <li class="">
                                                @include('home.like', ['model' => $rs])
                                            </li>
                                            <li>
                                                <a href="{{route('post', ['post'=>$rs->id])}}" class="post-comment">
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
                        @auth
                            <!-- widget single item start -->
                                <div class="card widget-item">
                                    <h4 class="widget-title">Friends</h4>
                                    <div class="widget-body">
                                        <ul class="like-page-list-wrapper">
                                            @foreach(\Illuminate\Support\Facades\Auth::user()->acceptedFriendsTo as $friend)
                                                <li class="unorder-list">
                                                    <!-- profile picture end -->
                                                    <div class="profile-thumb">
                                                        <a href="{{route('userpanel.index', ['user'=>$friend->id])}}">
                                                            <figure class="profile-thumb-small">
                                                                <img
                                                                    src="{{$friend->profile_photo_path}}" style="border-radius: 50%"
                                                                    alt="profile picture">
                                                            </figure>
                                                        </a>
                                                    </div>
                                                    <!-- profile picture end -->

                                                    <div class="unorder-list-info">
                                                        <h3 class="list-title">
                                                            <div>{{$friend->name}}</div>
                                                        </h3>
                                                        <p class="list-subtitle"></p>
                                                    </div>
                                                </li>
                                            @endforeach
                                            @foreach(\Illuminate\Support\Facades\Auth::user()->acceptedFriendsFrom as $friend)
                                                <li class="unorder-list">
                                                    <!-- profile picture end -->
                                                    <div class="profile-thumb">
                                                        <a href="{{route('userpanel.index', ['user'=>$friend->id])}}">
                                                            <figure class="profile-thumb-small">
                                                                <img
                                                                    src="{{$friend->profile_photo_path}}" style="border-radius: 50%"
                                                                    alt="profile picture">
                                                            </figure>
                                                        </a>
                                                    </div>
                                                    <!-- profile picture end -->

                                                    <div class="unorder-list-info">
                                                        <h3 class="list-title">
                                                            <div>{{$friend->name}}</div>
                                                        </h3>
                                                        <p class="list-subtitle"></p>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                                <!-- widget single item end -->
                            @endauth
                        </aside>
                    </div>
                </div>
            </div>
        </div>

    </main>
@endsection




