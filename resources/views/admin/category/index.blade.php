@extends('layouts.adminbase')

@section('title', 'Category list')
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
                <span class="panel-title ptn">Category List</span>
            </div>
            <div class="panel-body pn mt20">
                <div class="table-responsive">
                    <table class="table theme-warning tc-checkbox-1 table-style-2 btn-gradient-grey fs13">
                        <thead>
                        <tr class="">
                            <th class="">Id</th>
                            <th class="">Parent</th>
                            <th class="">Title</th>
                            <th class="">Image</th>
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
                                    getParentsTree($rs, $rs->title)}}</span>
                                </td>
                                <td class="">
                                    <span>{{$rs -> title}}</span>
                                </td>
                                <td class="">
                                    @if($rs -> image)
                                        <img src="{{Storage::url($rs -> image)}}" alt="{{$rs->title}}" style="height: 50px">
                                    @endif
                                </td>
                                <td class="">
                                    <div class="btn-group text-right">
                                        <button type="button" class="btn btn-info br2 btn-xs fs10 fw700 dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> Select action
                                            <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu" role="menu">
                                            <li>
                                                <a href={{route('admin.category.edit', ['category' => $rs -> id])}}>Edit</a>
                                            </li>
                                            <li>
                                                <form action="{{route('admin.category.destroy', ['category' => $rs -> id])}}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit">Delete</button>
                                                </form>
                                            </li>
                                            <li>
                                                <a href={{route('admin.category.show', ['category' => $rs -> id])}}>Show</a>
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
        <a href={{route('admin.category.create')}}>
            <button class="button btn-info">Add category</button>
        </a>
    </div>
@endsection
