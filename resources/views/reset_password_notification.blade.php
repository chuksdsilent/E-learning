<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('libraries/bootstrap/bootstrap.css')}}">
    <title>Acadazone</title>
</head>
<body style="background-color: #f9f9f9;">
<div class="d-flex justify-content-center align-items-center" style="">
    @if(Session::has('msg'))
        <div class="alert alert-success">{{Session::get('msg')}}</div>
    @endif
    <div style="border: 1px solid #ddd;  margin-top: 10%; padding: 2%; background-color: white;">
        <h1 class="mb-4" style="color: rgb(245, 157, 50) !important; ">Acadazone</h1>
        <hr />
        <div class="alert alert-succes" style="font-size: 20px;">
            Email has been sent to you email account. Check your email to reset your password.
        </div>

        <a href="{{url('resend-email-password-reset')}}">Resend Email</a>
    </div>
</div>
</body>
</html>
