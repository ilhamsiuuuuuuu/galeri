<?php

include_once "c_koneksi.php";

class c_foto
{
    public function insert( $judul, $desc ,$date , $poto, $album_id, $iduser)
    {
        $conn = new c_conn();
        $query = "INSERT INTO foto VALUES (NULL ,'$judul','$desc','$date','$poto','$album_id','$iduser')";
        $data = mysqli_query($conn->conn(), $query);
    }

    public function delete_foto($id)
    {
        $conn = new c_conn();
        $query = mysqli_query($conn->conn(), "DELETE FROM foto WHERE foto_id = $id");
    }

    public function read($album_id)
    {
        $conn = new c_conn();
        $query = mysqli_query($conn->conn(), "SELECT * FROM foto WHERE album_id = $album_id");
        while ($row = mysqli_fetch_object($query)) {
            $rows[] = $row;
        }
        if (!empty($rows)) {
            return $rows;
        }
    }

    public function edit($fotoid)
    {
        $conn = new c_conn();
        $query = mysqli_query($conn->conn(), "SELECT * FROM foto WHERE foto_id = $fotoid");
        while ($row = mysqli_fetch_object($query)) {
            $rows[] = $row;
        }
        return $rows;
    }

    public function update($FotoID, $JudulFoto, $DeskripsiFoto)
    {
        $conn = new c_conn();
        $query = mysqli_query($conn->conn(), "UPDATE foto SET judul_foto='$JudulFoto', deskripsi_foto='$DeskripsiFoto' WHERE foto_id = $FotoID");
    }

    public function dashboard()
    {
        $conn = new c_conn();
        $query = "SELECT foto.*, user.* FROM foto INNER JOIN user ON foto.UserID = user.UserID ORDER BY foto_id DESC";
        $data = mysqli_query($conn->conn(), $query);
        while ($row = mysqli_fetch_object($data)) {
            $rows[] = $row;
        }
        return $rows;
    }
    public function potal($albumid)
    {
        $conn = new c_conn();
        $query = "SELECT * FROM foto WHERE album_id = $albumid ORDER BY foto_id DESC";
        $data = mysqli_query($conn->conn(), $query);
        while ($row = mysqli_fetch_object($data)) {
            $rows[] = $row;
        }
        if (!empty($rows)) {
            return $rows;
        }
    }

    public function select($FotoID)
    {
        $conn = new c_conn();
        $query = mysqli_query($conn->conn(), "SELECT foto.*, user.* FROM foto INNER JOIN user ON foto.UserID = user.UserID WHERE foto_id = $FotoID");
        while ($row = mysqli_fetch_object($query)) {
            $rows[] = $row;
        }
        return $rows;
    }
}
