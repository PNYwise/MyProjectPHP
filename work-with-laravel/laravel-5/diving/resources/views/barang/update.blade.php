@extends('layouts.master')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Tambah Barang</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <form action="{{ route('barang.update', 'barang') }}" method="POST" enctype="multipart/form-data">
            {{ method_field('patch') }}
            {{ csrf_field() }}
            @foreach($update as $data)
            <div class="form-group">
                <input type="hidden" id="kodeid" name="kodeid" class="form-control" value="{{$data->id}}"
                <label for="jenis" class=" form-control-label">Jenis Alat Selam</label>
                <input type="text" id="jenis" name="jenis" class="form-control" value="{{$data->jenis}}">
            </div>
            <div class="form-group">
                <label for="satuan" class=" form-control-label">Satuan</label>
                <input type="text" id="satuan" name="satuan" class="form-control" value="{{$data->satuan}}">
                <small class="help-block form-text"></small>
            </div>
            <div class="form-group">
                <label for="harga" class=" form-control-label">Harga Satuan</label>
                <input type="number" id="harga" name="harga" class="form-control" value="{{$data->harga}}">

            </div>
            <div class="form-group">
                <label for="foto" class=" form-control-label">foto</label>
                <input type="file" class="form-control" id="foto" name="foto" value="{{$data->foto}}" />
            </div>
            @endforeach
            <button type="submit" class="btn btn-outline-success">Save changes</button>
        </form>
    </div>
</div>
@endsection