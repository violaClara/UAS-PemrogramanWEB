<?php
	include "koneksi.php";	

    session_start();

    include "db.php";
     if(isset($_COOKIE['unameA'])){
        $username=$_COOKIE['unameA'];
        $password=$_COOKIE['passA'];
        tampilkanData();
    } else if(isset($_SESSION['usernameA'])){
        $username = $_SESSION['usernameA'];
        $password = $_SESSION['passA'];
       tampilkanData();
    } else{
        echo "<center><h1>Anda harus login terlebih dahulu</h1></center>";
    }

?>
<?php function tampilkanData(){

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--Bootstrap CSS-->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<title>Dasboard</title>
</head>
<body>
	<?= include "header.php"; ?>

	<main>
		<div class="container mt-3">
			<div class="row">
				<div class="col-sm-2">
					<div class="card">
						<?php include "dasboardadmin.php"; ?>
					</div>
				</div>
				<div class="col-sm-10">
					<div class="card">
						<div class="card-body">
							<h5 class="card-tittle">Tambah Data</h5>
                            <form action="" method="post" enctype="multipart/form-data">
                                <table>
                                    <tr>
                                     <td>Pesawat</td>
                                        <td><input type="text" name="pesawat"></td>
                                    <td>Kapasitas Penumpang</td>
                                        <td><input type="text" name="muatan"></td>
                                    </td>
                                    <td>
                                    	<input style="width:100px" type="submit" name="proses" value="Tambah" class="btn btn-success btn-sm">
                                    </td>
                                    </tr>
                                </table>
                            </form>
							<hr>
							<table id="tabel-data">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>No</th>
                                        <th>Pesawat</th>
                                        <th>Kapasitas Penumpang</th>
                                        <th>Proses</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    include_once('koneksi.php');
                                    $sql = mysqli_query($koneksi, "SELECT * FROM pesawat");
                                    foreach ($sql as $row) {
                                    ?>
                                        <tr>
                                            <td><?= $row["id_pesawat"]; ?></td>
                                            <td><?= $row["nama"]; ?></td>
                                            <td><?= $row["kapasitas_penumpang"]; ?></td>
                                            <td>
                        						<a href="hpspesawat.php?id=<?= $row['id_pesawat']; ?>" onclick="return confirm ('Apakah Anda yakin akan menghapus data?')" class="btn btn-danger btn-sm">Hapus</a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                <tbody>
                            </table>
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>
	<script type="text/javascript">
        $(document).ready(function() {

            //DataTable
            $('#tabel-data').DataTable( {
                "order": ([2, "desc"]),
                "bInfo": false,
                "bLengthChange": true,
                "searching": true,
            });
        });
    </script>
    <?php  
        include "koneksi.php";
        if(isset($_POST['proses'])) {mysqli_query($koneksi, "INSERT INTO pesawat SET
            nama = '$_POST[pesawat]',
            kapasitas_penumpang = '$_POST[muatan]'");

            echo "<script>alert('Data Anda Sudah Tersimpan')</script>";
    	}
    ?>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" media="screen" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
    
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.24/datatables.min.js"></script>
  
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>
</body>
</html>
<?php } ?>