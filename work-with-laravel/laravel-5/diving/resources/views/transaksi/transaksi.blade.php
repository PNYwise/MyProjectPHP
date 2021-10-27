@extends('layouts.master')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Transaksi</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form action="{{ route('transaksi.store') }}" method="post" enchtype="multipart/form-data"> 
        {{ @csrf_field() }}
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="nota">Nota</label>
                        <input type="text" class="form-control" id="nota" name="nota" readonly value="{{ $nota }}">

                    </div>
                    <div class="form-group">
                        <label for="tanggal">Tanggal</label>
                        <input type="text" class="form-control" id="tanggal" name="tanggal" value="{{ $tanggal }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="kasir">Kasir</label>
                        <input type="text" class="form-control" id="kasir" name="kasir" readonly value="{{ Auth::user()->name }}">

                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="mulai">Waktu Mulai</label>
                        <input type="text" class="form-control" id="mulai" name="mulai" value="{{ $mulai }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="selesai">Selesai</label>
                        <input type="text" class="form-control" id="selesai" name="selesai" readonly value="{{ $selesai }}">

                    </div>
                    <div class="form-group">
                        <label for="total">Total</label>
                        <input type="text" class="form-control" id="total" name="total" value="{{ $grantot }}" readonly>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <a href="#" class="btn btn-outline-info" data-toggle="modal" data-target="#modal-tambah">+Detail</a>
            @if($selesai > 0 && $grantot > 0)
                <button type="submit" id="btnSimpan" class="btn btn-outline-success">Simpan</button>
            @endif
            
        </div>
    </form>
</div>

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Detail</h3>
    </div>
    <!-- /.card-header -->
        <div class="card-body">
            <table id="detail1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Jenis</th>
                        <th>qty</th>
                        <th>Satuan</th>
                        <th>Harga/satuan</th>
                        <th>lama</th>
                        <th>Subtotal</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>

        </div>
        <!-- /.card-body -->
<div class="modal fade" id="modal-tambah">
    <div class="modal-dialog">
        <div class="modal-content bg-secondary">
            <div class="modal-header">
                <h4 class="modal-title">Tambah</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ url('/simpandetail') }}" method="get" enchtype="multipart/form-data">
                    {{ @csrf_field() }}
                    <input type="hidden" id="nota" name="nota" class="form-control" value="{{ $nota }}" readonly>
                <div class="form-group">
                    <label for="jenis" class=" form-control-label">Jenis Alat Selam</label>
                    <select type="text" id="jenis" name="jenis" placeholder="" class="form-control">
                        @foreach($barang as $data)
                        <option value="{{ $data->id }}" data-harga="{{ $data->harga }}" data-satuan="{{ $data->satuan }}"> {{ $data->jenis }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="type" class=" form-control-label">Satuan</label>
                    <input type="text" id="satuan" name="satuan" class="form-control" readonly>
                </div>
                <div class="form-group">
                    <label for="harga" class=" form-control-label">Harga/Satuan</label>
                    <input type="text" id="harga" name="harga" class="form-control" readonly>
                </div>
                <div class="form-group">
                    <label for="qty" class=" form-control-label">Qty</label>
                    <input type="text" id="qty" name="qty" class="form-control">
                </div>
                <div class="form-group">
                    <label for="lama" class=" form-control-label">lama</label>
                    <input type="text" id="lama" name="lama" class="form-control">
                </div>
                <div class="form-group">
                    <label for="subtotal" class=" form-control-label">Subtotal</label>
                    <input type="text" id="subtotal" name="subtotal" class="form-control" readonly>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-outline-light">Save</button>
            </div>
            </form>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<div class="modal fade" id="modal-hapus">
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
                <form action="{{ route('transaksi.destroy','transaksi') }} }}" method="post" enchtype="multipart/form-data">
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
        $(document).ready(function(){
            var nota = $('#nota').val();
            $("#detail1").DataTable({
            "ajax":{
                "url":'/getData/'+ nota,
                "dataSrc" : function (json) {
                    var returndata = new Array();
                    for(var i=0; i<json.length; i++){ 
                        returndata.push({ 
                            'action' :'<a href="#" class="btn btn-outline-danger" data-toggle="modal" data-target="#modal-hapus" data-id="'+ json[i].idx +'"><i class="fas fa-trash"></i></a>',
                            'jenis':json[i].jenis,
                            'satuan':json[i].satuan,
                            'harga':json[i].harga,
                            'lama':json[i].lama + ' ' + 'jam',
                            'qty':json[i].qty,
                            'subtotal':json[i].subtotal
                        })
                    }
                    return returndata;
                }
            },
                "columns" :[
                {'data':'jenis'},
                {'data':'qty'},
                {'data':'satuan'},
                {'data':'harga'},
                {'data':'lama'},
                {'data':'subtotal'},
                {'data':'action'}
                ],
                "responsive":true,
                "autoWidth":false,
                "searching":false,
            });
        });
        
            var sts = "{{ session('status') }}"
            var notatrans = "{{ session('notatrans') }}"
            
        if(sts == 200){
            Swal.fire({
                title:"Data berhasil disimpan",
                text:"apakah mau cetak nota?",
                icon:"warning",
                showCancelButton:true,
                showCloseButton:true,   
                confirmButtonColor:'#d33',
                confirmButtonText:'Cetak',
            }).then((result)=>{
                if(result){
                    $('#btnSimpan').attr("disabled","disabled");
                    var url = "{{ url('/cetak-nota/') }}/"+notatrans;
                    window.open(url,"_black");
                }else{
                    swal.fire("The Data Hase been Saved!");
                }
            })
        }

        $('#modal-hapus').on('shown.bs.modal', function(event){
            var tombol = $(event.relatedTarget)
            var kode = tombol.data('id')
            var modal =$(this)
            modal.find('.modal-body #kodeid').val(kode);
        });


        $('#jenis').on('change', function(){
          var hrg =  $(this).find('option:selected').data('harga');
          var satuan = $(this).find('option:selected').data('satuan');
          $('#harga').val(hrg);
          $('#satuan').val(satuan);
          $('#qty').focus();
        });
        $('#qty').on('keyup', function(){
            var hrg = $('#harga').val();
            var qty = $('#qty').val();
            var subtotal = parseInt(hrg) * parseInt(qty);
            $('#subtotal').val(subtotal);
            $('#lama').focus();
        });
        $('#lama').on('keyup', function(){
            var lama = $('#lama').val();
            var hrg = $('#harga').val();
            var qty = $('#qty').val();
            var subtotal = parseInt(hrg) * parseInt(qty) * parseInt(lama);
            $('#subtotal').val(subtotal);
        });  
    </script>
@endsection