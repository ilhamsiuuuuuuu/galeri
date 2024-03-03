<?php

$title = "My Album";
$side = "Album";
include_once "template/header1.php";
include_once "../controller/c_album.php";
include_once "../controller/c_foto.php";
include_once "../controller/c_login.php";
if ($_SESSION['status'] == "login") {
$tampil = new c_album();
$koneksi = new c_conn();
$conn = $koneksi->conn();
$poto = new c_foto();

date_default_timezone_set('Asia/Jakarta');
$waktu = date("Y-m-d H:i:s");

?>

<!-- content -->
<div class="container">
    <h3>Foto Terbaru</h3>
    <div class="box">
        <?php if (empty($poto->potal($_GET['albumid']))) { ?>
            <p>Foto tidak ada</p>
        <?php } else { ?>
            <?php foreach ($poto->potal($_GET['albumid']) as $topo) : ?>
                <a href="detail-foto.php?id=<?= $topo->foto_id ?>">
                    <div class="col-4">
                        <img src="../assets/img/<?= $topo->lokasi_file ?>" height="150px" />
                        <p class="nama"><?= $topo->judul_foto ?></p>
                        <p class="admin"><?= $topo->tanggal_unggah ?></p>
                    </div>
                </a>
            <?php endforeach; ?>
        <?php } ?>
    </div>
</div>







</div>
</div>

<?php

include_once "template/footer.php";
} else {
    echo "<script type='text/javascript'>
alert('Maaf Anda Belum Login');
window.location = '../login.php';
</script>";
}
?>