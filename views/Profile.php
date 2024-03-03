<?php
include_once "template/header.php";
include_once "../controller/c_login.php";
if ($_SESSION['status'] == "login") {
    $user_id = $_SESSION['user_id'];
$query = mysqli_query($conn, "SELECT * FROM user WHERE user_id = '$user_id'");
$d = mysqli_fetch_object($query);
?>

    <!-- content -->
    <div class="section">
        <div class="container">
            <h3>Profil</h3>
            <div class="box">
                <form action="../routers/r_login.php?aksi=update" method="POST">

                    <input type="text" name="id" id="id" value="<?= $id ?>" hidden>


                    <input name="fullname" type="text" class="input-control" id="fullname" value="<?php echo $d->fullname ?>" required>
                    <input type="text" name="username" placeholder="Username" class="input-control" value="<?php echo $d->username ?>" disabled>
                    <input type="text" name="alamat" placeholder="Username" class="input-control" value="<?php echo $d->alamat ?>">
                    <input type="email" name="email" placeholder="Email" class="input-control" value="<?php echo $d->email ?>" disabled>
                    <input type="text" name="kelamin" placeholder="Gender" class="input-control" value="<?php echo $d->JK ?>" disabled>
                    <button type="submit" name="edit" class="btn">Save Changes</button>
                </form>
            </div>



            <h3>Ubah password</h3>
            <div class="box">
                <form action="../routers/r_login.php?aksi=cpassword" method="POST">

                    <input type="text" name="id" id="id" value="<?= $id ?>" hidden>
                    <input type="text" name="email" id="email" value="<?php echo $d->email ?>" hidden>

                    <input name="passwordold" type="password" placeholder="Password Lama" class="input-control" id="currentPassword" required>
                    <input name="password" type="password" placeholder="Password Baru" class="input-control" id="newPassword" required>
                    <input name="confirm" type="password" placeholder="Komfirmasi Password Baru" class="input-control" id="renewPassword" required>
                    <button type="submit" name="cpassword" class="btn">Change Password</button>
                </form>


            <?php

        } else {
            echo "<script type='text/javascript'>
alert('Maaf Anda Belum Login');
window.location = '../login.php';
</script>";
        }
            ?>