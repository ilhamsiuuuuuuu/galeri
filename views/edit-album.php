<?php
include_once "template/header.php";
include_once "../controller/c_login.php";
if ($_SESSION['status'] == "login") {
    $id = $_GET['id']; // Anda mungkin ingin menggunakan $id daripada $idd
    $query_album = mysqli_query($conn, "SELECT * FROM album WHERE album_id = '$id'");
    $album = mysqli_fetch_assoc($query_album);
?>

<!-- content -->
<div class="section">
    <div class="container">
        <h3>Profil</h3>
        <div class="box">
            <form action="../routers/r_album.php?aksi=update" method="POST">
                <input type="hidden" name="album_id" value="<?= $album['album_id'] ?>">
                <input name="nama_album" type="text" class="input-control" id="fullname" value="<?= $album['nama_album'] ?>">
                <input name="deskripsi" type="text" class="input-control" id="fullname" value="<?= $album['deskripsi'] ?>">
                <button type="submit" class="btn">Submit</button>
            </form>
        </div>
    </div>
</div>

<?php
} else {
    echo "<script type='text/javascript'>alert('Maaf Anda Belum Login'); window.location = '../login.php';</script>";
}
?>
