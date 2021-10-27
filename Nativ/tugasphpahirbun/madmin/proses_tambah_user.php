<?php
	include '../koneksi.php';

		$username      = $_POST['username'];
		$password      = $_POST['password'];
		$level	  	   = $_POST['level'];

		$query = "INSERT INTO user SET username='$username',password='$password',level='$level'";
		mysqli_query($koneksi, $query);

		header("location:menu_admin.php");

?>