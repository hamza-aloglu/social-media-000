<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

@foreach($children as $subcategory)
<nav>
    <li class="notification-trigger">
        <a class="msg-trigger-btn" href="#{{$subcategory->id}}">
            <p class="text-success fw-bold">subcategories</p>
        </a>
        <div class="message-dropdown" id="{{$subcategory->id}}">
            <div class="dropdown-title">
                <p class="recent-msg">Categories</p>
                <button>
                    <i class="flaticon-settings"></i>
                </button>
            </div>
            <ul class="dropdown-msg-list">

                <li class="msg-list-item d-flex justify-content-between">
                        <!-- profile picture end -->
                        <div class="profile-thumb">
                            <figure class="profile-thumb-middle">
                                @if($subcategory -> image)
                                    <img src="{{\Illuminate\Support\Facades\Storage::url($subcategory->image)}}" alt="profile picture">
                                @else
                                <img src="{{asset('assets')}}/images/profile/profile-small-3.jpg" alt="profile picture">
                                @endif
                            </figure>
                        </div>
                        <!-- profile picture end -->

                        <!-- message content start -->
                        <div class="msg-content notification-content">
                            <a href="{{route('postcategory', ['id' => $subcategory -> id, 'slug' => $rs -> title])}}">{{$subcategory -> title}}</a>,
                            <p>{{$subcategory -> keywords}}</p>

                            @if(count($subcategory->children))
                                <p>
                                    @include('home.categorytree', ['children'=>$subcategory->children])
                                </p>
                            @endif
                        </div>
                        <!-- message content end -->

                        <!-- message time start -->
                        <div class="msg-time">
                            <p>{{$subcategory -> created_at}}</p>
                        </div>
                        <!-- message time end -->
                    </li>
            </ul>
            <div class="msg-dropdown-footer">
                <button>See all in messenger</button>
                <button>Mark All as Read</button>
            </div>
        </div>
    </li>
</nav>
@endforeach

