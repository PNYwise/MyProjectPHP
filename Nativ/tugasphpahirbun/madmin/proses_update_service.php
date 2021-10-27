<?php
	include ("../koneksi.php");

		$id 			= $_POST['id'];
		$nama      		= $_POST['nama'];
		$keterangan	  	   	= $_POST['keterangan'];
		$foto			= $_FILES['foto']['name'];

		$query = mysqli_query($koneksi,"UPDATE service SET nama='$nama',keterangan='$keterangan',foto='$foto' WHERE id='$id'");

		move_uploaded_file($_FILES['foto']['tmp_name'], '../foto/'.$foto);

		header("location:data_service.php");
?>