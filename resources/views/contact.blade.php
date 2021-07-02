@extends('layout')
@section('content')
    <style>
        input.form-control, textarea {
            border: 1px solid #dddddd !important;
        }
    </style>
    <div class="my-5">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <h4>Feel free to reach out to us</h4>
                    <hr>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">First Name</label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group ml-2">
                                <label for="">Last Name</label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="ro">

                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="text" class="form-control">
                        </div>

                    </div>
                    <div class="form-group">
                        <label for="">Message</label>
                        <textarea name="message" id="" cols="30" class="d-block" style="width: 100%;" rows="10"></textarea>
                    </div>
                            <button type="submit" class="btn btn-primary d-block">Send</button>

                </div>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>
@endsection
