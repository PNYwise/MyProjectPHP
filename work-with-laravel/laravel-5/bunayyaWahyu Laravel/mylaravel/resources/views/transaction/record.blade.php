@extends('layouts.master')

@section('content')


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Transaction Record</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('/home')}}">Home</a></li>
                        <li class="breadcrumb-item active">Transaction Record</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
</div>
{{-- table --}}
<div class="card">
    <div class="card-header bg-dark">
        <h4 class="card-title text-light"</h4>
    </div>
    <div class="card-body">
        <table id="record" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>nota</th>
                    <th>kasir</th>
                    <th>tanggal</th>
                    <th>mulai</th>
                    <th>ahir</th>
                    <th>total</th>

                </tr>
            </thead>
            <tbody>
            @foreach ($transaction as $data)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $data->nota }}</td>
                    <td>{{ $data->kasir }}</td>
                    <td>{{ $data->tanggal }}</td>
                    <td>{{ $data->mulai }}</td>
                    <td>{{ $data->ahir }}</td>
                    <td class="text-success">{{ $data->total }}</td>
                </tr>
            @endforeach

            </tbody>
            <tfoot>
                <tr>
                    <th>No</th>
                    <th>nota</th>
                    <th>kasir</th>
                    <th>tanggal</th>
                    <th>mulai</th>
                    <th>ahir</th>
                    <th>total</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>


<!-- END DATA TABLE-->

@endsection

@section('script.js')
<script>
$(function () {
$("#record").DataTable({
"responsive": true, "lengthChange": false, "autoWidth": false,
"buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
}).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

});

</script>

@endsection
