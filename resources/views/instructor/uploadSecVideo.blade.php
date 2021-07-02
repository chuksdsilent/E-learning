@extends('instructor.partials.layout')
@section('title', 'Upload Sec. Video')
@section('content')
<div class="col-md-9">
    <div class="sec-video-content">
        <div class="container mt-4">
            <div class="col-md-12">
                <input type="hidden" name="user_email" value=" {{Auth::user()->email}} " id="user_email">
                <div class="card">
                    <h2>Upload Secondary School Video</h2>
                    <hr />
                    <div class="form-group">
                        <label for="class">Class</label>
                        <select name="class" id="class" class="form-control">
                            <option value="">Select a Class</option>
                            <option value="1">JSS1</option>
                            <option value="2">JSS2</option>
                            <option value="3">JSS3</option>
                            <option value="4">SS1</option>
                            <option value="5">SS2</option>
                            <option value="6">SS3</option>
                        </select>
                        <br />
                        <small id="class-error" class="text-danger"></small>
                    </div>
                    <div class="form-group">
                        <label for="class">Subject</label>
                        <select name="subject" id="subject" class="form-control">
                            <option value="">Select a Subject</option>
                            @foreach($subjects as $subject)
                            <option value="{{$subject->sub_id}}">{{$subject->name}}</option>
                            @endforeach
                        </select>
                        <br />
                        <small id="subject-error" class="text-danger"></small>
                    </div>
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" id="title" class="form-control">
                        <br />
                        <small id="title-error" class="text-danger"></small>
                    </div>
                    <div class="form-group">
                        <label for="description">Overview</label>
                        <textarea name="overview" id="overview" id="" cols="30" rows="10" class="w-100"></textarea>
                        <br />
                        <small id="overview-error" class="text-danger"></small>
                    </div>
{{--                    <div class="form-group">--}}
{{--                        <label for="cover_photo">Upload Cover Photo</label> <br />--}}
{{--                        <input type="file" name="cover_photo" id="cover-photo">--}}
{{--                        <br />--}}
{{--                        <small id="cover-photo-error" class="text-danger"></small>--}}
{{--                    </div>--}}
                    <div class="form-group">
                        <label for="">Upload Video</label> <br />
                        <input type="file" id="sec-video" class="sec-video">
                        <br />
                        <small id="sec-video-error" class="text-danger"></small>
                    </div>
                    <div class="form-group">
                        <button type="submit" id="submit" class="btn btn-primary btn-block">
                            Upload
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{asset('libraries/jquery-3.4.1.min.js')}}"></script>
<script src="{{asset('libraries/axios/axios.js')}}"></script>
<script src="{{asset('libraries/axios/globalValues.js')}}"></script>
<script src="{{asset('js/uploadSecVideo.js')}}"></script>
<script src="{{asset('libraries/sweetalert/sweetalert2.min.js')}}"></script>
<script src="{{asset('libraries/sweetalert/polyfill.js')}}"></script>
<script src="{{asset('libraries/toastify/toastify.js')}}"></script>
<script src="{{asset('libraries/js/sec_topics.js')}}"></script>

@endsection
