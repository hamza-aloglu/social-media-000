<div class="my-5 card widget-item">
    <div class="widget-body">
        <form action="{{route('userpanel.updatepictures')}}" method="post"
              enctype="multipart/form-data">
            @csrf
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="section">
                <h3>Profile Image</h3>
                <input type="file" class="gui-file" name="profile_photo_path" id="file2"
                       onchange="document.getElementById('uploader2').value = this.value;">
                <input type="text" class="gui-input" id="uploader2"
                       placeholder="Select File">
                <i class="fa fa-upload"></i>
            </div>

            <br>
            <div class="section">
                <h3>Background Image</h3>
                <input type="file" class="gui-file" name="background_photo_path" id="file3"
                       onchange="document.getElementById('uploader3').value = this.value;">
                <input type="text" class="gui-input" id="uploader3"
                       placeholder="Select File">
                <i class="fa fa-upload"></i>
            </div>

            <div class="section mt-4 d-flex justify-content-end" >
                <input type="submit" class="btn btn-lg btn-dark py-1 px-4"  value="save" style="background-color: black">
            </div>
        </form>
    </div>
</div>
