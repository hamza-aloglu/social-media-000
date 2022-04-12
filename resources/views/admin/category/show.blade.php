@extends('layouts.adminbase')

@section('title', 'show faq')
@section('head')
    <style>
        * {

        }
        #table {
            width: 100%;
        }
        .table-row {
            width: 100%;
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
                    <div class="table-header">Keywords:</div>
                    <div class="table-content">{{$data -> keywords}}</div>
                </div>
                <div class="table-row">
                    <div class="table-header">Description:</div>
                    <div class="table-content">{{$data -> description}} Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque corporis culpa distinctio esse est, facere id ipsa itaque iusto magnam modi nostrum nulla pariatur provident quae quas qui quidem ratione repellat, sunt ut veritatis voluptas. Ab aliquid cumque ducimus, eaque eius est eum eveniet harum libero neque officia quaerat quia quis quisquam ratione reiciendis saepe vel. Aspernatur dolor error ipsum quam. Dolor eaque est explicabo ipsum natus, neque nihil? Amet consequatur deleniti est hic, impedit numquam quis temporibus. Commodi, ea, est facilis id magni nam nihil nulla odit officiis possimus praesentium quasi quisquam repudiandae sit suscipit ullam veritatis voluptatem voluptatibus.</div>
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
                    <div class="table-header">Status:</div>
                    <div class="table-content">{{$data -> status}}</div>
                </div>
                <div class="table-row">
                    <div class="table-header">Created at:</div>
                    <div class="table-content">{{$data -> created_at}}</div>
                </div>
                <div class="table-row">
                    <div class="table-header">Updated at:</div>
                    <div class="table-content">{{$data -> updated_at}}</div>
                </div>

                <a href={{route('admin.category.edit', ['id' => $data -> id])}}) style="margin: 0 20px">
                <button class="button btn-info" style="padding: 0px 20px">Edit</button>
                </a>
            </div>
@endsection
