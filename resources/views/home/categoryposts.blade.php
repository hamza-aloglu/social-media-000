@extends('layouts.frontbase')

@section('title', $category -> title)

@section('head')
@endsection

@section('content')
    <main>
        <div class="main-wrapper pt-80">
            <div class="container">
                <div class="row">
                    @foreach($posts as $rs)
                        <div class="col-lg-12 order-1 order-lg-2">
                        <!-- post status start -->
                            <div class="card">
                                <!-- post title start -->
                                <div class="post-title d-flex align-items-center">
                                    <!-- profile picture end -->
                                    <div class="profile-thumb">
                                        <a href="#">
                                            <figure class="profile-thumb-middle">
                                                <img src="{{asset('assets')}}/images/profile/profile-small-1.jpg" alt="profile picture">
                                            </figure>
                                        </a>
                                    </div>
                                    <!-- profile picture end -->

                                    <div class="posted-author">
                                        <h6 class="author"><a href="profile.html">merry watson</a></h6>
                                        <span class="post-time">20 min ago</span>
                                        <span>{{$category -> title}}</span>
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
                                    <p class="post-desc bg-light p-2">
                                        {{ $rs->description }}
                                    </p>
                                    <p class="">
                                        {!! $rs->detail !!}
                                    </p>
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
                                        <ul class="comment-share-meta">
                                            <li>
                                                <button class="post-comment">
                                                    <i class="bi bi-chat-bubble"></i>
                                                    <span>41</span>
                                                </button>
                                            </li>
                                            <li>
                                                <button class="post-share">
                                                    <i class="bi bi-share"></i>
                                                    <span>07</span>
                                                </button>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        <!-- post status end -->

                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </main>
@endsection




