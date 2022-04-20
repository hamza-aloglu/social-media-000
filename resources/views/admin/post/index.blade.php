@extends('layouts.adminbase')

@section('title', 'post list')
@section('topbar')
    @include('admin.topbar')
@endsection

@section('body-class')
    dashboard-page with-customizer
@endsection

@section('section-content-class')
    table-layout animated fadeIn
@endsection

@section('content')
    <div class="col-xs-12">
        <div class="panel">
            <div class="panel-heading ">
                <span class="panel-title ptn">post List</span>
            </div>
            <div class="panel-body pn mt20">
                <div class="table-responsive">
                    <table class="table allcp-form theme-warning tc-checkbox-1 table-style-2 btn-gradient-grey fs13">
                        <thead>
                        <tr class="">
                            <th class="">Id</th>
                            <th class="">Category</th>
                            <th class="">Title</th>
                            <th class="">Likes</th>
                            <th class="">Image</th>
                            <th class="">Image Gallery</th>
                            <th class="">Status</th>
                            <th class="">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $rs)
                            <tr>
                                <td class="">
                                    <span>{{$rs -> id}}</span>
                                </td>
                                <td class="">
                                    <span>{{\App\Http\Controllers\AdminPanel\CategoryController::
                                    getParentsTree($rs -> category, $rs->category->title)}}</span>
                                </td>
                                <td class="">
                                    <span>{{$rs -> title}}</span>
                                </td>
                                <td class="">
                                    <span>{{$rs -> likes}}</span>
                                </td>
                                <td class="">
                                    @if($rs -> image)
                                        <img src="{{Storage::url($rs -> image)}}" alt="{{$rs->title}}" style="height: 50px">
                                    @endif
                                </td>
                                <td class="" style="">
                                    <a href="{{route('admin.image.index', ['pid' => $rs -> id])}}"
                                    onclick="return !window.open(this.href, '', 'top=50 left=100 width=1100, height = 700')">
                                        <img src="{{asset('assets-admin')}}/img/gallery-icon.jpg" alt="gallery icon" style="height: 50px;">
                                    </a>
                                </td>
                                <td class="">
                                    <span class="label label-info">{{$rs->status}}</span>
                                </td>
                                <td class="">
                                    <div class="btn-group text-right">
                                        <button type="button" class="btn btn-info br2 btn-xs fs10 fw700 dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> Select action
                                            <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu" role="menu">
                                            <li>
                                                <a href={{route('admin.post.edit', ['id' => $rs -> id])}}>Edit</a>
                                            </li>
                                            <li>
                                                <a href={{route('admin.post.delete', ['id' => $rs -> id])}}>Delete</a>
                                            </li>
                                            <li>
                                                <a href={{route('admin.post.show', ['id' => $rs -> id])}}>Show</a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>


        </div>
        <a href={{route('admin.post.create')}}>
            <button class="button btn-info">Add post</button>
        </a>
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
