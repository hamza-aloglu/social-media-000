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
                        <li>
                            <a href="#tab5_2" data-toggle="tab">Smtp Email</a>
                        </li>
                        <li>
                            <a href="#tab5_3" data-toggle="tab">Social Media</a>
                        </li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" href="#" data-target="nonsense" data-toggle="dropdown"> Forms
                                <i class="fa fa-caret-down pl5"></i>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="#tab5_4" data-toggle="tab">About Us</a>
                                </li>
                                <li>
                                    <a href="#tab5_5" data-toggle="tab">Contact page</a>
                                </li>
                                <li>
                                    <a href="#tab5_6" data-toggle="tab">References</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <form action="{{route('admin.setting.update')}}" method="post" enctype="multipart/form-data">
                        <div class="tab-content p25">
                            <div id="tab5_1" class="tab-pane active">
                                <div class="col-md-12 ">
                                    <div class="section">
                                        <h3>Title</h3>
                                        <input type="text" value="{{$data -> title}}" name="title" id="from" class="gui-input" style="width: 100%; padding: 5px" placeholder="Title">

                                    </div>
                                </div>
                                <div class="col-md-12 ">
                                    <div class="section">
                                        <h3>Keywords</h3>
                                        <input type="text" value="{{$data -> keywords}}" name="keywords" id="from" class="gui-input" style="width: 100%; padding: 5px" placeholder="Keywords">
                                    </div>
                                </div>
                                <div class="col-md-12 ">
                                    <div class="section">
                                        <h3>Description</h3>
                                        <input type="text" value="{{$data -> description}}" name="description" id="from" class="gui-input" style="width: 100%; padding: 5px" placeholder="Description">
                                    </div>
                                </div>
                                <div class="col-md-12 ">
                                    <div class="section">
                                        <h3>Company</h3>
                                        <input type="text" value="{{$data -> company}}" name="company" id="from" class="gui-input" style="width: 100%; padding: 5px" placeholder="company">

                                    </div>
                                </div>
                                <div class="col-md-12 ">
                                    <div class="section">
                                        <h3>Adress</h3>
                                        <input type="text" value="{{$data -> adress}}" name="adress" id="from" class="gui-input" style="width: 100%; padding: 5px" placeholder="Adress">
                                    </div>
                                </div>
                                <div class="col-md-12 ">
                                    <div class="section">
                                        <h3>Phone</h3>
                                        <input type="text" value="{{$data -> phone}}" name="phone" id="from" class="gui-input" style="width: 100%; padding: 5px" placeholder="Phone">
                                    </div>
                                </div>
                                <div class="col-md-12 ">
                                    <div class="section">
                                        <h3>Email</h3>
                                        <input type="email" value="{{$data -> email}}" name="email" id="from" class="gui-input" style="width: 100%; padding: 5px" placeholder="Email">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="section">
                                        <h3>Icon</h3>
                                        <input type="file" class="gui-file" name="icon" id="file2" onchange="document.getElementById('icon').value = this.value;">
                                        <input type="text" class="gui-input" id="icon" placeholder="Select icon">

                                        <i class="fa fa-upload"></i>
                                    </div>
                                </div>
                                <div class="col-md-12 ">
                                    <div class="section">
                                        <h3>Status</h3>
                                        <select id="country" name="status" style="width: 100%; padding: 5px">
                                            <option value="Enabled" selected>Enabled</option>
                                            <option value="Disabled">Disabled</option>
                                        </select>
                                        <i class="arrow"></i>
                                    </div>
                                </div>
                            </div>
                            <div id="tab5_2" class="tab-pane">
                                <div class="col-md-12 ">
                                    <div class="section">
                                        <h3>Smtp Server</h3>
                                        <input type="text" value="{{$data -> smtpserver}}" name="smtpserver" id="from" class="gui-input" style="width: 100%; padding: 5px" placeholder="Smtp server">
                                    </div>
                                </div>
                                <div class="col-md-12 ">
                                    <div class="section">
                                        <h3>Smtp Email</h3>
                                        <input type="email" value="{{$data -> smtpemail}}" name="smtpemail" id="from" class="gui-input" style="width: 100%; padding: 5px" placeholder="email@">
                                    </div>
                                </div>
                                <div class="col-md-12 ">
                                    <div class="section">
                                        <h3>Smtp Password</h3>
                                        <input type="password" value="{{$data -> smtppassword}}" name="description" id="smtpPassword" class="gui-input" style="width: 90%; padding: 5px" placeholder="">
                                        <i style="width: 5%" class="fa fa-eye text-purple" onclick="showPassword()"></i>
                                    </div>
                                </div>
                                <div class="col-md-12 ">
                                    <div class="section">
                                        <h3>Smtp Port</h3>
                                        <input type="number" value="{{$data -> smtpport}}" name="smtpport" id="from" class="gui-input" style="width: 100%; padding: 5px" placeholder="port number">
                                    </div>
                                </div>
                            </div>
                            <div id="tab5_3" class="tab-pane">
                                <div class="col-md-12 ">
                                    <div class="section">
                                        <h3>Fax</h3>
                                        <input type="text" value="{{$data -> fax}}" name="fax" id="from" class="gui-input" style="width: 100%; padding: 5px" placeholder="Fax">
                                    </div>
                                </div>
                                <div class="col-md-12 ">
                                    <div class="section">
                                        <h3>Facebook</h3>
                                        <input type="text" value="{{$data -> facebook}}" name="facebook" id="from" class="gui-input" style="width: 100%; padding: 5px" placeholder="">
                                    </div>
                                </div>
                                <div class="col-md-12 ">
                                    <div class="section">
                                        <h3>Instagram</h3>
                                        <input type="text" value="{{$data -> instagram}}" name="instagram" id="from" class="gui-input" style="width: 100%; padding: 5px" placeholder="">
                                    </div>
                                </div>
                                <div class="col-md-12 ">
                                    <div class="section">
                                        <h3>Twitter</h3>
                                        <input type="text" value="{{$data -> twitter}}" name="twitter" id="from" class="gui-input" style="width: 100%; padding: 5px" placeholder="">
                                    </div>
                                </div>
                                <div class="col-md-12 ">
                                    <div class="section">
                                        <h3>Youtube</h3>
                                        <input type="text" value="{{$data -> youtube}}" name="youtube" id="from" class="gui-input" style="width: 100%; padding: 5px" placeholder="">
                                    </div>
                                </div>
                            </div>
                            <div id="tab5_4" class="tab-pane">
                                <div class="col-md-12 ">
                                    <div class="section">
                                        <h3>About us</h3>
                                        <textarea id="aboutUs" name="aboutus">{!! $data -> aboutus !!}</textarea>
                                        <script>
                                            ClassicEditor
                                                .create( document.querySelector( '#aboutUs' ) )
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
                            <div id="tab5_6" class="tab-pane">
                                <div class="col-md-12 ">
                                    <div class="section">
                                        <h3>References</h3>
                                        <textarea id="references" name="references">{!! $data -> references !!}</textarea>
                                        <script>
                                            ClassicEditor
                                                .create( document.querySelector( '#references' ) )
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
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script>
            function showPassword() {
                var x = document.getElementById("smtpPassword");
                if (x.type === "password") {
                    x.type = "text";
                } else {
                    x.type = "password";
                }
            }
        </script>
@endsection
