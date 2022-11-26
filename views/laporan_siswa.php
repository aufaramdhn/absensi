<?php
$active = 'laporan';
include("../layouts/header.php");

date_default_timezone_set('Asia/jakarta');
$today = date("Y-m-d");

$queryRow = mysqli_query($koneksi, "SELECT * FROM tbl_absensi JOIN tbl_siswa ON tbl_siswa.id_siswa = tbl_absensi.id_siswa WHERE tanggal = $today");

$row = mysqli_num_rows($queryRow);
?>

<div class="container">
    <center>
        <h1 class="mt-5">LAPORAN SISWA</h1>
    </center>
    <br>
    <form method="POST">
        <div class="d-flex align-items-center">
            <div class="me-2 print">
                <label>Dari Tanggal : </label>
                <input type="date" class="form-control print" name="dari_tgl" required="required">
            </div>
            <div class="me-2 print">
                <label> Sampai Tanggal : </label>
                <input type="date" class="form-control print" name="sampai_tgl" required="required">
            </div>
            <div class="me-2 print">
                <input href="" type="submit" name="filter" value="Filter" class="btn btn-primary btn-fill pull-right mt-4 me-2 print">
            </div>
            <div class="ms-auto mt-5 print">
                <a href="" class="btn btn-success mb-2 print" onclick="window.print()">PRINT LAPORAN</a><br>
            </div>
        </div>
    </form>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Keterangan</th>
                <th>Tanggal</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            if (isset($_POST['filter'])) {
                $dari_tgl = mysqli_real_escape_string($koneksi, $_POST['dari_tgl']);
                $sampai_tgl = mysqli_real_escape_string($koneksi, $_POST['sampai_tgl']);
                $queryAbsensi = mysqli_query($koneksi, "SELECT * FROM tbl_absensi JOIN tbl_siswa ON tbl_siswa.id_siswa = tbl_absensi.id_siswa WHERE tanggal BETWEEN '$dari_tgl' AND '$sampai_tgl'");
            } else {
                $queryAbsensi = mysqli_query($koneksi, "SELECT * FROM tbl_absensi JOIN tbl_siswa ON tbl_siswa.id_siswa = tbl_absensi.id_siswa ORDER BY tanggal DESC");
            }
            foreach ($queryAbsensi as $absensi) { ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $absensi['nama'] ?></td>
                    <td><?= $absensi['keterangan'] ?></td>
                    <td><?= $absensi['tanggal'] ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <?php include("../layouts/footer.php") ?>