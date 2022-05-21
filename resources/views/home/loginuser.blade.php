@extends('layouts.frontbase')

@section('title', "Login -Adda")



@section('content')
    <main>
    <div class="main-wrapper pt-80">
        <div class="container">
            <div class="row">
                <div class="md-12">
                    <div class="timeline-wrapper">
                        <div class="timeline-header">
                            <div class="container-fluid p-0">
                                <div class="row g-0 align-items-center">
                                    <div class="col-lg-6">
                                        <div class="row align-items-center">
                                            @include('auth.login')
                                        </div>
                                    </div>
                                    <div class="col-lg-6 order-1 order-lg-2 d-flex align-items-center justify-content-center">
                                        <div class="signup-form-wrapper">
                                            <h1 class="create-acc text-center">Create An Account</h1>
                                            <div class="signup-inner text-center">
                                                <h3 class="title">Wellcome to Adda</h3>
                                                <form class="signup-inner--form">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <input type="email" class="single-field" placeholder="Email">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <input type="text" class="single-field" placeholder="First Name">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <input type="text" class="single-field" placeholder="Last Name">
                                                        </div>
                                                        <div class="col-12">
                                                            <input type="password" class="single-field" placeholder="Password">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <select class="nice-select" name="sortby">
                                                                <option value="trending">Gender</option>
                                                                <option value="sales">Male</option>
                                                                <option value="sales">Female</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <select class="nice-select" name="sortby">
                                                                <option value="trending">Age</option>
                                                                <option value="sales">18+</option>
                                                                <option value="sales">18-</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-12">
                                                            <select class="nice-select" name="sortby">
                                                                <option value="trending">Country</option>
                                                                <option value="sales">Bangladesh</option>
                                                                <option value="sales">Noakhali</option>
                                                                <option value="sales">Australia</option>
                                                                <option value="sales">China</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-12">
                                                            <button class="submit-btn">Create Account</button>
                                                        </div>
                                                    </div>
                                                    <h6 class="terms-condition">I have read & accepted the <a href="#">terms of use</a></h6>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </main>
@endsection




