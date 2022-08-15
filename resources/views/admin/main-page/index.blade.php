@extends('layouts.adminbase')

@section('topbar')
    @include('admin.topbar')
@endsection

@section('body-class')

@endsection

@section('section-content-class')
    table-layout animated fadeIn
@endsection

@section('content')

    <form action={{route('admin.role.store')}} method="post">
        @csrf
        <div class="row mn mln15" style="position: relative; left: 50px;">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="col-md-12" style="margin-bottom: 10px">
                <div class="section">
                    <h3>Role</h3>
                    <input type="text" name="name">
                </div>
            </div>

            <input type="submit" class="button btn-info" style="display: block;padding: 5px 15px;
                border: 1px solid gray;" value="save">
        </div>

    </form>

    <div style="height: 60vh"></div>
@endsection
