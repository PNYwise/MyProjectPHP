@extends('layouts.master')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Update</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <form action="{{ route('barang.store') }}" method="post" enctype="multipart/form-data">
        {{ @csrf_field() }}
            <div class="form-group">
                <label for="jenis" class=" form-control-label">Jenis Alat Selam</label>
                <input type="text" id="jenis" name="jenis" placeholder="Enter your product.." class="form-control">
            </div>
            <div class="form-group">
                <label for="satuan" class=" form-control-label">Satuan</label>
                <input type="text" id="satuan" name="satuan" placeholder="Enter.." class="form-control">
                <small class="help-block form-text"></small>
            </div>
            <div class="form-group">
                <label for="harga" class=" form-control-label">Harga Satuan</label>
                <input type="number" id="harga" name="harga" placeholder="Enter.." class="form-control">
            </div>
            <div class="form-group">
                <label for="foto" class=" form-control-label">foto</label>
                <input type="file" class="form-control" id="foto" name="foto" />
            </div>
            <button type="submit" class="btn btn-outline-light">Save changes</button>
        </form>
    </div>
</div>
@endsection
