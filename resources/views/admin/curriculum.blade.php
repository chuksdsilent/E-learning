@extends('admin.partials.layout')
@section('title', 'Create Curriculum')
@section('content')
    <div class="wrapper">
        <div class="create-school">
            <div class="container">
                <h1>Curriculum</h1>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <a href="{{route('admin.university-curriculum')}}">
                                <img src="{{asset('images/sitting.jpg')}}" alt="">
                                <h5>for University</h5>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <a href="{{route('admin.secondary-curriculum')}}">
                                <img src="{{asset('images/sitting.jpg')}}" alt="">
                                <h5>for Secondary School</h5>                                
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection