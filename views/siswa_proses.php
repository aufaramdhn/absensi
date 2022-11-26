<?php

session_start();

require("../apps/koneksi.php");

if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $alamat = $_POST['alamat'];
    $telp = $_POST['notelp'];
    $queryCreate = mysqli_query($koneksi, "INSERT INTO tbl_siswa VALUES ('','$nama','$email','$alamat','$telp')");

    if ($queryCreate) {
        $_SESSION['info'] = "simpan";;
        header("Location: siswa.php");
    } else {
        $_SESSION['info'] = "gagal";;
        header("Location: siswa.php");
    }
}

if (isset($_POST['update'])) {
    $id_siswa = $_POST['id_siswa'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $alamat = $_POST['alamat'];
    $telp = $_POST['notelp'];

    $queryUpdate = mysqli_query($koneksi, "UPDATE tbl_siswa SET nama='$nama',email='$email',alamat='$alamat',notelp='$telp' WHERE id_siswa = '$id_siswa'");

    if ($queryUpdate) {
        $_SESSION['info'] = "update";
        header("Location: siswa.php");
    } else {
        $_SESSION['info'] = "gagal";
        header("Location: siswa.php");
    }
}

if (isset($_GET['id_siswa'])) {
    $id_siswa = $_GET['id_siswa'];
    $queryDelete = mysqli_query($koneksi, "DELETE FROM tbl_siswa WHERE id_siswa = '$id_siswa'");

    header("Location: siswa.php");
}
