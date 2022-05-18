@extends('layouts.adminbase')

@section('title', 'create faq')

@section('head')
    <script src="https://cdn.ckeditor.com/ckeditor5/34.0.0/classic/ckeditor.js"></script>
@endsection

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
    <h1 style="text-align: center;">Add faq</h1>
    <form action={{route('admin.faq.store')}} method="post" enctype="multipart/form-data" style="margin: 0px 10px 5px; padding: 10px 100px;);
    font-family: 'Open Sans',Helvetica,Arial,sans-serif;; background-color: rgb(247, 252, 251)">
        @csrf
        <div class="col-md-12 ">
            <div class="section">
                <h3>Question</h3>
                <input type="text" name="question" id="from" class="gui-input" style="width: 100%; padding: 5px" placeholder="Title">
            </div>
        </div>


        <div class="col-md-12 ">
            <div class="section">
                <h3>answer</h3>
                <textarea id="answer" name="answer"></textarea>
                <script>
                    ClassicEditor
                        .create( document.querySelector( '#answer' ) )
                        .then( editor => {
                            console.log( editor );
                        } )
                        .catch( error => {
                            console.error( error );
                        } );
                </script>
            </div>
        </div>

        <div class="col-md-12 ">
            <div class="section">
                <h2>Status</h2>
                <select name="status" style="width: 90%">
                    <option value="choose" disabled selected>Choose status</option>
                    <option>Enabled</option>
                    <option>Disabled</option>
                </select>
            </div>
        </div>

        <input type="submit" class="button btn-info" style="display: block; margin: 30px 0" value="save">
    </form>
@endsection
