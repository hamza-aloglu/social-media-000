@extends('layouts.adminbase')

@section('title', 'friendship list')
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
                <span class="panel-title ptn">user list</span>
            </div>
            <div class="panel-body pn mt20">
                <div class="table-responsive">
                    <table class="table allcp-form theme-warning tc-checkbox-1 table-style-2 btn-gradient-grey fs13">
                        <thead>
                        <tr class="">
                            <th class="">Id</th>
                            <th class="">User-1</th>
                            <th class="">User-2</th>
                            <th class="">Accepted</th>
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
                                    <span>{{$rs -> user->name}}</span>
                                </td>
                                <td class="">
                                    <span>{{$rs -> friend->name}}</span>
                                </td>
                                <td class="">
                                    @if($rs->accepted)
                                        <span>accepted</span>
                                    @else
                                        <span>not accepted by user-2</span>
                                    @endif
                                </td>
                                <td class="">
                                    <div class="btn-group text-right">
                                        <button type="button" class="btn btn-info br2 btn-xs fs10 fw700 dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> Select action
                                            <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu" role="menu">
                                            <li>
                                                <a href={{route('admin.friend.destroy', ['id' => $rs -> id])}}>Destroy</a>
                                            </li>
                                            <li>
                                                <a href="{{route('admin.friend.show', ['id' => $rs -> id])}}"
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