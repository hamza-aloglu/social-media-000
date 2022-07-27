@extends('layouts.frontbase')

@section('title','posts of '. $user->name)


@section('content')
    <main>

        <div class="main-wrapper">
            <div class="profile-banner-large bg-img"
                 data-bg="{{\Illuminate\Support\Facades\Storage::url($user->background_picture)}}">
            </div>
            <div class="profile-menu-area bg-white">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6 col-md-6 offset-lg-1">
                            <div class="profile-menu-wrapper">
                                <div class="main-menu-inner header-top-navigation">
                                    <nav>
                                        <ul class="main-menu">
                                            <li><a href="{{route('userpanel.index', ['user'=>$user->id])}}">timeline</a>
                                            </li>
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

                    <div class="col-12 order-1 order-lg-2">
                        <div class="table-responsive">
                            <table
                                class="table allcp-form theme-warning tc-checkbox-1 table-style-2 btn-gradient-grey fs13">
                                <thead>
                                <tr class="">
                                    <th class="">Id</th>
                                    <th class="">Post</th>
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
                                                    <a href={{route('userpanel.commentdestroy', ['comment' => $rs -> id])}}>Destroy</a>
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
