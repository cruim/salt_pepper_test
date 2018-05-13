@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="alert alert-danger alert-dismissable page-alert scheduller_note"style="text-align: center">
                If add add more than one image your votes count is set to zero
        </div>
    </div>
    <div class="container">
        <div class="content">

            <h1>File Upload</h1>
            <form action="{{ URL::to('upload_image/files') }}" method="post" enctype="multipart/form-data">
                <label>Select image to upload:</label>
                <input type="file" name="file" id="file">
                <input type="submit" value="Upload" name="submit">
                <input type="hidden" value="{{ csrf_token() }}" name="_token">
            </form>

        </div>
    </div>


    <script type='text/javascript' src="{{asset('js/image_upload.js')}}"></script>
    <link rel="stylesheet" href="{{asset('css/image_upload.css')}}">
@endsection