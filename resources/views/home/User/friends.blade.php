@extends('layouts.frontbase')

@section('title','friends of '. \Illuminate\Support\Facades\Auth::user()->name)


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
                        <div class="col-lg-6 col-md-6 offset-lg-1">
                            <div class="profile-menu-wrapper">
                                <div class="main-menu-inner header-top-navigation">
                                    <nav>
                                        <ul class="main-menu">
                                            <li><a href="{{route('userpanel.index')}}">timeline</a></li>
                                            <li><a href="{{route('userpanel.comment')}}">comments</a></li>
                                            <li class=""><a href="#">friends</a></li>
                                            <li><a href="{{route('userpanel.edit')}}">edit profile</a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- photo section start -->
            <div class="friends-section mt-20">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="content-box friends-zone">
                                <div class="row mt--20 friends-list">
                                    @foreach(\Illuminate\Support\Facades\Auth::user()->friends as $friend)
                                        <div class="col-lg-3 col-sm-6 recently request">
                                        <div class="friend-list-view">
                                            <!-- profile picture end -->
                                            <div class="profile-thumb">
                                                <a href="#">
                                                    <figure class="profile-thumb-middle">
                                                        <img src="../../../public/assets/images/profile/profile-small-1.jpg" alt="profile picture">
                                                    </figure>
                                                </a>
                                            </div>
                                            <!-- profile picture end -->

                                            <div class="posted-author">
                                                <h6 class="author"><a href="profile.html">{{$friend->name}}</a></h6>
                                                <button class="add-frnd">add friend</button>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- photo section end -->
        </div>
        </div>

    </main>
@endsection
