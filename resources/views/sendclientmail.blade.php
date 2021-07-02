@extends("layout")
@section("content")
    <div id="contact-form">
        <div class="container">
            @if(Session::has('msg'))
                <div class="alert alert-success">{{Session::get('msg')}}</div>
            @endif
            <div class="card my-5">
                <div class="card-body">
                    <h3>Contact Us</h3>
                    <hr />
                    <form action="{{url('send-client-email')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="text" class="form-control" name="" disabled value="info@acadazone.com" id="">
                        </div>
                        <div class="form-group">
                            <label for="">Message</label>
                            <textarea rows="0" name="emailbody" cols="30" style="border: 1px solid #000; height: 300px; width: 100%;"></textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Send" class="btn btn-primary w-100">
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection
