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
    <form action={{route('admin.category.store')}} method="post" enctype="multipart/form-data" style="border-radius: 15px
     ;margin: 30px; padding: 10px 100px; background-image: linear-gradient(rgba(168, 175, 186, 0.7), gray);
    font-style: italic">
        @csrf
        <h1 style="text-align: center">Add Category</h1>
        <div class="row mn mln15">
            <div class="col-md-8 ">
                <div class="section">
                    <h3>parent id</h3>
                    <select id="country" name="parentid" style="width: 100%">
                        <option value="" selected>Main Category</option>
                        @foreach($data as $rs)
                            <option value="{{$rs->id}}">{{\App\Http\Controllers\AdminPanel\CategoryController::
                                getParentsTree($rs, $rs->title)}}</option>
                        @endforeach
                    </select>
                    <i class="arrow"></i>
                </div>
            </div>

            <div class="col-md-8 ">
                <div class="section">
                    <h3>Title</h3>
                    <input type="text" name="title" id="from" class="gui-input" style="width: 100%" placeholder="Title">

                </div>
            </div>
            <div class="col-md-8 ">
                <div class="section">
                    <h3>Keywords</h3>
                    <input type="text" name="keywords" id="from" class="gui-input" style="width: 100%" placeholder="Keywords">
                </div>
            </div>
            <div class="col-md-8 ">
                <div class="section">
                    <h3>Description</h3>
                    <input type="text" name="description" id="from" class="gui-input" style="width: 100%" placeholder="Description">
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
            <div class="col-md-8 ">
                <div class="section">
                    <h3>Status</h3>
                    <select id="country" name="status" style="width: 100%">
                        <option value="" selected disabled>Select status</option>
                        <option value="Enabled">Enabled</option>
                        <option value="Disabled">Disabled</option>
                    </select>
                    <i class="arrow"></i>
                </div>
            </div>

        </div>
        <input type="submit" class="button btn-info" style="display: block;padding: 5px 15px; margin: 10px 0;
                                border: 1px solid gray" value="save">
    </form>
@endsection
