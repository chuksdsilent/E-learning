<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Acadazone</title>
    <link rel="stylesheet" href="{{asset('libraries/bootstrap/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('css/settings.css')}}">
    <link rel="stylesheet" href="{{asset('css/client.css')}}">
    <link rel="stylesheet" href="{{asset('libraries/aos/aos.css')}}">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Bebas+Neue|Roboto+Condensed&display=swap" rel="stylesheet">
    <meta name="viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<style>
    body {
        font-family: 'Roboto Condensed', sans-serif;
        background: #dddddd;

    }

    .card,
    .card-body {
        padding: 0rem;
        /*border: 0px;*/
        border-radius: 0px;
    }

    .btn {
        border-radius: 0px;
    }

    h4.pricing-header {
        background: #ff5425;
        text-align: center;
        padding: .8rem 0rem 1.5rem 0rem;
        font-size: 25px;
        color: white;
        -webkit-clip-path: polygon(0 0, 100% 0, 100% 80%, 0 100%);
        clip-path: polygon(0 0, 100% 0, 100% 80%, 0 100%);
    }

    .amount {
        font-size: 80px;
        padding: 1rem;
        text-align: center;

    }

    span.mon {
        font-size: 30px;
    }

    hr {
        border: .1rem white solid;
    }

    header {
        color: black;
        font-weight: bolder;

    }


</style>

<body>
    <div class="nav-wrapper">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light">
                <a class="navbar-brand" href="{{url('/')}}">ACADAZONE</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto ">
                    </ul>
                    <ul class="navbar-nav inline">
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('signup/form')}}" id="signup">
                                Register
                            </a>
                        </li>
                        <li class="nav-i
                    tem">
                            <a class="nav-link" href="{{url('login')}}" id="login">
                                Login
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
    <input type="hidden" value="{{Session::get('email')}}" id="email">
    <input type="hidden" value="{{$plan}}" id="plan">
    <input type="hidden" value="{{$plan_cost}}" id="plan-cost">

    @if(\App\User::where('email', Auth::user()->email)->value('institution') == "uni")
    <input type="hidden"
        value="{{\App\Students::where('email', Auth::user()->email)->value('first_name').' '. \App\Students::where('email', Auth::user()->email)->value('last_name')}}"
        id="name">
    @elseif(\App\User::where('email', Auth::user()->email)->value('institution') == "others")
    <input type="hidden"
        value="{{\App\OtherInstitionStudents::where('email', Auth::user()->email)->value('first_name').' '. \App\Students::where('email', Auth::user()->email)->value('last_name')}}"
        id="name">
    @elseif(\App\User::where('email', Auth::user()->email)->value('institution') == "others")


    <input type="hidden"
        value="{{\App\SecStudents::where('email', Auth::user()->email)->value('first_name').' '. \App\Students::where('email', Auth::user()->email)->value('last_name')}}"
        id="name">

    @endif
    <input type="hidden" value="{{Session::get('role')}}" id="role">
    <form>
        <script src="https://checkout.flutterwave.com/v3.js"></script>
        <button type="button" onClick="makePayment()" class="btn btn-primary">Pay Now</button>
    </form>
    <script src="{{asset('libraries/jquery-3.4.1.min.js')}}"></script>
    <script src="{{asset('libraries/axios/axios.js')}}"></script>

    <script>
        let email = document.getElementById('email').value;
        let role = document.getElementById('role').value;
        let name = document.getElementById('name').value;
        let plan = document.getElementById('plan').value;
        let plan_cost = document.getElementById('plan-cost').value;

        console.log(plan);
        console.log(plan_cost);
        let tx_ref = generatTxRef(3) + '-' + generatTxRef(15);
        console.log(tx_ref);

        function makePayment() {
            FlutterwaveCheckout({
                public_key: "FLWPUBK_TEST-2f6f9eca9903a888c5fdc8982514cd20-X",
                tx_ref: tx_ref,
                amount: 100,
                currency: "NGN",
                payment_options: "card,mobilemoney,ussd",
                customer: {
                    email: email,
                    phonenumber: "",
                    name: name
                },
                callback: function (data) { // specified callback function
                    console.log(data);
                    var config = {
                        "x-csrf-token": $("[name=_token]").val(),
                        'content-type': 'multipart/form-data'
                    };
                    let datas = new FormData();
                    datas.append('flw_ref', data.flw_ref);
                    datas.append('transaction_id', data.transaction_id);
                    datas.append('tx_ref', data.tx_ref);
                    datas.append('currency', data.currency);
                    datas.append('email', email);
                    datas.append('plan', plan);
                    datas.append('plan_cost', plan_cost);

                    axios.post('payment/billing', datas, config)
                        .then(response => {

                        });
                },
                customizations: {
                    title: "",
                    description: "",
                    // logo: "https://assets.piedpiper.com/logo.png",
                },
            });
        }


        function generatTxRef(length) {
            var result = '';
            var characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
            var charactersLength = characters.length;
            for (var i = 0; i < length; i++) {
                result += characters.charAt(Math.floor(Math.random() * charactersLength));
            }
            return result;
        }

    </script>
</body>

</html>
