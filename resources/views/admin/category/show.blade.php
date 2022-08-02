@extends('layouts.adminbase')

@section('title', 'show category')
@section('head')
    <style>
        * {

        }

        #table {
            width: 100%;
        }

        .table-row {
            display: inline-block;
            margin-bottom: 5px;
            background-color: rgba(174, 191, 179, 0.6);
            padding: 8px;
            border: 1px solid black;
            border-radius: 25px;
        }

        .table-header {
            display: inline-block;
            font-size: 15px;
            margin: 0px 5px;
            font-family: Serif;
            font-weight: bolder;
            color: rgb(132, 168, 227);
        }

        .table-content {
            display: inline-block;
            font-size: 13px;
            font-style: italic;
            margin: 0px;
        }

    </style>
@endsection
@section('topbar')
    @include('admin.topbar')
@endsection

@section('body-class')

@endsection

@section('section-content-class')
    table-layout animated fadeIn
@endsection

@section('content')
    <!-- Content -->

    <div id="table">
        <div class="table-row">
            <div class="table-header">ID:</div>
            <div class="table-content">{{$data -> id}} </div>
        </div>

        <div class="table-row">
            <div class="table-header">Title:</div>
            <div class="table-content">{{$data -> title}}</div>
        </div>
        <div class="table-row">
            <div class="table-header">Image:</div>
            <div class="table-content">{{$data -> image}}</div>
        </div>
        <div class="table-row">
            <div class="table-header">parent id:</div>
            <div class="table-content">{{$data -> parentid}}</div>
        </div>
        <div class="table-row">
            <div class="table-header">Created at:</div>
            <div class="table-content">{{$data -> created_at}}</div>
        </div>
        <div class="table-row">
            <div class="table-header">Updated at:</div>
            <div class="table-content">{{$data -> updated_at}}</div>
        </div>
    </div>

@endsection
