@extends('layouts.frontbase')

@section('head')
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
@endsection

@section('content')
    <main>
        <div class="main-wrapper pt-80">
            <div class="container">
                <div class="row d-flex justify-content-center">

                    <div class="col-lg-8 order-1 order-lg-2">
                        <!-- post status start -->
                        <div class="card">
                            <!-- post title start -->
                            <div class="post-title d-flex align-items-center">
                                <!-- profile picture end -->
                                <div class="profile-thumb">
                                    <a href="{{route('userpanel.index', ['user'=>$data->user->id])}}">
                                        <figure class="profile-thumb-middle">
                                            <img
                                                src="{{$data->user->profile_photo_path}}" style="border-radius: 50%"
                                                alt="profile picture">
                                        </figure>
                                    </a>
                                </div>
                                <!-- profile picture end -->

                                <div class="posted-author">
                                    <h6 class="author"><a
                                            href="{{route('userpanel.index', ['user'=>$data->user->id])}}">{{$data -> user -> name}}</a>
                                    </h6>
                                    <span class="post-time">{{$data -> created_at}}</span>
                                    <span>{{$data -> category -> title}}</span>
                                </div>
                            </div>
                            <!-- post title start -->
                            <div class="post-content">
                                <p class="">
                                    {!! $data->detail !!}
                                </p>
                                @if($data -> image)
                                    <div class="photo-group">
                                        <div class="gallery-toggle">
                                            <div class="d-none product-thumb-large-view">
                                                <img src="{{$data->image}}" alt="Photo Gallery">
                                            </div>
                                            <div class="gallery-overlay">
                                                <img src="{{$data->image}}" alt="Photo Gallery">
                                                <div class="view-icon"></div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                <div class="post-meta">
                                    @include('home.like-count', ['model' => $data])
                                    <ul class="comment-share-meta ">
                                        <li class="">
                                            @include('home.like', ['model' => $data])
                                        </li>
                                        <li>
                                            <button class="post-comment">
                                                <i class="bi bi-chat-bubble"></i>
                                                <span>{{$data -> comments -> count('id')}}</span>
                                            </button>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- post status end -->
                    </div>
                    @auth
                        <div class="col-lg-8 order-1 order-lg-2">
                            @include('home.messages')
                            <div class="card card-small">
                                <div class="share-box-inner">
                                    <!-- profile picture end -->
                                    <div class="profile-thumb">
                                        <a href="{{route('userpanel.index', ['user'=>\Illuminate\Support\Facades\Auth::id()])}}">
                                            <figure class="profile-thumb-middle">
                                                <img
                                                    src="{{\Illuminate\Support\Facades\Auth::user()->profile_photo_path}}" style="border-radius: 50%"
                                                    alt="profile picture">
                                            </figure>
                                        </a>
                                    </div>
                                    <!-- profile picture end -->

                                    <!-- share content box start -->
                                    <div class="share-content-box w-100">
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
                                                    <h5 class="modal-title">Share Your Idea</h5>
                                                    <button type="button" class="close" data-bs-dismiss="modal"
                                                            aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form class="share-text-box" action="{{route('storecomment')}}"
                                                      method="post">
                                                    @csrf
                                                    <input type="number" name="post_id" hidden value="{{$data -> id}}">
                                                    <div class="modal-body custom-scroll">
                                                    <textarea name="comment" class="share-field-big custom-scroll"
                                                              placeholder="Say Something"></textarea>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="post-share-btn"
                                                                data-bs-dismiss="modal">cancel
                                                        </button>
                                                        @auth
                                                            <input type="text" name="user_id" hidden
                                                                   value="{{\Illuminate\Support\Facades\Auth::id()}}">
                                                            <button type="submit" class="post-share-btn">comment
                                                            </button>
                                                        @else
                                                            <a href="/login" class="post-share-btn">comment</a>
                                                        @endauth
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Modal end -->
                                </div>
                            </div>
                        </div>
                    @endauth
                    <div class="col-lg-7 order-1 order-lg-2 border-top border-5">
                        <!-- post status start -->
                        @foreach($comments as $rs)
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
                                        <span class="post-time">{{$rs->created_at}}</span>
                                    </div>
                                </div>
                                <!-- post title start -->
                                <div class="post-content">
                                    <div class="" style="color: inherit">
                                        <p class="post-desc">
                                            {{ $rs->comment }}
                                        </p>
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




