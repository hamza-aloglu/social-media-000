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
                <div class="md-12">
                    {!!   $setting->references  !!}
                </div>
            </div>
        </div>
    </div>

    </main>
@endsection




