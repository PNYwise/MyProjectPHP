<?php
	include ("../koneksi.php");

		$nama      		= $_POST['nama'];
		$keterangan	  	   	= $_POST['keterangan'];
		$foto			= $_FILES['foto']['name'];
		
		$query = mysqli_query($koneksi,"INSERT INTO service SET nama='$nama',keterangan='$keterangan',foto='$foto'");

		move_uploaded_file($_FILES['foto']['tmp_name'], '../foto/'.$foto);
		header("location:menu_user.php");
?>