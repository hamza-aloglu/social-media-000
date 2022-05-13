@extends('layouts.frontbase')

@section('title', $setting -> title)
@section('keywords', $setting -> keywords)
@section('description', $setting -> description)
@section('icon', \Illuminate\Support\Facades\Storage::url($setting->icon))

@section('content')
    <main>
    <div class="main-wrapper pt-80">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <form action="{{route('storemessage')}}" method="post" style="margin: 0px 10px 5px; padding: 10px;);
    font-family: 'Open Sans',Helvetica,Arial,sans-serif;; background-color: rgb(247, 252, 251)">
                        @csrf
                        <div class="row mn mln15 g-4">
                            <div class="col-md-12 ">
                                <div class="section">
                                    <h3>First name</h3>
                                    <input type="text" name="name" id="from" class="gui-input" style="width: 100%; padding: 5px"
                                           placeholder="First name & last name">
                                </div>
                            </div>
                            <div class="col-md-12 ">
                                <div class="section">
                                    <h3>Email</h3>
                                    <input type="email"  name="email" id="from" class="gui-input" style="width: 100%; padding: 5px">
                                </div>
                            </div>
                            <div class="col-md-12 ">
                                <div class="section">
                                    <h3>Phone</h3>
                                    <input type="tel" name="phone" id="from" class="gui-input" style="width: 100%; padding: 5px">
                                </div>
                            </div>
                            <div class="col-md-12 ">
                                <div class="section">
                                    <h3>Subject</h3>
                                    <input type="text" name="subject" id="from" class="gui-input" style="width: 100%; padding: 5px"
                                           placeholder="subject">
                                </div>
                            </div>
                            <div class="col-md-12 ">
                                <div class="section">
                                    <h3>Message</h3>
                                    <textarea name="message" cols="20" style="width: 100%; padding: 5px"></textarea>
                                </div>
                            </div>

                        </div>
                        <input type="submit" class="button btn-info" style="display: block;padding: 5px 15px; margin: 10px 0;
                                border: 1px solid gray" value="send">
                    </form>
                </div>
                <div class="col-md-7">
                    <h1 class="mb-4 text-danger">{{\Illuminate\Support\Facades\Session::get('info')}}</h1>
                    {!!   $setting->contact  !!}
                </div>
            </div>
        </div>
    </div>

    </main>
@endsection




