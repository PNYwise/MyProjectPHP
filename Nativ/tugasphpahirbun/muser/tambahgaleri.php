<form action="proses_tambah_galeri.php" method="POST" enctype="multipart/form-data">
        <div class="form-group row">
            <label class="col-lg-2 col-form-label form-control-label" for="judul">Judul</label>
            <div class="col-lg-10">
                <input id="judul" type="text" class="form-control" name="judul" required autocomplete="judul" placeholder="Masukkan Judul">
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