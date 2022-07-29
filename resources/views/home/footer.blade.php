<!-- footer area start -->
<footer class="d-none d-lg-block">
    <div class="footer-area reveal-footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="footer-wrapper">
                        <div class="footer-card position-relative">
                            <div class="friends-search">
                                <form class="search-box" action="{{route('searchuser')}}">
                                    <input name="query" type="text" placeholder="Search a User" class="search-field">
                                    <button type="submit" class="search-btn"><i class="flaticon-search"></i></button>
                                </form>
                            </div>
                            <div class="friend-search-list">
                                <div class="frnd-search-title">
                                    <p>search user</p>
                                    <button class="close-btn" data-close="friend-search-list"><i
                                            class="flaticon-cross-out"></i></button>
                                </div>
                            </div>
                        </div>
                        <div class="card card-small mb-0 active-profile-wrapper">
                            <div class="active-profiles-wrapper">
                                <div class="active-profile-carousel slick-row-20 slick-arrow-style">
                                @php
                                    $users = \App\Models\User::all();
                                @endphp

                                @foreach($users as $user)
                                    <!-- profile picture end -->
                                        <div class="single-slide">
                                            <div class="">
                                                <a href="{{route('userpanel.index', ['user'=>$user->id])}}">
                                                    <figure class="profile-thumb-small">
                                                        <img src="{{Storage::url($user->profile_photo_path)}}"
                                                             alt="profile picture">
                                                    </figure>
                                                </a>
                                            </div>
                                        </div>
                                        <!-- profile picture end -->
                                    @endforeach

                                </div>
                            </div>
                        </div>
                        <div class="position-relative">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- footer area end -->
<!-- MOBILE footer area start -->
<footer class="d-block d-lg-none">
    <div class="footer-area reveal-footer">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="mobile-footer-inner d-flex">
                        <div class="mobile-frnd-search">
                            <button class="search-toggle-btn"><i class="flaticon-search"></i></button>
                        </div>
                        <div class="mob-frnd-search-inner">
                            <form class="mob-frnd-search-box d-flex">
                                <input type="text" placeholder="Search Your Friends" class="mob-frnd-search-field">
                            </form>
                        </div>
                        <div class="card card-small mb-0 active-profile-mob-wrapper">
                            <div class="active-profiles-mob-wrapper slick-row-10">
                                <div class="active-profile-mobile">
                                @php
                                    $users = \App\Models\User::all();
                                @endphp

                                @foreach($users as $user)
                                    <!-- profile picture end -->
                                        <div class="single-slide">
                                            <div class="">
                                                <a href="{{route('userpanel.index', ['user'=>$user->id])}}">
                                                    <figure class="profile-thumb-small">
                                                        <img src="{{Storage::url($user->profile_photo_path)}}"
                                                             alt="profile picture">
                                                    </figure>
                                                </a>
                                            </div>
                                        </div>
                                        <!-- profile picture end -->
                                    @endforeach

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- MOBILE footer area end -->

<!-- JS
============================================ -->
<!-- Modernizer JS -->
<script src="{{asset('assets')}}/js/vendor/modernizr-3.6.0.min.js"></script>
<!-- jQuery JS -->
<script src="{{asset('assets')}}/js/vendor/jquery-3.6.0.min.js"></script>
<!-- Bootstrap JS -->
<script src="{{asset('assets')}}/js/vendor/bootstrap.bundle.min.js"></script>
<!-- Slick Slider JS -->
<script src="{{asset('assets')}}/js/plugins/slick.min.js"></script>
<!-- nice select JS -->
<script src="{{asset('assets')}}/js/plugins/nice-select.min.js"></script>
<!-- audio video player JS -->
<script src="{{asset('assets')}}/js/plugins/plyr.min.js"></script>
<!-- perfect scrollbar js -->
<script src="{{asset('assets')}}/js/plugins/perfect-scrollbar.min.js"></script>
<!-- light gallery js -->
<script src="{{asset('assets')}}/js/plugins/lightgallery-all.min.js"></script>
<!-- image loaded js -->
<script src="{{asset('assets')}}/js/plugins/imagesloaded.pkgd.min.js"></script>
<!-- isotope filter js -->
<script src="{{asset('assets')}}/js/plugins/isotope.pkgd.min.js"></script>
<!-- Main JS -->
<script src="{{asset('assets')}}/js/main.js"></script>
