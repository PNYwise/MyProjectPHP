<?php 
	session_start();

	include 'koneksi.php';

	$username = $_POST['username'];
	$password = $_POST['password'];
	$level 	= $_POST['level'];

	$login = mysqli_query($koneksi,"select * from user where username='$username' and password='$password' and level='$level'");
	$cek = mysqli_num_rows($login);
	 
	if($cek = 1){
		$data = mysqli_fetch_assoc($login);
		if($data['level']=="Admin"){
			$_SESSION['username'] = $data['username'];
			$_SESSION['level'] = "Admin";
			header("location:madmin/menu_admin.php");
	 
		}else if($data['level']=="User"){
			$_SESSION['username'] = $data['username'];
			$_SESSION['level'] = "User";
			header("location:muser/menu_user.php");
	 
		}else{
			echo"<script>window.alert('Pengguna Belum Terdaftar')
				window.location='index.php'</script>";
		}	
	}else{
		echo"<script>window.alert('Login Gagal')
				window.location='index.php'</script>";
	}
?>