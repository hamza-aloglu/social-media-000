@extends('layouts.adminbase')

@section('title', 'show faq')
@section('topbar')
    @include('admin.topbar')
@endsection

@section('body-class')
    basic-faq-page
@endsection

@section('section-content-class')
    animated fadeIn ptn
@endsection

@section('content')
            <!-- Content -->
            <div class="row">
                <!-- FAQ Left Column -->
                <div class="col-md-9 pln">
                    <div class="panel">
                        <div class="panel-body pn mtn">
                            <div class="mt40">
                                <h5 class="text-muted mb20 mtn"> id: {{$data->id}} </h5>

                                <div class="panel-group accordion" id="accordion1">
                                    <div class="panel">
                                        <div class="panel-heading">
                                            <a class="accordion-toggle accordion-icon link-unstyled collapsed"
                                               data-toggle="collapse"
                                               data-parent="#accordion1" href="#accordion1_1">
                                                {{$data->question}}
                                            </a>
                                        </div>
                                        <div id="accordion1_1" class="panel-collapse collapse" style="height: 0px;">
                                            <div class="panel-body">
                                                {{$data->answer}}
                                                <br>
                                                <br>
                                                <br>
                                                Status: {{$data->status}}
                                                <br>
                                                <br>
                                                Create Date: {{$data->created_at}}
                                                <br>
                                                Update Date: {{$data->update_at}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <a href="/admin/faq/edit/{{$data->id}}" style="display: block; margin: 30px 0">
                                    <button class="button btn-info">Edit faq</button>
                                </a>
                                <a href="/admin/faq/destroy/{{$data->id}}" onclick="return confirm('are you sure')">
                                    <button class="button btn-info">Delete faq</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            <!-- /Content -->
        <!-- /Main Wrapper -->
    </div>
@endsection
