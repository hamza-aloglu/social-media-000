@extends('layouts.frontbase')

@section('title', $data -> title)

@section('head')
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
                                        <span>{{$data -> category -> title}}</span>
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
                                        {{ $data->description }}
                                    </p>
                                    <p class="">
                                        {!! $data->detail !!}
                                    </p>
                                    @if($data -> image)
                                        <div class="photo-group">
                                            <div class="gallery-toggle">
                                                <div class="d-none product-thumb-large-view">
                                                    <img src="{{Storage::url($data->image)}}" alt="Photo Gallery">
                                                    @foreach($images as $img)
                                                    <img src="{{Storage::url($img->image)}}" alt="Photo Gallery">
                                                    @endforeach
                                                </div>
                                                <div class="gallery-overlay">
                                                    <img src="{{Storage::url($data->image)}}" alt="Photo Gallery">
                                                    <div class="view-icon"></div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    <div class="post-meta">
                                        <button class="post-meta-like">
                                            <i class="bi bi-heart-beat"></i>
                                            <span>{{$data -> likes}}</span>
                                            <strong>201</strong>
                                        </button>
                                        <ul class="comment-share-meta">
                                            <li>
                                                <button class="post-comment">
                                                    <i class="bi bi-chat-bubble"></i>
                                                    <span>{{$data -> comments -> count('id')}}</span>
                                                </button>
                                            </li>
                                            <li>
                                                <!--
                                                $average = $data -> comment -> average('rate')
                                                <button class="post-share">
                                                    <i class="bi bi-share"></i>
                                                    <span>number_format($average, 2)</span>
                                                </button>
                                                -->
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        <!-- post status end -->
                    </div>

                    <div class="col-lg-8 order-1 order-lg-2">
                        @include('home.messages')
                        <div class="card card-small">
                            <div class="share-box-inner">
                                <!-- profile picture end -->
                                <div class="profile-thumb">
                                    <a href="#">
                                        <figure class="profile-thumb-middle">
                                            <img src="{{asset('assets')}}/images/profile/profile-small-37.jpg"
                                                 alt="profile picture">
                                        </figure>
                                    </a>
                                </div>
                                <!-- profile picture end -->

                                <!-- share content box start -->
                                <div class="share-content-box w-100">
                                    <form class="share-text-box" action="{{route('storecomment')}}" method="post">
                                        @csrf
                                        <input type="number" name="post_id" hidden value="{{$data -> id}}">
                                        <textarea name="comment" class="share-text-field" aria-disabled="true"
                                                  placeholder="Say Something..." data-bs-toggle="modal"
                                                  data-bs-target="#textbox" id="email"></textarea>
                                        @auth
                                            <button class="btn-share" type="submit">comment</button>
                                        @else
                                            <a href="/login" class="btn-share">comment</a>
                                        @endauth
                                    </form>
                                </div>
                                <!-- share content box end -->

                                <!-- Modal start -->
                                <div class="modal fade" id="textbox" aria-labelledby="textbox">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Share Your Idea</h5>
                                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form class="share-text-box" action="{{route('storecomment')}}" method="post">
                                                @csrf
                                                <input type="number" name="post_id" hidden value="{{$data -> id}}">
                                                <div class="modal-body custom-scroll">
                                                    <textarea name="comment" class="share-field-big custom-scroll"
                                                              placeholder="Say Something"></textarea>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="post-share-btn" data-bs-dismiss="modal">cancel</button>
                                                    @auth
                                                        <button type="submit" class="post-share-btn">comment</button>
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

                    <div class="col-lg-7 order-1 order-lg-2 border-top border-5">
                        <!-- post status start -->
                        @foreach($comments as $rs)
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
                                                <li><button>edit comment</button></li>
                                                <li><button>embed adda</button></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- post title start -->
                                <div class="post-content">
                                    <a class="" href="{{route('post', ['id'=>$rs->id])}}" style="color: inherit">
                                        <p class="post-desc">
                                            {{ $rs->comment }}
                                        </p>
                                    </a>
                                    <div class="post-meta">
                                        <button class="post-meta-like">
                                            <i class="bi bi-heart-beat"></i>
                                            <span>0</span>
                                            <strong>201</strong>
                                        </button>
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




