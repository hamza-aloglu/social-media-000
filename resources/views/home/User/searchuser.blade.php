@extends('layouts.frontbase')

@section('title', 'Adda social media')
@section('head')
    <style>
        .cardd {
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
            transition: 0.3s;
            width: 30%;
            margin: 50px auto;
        }

        .cardd:hover {
            box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
        }

        .containerr {
            padding: 2px 16px;
        }
    </style>
@endsection

@section('content')

    <main>
        <div class="main-wrapper pt-80">
            <div class="container">
                <div class="row">
                    <div class="md-12">
                        @foreach($users as $user)

                            <div class="cardd">
                                <a href="{{route('userpanel.index', ['uid'=>$user->id])}}">
                                    <img src="{{\Illuminate\Support\Facades\Storage::url($user->profile_picture)}}" alt="Avatar" style="width:100px; height: 75px">
                                    <b class="fs-6">{{$user->name}}</b>
                                </a>
                                <div class="containerr">
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

    </main>




@endsection
