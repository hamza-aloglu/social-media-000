@extends('layouts.adminbase')

@section('title', 'show post')
@section('head')
    <style>
        * {

        }
        #table {
            width: 100%;
        }
        .table-row {
            display: inline-block;
            margin-bottom: 5px;
            background-color: rgba(174, 191, 179, 0.6);
            padding: 8px;
            border: 1px solid black;
            border-radius: 25px;
        }
        .table-header {
            display: inline-block;
            font-size: 15px;
            margin: 0px 5px;
            font-family: Serif;
            font-weight: bolder;
            color: rgb(132, 168, 227);
        }

        .table-content {
            display: inline-block;
            font-size: 13px;
            font-style: italic;
            margin: 0px;
        }

    </style>
@endsection
@section('topbar')
    @include('admin.topbar')
@endsection

@section('body-class')

@endsection

@section('section-content-class')
    table-layout animated fadeIn
@endsection

@section('content')
            <!-- Content -->

            <div id="table">
                <div class="table-row">
                    <div class="table-header">ID:</div>
                    <div class="table-content">{{$data -> id}} </div>
                </div>
                <div class="table-row">
                    <div class="table-header">category id:</div>
                    <div class="table-content">{{\App\Http\Controllers\AdminPanel\CategoryController::
                        getParentsTree($data -> category, $data->category->title)}}</div>
                </div>
                <div class="table-row">
                    <div class="table-header">Detail:</div>
                    <div class="table-content">{!! $data -> detail !!}</div>
                </div>

                <div class="table-row">
                    <div class="table-header">Image:</div>
                    @if($data -> image)
                        <img src="{{Storage::url($data -> image)}}" alt="{{$data->title}}" style="height: 200px">
                    @endif
                </div>
                <div class="table-row">
                    <div class="table-header">Created at:</div>
                    <div class="table-content">{{$data -> created_at}}</div>
                </div>
                <div class="table-row">
                    <div class="table-header">Updated at:</div>
                    <div class="table-content">{{$data -> updated_at}}</div>
                </div>
                <br>
                <footer id="content-footer" class="footer-light" style="margin-top: 100px">
                    <div class="row">
                        <div class="col-xs-12 text-center">
                            &copy; 2016 All Rights Reserved. <a href="#">Terms of use</a> and <a href="#">Privacy Policy</a>
                        </div>
                        <a href="#content" class="footer-return-top">
                            <span class="fa fa-angle-up"></span>
                        </a>
                    </div>
                </footer>
            </div>

@endsection
