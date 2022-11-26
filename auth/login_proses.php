<?php

include("../apps/koneksi.php");

session_start();

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $data = mysqli_query($koneksi, "SELECT * FROM tbl_admin WHERE username='$username'");

    $row = mysqli_fetch_array($data);

    if (mysqli_num_rows($data) == 1) {
        if ($password == $row['password']) {
            $_SESSION['info'] = 'login berhasil';
            header("Location: ../views/dashboard.php");
        } else {
            $_SESSION['info'] = 'login gagal';
            header("Location: ../index.php");
        }
    }
}
