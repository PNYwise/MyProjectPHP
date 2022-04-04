<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- fonts-->
    <link href="{{ asset('fonts/diodrum-medium/style.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('fonts/diodrum-bold/style.css') }}" rel="stylesheet" type="text/css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('bootstrap-4.6.1/dist/css/bootstrap.min.css') }}">

    <link rel="stylesheet" href="owlcarousel/dist/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="owlcarousel/dist/assets/owl.theme.default.css">

    <!-- junkbee CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">

    <script src="https://kit.fontawesome.com/4dd8b03328.js" crossorigin="anonymous"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/handlebars/4.7.7/handlebars.min.js"></script>
    <title>JunkBee</title>
</head>

<body>
    @include('layout.navbar')
    <div class="container-fluid px-0">
        @yield('content')
    </div>

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="{{ asset('bootstrap-4.6.1/dist/js/bootstrap.bundle.min.js') }}"></script>

    <script src="owlcarousel/dist/owl.carousel.min.js"></script>

    @yield('js')

</body>

</html>
