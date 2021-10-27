<?php
	include ("../koneksi.php");

		$judul      		= $_POST['judul'];
		$foto			= $_FILES['foto']['name'];
		
		$query = mysqli_query($koneksi,"INSERT INTO galeri SET judul='$judul',foto='$foto'");

		move_uploaded_file($_FILES['foto']['tmp_name'], '../foto/'.$foto);
		header("location:data_galeri.php");
?>