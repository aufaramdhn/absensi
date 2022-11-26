<?php
include_once("../apps/base_url.php");
include_once("../apps/koneksi.php");
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/datatables/datatables.min.css">
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
                        <a class="nav-link <?= $active == 'dashboard' ? 'active' : '' ?> fs-6" href="<?php echo $config; ?>views/dashboard.php">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= $active == 'absensi' ? 'active' : '' ?> fs-6" href="<?php echo $config; ?>views/absensi.php">Absensi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= $active == 'siswa' ? 'active' : '' ?> fs-6" href="<?php echo $config; ?>views/siswa.php">Siswa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= $active == 'laporan' ? 'active' : '' ?> fs-6" href="<?php echo $config; ?>views/laporan_siswa.php">Laporan Siswa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-primary text-white" href="<?php echo $config; ?>auth/logout_proses.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>