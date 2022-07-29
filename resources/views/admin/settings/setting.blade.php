@extends('layouts.adminbase')

@section('head')
    <script src="https://cdn.ckeditor.com/ckeditor5/34.0.0/classic/ckeditor.js"></script>
@endsection

@section('title', 'Settings')

@section('topbar')
    @include('admin.topbar')
@endsection

@section('body-class')  user-interface-tabs    @endsection

@section('section-content-class')   ptn animated fadeIn   @endsection

@section('content')
    <div class="row">
        <div class="col">
            <div class="bs-component">
                <div class="tab-block mb25">
                    <ul class="nav nav-tabs">
                        <li class="active">
                            <a href="#tab5_1" data-toggle="tab">General</a>
                        </li>

                        <li class="dropdown">
                            <a class="dropdown-toggle" href="#" data-target="nonsense" data-toggle="dropdown"> Forms
                                <i class="fa fa-caret-down pl5"></i>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="#tab5_5" data-toggle="tab">Contact page</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <form action="{{route('admin.setting.update')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" value="{{$data -> id}}" name="id" id="from">
                            <div id="tab5_5" class="tab-pane">
                                <div class="col-md-12 ">
                                    <div class="section">
                                        <h3>Contact</h3>
                                        <textarea id="contact" name="contact">{!! $data -> contact !!}</textarea>
                                        <script>
                                            ClassicEditor
                                                .create( document.querySelector( '#contact' ) )
                                                .then( editor => {
                                                    console.log( editor );
                                                } )
                                                .catch( error => {
                                                    console.error( error );
                                                } );
                                        </script>
                                    </div>
                                </div>
                            </div>
                            <input type="submit" class="button btn-info" style="padding: 5px 15px; margin-top: 30px;
                                border: 1px solid gray" value="update">
                    </form>
                </div>
            </div>
        </div>
@endsection
