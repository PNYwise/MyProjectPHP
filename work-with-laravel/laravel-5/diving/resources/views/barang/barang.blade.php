@extends('layouts.master')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Daftar barang</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="barang" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Jenis Alat Selam</th>
                        <th>Satuan</th>
                        <th>Harga</th>
                        <th>Foto</th>
                        <th>
                        {{-- tambah --}}
                            <a href="{{ route('barang.show', 'barang') }}" class="btn btn-outline-info">+Product</a>
                            {{-- end tambah --}}
                        </th>
                    </tr>
                </thead>
                <tbody>
                @foreach($barang as $data)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $data->jenis }}</td>
                        <td>{{ $data->satuan }}</td>
                        <td>Rp.{{ $data->harga }}</td>
                        <td width="10%"><img src="{{ asset('image/'.$data->foto)}}" width="100%"></td>
                        <td>
                            {{-- ubah --}}
                            <a href="{{ route('barang.edit',$data->id) }}" class="btn btn-outline-success">
                                <i class="fas fa-pencil-alt"></i></a>
                            {{-- end ubah --}}
                            @php
                            echo '&nbsp;&nbsp;';
                            @endphp
                            {{-- hapus --}}
                            <a href="#" class="btn btn-outline-danger" data-toggle="modal" data-target="#modal-delete" data-id="{{ $data->id }}"><i class="fas fa-trash"></i></a>
                            {{-- end hapus --}}
                        </td>

                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->


<div class="modal fade" id="modal-delete">
    <div class="modal-dialog">
        <div class="modal-content bg-secondary">
            <div class="modal-header">
                <h4 class="modal-title">delete</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete this data?</p>
                <form action="{{ route('barang.destroy','barang') }} }}" method="post" enchtype="multipart/form-data">
                {{ method_field('delete') }}
                {{ csrf_field() }}
                <input type="hidden" name="kodeid" id="kodeid">
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-outline-light">Save changes</button>
            </div>
            </form>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>



@endsection

@section('js')
<script>
    $(function () {
        $("#barang").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#barang_wrapper .col-md-6:eq(0)');
  });

    $('#modal-delete').on('shown.bs.modal', function(event){
      var tombol = $(event.relatedTarget)
      var kode = tombol.data('id')
      var modal =$(this)
      modal.find('.modal-body #kodeid').val(kode); 
    });
</script>
@endsection