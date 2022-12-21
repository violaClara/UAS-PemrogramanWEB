<?php 
session_start();
include "koneksi.php";
include "db.php";
     if(isset($_COOKIE['unameA'])){
        $username=$_COOKIE['unameA'];
        $password=$_COOKIE['passA'];
       //include 'penerbangan.php';
    } else if(isset($_SESSION['usernameA'])){
        $username = $_SESSION['usernameA'];
        $password = $_SESSION['passA'];
       //include 'penerbangan.php';
    } else{
        echo "<center><h1>Anda harus login terlebih dahulu</h1></center>";
    }

?>