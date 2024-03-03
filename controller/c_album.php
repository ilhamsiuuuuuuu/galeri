<?php

include_once "c_koneksi.php";

class c_album
{
    public function tambah_album($id, $nama, $desc, $date, $userid)
    {
        $conn = new c_conn();
        $query = "INSERT INTO album VALUES ('$id', '$nama', '$desc', '$date', '$userid')";
        $data = mysqli_query($conn->conn(), $query);
    }

    public function read_album($id) {
        $conn = new c_conn();
        $query = mysqli_query($conn->conn(), "SELECT * FROM album  WHERE user_id = $id");
        while($row = mysqli_fetch_object($query)) {
            $rows[] = $row;
        }
        if (!empty($rows)) {
            return $rows;
        }
    }

    public function edit($albumid) {
        $conn = new c_conn();
        $query = mysqli_query($conn->conn(), "SELECT * FROM album WHERE album_id = $albumid");
        while ($row = mysqli_fetch_object($query)) {
            $rows[] = $row;
        }
        return $rows;
    }

    public function delete_album($id) {
        $conn = new c_conn();
        $query = mysqli_query($conn->conn(), "DELETE FROM album WHERE album_id = $id");

        header("Location: ../views/Album.php");
    }

    public function update_album($id, $nama, $desc){
        $conn = new c_conn();
        $query = mysqli_query($conn->conn(), "UPDATE album SET nama_album='$nama', deskripsi='$desc' WHERE album_id = $id");
    }

    public function jumlah_data($bebas) {
        $conn = new c_conn();
        $query = mysqli_query($conn->conn(), "SELECT * FROM foto WHERE album_id = $bebas");
        $data = mysqli_num_rows($query);
        return $data;
    }

    public function foto($albumid) {
        $conn = new c_conn();
        $query = mysqli_query($conn->conn(), "SELECT lokasi_file FROM foto WHERE album_id = $albumid");
        $data = mysqli_fetch_assoc($query);
        return $data['lokasi_file'];
    }
}
