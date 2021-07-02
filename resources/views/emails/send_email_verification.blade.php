<!doctype html>
<html lang="en">
<head>

    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('libraries/bootstrap/bootstrap.css')}}">
    <title>Acadazone</title>
</head>
<body>
<div class="container" style="max-width: 60%; margin: 5%;">
    <div class="mt-4">
        <h1 style="padding: 20px 0px !important; font-size: 30px; background-color: rgb(245, 157, 50) !important; color: white; text-align: center; margin: 0px;" class="py-3">Acadazone</h1>
        <div class="card px-5 py-5" style="padding: 20px; border: 1px solid #ddd;">
            <h3>Verify your email address</h3>
            <div class="mb-2">
                click on the link below to verify you email <br />
                Your code is {{$code}}
                <p>
                    keep it safe
                </p>
                {{--                    <a href="{{url('/profile/updates/'.$code.'?role='. $role. )}}">Click here</a>--}}
            </div>
            If you did not request for any email, kindly ignore.
            <h3>Best Regards</h3>
            <h4>Acadazone Team</h4>
        </div>
    </div>
</div>
</body>
</html>
