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
                                        <a href="{{route('userpanel.index', ['user'=>$rs->user->id])}}">
                                            <figure class="profile-thumb-middle">
                                                <img src="{{$rs->user->profile_photo_path}}" style="border-radius: 50%" alt="profile picture">
                                            </figure>
                                        </a>
                                    </div>
                                    <!-- profile picture end -->

                                    <div class="posted-author">
                                        <h6 class="author"><a href="{{route('userpanel.index', ['user'=>$rs->user->id])}}">{{$rs->user->name}}</a></h6>
                                        <span class="post-time">{{$rs->created_at}}</span>
                                        <span>{{$category -> title}}</span>
                                    </div>
                                </div>
                                <!-- post title start -->
                                <div class="post-content">
                                    <p class="">
                                        {!! $rs->detail !!}
                                    </p>
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
                        <!-- post status end -->

                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </main>
@endsection




