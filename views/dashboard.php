<?php
$active = 'dashboard';
$title = 'Dashboard | Admin';
include("../layouts/header.php");

date_default_timezone_set('Asia/jakarta');
$today = date('Y-m-d');

$queryAbsensi = mysqli_query($koneksi, "SELECT * FROM tbl_absensi JOIN tbl_siswa ON tbl_siswa.id_siswa = tbl_absensi.id_siswa WHERE  tbl_absensi.tanggal = '$today' ORDER BY nama ASC");
?>

<div class="container">
    <div class="card mt-5">
        <div class="card-header">
            <h5>Dashboard Harian Siswa</h5>
        </div>
        <div class="card-body">
            <table id="table" class="table table-striped table-bordered  d-md-block d-lg-table overflow-auto">
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
                    foreach ($queryAbsensi as $absensi) {
                    ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $absensi['nama'] ?></td>
                            <td><?= $absensi['keterangan'] ?></td>
                            <td><?= $absensi['tanggal'] ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include("../layouts/footer.php") ?>