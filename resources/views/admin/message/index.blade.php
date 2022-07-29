@extends('layouts.adminbase')


@section('title', 'message list')
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
                <span class="panel-title ptn">message List</span>
            </div>
            <div class="panel-body pn mt20">
                <div class="table-responsive">
                    <table class="table theme-warning tc-checkbox-1 table-style-2 btn-gradient-grey fs13">
                        <thead>
                        <tr class="">
                            <th class="">Id</th>
                            <th class="">Name</th>
                            <th class="">Phone</th>
                            <th class="">Email</th>
                            <th class="">Subject</th>
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
                                    <span>{{$rs -> name}}</span>
                                </td>
                                <td class="">
                                    <span>{{$rs -> phone}}</span>
                                </td>
                                <td class="">
                                    <span>{{$rs -> email}}</span>
                                </td>
                                <td class="">
                                    <span>{{$rs -> subject}}</span>
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
                                                <form action="{{route('admin.message.destroy', ['message' => $rs -> id])}}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button style="background-color: black; color: white" type="submit">Destroy</button>
                                                </form>
                                            </li>
                                            <li>
                                                <a href="{{route('admin.message.show', ['message' => $rs -> id])}}"
                                                   onclick="return !window.open(this.href, '', 'top=50 left=100 width=1100, height = 700')">
                                                            show
                                                </a>
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
