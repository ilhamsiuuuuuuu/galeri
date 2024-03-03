<?php
include_once "template/header.php";
include_once "../controller/c_login.php";
if ($_SESSION['status'] == "login") {
        $idd = $_GET['id'];
$foto = mysqli_query($conn, "SELECT * FROM foto LEFT JOIN user ON user.user_id=foto.user_id where foto_id='$idd'");
$d = mysqli_fetch_assoc($foto);
?>

        <!-- content -->
        <div class="section">
                <div class="container">
                        <h3>Profil</h3>
                        <div class="box">
                                <form action="../routers/r_foto.php?aksi=update" method="POST">

                                        <input type="text" name="foto_id" id="id" value="<?= $d['foto_id'] ?>" hidden>
                                        <input type="text" name="dalbum" id="id" value="<?= $d['album_id'] ?>" hidden>


                                        <input name="judul_foto" type="text" class="input-control" id="fullname" value="<?= $d['judul_foto'] ?>">
                                        <input name="deskripsi_foto" type="text" class="input-control" id="fullname" value="<?= $d['deskripsi_foto'] ?>">
                                        <button type="submit" class="btn">Submit</button>
                                </form>
                        </div>

                <?php

        } else {
                echo "<script type='text/javascript'>
alert('Maaf Anda Belum Login');
window.location = '../login.php';
</script>";
        }
                ?>