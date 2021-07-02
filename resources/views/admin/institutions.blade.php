@extends('admin.partials.layout')
@section('content')
    <div class="wrapper">
        <div class="create-school">
            <div class="container">
                <h1>Institutions</h1>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card no-padding">
                            <a href="{{route('admin.universities')}}">
                                <img src="{{asset('images/sitting.jpg')}}" alt="">
                                <h5>University</h5>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card no-padding">
                            <a href="#" data-toggle="modal" data-target="#secondary-school">
                                <img src="{{asset('images/sitting.jpg')}}" alt="">
                                <h5>Secondary School</h5>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mt-5">
                        <div class="card no-padding">
                            <a href="{{url('admin/institution/')}}">
                                <img src="{{asset('images/sitting.jpg')}}" alt="">
                                <h5>Other Institutions</h5>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
