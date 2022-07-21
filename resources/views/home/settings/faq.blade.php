@extends('layouts.frontbase')

@section('head')

@endsection

@section('title', 'faq | '. $setting -> title)
@section('keywords', $setting -> keywords)
@section('description', $setting -> description)
@section('icon', \Illuminate\Support\Facades\Storage::url($setting->icon))

@section('content')
    <main>
    <div class="main-wrapper pt-80">
        <div class="container">
            <div class="row">
                <h1 class="text-center mb-4">Frequently asked questions</h1>
                    <div id="accordion">
                        @foreach($datalist as $rs)
                        <div class="card">
                            <div class="card-header" >
                                <a class="collapsed btn" data-bs-toggle="collapse" href="#collapse{{$loop->iteration}}">
                                    {{$rs->question}}
                                </a>
                            </div>
                            <div id="collapse{{$loop->iteration}}" class="collapse" data-bs-parent="#accordion">
                                <div class="card-body">
                                    {!!$rs -> answer!!}
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>
            </div>
        </div>
    </div>

    </main>
@endsection




