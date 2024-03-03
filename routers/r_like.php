<?php

include "../controller/c_like.php";
$like = new c_like();

date_default_timezone_set('Asia/Jakarta');
$date = date("Y-m-d H:i:s");

if ($_GET['aksi'] == 'like') {
    $user = $_GET['user'];
    $foto = $_GET['foto'];

    $like->like($id, $foto, $user, $date);

    header("Location: ../views/detail-foto.php?id=$foto");
} elseif ($_GET['aksi'] == 'delete') {
    $id = $_GET['user'];
    $foto = $_GET['foto'];

    $like->delete_like($id);
    header("Location: ../views/detail-foto.php?id=$foto");
} elseif ($_GET['aksi'] == 'likeSelect') {
    $user = $_GET['user_id'];
    $foto = $_GET['foto_id'];

    $like->like($id, $foto, $user, $date);

    header("Location: ../views/detail-foto.php?foto_id=$foto");
} elseif ($_GET['aksi'] == 'deleteSelect') {
    $id = $_GET['user_id'];
    $foto = $_GET['foto_id'];

    $like->delete_like($id);
    header("Location: ../views/detail-foto.php?foto_id=$foto");
}
