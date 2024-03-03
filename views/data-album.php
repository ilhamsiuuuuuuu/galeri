<?php
include "../controller/c_koneksi.php";
include_once "template/header.php";

// Ambil jumlah album
$query_count = mysqli_query($conn, "SELECT COUNT(*) as total_album FROM album WHERE user_id = '$id'");
$row_count = mysqli_fetch_assoc($query_count);
$total_album = $row_count['total_album'];

// Fungsi untuk menghapus album
if (isset($_GET['delete_album'])) {
    $album_id_to_delete = $_GET['delete_album'];
    $delete_query = mysqli_query($conn, "DELETE FROM album WHERE album_id = '$album_id_to_delete'");
    if ($delete_query) {
        echo '<script>alert("Album berhasil dihapus");window.location.href="Album.php";</script>';
    } else {
        echo '<script>alert("Gagal menghapus album");window.location.href="Album.php";</script>';
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
                        <th>Album_ID</th>
                        <th>Nama Album</th>
                        <th>Deskripsi</th>
                        <th>Tanggal Dibuat</th>
                        <th width="100px">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Mengambil data album dari database
                    $query_album = mysqli_query($conn, "SELECT * FROM album WHERE user_id = '$id'");

                    // Mulai menampilkan data
                    $no = 1;
                    if (mysqli_num_rows($query_album) > 0) {
                        while ($row = mysqli_fetch_assoc($query_album)) {
                    ?>
                            <tr>
                                <td><?php echo $no++ ?></td>
                                <td><?php echo $row['album_id'] ?></td>
                                <td><?php echo $row['nama_album'] ?></td>
                                <td><?php echo $row['deskripsi'] ?></td>
                                <td><?php echo $row['tanggal_dibuat'] ?></td>
                                <td>
                                    <a href="edit-album.php?id=<?php echo $row['album_id'] ?>">Edit</a> ||
                                    <a href="?delete_album=<?php echo $row['album_id'] ?>" onclick="return confirm('Yakin Ingin Hapus ?')">Hapus</a>
                                </td>
                            </tr>
                    <?php
                        }
                    } else {
                        // Tampilkan pesan jika tidak ada album yang ditemukan
                        echo "<tr><td colspan='6'>Tidak ada album yang ditemukan</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
