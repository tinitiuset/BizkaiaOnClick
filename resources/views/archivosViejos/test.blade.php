<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Laravel Vue.js app</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
          integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <link rel="stylesheet" href="{{mix('css/app.css')}}">

    <!-- Styles -->
    <style>
        html, body {
            padding: 45px;
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }
        .btn-primary {
            color: #fff;
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:disabled, .btn-primary.disabled {
            color: #fff;
            background-color: #007bff;
            border-color: #007bff;
        }  
        .btn-primary:hover {
            color: #fff;
            background-color: #007bff;
            border-color: #007bff; 

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
{{--<div class="flex-center position-ref full-height">--}}

<div id="app">
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <create-evento></create-evento>

            </div>
            <div class="col-md-7">
                <Eventos></Eventos>
            </div>
        </div>
    </div>
</div>

{{--</div>--}}

<script async src="{{mix('js/app.js')}}"></script>
</body>
</html>
<script>
    import Eventos from "../js/components/Eventos";
    import CreateEvento from "../js/components/CreateEvento";
    export default {
        components: {CreateEvento, Eventos}
    }
</script>
