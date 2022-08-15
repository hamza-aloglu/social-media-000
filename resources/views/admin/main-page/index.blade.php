@extends('layouts.adminbase')

@section('topbar')
    @include('admin.topbar')
@endsection

@section('content')

    <form action="{{route('')}}"></form>

    <div style="height: 60vh"></div>
@endsection
