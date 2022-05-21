@if($message = Session::get('info'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">

        <strong>{{$message}}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if($message = Session::get('error'))
    <strong>{{$message}}</strong>
@endif


<?php
// handling message info...
/* If you are going to use this file, you should include this file instead of {{Session::get('info')}} in home.contact
<div class="alert alert-info alert-block alert-dismissible" role="alert">
        <strong>{{$message}}</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
