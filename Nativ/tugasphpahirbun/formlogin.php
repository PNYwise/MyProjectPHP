<form action="proses.php" method="POST">
        <div class="modal-body">
<div class="form-group">
    <label for="exampleInputEmail1">User Name</label>
    <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword1">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Level</label>
    <select class="form-control" name="level">
      <option value="Admin">Admin</option>
      <option value="User">User</option>
    </select>
  </div>
  <div class="form-group" style="padding-top: 2rem;">
    <button style="width: 100%;" type="submit" class="popup-login">Login</button>
  </div>
</div>
</div>
</form>