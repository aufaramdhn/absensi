<?php

session_start();

require("../apps/koneksi.php");

if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $keterangan = $_POST['keterangan'];
    $tanggal = $_POST['tanggal'];

    $querySimpan = mysqli_query($koneksi, "INSERT INTO tbl_absensi VALUES ('','$nama','$keterangan','$tanggal')");

    if ($querySimpan == true) {
        $_SESSION['info'] = "simpan";
        header("Location: absensi.php");
    } else {
        $_SESSION['info'] = "gagal";
        header("Location: absensi.php");
    }
}

if (isset($_POST['update'])) {
    $id_absen = $_POST['id_absen'];
    $keterangan = $_POST['keterangan'];

    $queryUpdate = "UPDATE tbl_absensi SET keterangan='$keterangan' WHERE id_absen = '$id_absen'";

    $query = mysqli_query($koneksi, $queryUpdate);

    if ($query == true) {
        $_SESSION['info'] = "update";;
        header("Location: absensi.php");
    } else {
        $_SESSION['info'] = "gagal";;
        header("Location: absensi.php");
    }
}

if (isset($_GET['id_absen'])) {
    $id_absen = $_GET['id_absen'];
    $queryDelete = mysqli_query($koneksi, "DELETE FROM tbl_absensi WHERE id_absen = '$id_absen'");

    header("Location: absensi.php");
}
