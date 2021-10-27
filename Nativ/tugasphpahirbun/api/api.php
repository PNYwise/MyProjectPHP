<?php 

	header('Access-Control-Allow-Origin: *');
	header('Access-Control-Allow-Credentials: true');
	header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
	header('Access-Control-Allow-Headers: Content-Type, Authorization, X-Request-Width');
	header('Content-Type: application/json; charset-utf-8');
	header('Content-Type: multipart/form-data;');


	//koneksi database
	include_once('database.php');
	$usr = new User();

	// $data = file_get_contents('php://input');
	// $obj = json_decode($data);
	// $action = strip_tags($obj->aksi);

	if(isset($_POST['aksi'])){
		$foto = $_FILES['file'];
		$iduser = $_POST['Id'];
		$nmfoto = $foto['name'];
		$sizefoto = $foto['size'];
		$url_foto = 'img/'.$nmfoto;

		if ($sizefoto > 10240) {
			$dtprofil = $usr->bacaUserPerID($iduser);
			echo json_encode(['ket'=>'Gagal','msg'=>'Ukuran file tidak boleh lebih dari 10kb','profil'=>$dtprofil]);
		}
		else
		{
			$hslUpload = move_uploaded_file($foto['tmp_name'], $url_foto);
			if($hslUpload){
				$updatefoto = $usr->apiUpdateFotoProfil($nmfoto,$iduser);
				if($updatefoto){
					$dtprofil = $usr->bacaUserPerID($iduser);
					echo json_encode(['ket'=>'Sukses','msg'=>'Upload Foto Berhasil','profile'=>$dtprofil]);
				}else{
					$dtprofil = $usr->bacaUserPerID($iduser);
					echo json_encode(['ket'=>'Gagal','msg'=>'Upload Foto Gagal','profile'=>$dtprofil]);
				}
			}
			else
			{
				$dtprofil = $usr->bacaUserPerID($iduser);
				echo json_encode(['ket'=>'Gagal','msg'=>'Upload Foto Gagal','profile'=>$dtprofil]);
			}
		}
	}else{
		//menangkap kiriman
		$data = file_get_contents('php://input');
		$obj = json_decode($data);
		$action = strip_tags($obj->aksi);

		if ($action == 'login') {
			//baca data kiriman tentang username dan password
			$username = strip_tags($obj->nUsername);
			$password = strip_tags($obj->nPassword);
			if($usr->loginUser($username, $password)){
				$dtprofil= $usr->profilUserLogin($username, $password);
				//bacakan password user jadikan nilainya sbg kata utk dienkripsi 
				$nToken = password_hash('bismillah', PASSWORD_DEFAULT);
				//baca user
				$dtprofile = $usr->profilUserLogin($username, $password);
				
				echo json_encode(['message' => 'Berhasil','token' => $nToken, 'profile' => $dtprofile]);
				
			}
			else
			{
				echo json_encode(['message' => 'Gagal','token' => null, 'profile' => null]);
			}
		}

		elseif ($action == 'register') {
			$nUsername = strip_tags($obj->nUsername);
			$nPassword = strip_tags($obj->nPassword);
			$nNIM = strip_tags($obj->nNIM);
			$nNamaLengkap = strip_tags($obj->nNamaLengkap);
			$nTmptLhr = strip_tags($obj->nTmptLhr);
			$nTglLhr = strip_tags($obj->nTglLhr);
			$nAlamat = strip_tags($obj->nAlamat);
			$nKota = strip_tags($obj->nKota);
			$nJk = strip_tags($obj->nJk);
			$nNohp = strip_tags($obj->nNohp);
			$arrReg = [
				'Id'=> 0,
				'username'=>$nUsername,
				'password'=>$nPassword,
				'nim'=>$nNIM,
				'namalengkap'=>$nNamaLengkap,
				'tempatlahir'=>$nTmptLhr,
				'tgllhr'=>$nTglLhr,
				'alamat'=>$nAlamat,
				'kota'=>$nKota,
				'jk'=>$nJk,
				'nohp'=>$nNohp,
				'foto'=>'profile.jpg'
			];
		 

			$dtreg = $usr->apiRegisterUser($arrReg);
			if ($dtreg > 0) {
				$arrReg['Id'] = $dtreg;
				$nToken = password_hash($nPassword, PASSWORD_DEFAULT);
				echo json_encode(['message' => 'Berhasil','token' => $nToken, 'profile' => $arrReg]);
			}
			else
			{
				echo json_encode(['message' => 'Gagal','token' => null, 'profile' => null]);
			}
		}

		elseif ($action == 'editprofile')
		{
			$nId = strip_tags($obj->nId);
			$nUsername = strip_tags($obj->nUsername);
			$nPassword = strip_tags($obj->nPassword);
			$nNIM = strip_tags($obj->nNIM);
			$nNamaLengkap = strip_tags($obj->nNamaLengkap);
			$nTmptLhr = strip_tags($obj->nTmptLhr);
			$nTglLhr = strip_tags($obj->nTglLhr);
			$nAlamat = strip_tags($obj->nAlamat);
			$nKota = strip_tags($obj->nKota);
			$nJk = strip_tags($obj->nJk);
			$nNohp = strip_tags($obj->nNohp);

			$arrEdit = [
				'Id'=>$nId,
				'username'=>$nUsername,
				'password'=>$nPassword,
				'nim'=>$nNIM,
				'namalengkap'=>$nNamaLengkap,
				'tempatlahir'=>$nTmptLhr,
				'tgllhr'=>$nTglLhr,
				'alamat'=>$nAlamat,
				'kota'=>$nKota,
				'jk'=>$nJk,
				'nohp'=>$nNohp,
				'foto'=>'profile.jpg'
			];
		 

			$dtEdit = $usr->apiEditProfileUser($arrEdit);
			if ($dtEdit) {
				$nToken = password_hash($nPassword, PASSWORD_DEFAULT);
				// $dtprofile = $usr->profilUserLogin($username, $password);
				echo json_encode(['message' => 'Berhasil','token' => $nToken, 'profile' => $arrEdit]);
			}
			else
			{
				echo json_encode(['message' => 'Gagal','token' => null, 'profile' => null]);
			}
		}
		else if($action = 'hapususer')
		{
			$Id = strip_tags($obj->nId);

			$dthapus = $usr->apiHapusProfileUser($Id);

			if ($dthapus){
				echo json_encode(['message' => 'Berhasil']);
			}
			else{
				echo json_encode(['message' => 'Gagal']);
			}
		}
	}
 ?>
