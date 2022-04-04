<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Junk Bee | Admin</title>

    <!-- Google Font: Source Sans Pro -->
    <link href="//db.onlinewebfonts.com/c/28057fefbbeb142eaa51e05850918f66?family=Diodrum" rel="stylesheet"
        type="text/css" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
        href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- iCheck -->
    {{-- <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}"> --}}

    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">

    <!-- trix-editor -->
    <style>
        trix-toolbar [data-trix-button-group="file-tools"] {
            display: none;
        }

    </style>
    <link rel="icon" href="{{ asset('dist/img/logo-junkbee.png') }}">
</head>

<body>
    <div>
        <div class="container-fluid">

            @foreach ($news as $item)

            @endforeach
            <div class="card-body px-3">
                <div class="row">
                    <div class="col-12 text-center" style="font-size: 16px">
                        <h5 style="font-size: 17px; color:rgb(112, 112, 112)"><b>{{ $item->judul }}</b></h5>
                        <hr>
                    </div>
                </div>
                <div class="row pt-3" style="font-size: 12px; color:rgb(112, 112, 112)">
                    <div class="col text-left">
                        <p>Author : {{ $item->user->full_name }}</p>
                    </div>
                    <div class="col text-right">
                        <p>{{ date('d F Y', strtotime($item->date)) }}</p>
                    </div>
                </div>
                <div class="row mb-3 justify-content-center"
                    style="max-height: 450px; overflow:hidden;  border-radius: 10px;">
                    <img src="{{ asset('storage/news-images/' . $item->banner) }}" class="img-fluid" alt="">
                </div>
                <div class="row">
                    <div class="col-12 mb-4 text-center">
                        <p style="font-size: 12px; color:rgb(112, 112, 112)">{{ $item->banner_desctiption }}
                        </p>
                    </div>
                </div>
                <div class="row mb-5">
                    <div class="col-12" style="font-size: 15px; color:rgb(112, 112, 112)">
                        {!! $item->desctiption !!}
                        <hr>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
        <!-- /.content -->
    </div>

    </footer>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('dist/js/adminlte.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('dist/js/demo.js') }}"></script>
    <script src="{{ asset('dist/js/pages/dashboard.js') }}"></script>
</body>
