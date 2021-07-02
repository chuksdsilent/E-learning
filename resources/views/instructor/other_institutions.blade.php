@extends('instructor.partials.layout')
@section('title', 'Dashboard')
@section('content')
    <div class="col-md-9 mt-5">
        <div class="container">
            @if(Session::has('msg'))
                @component('instructor.components.alert')
                    @slot('class')
                        {{Session::get('class')}}
                    @endslot
                    @slot('msg')
                        {{Session::get('msg')}}.
                    @endslot
                @endcomponent
            @endif
            @if ($errors->first('video'))<small
                class="text-danger">{{ $errors->first('video') }}</small>@endif<small></small>
            <div class="content">
                <div class="card no-padding">
                    <h2>Upload Video</h2>
                    <hr/>
                    {{-- {{url('/instructor/store-video')}} --}}

                    @csrf
                    <div class="card-content">
                        <div class="form-group">
                            <label for="">Name</label>
                            <select name="institution" id="institution-name" class="form-control">
                                @foreach($otherInstitutions as $otherInstitution)
                                    <option value="{{$otherInstitution->institution_id}}">{{$otherInstitution->institution_name}}</option>
                                @endforeach
                            </select>
                            <small class="text-danger" id="uni-error"></small>
                        </div>
                        <div class="form-group">
                            <label for="">Level</label>
                            <select name="level" id="levels" class="form-control">
                                <option value="">Select Level</option>
                            </select>
                            <small class="text-danger" id="fac-error"></small>
                        </div>
                        <div class="form-group">
                            <label for="">Course</label>
                            <select name="course" id="course" class="form-control">
                                <option value="">Select Course</option>
                            </select>
                            <small class="text-danger" id="course-error"></small>

                        </div>
                        <div class="form-group">
                            <label for="">Semester</label>
                            <select id="semester" class="form-control">
                                <option value="">Select Semester</option>
                                <option value="1">First Semester</option>
                                <option value="2">Second Semester</option>
                            </select>
                            <small class="text-danger" id="semester-error"></small>

                        </div>
{{--                        <div class="form-group">--}}
{{--                            <label for="">Topic</label>--}}
{{--                            <select name="topic" id="topic" class="form-control">--}}
{{--                                <option value="">Select Topic</option>--}}
{{--                            </select>--}}
{{--                            <small class="text-danger" id="topic-error"></small>--}}

{{--                        </div>--}}
                        <div class="form-group">
                            <label for="">Title</label>
                            <input type="text" id="title" class="form-control" name="title">
                            <small class="text-danger" id="title-error"></small>
                        </div>
                        <div class="form-group">
                            <label for="">Description</label>
                            <textarea name="description" id="description" cols="30" rows="10" class="w-100"></textarea>
                            <small class="text-danger" id="desc-error"></small>
                        </div>
{{--                        <div class="form-group">--}}
{{--                            <label for="">Upload Cover Photo</label> <br/>--}}
{{--                            <input type="file" name="coverPhoto" id="coverPhoto">--}}
{{--                            <div>--}}
{{--                                <small class="text-danger" id="photo-error"></small>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                        <div class="form-group">
                            <label for="">Upload Video</label> <br/>
                            <input type="file" name="videoFile" id="videoFile">
                            {{-- <a id="browse" href="javascript:;" class="btn btn-primary" style="color:white;">Browse</a> --}}
                            <div>
                                <small class="text-danger" id="file-error"></small>
                            </div>
                        </div>
                    </div>
                    <ul id="filelist"></ul>
                    <br/>
                    <br/>
                    <pre id="console"></pre>
                    <div class="form-group">
                        <button type="submit" class="btn btn-block btn-primary" id="submitinstitution">
                            Submit
                        </button>
                        {{-- <input type="button" href="javascript:;" value="Submit"> --}}
                    </div>
                </div>

            </div>
        </div>
    </div>
    </div>
    <script src="{{asset('libraries/jquery-3.4.1.min.js')}}"></script>
    <script src="{{asset('libraries/axios/axios.js')}}"></script>
    <script src="{{asset('libraries/axios/globalValues.js')}}"></script>
    <script src="{{asset('libraries/js/upload_institution_video.js')}}"></script>
    <script src="{{asset('libraries/js/other_institution_video.js')}}"></script>
    <script src="{{asset('libraries/plupload/js/plupload.full.min.js')}}"></script>
    <script src="{{asset('libraries/sweetalert/sweetalert2.min.js')}}"></script>
    <script src="{{asset('libraries/sweetalert/polyfill.js')}}"></script>

@endsection
