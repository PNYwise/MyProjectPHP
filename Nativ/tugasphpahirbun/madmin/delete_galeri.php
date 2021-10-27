<?php
include '../koneksi.php';
$id = $_GET['id'];
$query = mysqli_query($koneksi,"DELETE FROM galeri WHERE id='$id'");
if ($query) {
 	header("location:data_galeri.php");
 }else{
 	echo "gagal";
 }

?>