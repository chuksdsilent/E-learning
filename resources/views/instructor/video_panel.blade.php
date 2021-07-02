@extends('instructor.partials.layout')
@section('title', 'Upload Video')
@section('content')
    <div class="col-md-9 col-12 col-lg-9">
        <div class="wrapper">
            <div class="create-school">
                <div class="container">
                    @if (Session::has('success_msg'))
                        <div class="alert alert-success">
                            <i class="fa fa-check-circle" aria-hidden="true"></i>
                            {{ Session::get('sucess_msg')}}</div>
                    @endif
                    <h3 class="ml-3 mt-5 pt-5">Videos</h3>

                    <div class="row mt-5">
                        <div class="col-md-6">
                            <div class="card no-padding">
                                <a href="{{url('instructor/university/videos')}}">
                                    <img src="{{asset('images/sitting.jpg')}}" alt="">
                                    <h5>University</h5>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card no-padding">
                                <a href="{{url('instructor/secondary-school/videos')}}" >
                                    <img src="{{asset('images/sitting.jpg')}}" alt="">
                                    <h5>Secondary School</h5>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col-md-6">
                            <div class="card no-padding">
                                <a href="{{url('instructor/other-institutions/videos')}}">
                                    <img src="{{asset('images/sitting.jpg')}}" alt="">
                                    <h5>Other Institutions</h5>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
