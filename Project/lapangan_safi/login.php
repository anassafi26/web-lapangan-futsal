<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login Admin</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
</head>
<body id="bg-login">
	<div class="box-login">
		<h2>Hayy Admin</h2>
		<form action="" method="POST">
			<input type="text" name="user" placeholder="Username" class="input-control">
			<input type="password" name="pass" placeholder="Password" class="input-control">
			<input type="submit" name="submit" value ="LOGIN" class="btn">
		</form>
		<?php 
			if(isset($_POST['submit'])){
				session_start();
				include 'db.php';

				$user = $_POST['user'];
				$pass = $_POST['pass'];

				$cek = mysqli_query($conn, "SELECT * FROM admin WHERE nama_admin = '".$user."' AND password = '".$pass."'");
				if(mysqli_num_rows($cek) > 0){
					$d = mysqli_fetch_object($cek);
					$_SESSION['status_login'] = true;
					$_SESSION['a_global'] = $d;
					$_SESSION['id'] = $d->id_admin;
					echo '<script>window.location="dashboard.php"</script>';
				}else{
					echo '<script>alert("Username atau Password Anda Salah!!")</script>';
				}
			}
		 ?>
	</div>
</body>
</html>