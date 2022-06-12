@extends('layouts.frontbase')

@section('title', $category -> title)
@section('keywords', $category -> keywords)
@section('description', $category -> description)

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
                                        <a href="{{route('userpanel.index', ['uid'=>$rs->user->id])}}">
                                            <figure class="profile-thumb-middle">
                                                <img src="{{\Illuminate\Support\Facades\Storage::url($rs->user->profile_picture)}}" alt="profile picture">
                                            </figure>
                                        </a>
                                    </div>
                                    <!-- profile picture end -->

                                    <div class="posted-author">
                                        <h6 class="author"><a href="{{route('userpanel.index', ['uid'=>$rs->user->id])}}">{{$rs->user->name}}</a></h6>
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




