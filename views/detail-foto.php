<?php
error_reporting(0);

$title = "My Album";
$side = "Album";
include '../controller/c_koneksi.php';
include_once "../controller/c_album.php";
include_once "../controller/c_foto.php";
include_once "../controller/c_login.php";
include_once "../controller/c_like.php";
include_once "../controller/c_komentar.php";
if($_SESSION['status']=="login"){
$tampil = new c_album();
$koneksi = new c_conn();
$conn = $koneksi->conn();
$poto = new c_foto();
$dashboard = new c_foto();
$komentar = new c_komentar();
$tampilike = new c_like();


date_default_timezone_set('Asia/Jakarta');
$date = date("Y-m-d H:i:s");

$idd = $_GET['id'];
$foto = mysqli_query($conn, "SELECT * FROM foto LEFT JOIN user ON user.user_id=foto.user_id where foto_id='$idd'");
$f = mysqli_fetch_assoc($foto);
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
</head>

<body>
    <!-- header -->
    <header>
        <div class="container">
            <h1><a href="index.php">WEB GALERI FOTO</a></h1>
            <ul>
                <li><a href="Dashboard.php">Dashboard</a></li>
                <li><a href="Album.php">Album</a></li>
                <li><a href="../routers/r_login.php?aksi=logout" onclick="return confirm ('Yakin ingin keluar') ">logout</a></li>
            </ul>
        </div>
    </header>

    <!-- product detail -->
    <div class="section">
        <div class="container">
            <h3>Detail Foto</h3>
            <div class="box">
                <div class="col-2">
                    <img src="../assets/img/<?= $f['lokasi_file'] ?>" width="100%" />
                </div>
                <div class="col-2">
                    <h4>Nama User : <?= $f['username'] ?><br />
                        Upload Pada Tanggal : <?= $f['tanggal_unggah']  ?></h4>
                    <p>Deskripsi :<br />
                        <?= $f['deskripsi_foto'] ?>
                    </p>
                    <div class="card-footer text-center">
                        <?php if ($tampilike->user($f['foto_id'], $_SESSION['user_id']) == 0) { ?>
                            <a href="../routers/r_like.php?user=<?= $_SESSION['user_id'] ?>&foto=<?= $f['foto_id'] ?>&aksi=like" type="submit" name="like"><i class="fa-regular fa-heart"></i></a>
                        <?php } else { ?>
                            <a href="../routers/r_like.php?user=<?= $_SESSION['user_id'] ?>&foto=<?= $f['foto_id'] ?>&aksi=delete" type="submit" name="like"><i class="fa fa-heart"></i></a>
                        <?php } ?>
                        <?php
                        $foto_id = $f['foto_id'];
                        $like = mysqli_query($conn, "SELECT * FROM likefoto WHERE foto_id='$foto_id'");
                        echo mysqli_num_rows($like) . ' like';
                        ?>

                    </div>
                </div>
                
            </div>
        </div>
    </div>
    </div>

    <?php

    include_once "template/footer.php";

    }else{
    echo "<script type='text/javascript'>
    alert('Maaf Anda Belum Login');
    window.location = '../login.php';
    </script>";
    }
    ?>