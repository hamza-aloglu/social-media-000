@extends('layouts.adminbase')

@section('title', 'create category')
@section('head')
    <style>
        input:not([type=file]) {
            border: 1px solid black;
            border-radius: 5px;
        }
        form {
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
    <!-- Basic -->

    <h3 style="background-color: rgba(50, 17, 237, 0.8); color: white; padding: 7px; margin: 0px 0px 0px 5px;
         border-radius: 9px;">Add Category</h3>
    <form action={{route('admin.category.store')}} method="post" enctype="multipart/form-data" style="margin: 0px 10px 5px; padding: 10px 100px;);
    font-family: 'Open Sans',Helvetica,Arial,sans-serif;; background-color: rgb(247, 252, 251)">

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @csrf
        <div class="row mn mln15" style="position: relative; right: 50px;">

            <div class="col-md-12">
                <div class="section">
                    <h3>parent id</h3>
                    <select id="country" name="parentid" style="width: 100%; padding: 5px">
                        <option value="{{null}}" selected>Main Category</option>
                        @foreach($data as $rs)
                            <option value="{{$rs->id}}">{{\App\Http\Controllers\AdminPanel\CategoryController::
                                getParentsTree($rs, $rs->title)}}</option>
                        @endforeach
                    </select>
                    <i class="arrow"></i>
                </div>
            </div>
            <div class="col-md-12 ">
                <div class="section">
                    <h3>Title</h3>
                    <input type="text" name="title" id="from" class="gui-input" style="width: 100%; padding: 5px" placeholder="Title">

                </div>
            </div>
            <div class="col-md-6 prn hidden-xs">
                <div class="section">
                    <h3>Image</h3>
                    <input type="file" class="gui-file" name="image" id="file2" onchange="document.getElementById('uploader2').value = this.value;">
                    <input type="text" class="gui-input" id="uploader2" placeholder="Select File">
                    <i class="fa fa-upload"></i>
                </div>
            </div>

        </div>
        <input type="submit" class="btn btn-info" style="display: block;padding: 5px 15px; margin: 10px 0;
                                border: 1px solid gray; position: relative; right: 43px" value="save">
    </form>
@endsection
