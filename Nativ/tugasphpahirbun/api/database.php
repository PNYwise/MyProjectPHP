<?php

		class Koneksi
	 {
	 	protected $konek;
	 	private $namahost ='localhost';
	 	private $username='root';
	 	private $password='';
	 	private $namadb='datauser';
		
	 	function sambungan()
		{
	 		$this->konek = new mysqli
	 		($this->namahost, $this->username, $this->password, $this->namadb);

	 		if($this->konek->connect_error)
	 		{
	 			die('Gagal Menyambungkan'.$this->konek->connect_error);
	 		}
	 	}
	 }
	
	/**
	 * 
	 */
	 class User extends Koneksi
	 {
	 		function __construct()
	 	{
	 		$this->sambungan();
	 	}

	 	function loginUser($username='', $password='')
	 	{
	 		$sqltext="Select admin.* From admin Where username='$username' and password='$password' and status='A'" ;
	 		$hasil=$this->konek->query($sqltext);
			
	 		if ($hasil->num_rows > 0)
	 		{
	 			$row=$hasil->fetch_assoc();
	 			$_SESSION['loginID'] = $row['Id'];
	 			$_SESSION['loginAdmin'] = $row['username'];
	 			$_SESSION['Password'] = $row['password'];
	 			$_SESSION['StatusUser'] = $row['status'];
	 			$_SESSION['loginTU'] = $row['TipeUser'];

	 			return true;

	 		}
	 		else
	 		{
	 			session_unset();
	 			return false;
	 		}
	 	}

		
		function apiRegisterUser(...$arrRegister)
		{
			$username;$password;$namalengkap;$tempatlahir;$tgllhr;$alamat;$kota;$jk;$nohp;$nim;
			foreach ($arrRegister as $key => $value) {
				$username=$value['username'];
				$password=$value['password'];
				$nim = $value['nim'];
				$namalengkap=$value['namalengkap'];
				$tempatlahir=$value['tempatlahir'];
				$tgllhr=$value['tgllhr'];
				$alamat=$value['alamat'];
				$kota=$value['kota'];
				$jk=$value['jk'];
				$nohp=$value['nohp'];
			}
			$ssql = "INSERT INTO admin (username,password,nim,namalengkap,tempatlahir,tgllhr,alamat,kota,jk,nohp) VALUES (?,?,?,?,?,?,?,?,?,?)";
			$qry = $this->konek->prepare($ssql);
			$qry->bind_param('ssssssssss', $username, $password, $nim, $namalengkap, $tempatlahir, $tgllhr, $alamat, $kota, $jk, $nohp);
			return $qry->execute();
			$idterakhir = $this->konek->insert_id;
			return $idterakhir;
		}

		function profilUserLogin($username='', $password=''){
			$sqltext = "select * from admin Where username='$username' And password='$password' And status='A'";
			$hsl = $this->konek->query($sqltext);
			return $hsl->fetch_assoc();

		}

		function apiEditProfileUser(...$arrEdit)
		{
			$Id;$username;$password;$namalengkap;$tempatlahir;$tgllhr;$alamat;$kota;$jk;$nohp;$nim;
			foreach ($arrEdit as $key => $value) {
				$Id=$value['Id'];
				$username=$value['username'];
				$password=$value['password'];
				$nim = $value['nim'];
				$namalengkap=$value['namalengkap'];
				$tempatlahir=$value['tempatlahir'];
				$tgllhr=$value['tgllhr'];
				$alamat=$value['alamat'];
				$kota=$value['kota'];
				$jk=$value['jk'];
				$nohp=$value['nohp'];
			}
			$ssql = "UPDATE admin SET username=?,password=?,nim=?,namalengkap=?,tempatlahir=?,tgllhr=?,alamat=?,kota=?,jk=?,nohp=? WHERE Id=".$Id;
			$qry = $this->konek->prepare($ssql);
			$qry->bind_param('ssssssssss', $username, $password, $nim, $namalengkap, $tempatlahir, $tgllhr, $alamat, $kota, $jk, $nohp);
			return $qry->execute();
		}
		function apiHapusProfileUser($Id)
		{
			$ssql = "DELETE admin.* FROM admin Where Id=".$Id;
			$qry = $this->konek->prepare($ssql);
			$h = $qry->execute();
			if($h)
			{
				return true;
			}
			else
			{
				return false;
			}
		}

		function bacaUserPerID($Id='')
		{
			$sqltext = "SELECT admin.* FROM admin WHERE Id =".$Id;
			$hsl1 = $this->konek->query($sqltext);
			$row = $hsl1->fetch_assoc();
			return $row;
		}

		function apiUpdateFotoProfil($nmfoto='', $Id='')
		{
			$ssql = "UPDATE admin SET foto=? WHERE Id=".$Id;
			$qry = $this->konek->prepare($ssql);
			$qry->bind_param('s',$nmfoto);
			$hsl = $qry->execute();
			return $hsl;
		}
	}

?>

