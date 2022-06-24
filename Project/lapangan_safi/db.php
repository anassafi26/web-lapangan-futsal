<?php 
	$hostname = 'localhost';
	$username = 'root';
	$password = '';
	$dbname	  = 'lapangan_futsal';


	$conn = mysqli_connect($hostname, $username, $password, $dbname) or die ('Gagal terhubung ke database');
	$nama_admin		= "";
	$no_tlp			= "";
	$alamat			= "";
	$jenis_kelamin	= "";
	$password		= "";
	$sukses     	= "";
	$error      	= "";

	if(isset($_GET['op'])){
		$op = $_GET['op'];
	}else{
		$op = "";
	}
	if($op == 'delete'){
		$id_admin	= $_GET['id_admin'];
		$sql1		= "delete from admin where id_admin = '$id_admin'";
		$q1			= 	mysqli_query($conn,$sql1);
		if($q1){
			$sukses = "Berhasil hapus data";
		}else{
			$error 	= "Gagal melakukan delete data";
		}
	}

	if($op == 'edit'){
		$id_admin		= $_GET['id_admin'];
		$sql1			= "select * from admin where id_admin = '$id_admin'";
		$q1				= mysqli_query($conn,$sql1);
		$r1				= mysqli_fetch_array($q1);
		$nama_admin		= $r1['nama_admin'];
		$no_tlp			= $r1['no_tlp'];
		$alamat			= $r1['alamat'];
		$jenis_kelamin	= $r1['jenis_kelamin'];
		$password		= $r1['password'];

		if($nama_admin == ''){
			$error = "Data Tidak ditemukan";
		}
	}
	if (isset($_POST['simpan'])){ //untuk create
		$nama_admin		= $_POST['nama_admin'];
		$no_tlp			= $_POST['no_tlp'];
		$alamat			= $_POST['alamat'];
		$jenis_kelamin	= $_POST['jenis_kelamin'];
		$password		= $_POST['password'];

		if ($nama_admin && $no_tlp && $alamat && $jenis_kelamin && $password) {
			if($op == 'edit'){ //untuk update
				$sql1	= "update admin set nama_admin = '$nama_admin', no_tlp='$no_tlp', alamat='$alamat', jenis_kelamin='$jenis_kelamin', password='$password' where id_admin = '$id_admin'";
				$q1		= mysqli_query($conn,$sql1);
				if($q1){
					$sukses = "Data berhasil diupdate";
				}else{
					$error	= "Data Gagal diupdate";
				}
			}else{ //untuk insert
				$sql1 	= "insert into admin(nama_admin, no_tlp, alamat, jenis_kelamin, password) values ('$nama_admin', '$no_tlp', '$alamat', '$jenis_kelamin', '$password')";
				$q1 	= mysqli_query($conn, $sql1);
				if($q1){
					$sukses		= "Berhasil Memasukkan Data Baru";
			}else{
				$error      = "Gagal Memasukkan Data";
			}
			}

			
		}else{
			$error	= "Silahkan Masukkan Semua Data Yaa";
		}
	}

 ?>