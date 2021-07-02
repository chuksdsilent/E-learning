@extends(Auth::user()->role=="A"? 'admin.partials.layout' : 'instructor.partials.layout')
@section('title', 'Change Password')
@section('content')
<div class="col-md-9">
    <div class="d-flex justify-content-center mt-5">
        <div class="change-password">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @if ($errors->first('old_password'))<li> {{ $errors->first('old_password') }} </li>@endif
                    @if ($errors->first('new_password')) <li>{{ $errors->first('new_password') }} </li>@endif
                    @if ($errors->first('confirm_password')) <li>{{ $errors->first('confirm_password') }} </li>@endif

                </ul>
            </div>
            @endif
            @if (Session::has('sucess_msg'))
            <div class="alert alert-success">
                <i class="fa fa-check-circle" aria-hidden="true"></i>
                {{ Session::get('sucess_msg')}}
            </div>
            @endif
            @if (Session::has('err_msg'))
            <div class="alert alert-danger">
                <i class="fa fa-warning-triangle" aria-hidden="true"></i>
                {{ Session::get('err_msg')}}
            </div>
            @endif
            <div class="card px-3 py-3">
                <h3>Change Password</h3>
                <hr />
                <form action="{{route('update-password')}}" method="POST">
                    @method('patch')
                    {{ method_field('PATCH') }}
                    @csrf
                    <div class="form-group">
                        <label for="">Old Password</label>
                        <input type="password" name="old_password" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">New Password</label>
                        <input type="password" name="new_password" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Confirm Password</label>
                        <input type="password" name="confirm_password" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Change Password" class="btn btn-block btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
@endsection
