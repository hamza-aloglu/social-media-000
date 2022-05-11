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
                    <form action="" method="post" enctype="multipart/form-data"
                          style="margin: 0px 10px 5px; padding: 10px;);
    font-family: 'Open Sans',Helvetica,Arial,sans-serif;; background-color: rgb(247, 252, 251)">
                        @csrf
                        <div class="row mn mln15 g-4">
                            <div class="col-md-12 ">
                                <div class="section">
                                    <h3>First name</h3>
                                    <input type="text" name="" id="from" class="gui-input" style="width: 100%; padding: 5px" placeholder="First name">

                                </div>
                            </div>
                            <div class="col-md-12 ">
                                <div class="section">
                                    <h3>Last name</h3>
                                    <input type="text" name="" id="from" class="gui-input" style="width: 100%; padding: 5px" placeholder="Last name">
                                </div>
                            </div>
                            <div class="col-md-12 ">
                                <div class="section">
                                    <h3>Email</h3>
                                    <input type="email"  name="" id="from" class="gui-input" style="width: 100%; padding: 5px">
                                </div>
                            </div>
                            <div class="col-md-12 ">
                                <div class="section">
                                    <h3>Phone</h3>
                                    <input type="tel"  name="" id="from" class="gui-input" style="width: 100%; padding: 5px">
                                </div>
                            </div>



                        </div>
                        <input type="submit" class="button btn-info" style="display: block;padding: 5px 15px; margin: 10px 0;
                                border: 1px solid gray" value="send">
                    </form>
                </div>
                <div class="col-md-7">
                    {!!   $setting->contact  !!}
                </div>
            </div>
        </div>
    </div>

    </main>
@endsection




