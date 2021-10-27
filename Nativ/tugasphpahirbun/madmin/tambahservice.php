<form action="proses_tambah_service.php" method="POST" enctype="multipart/form-data">
        <div class="form-group row">
            <label class="col-lg-2 col-form-label form-control-label" for="nama">Nama</label>
            <div class="col-lg-10">
                <input id="nama" type="text" class="form-control" name="nama" required autocomplete="nama" placeholder="Masukkan Nama">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-lg-2 col-form-label form-control-label">Keterangan</label>
            <div class="col-lg-10">
                <textarea class="form-control" name="keterangan"></textarea>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-lg-2 col-form-label form-control-label" for="foto">Foto</label>
            <div class="col-lg-10">
                <div class="custom-file">
                    <input type="file" class="form-control" id="foto" name="foto" placeholder="Pilih Foto">
                </div>
            </div>
        </div>
        <div class="form-group row">
        <label class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10">
                <input type="reset" class="btn btn-danger waves-effect waves-light m-1" value="Reset">
                <button type="submit" class="btn btn-success"><i class="fa fa-check-square-o"></i> SIMPAN</button>
            </div>
        </div>
    </form>