@extends('layouts.frontbase')

@section('title', 'edit profile of '. \Illuminate\Support\Facades\Auth::user()->name)


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
                                            <li class="active"><a href="{{route('userpanel.index', ['uid'=>\Illuminate\Support\Facades\Auth::id()])}}">timeline</a></li>
                                            <li><a href="{{route('userpanel.comment', ['uid'=>\Illuminate\Support\Facades\Auth::id()])}}">comments</a></li>
                                            <li><a href="{{route('userpanel.friend')}}">friends</a></li>
                                            <li><a href="#">edit profile</a></li>
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

                    <div class="col-12">
                        @include('profile.show')
                    </div>

                </div>
            </div>
        </div>

    </main>
@endsection
