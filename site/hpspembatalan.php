<?php
require_once("koneksi.php");
$id = $_GET['id_penumpang'];
$acc = mysqli_query($koneksi, "DELETE FROM pembatalan WHERE id_pembatalan = $id");
$result = mysqli_query($koneksi, "DELETE FROM penumpang WHERE id_penumpang = $id");
if($result){
    $acc;
    header("Location:pembatalan.php");
}
?>