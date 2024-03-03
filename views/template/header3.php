<?php
include_once "../controller/c_login.php";
$id = $_SESSION['user_id'];
$nama = $_SESSION['fullname'];
$alamat = $_SESSION['alamat'];
$username = $_SESSION['username'];
$email = $_SESSION['email'];
$jk = $_SESSION['JK'];
$koneksi = new c_conn();
$conn = $koneksi->conn();
include_once "validasi.php";

// include_once "validasi.php";

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Favicons -->
<link href="../assets/img/faviconn.png" rel="icon">
<title>WEB Galeri Foto</title>
<link rel="stylesheet" type="text/css" href="../assets/css/style1.css">
</head>

<body>
    <!-- header -->
    <header>
        <div class="container">
        <h1><a href="dashboard.php">WEB GALERI FOTO</a></h1>
        <ul>
           <li><a href="Dashboard.php">Dashboard</a></li>
           <li><a href="Album.php">Album</a></li>
           <li><a href="edit-foto.php">Edit Foto</a></li>
           <li><a href="../routers/r_login.php?aksi=logout" onclick="return confirm('Yakin ingin keluar')">logout</a></li>
        </ul>
        </div>
    </header>