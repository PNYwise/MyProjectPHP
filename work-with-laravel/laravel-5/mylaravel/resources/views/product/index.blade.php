@extends('layouts.master')

@section('content')

 
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Product Page</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('/home')}}">Home</a></li>
              <li class="breadcrumb-item active">Product Page</li>
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
                <tr class="text-center">
                    <th>No</th>
                    <th>Nama</th>
                    <th>type</th>
                    <th>Jumlah</th>
                    <th>Harga</th>
                    <th>
                        {{-- tambah --}}
                        <a href="#" class="btn btn-outline-info" data-toggle="modal" data-target="#staticModal">+Product</a>
                        {{-- end tambah --}}
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($product as $data)
                <tr class="text-center">
                    <td>{{ $no++ }}</td>
                    <td>{{ $data->nm_product }}</td>
                    <td>{{ $data->type }}</td>
                    <td>{{ $data->jumlah }}</td>
                    <td class="text-success">Rp.{{ $data->harga }},00/Jam</td>
                    <td>
                          {{-- ubah --}}
                          <a href="#" class="btn btn-outline-success" data-toggle="modal" data-target="#editModal" data-id="{{ $data->id }}" data-nm="{{ $data->nm_product }}" data-typ="{{ $data->type }}" data-jml="{{ $data->jumlah }}" data-hrg="{{ $data->harga }}">
                              <i class="fas fa-pencil-alt"></i></a>
                          {{-- end ubah --}}
                          @php
                          echo '&nbsp;&nbsp;';
                          @endphp
                          {{-- hapus --}}
                          <a href="#" class="btn btn-outline-danger" data-toggle="modal" data-target="#deleteModal" data-id="{{ $data->id }}"><i class="fas fa-trash"></i></a>
                          {{-- end hapus --}}
                    </td>
                </tr>
                @endforeach

            </tbody>
            <tfoot>
                <tr class="text-center">
                    <th>No</th>
                    <th>Nama</th>
                    <th>type</th>
                    <th>Jumlah</th>
                    <th>Harga</th>
                    <th>
                    </th>

                </tr>
            </tfoot>
        </table>
    </div>
</div>

<!-- END DATA TABLE-->

<!-- tambah static -->
			<div class="modal fade" id="staticModal" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true"
			 data-backdrop="static">
				<div class="modal-dialog modal-md" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="staticModalLabel">Tambah</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
              <form action="{{ route('product.store') }}" method="post" enchtype="multipart/form-data">
                {{ @csrf_field() }}
                @include('product.form')
                <div class="modal-footer">
							    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
							    <button type="submit" class="btn btn-primary">Save</button>
						    </div>
              </form>
						</div>
					</div>
				</div>
			</div>
			<!-- end tambah static -->

      <!-- Edit static -->
			<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true"
			 data-backdrop="static">
				<div class="modal-dialog modal-md" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="staticModalLabel">Edit</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
              <form action="{{ route('product.update','product') }}" method="post" enchtype="multipart/form-data">
                {{ method_field('patch') }}
                {{ @csrf_field() }}
                @include('product.form')
                <input type="hidden" name="kodeid" id="kodeid">
                <div class="modal-footer">
							    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
							    <button type="submit" class="btn btn-primary">Save</button>
						    </div>
              </form>
						</div>
					</div>
				</div>
			</div>
			<!-- end edit modal -->

      <!-- Delete modal -->
			<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true"
			 data-backdrop="static">
				<div class="modal-dialog modal-sm" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h3 class="modal-title" id="staticModalLabel">Attention</h3>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
              <p>Are you sure you want to delete this data?</p>
              <form action="{{ route('product.destroy', 'product') }}" method="post" enchtype="multipart/form-data">
                {{ method_field('delete') }}
                {{ @csrf_field() }}
                <input type="hidden" name="kodeid" id="kodeid">
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                  <button type="submit" class="btn btn-danger">Delete</button>
                </div>
              </form>
						</div>
					</div>
				</div>
			</div>
			<!-- end Delete modal -->
      

@endsection

@section('script.js')
  <script type="text/javascript">

    $('#editModal').on('shown.bs.modal', function(event){
      var tombol = $(event.relatedTarget)
      var nama = tombol.data('nm')
      var type = tombol.data('typ')
      var jumlah = tombol.data('jml')
      var harga = tombol.data('hrg')
      var kode = tombol.data('id')
      var modal =$(this)

      modal.find('.modal-body #nm_product').val(nama);
      modal.find('.modal-body #type').val(type);
      modal.find('.modal-body #jumlah').val(jumlah);  
      modal.find('.modal-body #harga').val(harga);
      modal.find('.modal-body #kodeid').val(kode);
    });

    $('#deleteModal').on('shown.bs.modal', function(event){
      var tombol = $(event.relatedTarget)
      var kode = tombol.data('id')
      var modal =$(this)

      modal.find('.modal-body #kodeid').val(kode); 
    });
  </script>
@endsection