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
            echo "<script>alert('Login Berhasil');</script>";
            echo "<script>window.location='../views/dashboard.php'</script>";
        } else {
            echo "<script>alert('Login Gagal');</script>";
            echo "<script>window.location='../index.php'</script>";
        }
    }
}
