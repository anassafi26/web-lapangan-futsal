<?php 
	session_start();
	include 'db.php';
	if($_SESSION['status_login'] != true){
		echo '<script>window.location="login.php"</script>';
	}

	$query = mysqli_query($conn, "SELECT * FROM admin WHERE id_admin = '".$_SESSION['id']."'");
	$d = mysqli_fetch_object($query);
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Profil Admin</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<style>
		.mx-auto { width:800px; }
		.card { margin-top: 10px;}
	</style>

</head>

<body>
	<!-- HEADER -->
	<header>
		<div class="container">
			<h1><a href="dashboard.php">Lapangan Futsal</a></h1>
			<ul>
				<li><a href="dashboard.php">Dashboard</a></li>
				<li><a href="profil.php">Profil</a></li>
				<li><a href="">??</a></li>
				<li><a href="">??</a></li>
				<li><a href="keluar.php">Keluar</a></li>
			</ul>
		</div>
	</header>

	<!-- CONTENT -->
	<div class="mx-auto">
		<!--untuk memasukkan data-->
		<div class="card">
 			<div class="card-header">
   				 Create / Edit Data
  			</div>
  			<div class="card-body">
				<?php
				if ($error) {
				?>
					<div class="alert alert-danger" role="alert">
  						<?php echo $error ?>
					</div>
				<?php
					header("refresh:4;url=profil.php"); //3 : detik
				}
				?>
				<?php
				if ($sukses) {
				?>
					<div class="alert alert-success" role="alert">
  						<?php echo $sukses ?>
					</div>
				<?php
					header("refresh:4;url=profil.php"); //3 : detik
				}
				?>

   				<form action="" method="POST">
   				 	<div class="mb-3 row">
    					<label for="nama_admin" class="col-sm-2 col-form-label">Nama</label>
    					<div class="col-sm-10">
      						<input type="text" class="form-control" id="nama_admin" name="nama_admin" value="<?php echo $nama_admin ?>">
    					</div>
  					</div>

  					<div class="mb-3 row">
    					<label for="no_tlp" class="col-sm-2 col-form-label">No telp</label>
    					<div class="col-sm-10">
      						<input type="text" class="form-control" id="no_tlp" name="no_tlp" value="<?php echo $no_tlp ?>">
    					</div>
  					</div>

  					<div class="mb-3 row">
    					<label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
    					<div class="col-sm-10">
      						<input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $alamat ?>">
    					</div>
  					</div>

  					<div class="mb-3 row">
    					<label for="jenis_kelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
    					<div class="col-sm-10">
      						<select class="form-control" name="jenis_kelamin" id="jenis_kelamin">
      							<option value="">- Pilih Jenis Kelamin</option>
      							<option value="pria"  <?php if($jenis_kelamin == "pria") echo "selected"?>>Pria</option>
      							<option value="wanita" <?php if($jenis_kelamin == "wanita") echo "selected"?>>Wanita</option>
      						</select>
  						</div>
					</div>

					<div class="mb-3 row">
    					<label for="password" class="col-sm-2 col-form-label">Password</label>
    					<div class="col-sm-10">
      						<input type="text" class="form-control" id="password" name="password" value="<?php echo $password ?>">
    					</div>
  					</div>

					<div class="col-12">
						<input type="submit" name="simpan" value="Simpan Data" class="btn btn-primary" require/> 
					</div>
   				</form>
  			</div>
		</div>

	<!--untuk mengeluarkan data-->
	<div class="card">
 			<div class="card-header text-white bg-secondary">
   				 Data Admin
  			</div>
  			<div class="card-body">
   				 <table class="table">
					<thead>
						<tr>
							<th scope="col">#</th>
							<th scope="col">Nama</th>
							<th scope="col">No Telephon</th>
							<th scope="col">Alamat</th>
							<th scope="col">Jenis Kelamin</th>
							<th scope="col">Password</th>
							<th scope="col">Aksi</th>
						</tr>
						<tbody>
							<?php
							$sql2	= "select * from admin order by id_admin desc";
							$q2		= mysqli_query($conn,$sql2);
							$urut	= 1;
							while($r2 = mysqli_fetch_array($q2)){
								$id_admin		= $r2['id_admin'];
								$nama_admin		= $r2['nama_admin'];
								$no_tlp			= $r2['no_tlp'];
								$alamat			= $r2['alamat'];
								$jenis_kelamin	= $r2['jenis_kelamin'];
								$password		= $r2['password'];
								
								?>
								<tr>
									<th scope="row"><?php echo $urut++ ?></th>
									<td scope="row"><?php echo $nama_admin ?></td>
									<td scope="row"><?php echo $no_tlp ?></td>
									<td scope="row"><?php echo $alamat ?></td>
									<td scope="row"><?php echo $jenis_kelamin ?></td>
									<td scope="row"><?php echo $password ?></td>
									<td scope="row">
										<a href="profil.php?op=edit&id_admin=<?php echo $id_admin?>"><button type="button" class="btn btn-warning">Edit</button></a>
										<a href="profil.php?op=delete&id_admin=<?php echo $id_admin?>" onclick="return confirm('yakin mau delete data?')"><button type="button" class="btn btn-danger">Delete</button></a>
								
								</tr>
								<?php
							}
							?>
						</tbody>
  			</div>
		</div>

	</div>
</body>
</html>