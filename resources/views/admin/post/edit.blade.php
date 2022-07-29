@extends('layouts.adminbase')
@section('head')
    <script src="https://cdn.ckeditor.com/ckeditor5/34.0.0/classic/ckeditor.js"></script>
@endsection

@section('title', 'edit post')
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
         border-radius: 9px;">Edit post</h3>
    <form action={{route('admin.post.update', ['post' => $data -> id])}} method="post" enctype="multipart/form-data"
          style="margin: 0px 10px 5px; padding: 10px 100px;);
    font-family: 'Open Sans',Helvetica,Arial,sans-serif;; background-color: rgb(247, 252, 251)">
        @csrf
        @method('PUT')
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="row mn mln15" style="position: relative; right: 50px;">
            <div class="col-md-12 ">
                <div class="section">
                    <h3>category id</h3>
                    <select name="category_id" style="width: 100%; padding: 5px">
                        @foreach($datalist as $rs)
                            <option value="{{$rs->id}}"  @if($data->category_id == $rs ->id)
                            selected @endif>{{\App\Http\Controllers\AdminPanel\CategoryController::
                                getParentsTree($rs, $rs->title)}}</option>
                        @endforeach
                    </select>
                    <i class="arrow"></i>
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
            <div class="col-md-12 ">
                <div class="section">
                    <h3>Detail</h3>
                    <textarea id="detail" name="detail">{!! $data -> detail !!}</textarea>
                    <script>
                        ClassicEditor
                            .create( document.querySelector( '#detail' ) )
                            .then( editor => {
                                console.log( editor );
                            } )
                            .catch( error => {
                                console.error( error );
                            } );
                    </script>
                </div>
            </div>
            <!-- user_id... -->
            <input hidden name="user_id" type="text" value="{{$data -> user_id}}">
        </div>
        <input type="submit" class="button btn-info" style="display: block;padding: 5px 15px; margin: 10px 0;
                                border: 1px solid gray" value="save">
    </form>
@endsection
