<?php
include_once "template/header.php";

// Cek apakah parameter id terdapat dalam URL
if (isset($_GET['delete_id'])) {
    $deleteId = $_GET['delete_id'];

    // Hapus foto dari database
    $deleteQuery = mysqli_query($conn, "DELETE FROM foto WHERE foto_id = '$deleteId'");

    if ($deleteQuery) {
        echo '<script>alert("Foto berhasil dihapus");</script>';
        echo '<script>window.location.href = "Album.php";</script>';
        exit;
    } else {
        echo '<script>alert("Gagal menghapus foto");</script>';
        echo '<script>window.location.href = "Album.php";</script>';
        exit;
    }
}

?>

<!-- content -->
<div class="section">
    <div class="container">
        <h3>Data Galeri Foto</h3>
        <div class="box">
            <table border="1" cellspacing="0" class="table">
                <thead>
                    <tr>
                        <th width="60px">No</th>
                        <th>Nama Album</th>
                        <th>Nama User</th>
                        <th>Nama Foto</th>
                        <th>Gambar</th>
                        <th width="150px">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    $foto = mysqli_query($conn, "SELECT foto.*, album.nama_album, user.username FROM foto INNER JOIN album ON foto.album_id = album.album_id INNER JOIN user ON foto.user_id = user.user_id WHERE foto.user_id = '$id'");
                    if (mysqli_num_rows($foto) > 0) {
                        while ($row = mysqli_fetch_array($foto)) {
                            ?>
                            <tr>
                                <td><?php echo $no++ ?></td>
                                <td><?php echo $row['nama_album'] ?></td>
                                <td><?php echo $row['username'] ?></td>
                                <td><?php echo $row['judul_foto'] ?></td>
                                <td><a href="../uploads/noimg.jpg<?php echo $row['lokasi_file'] ?>" target="_blank"><img src="../assets/img/<?php echo $row['lokasi_file'] ?>" width="50px"></a></td>
                                <td>
                                    <a href="edit-foto.php?id=<?php echo $row['foto_id'] ?>">Edit</a> ||
                                    <a href="?delete_id=<?php echo $row['foto_id'] ?>" onclick="return confirm('Yakin Ingin Hapus ?')">Hapus</a>
                                </td>
                            </tr>
                    <?php }
                    } else { ?>
                        <tr>
                            <td colspan="8">Tidak ada data</td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
