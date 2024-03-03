<?php

include_once "../controller/c_login.php";
$login = new c_login();

if ($_GET['aksi'] == 'register') {
    $id = $_POST['id'];
    $username = $_POST['username'];
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $alamat = $_POST['alamat'];
    $date = $_POST['date'];
    $JK = $_POST['JK'];
    $password = $_POST['password'];
    $c_pass = $_POST['c_pass'];

    if ($password == $c_pass) {
        $password = password_hash($password, PASSWORD_DEFAULT);
        $login->register($id, $username, $fullname, $email, $alamat, $password, $JK, $date);
        echo "<script> alert('Akun telah berhasil di registrasi!');
        document.location.href = '../login.php';
        </script>";
    } else {
        echo "<script> alert('Password anda tidak sama!');
        document.location.href = '../register.php';
        </script>";
    } 
} elseif ($_GET['aksi'] == 'login') {
    $usermail = $_POST['usermail'];
    $password = $_POST['password'];

    $login->login($usermail, $password);
} elseif ($_GET['aksi'] == 'logout') {
    $login->logout();
} elseif ($_GET['aksi'] == 'cpassword') {
    $id = $_POST['id'];
    $email = $_POST['email'];
    $passwordold = $_POST['passwordold'];
    $password = $_POST['password'];
    $confirm = $_POST['confirm'];

    if ($password == $confirm) {
        $password = password_hash($password, PASSWORD_DEFAULT);
        $login->ganti($id, $email, $passwordold, $password);
    } else {
        echo "<script> alert('Password doesnt match');
        document.location.href = '../views/profil.php'</script>";
    }
} elseif ($_GET['aksi'] == 'update') {
    $id = $_POST['id'];
    $nama = $_POST['fullname'];
    $alamat = $_POST['alamat'];
    $kelamin = $_POST['kelamin'];

        $login->update($id, $nama, $alamat, $kelamin);
        echo "<script>alert ('Profil telah diubah! (Otomatis logout)');
        document.location.href = '../routers/r_login.php?aksi=logout';
        </script>";
    
} elseif ($_GET['aksi'] == 'dimage') {
    $id = $_GET['UserID'];

    $login->delete($id);

    echo "<script>alert ('Profil telah diubah! (Otomatis logout)');
    document.location.href = '../routers/r_login.php?aksi=logout';
    </script>";
}
