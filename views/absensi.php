<?php

include("../layouts/header.php");

date_default_timezone_set('Asia/jakarta');
$today = date("Y-m-d");

$queryAbsensi = mysqli_query($koneksi, "SELECT * FROM tbl_absensi JOIN tbl_siswa ON tbl_siswa.id_siswa = tbl_absensi.id_siswa")
?>

<!-- Alert -->
<?php if (isset($_SESSION['info'])) : ?>
    <div class="info-data" data-infodata="<?php echo $_SESSION['info']; ?>"></div>
<?php
    session_destroy();
// unset($_SESSION['info']);
endif;
?>

<div class="container">
    <div class="card mt-5">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center px-3 pt-1">
                <h4>Absensi</h4>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Tambah Absen</button>
            </div>
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

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST">
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Nama</label>
                        <select class="form-select" name="nama">
                            <option hidden>-- Pilih Siswa --</option>
                            <?php $query = mysqli_query($koneksi, "SELECT * FROM tbl_siswa");
                            while ($data = mysqli_fetch_array($query)) {
                            ?>
                                <option value="<?= $data['id_siswa'] ?>"><?= $data['nama'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Keterangan</label>
                        <select class="form-select" name="keterangan">
                            <option hidden>-- Pilih Keterangan --</option>
                            <option value="Hadir">Hadir</option>
                            <option value="Sakit">Sakit</option>
                            <option value="Izin">Izin</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="tanggal-absen" class="form-label">Keterangan</label>
                        <input type="date" class="form-control" id="tanggal-absen" name="tanggal" value="<?= $today ?>" readonly>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="submit">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include("../layouts/footer.php") ?>

<?php
if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $keterangan = $_POST['keterangan'];
    $tanggal = $_POST['tanggal'];

    $querySimpan = mysqli_query($koneksi, "INSERT INTO tbl_absensi VALUES ('','$nama','$keterangan','$tanggal')");

    if ($querySimpan == true) {
        echo "<script>alert('Berhasil');</script>";
        echo "<script>window.location='absensi.php'</script>";
    } else {
        echo "<script>alert('Gagal');</script>";
        echo "<script>window.location='absensi.php'</script>";
    }
}
?>