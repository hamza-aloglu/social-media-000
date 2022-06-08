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
                        <div class="col-lg-6 col-md-6 offset-lg-1">
                            <div class="profile-menu-wrapper">
                                <div class="main-menu-inner header-top-navigation">
                                    <nav>
                                        <ul class="main-menu">
                                            <li ><a href="{{route('userpanel.index', ['uid'=>$user->id])}}">timeline</a></li>
                                            <li class="active"><a href="#">comments</a></li>
                                            @if(!$visitorFlag)
                                                <li><a href="{{route('userpanel.friend')}}">friends</a></li>
                                                <li><a href="{{route('userpanel.edit')}}">edit profile</a></li>
                                            @endif
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

                    <div class="col-lg-9 order-1 order-lg-2">
                        <div class="table-responsive">
                            <table class="table allcp-form theme-warning tc-checkbox-1 table-style-2 btn-gradient-grey fs13">
                                <thead>
                                <tr class="">
                                    <th class="">Id</th>
                                    <th class="">Post id</th>
                                    <th class="">Comment</th>
                                    <th class="">Rate</th>
                                    <th class="">Status</th>
                                    <th class="">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($comments as $rs)
                                    <tr>
                                        <td class="">
                                            <span>{{$rs -> id}}</span>
                                        </td>
                                        <td class="">
                                    <span><a href="{{route('post', ['id'=>$rs->post_id])}}">
                                        {{$rs -> post -> title}}</a> </span>
                                        </td>
                                        <td class="">
                                            <span>{{$rs -> comment}}</span>
                                        </td>
                                        <td class="">
                                            <span>{{$rs -> rate}}</span>
                                        </td>
                                        <td class="">
                                            <span class="label label-info">{{$rs->status}}</span>
                                        </td>
                                        @if(!$visitorFlag)
                                        <td class="">
                                            <div class="btn-group text-right">
                                                <a href={{route('userpanel.commentdestroy', ['id' => $rs -> id])}}>Destroy</a>
                                            </div>
                                        </td>
                                        @endif
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </main>
@endsection
