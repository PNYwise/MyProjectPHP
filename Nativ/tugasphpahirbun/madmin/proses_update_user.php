<?php
	include ("../koneksi.php");

		$id         = $_POST['id'];
		$username   = $_POST['username'];
		$password  	= $_POST['password'];
		$level  	= $_POST['level'];

		$query = mysqli_query($koneksi,"UPDATE user SET username='$username',password='$password',level='$level' WHERE id='$id'");

		header("location:menu_admin.php");
?>