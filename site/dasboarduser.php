<?php
	include "koneksi.php";	

    session_start();

    include "db.php";
     if(isset($_COOKIE['uname'])){
        $username=$_COOKIE['uname'];
        $password=$_COOKIE['pass'];
        tampilkanData();
    } else if(isset($_SESSION['username'])){
        $username = $_SESSION['username'];
        $password = $_SESSION['pass'];
       tampilkanData();
    } else{
        echo "<center><h1>Anda harus login terlebih dahulu</h1></center>";
    }

?>

<?php function tampilkanData(){
	include "koneksi.php";	
    include "db.php";
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

	$tiket = "SELECT * FROM penumpang WHERE id_user='".$hasil['id']."'";
	$tampil = mysqli_query($koneksi, $tiket);

	if ($tampil->num_rows > 0){
		$hasil2 = mysqli_fetch_assoc($tampil);
		$_SESSION['nama'] = $hasil2['nama'];
		$_SESSION['no_ktp'] = $hasil2['no_ktp'];
		$_SESSION['jenis_penumpang'] = $hasil2['jenis_penumpang'];
		$_SESSION['jenis_kelamin'] = $hasil2['jenis_kelamin'];
		$_SESSION['email'] = $hasil2['email'];
		$_SESSION['no_telp'] = $hasil2['no_telp'];
		$_SESSION['provinsi_tujuan'] = $hasil2['provinsi'];
		$_SESSION['tambahan_bagasi'] = $hasil2['tambahan_bagasi'];
		$_SESSION['kursi'] = $hasil2['kursi'];
		$_SESSION['id_penerbangan'] = $hasil2['id_penerbangan'];

		$terbang = "SELECT * FROM penerbangan JOIN penumpang ON penerbangan.id_penerbangan=penumpang.id_penerbangan JOIN users ON id=id_user   WHERE id_user='".$hasil['id']."'";
		$tampil2 = mysqli_query($koneksi, $terbang);
		if ($tampil2->num_rows > 0){
			$hasil3 = mysqli_fetch_assoc($tampil2);
			$_SESSION['tanggal_berangkat'] = $hasil3['tanggal_berangkat'];
			$_SESSION['jam_berangkat'] = $hasil3['jam_berangkat'];
			$_SESSION['tanggal_sampai'] = $hasil3['tanggal_sampai'];
			$_SESSION['jam_sampai'] = $hasil3['jam_sampai'];
			
			$namaBandaraAsal="SELECT * FROM bandara WHERE id_bandara='". $hasil3['bandara_berangkat']."'";
			$tampilBandara1=mysqli_query($koneksi, $namaBandaraAsal);
			$hasilBandara1 = mysqli_fetch_assoc($tampilBandara1);
			$_SESSION['bandara_berangkat'] = $hasilBandara1['nama'];

			$namaBandaraT="SELECT * FROM bandara WHERE id_bandara='". $hasil3['bandara_tujuan']."'";
			$tampilBandara2=mysqli_query($koneksi, $namaBandaraT);
			$hasilBandara2 = mysqli_fetch_assoc($tampilBandara2);
			$_SESSION['bandara_tujuan'] = $hasilBandara2['nama'];


			$_SESSION['tipe'] = $hasil3['tipe'];
			$_SESSION['provinsi'] = $hasil3['provinsi'];
			$_SESSION['tambahan_bagasi'] = $hasil3['tambahan_bagasi'];
			$_SESSION['kursi'] = $hasil3['kursi'];
		}
		
	}

	


	

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

	<main>
		<div class="container mt-3">
			<div class="row">
				<div class="col-sm-12">
					<div class="card">
						<div class="card-body">
							<h5 class="card-tittle">Akun User</h5>
							<form method="post" action="login.php" style="position:relative">
								<input type="submit" style="position:absolute; right:0;" class="button btn btn-primary mt-3" name="submitLogout" value="Logout" href="index.php"/>
							</form>
							<hr>
							<table style="margin-left: 5%;" >
								<tr>
									<td>Username</td>
									<td style="width: 1%;">:</td>
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
									<td><?= $_SESSION['kota'] ?></td>
								</tr>
								<tr>
									<td>Jenis Kelamin</td>
									<td>:</td>
									<td><?= $_SESSION['jenis_kelamin'] ?></td>
								</tr>
								<tr>
									<td>Tiket Pesawat</td>
									<td>:</td>
									<td></td>
								</tr>
							</table>
							<hr style="margin-left: 20%;">


							
							<table class="border p-5"
							<?php 
							if($tampil->num_rows == 0){
								 echo 'style="margin-left: 20%; display:none"'; 
								}else{
									echo 'style="margin-left: 20%; display:block"'; 
								}
								?>
							>
								<tr>
									<td style="width: 35%;"><p class="h3">TIKET</p><p class=""><?= $_SESSION['nama'] ?></p></td>
									<td style="width: 15%;"></td>
									<td style="width: 15%;"></td>
									<td style="width: 25%;"></td>
					
									<td style="width: 15%; padding-bottom: 5%;" class="h1 bolder"><center><?= $_SESSION['kursi'] ?></center></td>
								</tr>
								<tr>
									<td><?= $_SESSION['no_ktp'] ?></td>
									<td><?= $_SESSION['jenis_kelamin'] ?></td>
									<td></td>
									<td><?= $_SESSION['email'] ?></td>
									<td><?= $_SESSION['no_telp'] ?></td>
								</tr>
								<tr>
									<td colspan='4'>Penerbangan Dari <?= $_SESSION['bandara_berangkat'] ?> - Ke <?= $_SESSION['bandara_tujuan'] ?></td>
									<!-- <td></td>
									<td></td> -->
									<td style=" padding-top: 7%;"></td>
								</tr>
								<tr>
									<td >Hari : <?= $_SESSION['tanggal_berangkat'] ?></td>
									<td colspan="2">Pukul : <?= $_SESSION['jam_berangkat'] ?> - <?= $_SESSION['jam_sampai'] ?> </td>
									<td></td>
								</tr>
								<tr>
								<td style="width: 15%; ">Tambahan Bagasi: <?= $_SESSION['tambahan_bagasi'] ?></td>
								</tr>
							</table>

							
							<hr style="margin-left: 20%;">
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>
</body>
</html>

<?php } ?>
