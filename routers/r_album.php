<?php

include_once "../controller/c_album.php";
include_once "../controller/c_login.php";
$album = new c_album();

if ($_GET['aksi'] == 'tambah') {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $desc = $_POST['desc'];
    $date = $_POST['date'];
    $userid = $_SESSION['user_id'];

    $album->tambah_album($id, $nama, $desc, $date, $userid);

    echo "<script> alert('Album telah dibuat');
    document.location.href = '../views/album.php';
    </script>";
}elseif ($_GET['aksi'] == 'delete') {
    $id = $_GET['album_id'];
    $album->delete_album($id);

    $dalbum = $_POST['dalbum'];
    header("Location: ../views/dalbum.php?id=");
}elseif ($_GET['aksi'] == 'update') {
    $id = $_POST['album_id'];
    $nama = $_POST['nama_album']; 
    $desc = $_POST['deskripsi'];

    $album->update_album($id, $nama, $desc);

    echo "<script> alert('Album telah diubah');
    document.location.href = '../views/Album.php';
    </script>";
}