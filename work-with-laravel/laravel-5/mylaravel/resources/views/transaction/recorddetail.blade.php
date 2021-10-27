@extends('layouts.master')

@section('content')


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Detail Record</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('/home')}}">Home</a></li>
                        <li class="breadcrumb-item active">Detail Record</li>

                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
</div>
{{-- table --}}
<div class="card">
    <div class="card-header bg-dark">
        <h4 class="card-title text-light" </h4>
    </div>
    <div class="card-body">
        <table id="record" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nota</th>
                    <th>Id</th>
                    <th>Lama</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($detail as $data)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $data->nota }}</td>
                    <td>{{ $data->id }}</td>
                    <td>{{ $data->lama }}</td>
                    <td class="text-success">{{ $data->subtotal }}</td>
                </tr>
                @endforeach

            </tbody>
            <tfoot>
                <tr>
                    <th>No</th>
                    <th>Nota</th>
                    <th>Id</th>
                    <th>Lama</th>
                    <th>Subtotal</th>

                </tr>
            </tfoot>
        </table>
    </div>
</div>


<!-- END DATA TABLE-->

@endsection

@section('script.js')
<script>
    $(function() {
        $("#record").DataTable({
            "responsive": true
            , "lengthChange": false
            , "autoWidth": false
            , "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

    });

</script>

@endsection

