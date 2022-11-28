<?php
session_start();
include_once("../apps/base_url.php");
include_once("../apps/koneksi.php");
?>

<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="<?php echo $base_url; ?>assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo $base_url; ?>assets/datatables/datatables.min.css">
    <link rel="stylesheet" href="<?php echo $base_url; ?>assets/styles/style.css">
    <style>
        @media print {

            .print,
            .navbar {
                display: none;
            }

            .container {
                width: 100%;
            }
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark p-2">
        <div class="container">
            <a class="navbar-brand fs-4 text-uppercase fw-bold" href="#">Absensi</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link <?= $active == 'dashboard' ? 'active' : '' ?> fs-6" href="<?php echo $base_url; ?>views/dashboard.php">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= $active == 'absensi' ? 'active' : '' ?> fs-6" href="<?php echo $base_url; ?>views/absensi.php">Absensi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= $active == 'siswa' ? 'active' : '' ?> fs-6" href="<?php echo $base_url; ?>views/siswa.php">Siswa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= $active == 'laporan' ? 'active' : '' ?> fs-6" href="<?php echo $base_url; ?>views/laporan_siswa.php">Laporan Siswa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-logout btn-primary text-white" href="<?php echo $base_url; ?>auth/logout_proses.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav> -->

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.101.0">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="<?php echo $base_url; ?>assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo $base_url; ?>assets/datatables/datatables.min.css">
    <link rel="stylesheet" href="<?php echo $base_url; ?>assets/styles/style.css">
</head>

<body>
    <header class="navbar navbar-dark sticky-top flex-md-nowrap p-0 shadow" style="background-color: #6A5BE2;">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-5 fw-bold text-uppercase" href="#">Absensi</a>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="w-100"></div>
        <div class="navbar-nav">
            <div class="nav-item text-nowrap d-flex align-content-center align-self-center align-items-center">
                <a href="<?php echo $base_url; ?>auth/logout_proses.php" class="mx-3 text-white bg-transparent border-0 text-decoration-none">Logout</a>
            </div>
        </div>
    </header>
    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                <div class="position-sticky pt-3 sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link <?= $active == 'dashboard' ? 'active' : '' ?> fs-6" href="<?php echo $base_url; ?>views/dashboard.php">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= $active == 'absensi' ? 'active' : '' ?> fs-6" href="<?php echo $base_url; ?>views/absensi.php">Absensi</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= $active == 'siswa' ? 'active' : '' ?> fs-6" href="<?php echo $base_url; ?>views/siswa.php">Siswa</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= $active == 'laporan' ? 'active' : '' ?> fs-6" href="<?php echo $base_url; ?>views/laporan_siswa.php">Laporan Siswa</a>
                        </li>
                    </ul>
                </div>
            </nav>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <?php if (isset($_SESSION['info'])) : ?>
                    <div class="info-data" data-infodata="<?php echo $_SESSION['info']; ?>"></div>
                <?php
                    unset($_SESSION['info']);
                endif;
                ?>