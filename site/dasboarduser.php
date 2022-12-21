<?php
   session_start();
   include "db.php";
	include "koneksi.php";

	


	if(isset($_COOKIE['uname'])){
        $username=$_COOKIE['uname'];
        $password=$_COOKIE['pass'];

		
		
	$username = $_SESSION['username'];
	$data = "SELECT * FROM users WHERE username='$username'";
	$eksekusi = mysqli_query($koneksi, $data);

	$hasil = mysqli_fetch_assoc($eksekusi);
	$_SESSION['id_user'] = $hasil['id'];
	$_SESSION['username'] = $hasil['username'];
	$_SESSION['email'] = $hasil['email'];
	$_SESSION['nama'] = $hasil['nama'];
	$_SESSION['tanggal_lahir'] = $hasil['tanggal_lahir'];
	$_SESSION['negara'] = $hasil['negara'];
	$_SESSION['provinsi'] = $hasil['provinsi'];
	$_SESSION['kota'] = $hasil['kota'];
	$_SESSION['jenis_kelamin'] = $hasil['jenis_kelamin'];

	$tiket = "SELECT * FROM users JOIN penumpang ON users.id=penumpang.id WHERE users.id='".$_SESSION['id_user']."'";
	$tampil = mysqli_query($koneksi, $tiket);
	$_SESSION['nama'] = $hasil['nama'];
	// $_SESSION['jam_berangkat'] = $hasil['jam_berangkat'];
	// $_SESSION['no_ktp'] = $hasil['no_ktp'];
	// $_SESSION['jenis_penumpang'] = $hasil['jenis_penumpang'];
	// $_SESSION['jenis_kelamin'] = $hasil['jenis_kelamin'];
	// $_SESSION['email'] = $hasil['email'];
	// $_SESSION['no_telp'] = $hasil['no_telp'];
	// $_SESSION['provinsi_asal'] = $hasil['provinsi_asal'];
	// $_SESSION['provinsi_tujuan'] = $hasil['provinsi_tujuan'];
	// $_SESSION['tambahan_bagasi'] = $hasil['tambahan_bagasi'];
	// $_SESSION['kursi'] = $hasil['kursi'];

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--Bootstrap CSS-->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<title>Dasboard</title>
</head>
<body>
	<?= include "header.php"; ?>
	
	<main>
		<div class="container mt-3">
			<div class="row">
				<div class="col-sm-12">
					<div class="card">
						<div class="card-body">
							<h5 class="card-tittle">Akun User</h5>
							<form method="post" action="login.php">
								<input type="submit" class="button btn btn-primary mt-3" name="submitLogout" value="Logout" href="index.php"/>
							</form>
							<hr>
							<table style="margin-left: 5%;" width="40%">
								<tr>
									<td>Username</td>
									<td style="width: 10%;">:</td>
									<td><?= $_SESSION['username'] ?></td>
								</tr>
								<tr>
									<td>Email</td>
									<td>:</td>
									<td><?= $_SESSION['email'] ?></td>
								</tr>
								<tr>
									<td>Akun Atas Nama</td>
									<td>:</td>
									<td><?= $_SESSION['nama'] ?></td>
								</tr>
								<tr>
									<td>Tanggal Lahir</td>
									<td>:</td>
									<td><?= $_SESSION['tanggal_lahir'] ?></td>
								</tr>
								<tr>
									<td>Alamat</td>
									<td>:</td>
									<td><?= $_SESSION['negara'] ?></td>
								</tr>
								<tr>
									<td></td>
									<td></td>
									<td><?= $_SESSION['provinsi'] ?></td>
								</tr>
								<tr>
									<td></td>
									<td></td>
									<td><?= $_SESSION['kota'] ?></td>
								</tr>
								<tr>
									<td>Jenis Kelamin</td>
									<td>:</td>
									<td><?= $_SESSION['jenis_kelamin'] ?></td>
								</tr>
								<tr>
									<td>Pesanan Tiket</td>
									<td>:</td>
									<td></td>
								</tr>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>
</body>
</html>
		<?php
       
    } else if(isset($_SESSION['username'])){
        $username = $_SESSION['username'];
        $password = $_SESSION['pass'];
       

$username = $_SESSION['username'];
	$data = "SELECT * FROM users WHERE username='$username'";
	$eksekusi = mysqli_query($koneksi, $data);

	$hasil = mysqli_fetch_assoc($eksekusi);
	$_SESSION['id_user'] = $hasil['id'];
	$_SESSION['username'] = $hasil['username'];
	$_SESSION['email'] = $hasil['email'];
	$_SESSION['nama'] = $hasil['nama'];
	$_SESSION['tanggal_lahir'] = $hasil['tanggal_lahir'];
	$_SESSION['negara'] = $hasil['negara'];
	$_SESSION['provinsi'] = $hasil['provinsi'];
	$_SESSION['kota'] = $hasil['kota'];
	$_SESSION['jenis_kelamin'] = $hasil['jenis_kelamin'];

	$tiket = "SELECT * FROM users JOIN penumpang ON users.id=penumpang.id WHERE users.id='".$_SESSION['id_user']."'";
	$tampil = mysqli_query($koneksi, $tiket);
	$_SESSION['nama'] = $hasil['nama'];
	// $_SESSION['jam_berangkat'] = $hasil['jam_berangkat'];
	// $_SESSION['no_ktp'] = $hasil['no_ktp'];
	// $_SESSION['jenis_penumpang'] = $hasil['jenis_penumpang'];
	// $_SESSION['jenis_kelamin'] = $hasil['jenis_kelamin'];
	// $_SESSION['email'] = $hasil['email'];
	// $_SESSION['no_telp'] = $hasil['no_telp'];
	// $_SESSION['provinsi_asal'] = $hasil['provinsi_asal'];
	// $_SESSION['provinsi_tujuan'] = $hasil['provinsi_tujuan'];
	// $_SESSION['tambahan_bagasi'] = $hasil['tambahan_bagasi'];
	// $_SESSION['kursi'] = $hasil['kursi'];

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--Bootstrap CSS-->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<title>Dasboard</title>
</head>
<body>
	<?= include "header.php"; ?>
	
	<main>
		<div class="container mt-3">
			<div class="row">
				<div class="col-sm-12">
					<div class="card">
						<div class="card-body">
							<h5 class="card-tittle">Akun User</h5>
							<form method="post" action="login.php">
								<input type="submit" class="button btn btn-primary mt-3" name="submitLogout" value="Logout" href="index.php"/>
							</form>
							<hr>
							<table style="margin-left: 5%;" width="40%">
								<tr>
									<td>Username</td>
									<td style="width: 10%;">:</td>
									<td><?= $_SESSION['username'] ?></td>
								</tr>
								<tr>
									<td>Email</td>
									<td>:</td>
									<td><?= $_SESSION['email'] ?></td>
								</tr>
								<tr>
									<td>Akun Atas Nama</td>
									<td>:</td>
									<td><?= $_SESSION['nama'] ?></td>
								</tr>
								<tr>
									<td>Tanggal Lahir</td>
									<td>:</td>
									<td><?= $_SESSION['tanggal_lahir'] ?></td>
								</tr>
								<tr>
									<td>Alamat</td>
									<td>:</td>
									<td><?= $_SESSION['negara'] ?></td>
								</tr>
								<tr>
									<td></td>
									<td></td>
									<td><?= $_SESSION['provinsi'] ?></td>
								</tr>
								<tr>
									<td></td>
									<td></td>
									<td><?= $_SESSION['kota'] ?></td>
								</tr>
								<tr>
									<td>Jenis Kelamin</td>
									<td>:</td>
									<td><?= $_SESSION['jenis_kelamin'] ?></td>
								</tr>
								<tr>
									<td>Pesanan Tiket</td>
									<td>:</td>
									<td></td>
								</tr>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>
</body>
</html>
	   <?php
    } else{
        echo "<center><h1>Anda harus login terlebih dahulu</h1></center>";
    }
	
	

