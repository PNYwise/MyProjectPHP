@extends('layouts.master')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Transaction Page</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('/home')}}">Home</a></li>
                        <li class="breadcrumb-item active">Transaction Page</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
</div>
<div class="content">
    <Form role="form" action="{{ url('simpantrans') }}" method="POST" enchtype="multipart/form-data">
        <div class="card">
            <div class="card-header bg-dark">
                <h4 class="card-title text-light">Transaksi Penyewaan</h4>
            </div>
            <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Nota</label>
                                <input type="text" class="form-control" id="nota" name="nota" value="{{ $nota }}" disabled>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Waktu Mulai</label>
                                <input type="time" class="form-control" id="wm" name="wm" value="{{ $wm }}" disabled>

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Tanggal</label>
                                <input type="text" class="form-control" id="tgl" name="tgl" value="{{ $tgl_tran }}" disabled>


                            </div>
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" id="name" name="name" class="form-control" value="{{ auth::user()->name }}" disabled>

                            </div>

                        </div>
                         <div class="col-sm-6">
                             <!-- text input -->
                             <div class="form-group">
                                 <label>Selesai</label>
                                 <input type="text" class="form-control" id="hasil" name="hasil" value="{{ $selesai }}" disabled>


                             </div>
                             <div class="form-group">
                                 <label>Total</label>
                                 <input type="number" id="total" name="total" class="form-control" value="{{ $grantot }}" disabled>

                             </div>

                         </div>

                    </div>
                    <input type="hidden" name="_token" id="crsf" value="{{ csrf_token() }}">
                    <input type="hidden" name="nota" id="nota" value="{{ $nota }}">
                    <input type="hidden" name="wm" id="wm" value="{{ $wm }}">
                    <input type="hidden" name="tgl" id="tgl" value="{{ $tgl_tran }}">
                    <input type="hidden" name="name" id="name" value="{{ auth::user()->name }}">
                    <input type="hidden" name="hasil" id="hasil" value="{{ $selesai }}">
                    <input type="hidden" name="total" id="total" value="{{ $grantot }}">
                    <a href="#" class="btn btn-outline-info" data-toggle="modal" data-target="#staticModal">+Detail</a>
                    @if($grantot>0 && $selesai>0)
                        <button type="submit" id="btnSimpan" class="btn btn-outline-success">+Transaksi</button>
                    @endif
            </div>
        </div>
    </Form>

        <div class="card">
            <div class="card-header bg-dark">
                <h4 class="card-title text-light">Detail</h4>
            </div>
            <div class="card-body">
                <table id="detail1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th></th>

                            <th>Product</th>
                            <th>Harga</th>
                            <th>Lama</th>
                            <th>SubTotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th> </th>
                            <th>Product</th>
                            <th>Harga</th>
                            <th>Lama</th>
                            <th>SubTotal</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
</div>

<!-- tambah static -->
<div class="modal fade" id="staticModal" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticModalLabel">Tambah</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ url('simpandetail') }}" method="post" enchtype="multipart/form-data">
                    {{ @csrf_field() }}
                    <input type="hidden" id="nota" name="nota" value="{{ $nota }}">
                    @include('transaction.form')
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
 <!-- Delete modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true" data-backdrop="static">
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
                <form action="{{ url('hapusdetail') }}" method="post" enchtype="multipart/form-data">
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
                            'action' :'<a href="#" class="btn btn-outline-danger" data-toggle="modal" data-target="#deleteModal" data-id="'+ json[i].idx +'"><i class="fas fa-trash"></i></a>',
                            'nm_product':json[i].nm_product,
                            'harga':json[i].harga,
                            'lama':json[i].lama,
                            'subtotal':json[i].subtotal
                        })
                    }
                    return returndata;
                }
            },
                "columns" :[
                {'data':'action'},
                {'data':'nm_product'},
                {'data':'harga'},
                {'data':'lama'},
                {'data':'subtotal'}
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
                    swal("The Data Hase been Saved!");
                }
            })
        }

        $('#deleteModal').on('shown.bs.modal', function(event){
            var tombol = $(event.relatedTarget)
            var kode = tombol.data('id')
            var modal =$(this)
            modal.find('.modal-body #kodeid').val(kode);
        });


        $('#nm_product').on('change', function(){
          var hrg =  $(this).find('option:selected').data('harga');
          $('#harga').val(hrg);
          $('#lama').focus();
        });

        $('#lama').on('keyup', function(){
            var lama = $('#lama').val();
            var hrg = $('#harga').val();
            var subtotal = parseInt(hrg) * parseInt(lama);
            $('#subtotal').val(subtotal);
        });  
    </script>
@endsection
{{-- <input class="text-center" type="text" id="lama" name="lama" value=""> --}}
{{-- 'action':'<a href="#" class="btn btn-outline-success" data-toggle="modal" data-target="#editModal" data-id="'+ json[i].idx +'" data-nm="'+ json[i].nm_product +'" data-hrg="'+ json[i].harga +'" data-lm="'+ json[i].lama +'" data-subtot="'+ json[i].subtotal +'"> <i class="fas fa-pencil-alt"></i></a> <a href="#" class="btn btn-outline-danger" data-toggle="modal" data-target="#deleteModal" data-id="'+ json[i].idx +'"><i class="fas fa-trash"></i></a>', --}}
     {{-- {'data':'action'}, --}}

