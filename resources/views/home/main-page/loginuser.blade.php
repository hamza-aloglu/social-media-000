@extends('layouts.frontbase')

@section('title', "Login")



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
                                        @include('auth.register')
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




