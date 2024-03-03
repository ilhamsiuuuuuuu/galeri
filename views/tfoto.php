<?php
include_once "template/header.php";
include_once "../controller/c_koneksi.php";
include_once "../controller/c_login.php";
$koneksi = new c_conn();
$conn = $koneksi->conn();
date_default_timezone_set('Asia/Jakarta');
$date = date("Y-m-d H:i:s");
if ($_SESSION['status'] == "login") {

?>

    <!-- content -->
    <div class="section">
        <div class="container">
            <h3>Tambah Data Foto</h3>
            <div class="box">
                <?php
                if (isset($_POST['submit']) == 'simpan') {
                    $id = ['id'];
                    $judul_foto = $_POST['judul_foto'];
                    $deskripsi_foto = $_POST['deskripsi_foto'];
                    $tmp_foto = $_FILES['nama_file']['tmp_name'];
                    $nama_file = $_FILES['nama_file']['name'];
                    $album_id = $_POST['album_id'];
                    $user_id = $_SESSION['user_id'];
                    if (move_uploaded_file($tmp_foto, '../assets/img/' . $nama_file)) {
                        $insert = mysqli_query($conn, "INSERT INTO foto VALUES('','$judul_foto','$deskripsi_foto','$date','$nama_file','$album_id','$user_id')");
                        if ($insert) {
                            echo "<script> alert('Gambar Berhasil Disimpan!');
                            document.location.href = 'tfoto.php';
                            </script>";
                        } else {
                            echo "<script> alert('Gambar Gagal Disimpan');
                            document.location.href = 'tfoto.php';
                            </script>";
                        }
                    } else {
                        // File upload failed
                        echo "<script> alert('Gagal mengunggah gambar');
                        document.location.href = 'tfoto.php';
                        </script>";
                    }
                }

                $album = mysqli_query($conn, "SELECT * FROM album")
                ?>

                <form action="?url=tfoto" method="POST" enctype="multipart/form-data">

                    <Center>

                        <div class="form-group">
                            <label>Judul Foto</label>
                            <input type="text" class="input-control" required name="judul_foto">

                            <div class="form-group">
                                <label>Deskripsi Foto</label>
                                <textarea name="deskripsi_foto" class="input-control" required cols="30" rows="5"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Pilih Gambar</label>
                                <input type="file" name="nama_file" class="input-control" required accept="image/*">
                                <small class="text-danger">file harus berupa: png,jpg,gif</small>
                            </div>
                            <div class="form-group">
                                <label>Pilih Album</label>
                                <select name="album_id" id="form-select">
                                    <?php foreach ($album as $albums) : ?>
                                        <option value="<?= $albums['album_id'] ?>"><?= $albums['nama_album'] ?></option>
                                    <?php endforeach; ?>
                            </div>
                            <input type="submit" name="submit" value="simpan" class="btn">
                    </Center>
                </form>

            <?php
        } else {
            echo "<script type='text/javascript'>
	alert('Maaf Anda Belum Login');
	window.location = '../login.php';
</script>";
        }
            ?>