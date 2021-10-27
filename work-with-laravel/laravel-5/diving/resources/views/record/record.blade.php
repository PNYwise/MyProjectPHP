@extends('layouts.master')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Record Transaksi</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="transaksi" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Nota</th>
                    <th>Kasir</th>
                    <th>Tanggal</th>
                    <th>Mulai</th>
                    <th>Ahir</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach($transaksi as $data)
                <tr>
                    <td>{{ $data->nota }}</td>
                    <td>{{ $data->kasir }}</td>
                    <td>{{ $data->tanggal }}</td>
                    <td>{{ $data->mulai }}</td>
                    <td>{{ $data->ahir }}</td>
                    <td>Rp.{{ $data->total }}</td
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->
@endsection

@section('js')
    <script>
        $(function () {
            $("#transaksi").DataTable({
            "responsive": true, "lengthChange": true, "autoWidth": true,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#transaksi_wrapper .col-md-6:eq(0)');
        });
    </script>
@endsection