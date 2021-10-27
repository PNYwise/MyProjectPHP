<form action="proses_tambah_user.php" method="POST">
        <div class="form-group">
            <label for="username" class="sr-only">Username</label>
            <div class="position-relative has-icon-right">
                <input type="text" id="username" class="form-control" placeholder="Masukkan Username" name="username" autofocus>
            </div>
        </div>
        <div class="form-group">
            <label for="password" class="sr-only">Password</label>
            <div class="position-relative has-icon-right">
                <input type="password" id="password" class="form-control" placeholder="Masukkan Password" name="password">
            </div>
        </div>
        <div class="form-group">
            <label class="sr-only"for="level">Level</label>
            <select class="form-control" name="level">
                <option value="Admin">Admin</option>
                <option value="User">User</option>
            </select>
        </div>
        <div align="right">
            <input type="reset" class="btn btn-danger" value="Reset">
            <button type="submit" class="btn btn-success btn-round px-5"><i class="fa fa-check"></i> Simpan</button>
        </div>
</form>