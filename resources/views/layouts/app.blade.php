<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- bootstrap core css -->
    <link rel="stylesheet" href="{{asset('mdb/css/bootstrap.min.css')}}">

    <!-- mdb css -->
    <link rel="stylesheet" href="{{asset('mdb/css/mdb.min.css')}}">

    <!-- style css -->
    <link rel="stylesheet" href="{{asset('mdb/css/style.css')}}">

    <!-- tailwind css -->
    <link rel="stylesheet" href="{{asset('css/tailwind.css')}}">

    <!-- icon -->
    <link rel="shortcut icon" href="{{asset('mdb/img/logo7.png')}}" type="image/x-icon">

    <!-- fontawesome -->
    <link rel="stylesheet" href="{{asset('fontawesome/css/all.min.css')}}">

    <link href="https://fonts.googleapis.com/css?family=Quicksand:300,400,500,600,700&display=swap" rel="stylesheet">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- datatables -->
    <link rel="stylesheet" href="{{asset('mdb/css/addons/datatables.min.css')}}">
</head>
<body class="bg-gray-200">
    <div id="app">
        <header>
            @include('includes.nav')
        </header>
        <main class="mt-20">
            @yield('content')
        </main>

        @include('includes.footer')
    </div>

    <!-- Jquery js -->
    <script src="{{asset('mdb/js/jquery.min.js')}}"></script>

    <!-- popper js -->
    <script src="{{asset('mdb/js/popper.min.js')}}"></script>

    <!-- bootstrap core js -->
    <script src="{{asset('mdb/js/bootstrap.min.js')}}"></script>

    <!-- mdb js -->
    <script src="{{asset('mdb/js/mdb.min.js')}}"></script>

    <!-- datatables -->
    <script src="{{asset('mdb/js/addons/datatables.min.js')}}"></script>

    <script src="{{asset('mdb/js/main.js')}}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.4.0/bootbox.min.js"></script>
</body>
</html>
