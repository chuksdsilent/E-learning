@extends('instructor.partials.layout')
@section('title', 'Edit Videos')
@section('content')
    <div class="col-md-9">
        <div class="video-edit">
                <div class="container">
                        <div class="card my-4 mx-5 py-3 px-3">
                            <h4>Edit Video</h4>
                            <hr>
                            @csrf

                            @foreach ($video_data as $item)
                                <input type="hidden" name="vid_id" id="vid_id" value="{{$item->vid_id}}">
                                <input type="hidden" name="options" value="{{$options}}" id="options">
                                <div class="form-group">
                                    <label for="">Title</label>
                                    <input type="text" name="title" id="title" value="{{$item->title}}" class="form-control">
                                </div>
                                <small class="text-danger mb-3" id="title-error"></small>

                                <div class="form-group">

                                    <textarea name="overview" id="overview" cols="30" rows="10" class="w-100" style="border: 1px solid #ced4da; border-radius: 10px; padding: 5px;">{{$item->description}}</textarea>
                                </div>
                                <small class="text-danger mb-3" id="overview-error"></small>
                                <button class="btn btn-primary btn-block" id="submit">
                                    Update
                                </button>

                            @endforeach
                        </div>
                </div>
        </div>
    </div>
    <script src="{{asset('libraries/jquery-3.4.1.min.js')}}"></script>

    <script src="{{asset('libraries/axios/axios.js')}}"></script>
    <script src="{{asset('libraries/axios/globalValues.js')}}"></script>
    <script src="{{asset('libraries/sweetalert/sweetalert2.min.js')}}"></script>
    <script src="{{asset('libraries/sweetalert/pollyfill.js')}}"></script>
    <script>
        const title = $("#title");
        const vid_id = $("#vid_id");
        const overview = $("#overview");
        const submit = $("#submit");
        const titleError = $("#title-error");
        const overviewError = $("#overview-error");
        const options = $("#options");


        title.keydown(function(){
            titleError.text("");
        })

        overview.keydown(function(){
            titleError.text("");
        })

        submit.on("click", function(){
            $("#submit").html('<span class="spinner-border spinner-border-sm  text-dark" role="status" aria-hidden="true"></span><span class="sr-only"></span> <span style="margin-left: 3px; color: black;">Processing...</span>');
            if(title.val() === ""){
                titleError.text("Enter Title");
                activateSubmitBtn();

            }else{
                if(overview.val() === ""){
                    overviewError.text("Enter Description");
                    activateSubmitBtn();

                }else{

                    var data = new FormData();
                    data.append('title', title.val());
                    data.append('overview', overview.val());
                    data.append('vid_id', vid_id.val());
                    data.append('options', options.val())
                    axios.post('/update-video', data,{ "x-csrf-token" : $("[name=_token]").val(), 'content-type': 'multipart/form-data' })
                    .then(response => {
                        console.log(response);
                        Swal.fire({
                            title: 'Update Completed',
                            text: '',
                            icon: 'success',
                            confirmButtonText: 'continue',
                            allowOutsideClick: false
                        })
                        activateSubmitBtn();
                    }).catch(response => {
                        console.log(response)
                    });
                }
            }
        });


    function activateSubmitBtn(){
        $("#submit").html("<span>Submit</span>");
    }
    </script>
@endsection
