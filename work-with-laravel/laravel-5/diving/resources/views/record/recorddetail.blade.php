@extends('layouts.master')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Record Detail Transaksi</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="detail" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Nota</th>
                    <th>Jenis</th>
                    <th>Qty</th>
                    <th>Satuan</th>
                    <th>Lama</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @foreach($detail as $data)
                <tr>
                    <td>{{ $data->nota }}</td>
                    <td>{{ $data->jenis }}</td>
                    <td>{{ $data->qty }}</td>
                    <td>{{ $data->satuan }}</td>
                    <td>{{ $data->lama }}</td>
                    <td>{{ $data->subtotal }}</td>
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
    $(function() {
        $("#detail").DataTable({
            "responsive": true
            , "lengthChange": true
            , "autoWidth": true
            , "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#detail_wrapper .col-md-6:eq(0)');
    });

</script>
@endsection
