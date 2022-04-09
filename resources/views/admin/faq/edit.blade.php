@extends('layouts.adminbase')

@section('title', 'edit faq')
@section('topbar')
    @include('admin.topbar')
@endsection

@section('body-class')
    dashboard-page with-customizer
@endsection

@section('section-content-class')
    table-layout animated fadeIn
@endsection

@section('content')
    <h1 style="text-align: center;">Edit faq</h1>
    <form action="{{route('admin.faq.update', ['id' => $data -> id])}}" method="post" style="margin: 80px; padding: 20px; background-color: rgba(168, 175, 186, 0.7)">
        @csrf
        <h2>Question</h2>
        <textarea class="gui-textarea" name="question" placeholder="Text area" style="width: 90%; height: 100px">{{$data -> question}}</textarea>
        <span class="field-icon">
            <i class="fa fa-list"></i>
        </span>

        <h2>Answer</h2>
        <textarea class="gui-textarea" name="answer" placeholder="Text area" style="width: 90%; height: 100px">{{$data -> answer}}</textarea>
        <span class="field-icon">
            <i class="fa fa-list"></i>
        </span>

        <h2>Status</h2>
        <select name="status" style="width: 90%">
            <option value="choose" disabled selected>Choose status</option>
            <option>Enabled</option>
            <option>Disabled</option>
        </select>

        <input type="submit" class="button btn-info" style="display: block; margin: 30px 0" value="update">
    </form>
@endsection
