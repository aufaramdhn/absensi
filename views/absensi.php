<?php
$active = 'absensi';
$title = 'Absensi | Admin';
include("../layouts/header.php");

date_default_timezone_set('Asia/jakarta');
$today = date("Y-m-d");

$queryAbsensi = mysqli_query($koneksi, "SELECT * FROM tbl_absensi JOIN tbl_siswa ON tbl_siswa.id_siswa = tbl_absensi.id_siswa ORDER BY tanggal DESC");

$queryRow = mysqli_query($koneksi, "SELECT * FROM tbl_absensi JOIN tbl_siswa ON tbl_siswa.id_siswa = tbl_absensi.id_siswa WHERE tanggal = $today");

$row = mysqli_num_rows($queryRow);
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
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($queryAbsensi as $absensi) {
                    ?>
                        <tr>
                            <td class="text-end"><?= $no++ ?></td>
                            <td><?= $absensi['nama'] ?></td>
                            <td class="text-center"><?= $absensi['keterangan'] ?></td>
                            <td class="text-center"><?= $absensi['tanggal'] ?></td>
                            <td class="text-center">
                                <button type="button" data-bs-toggle="modal" data-bs-target="#modalEdit<?= $no ?>" class="btn btn-sm btn-warning text-white">Ubah</button>
                                <button type="button" data-bs-toggle="modal" data-bs-target="#modalDelete<?= $no ?>" class="btn btn-sm btn-danger text-white">Hapus</button>
                            </td>
                        </tr>
                        <!-- Modal edit -->
                        <div class="modal fade" id="modalEdit<?= $no ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Ubah data</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form method="POST">
                                        <div class="modal-body">
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label class="form-label">Nama</label>
                                                    <input type="hidden" name="id_absen" value="<?= $absensi['id_absen'] ?>">
                                                    <input type="text" class="form-control" name="nama" value="<?= $absensi['nama'] ?>" readonly>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Keterangan</label>
                                                    <select class="form-select" name="keterangan" required>
                                                        <option hidden>-- Pilih Keterangan --</option>
                                                        <option value="Hadir">Hadir</option>
                                                        <option value="Izin">Izin</option>
                                                        <option value="Sakit">Sakit</option>
                                                        <option value="Alpa">Alpa</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                            <button type="submit" name="update" class="btn btn-success">Simpan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Modal Delete -->
                        <div class="modal fade" id="modalDelete<?= $no ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus data</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <span class="fs-5 d-flex justify-content-center">Apakah anda yakin akan menghapus data ini?</span>
                                    </div>
                                    <div class="modal-footer">
                                        <form method="POST">
                                            <input type="hidden" name="id_absen" value="<?= $absensi['id_absen'] ?>">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                            <button type="submit" name="delete" class="btn btn-danger">Hapus</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
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
                            <?php $query = mysqli_query($koneksi, "SELECT * FROM tbl_siswa WHERE id_siswa NOT IN(SELECT id_siswa FROM tbl_absensi WHERE tanggal = ' " . $today . " ') ORDER BY  nama ASC");

                            while ($data = mysqli_fetch_array($query)) {
                            ?>
                                <option value="<?= $data['id_siswa'] ?>"><?= $data['nama'] ?></option>
                            <?php } ?>

                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Keterangan</label>
                        <select class="form-select" name="keterangan" required>
                            <option hidden>-- Pilih Keterangan --</option>
                            <option value="Hadir">Hadir</option>
                            <option value="Izin">Izin</option>
                            <option value="Sakit">Sakit</option>
                            <option value="Alpa">Alpa</option>
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

    $queryAbsensi1 = mysqli_query($koneksi, "SELECT * FROM tbl_absensi JOIN tbl_siswa ON tbl_siswa.id_siswa = tbl_absensi.id_siswa WHERE tbl_absensi.tanggal = '$today' AND tbl_absensi.id_siswa = $_POST[nama]");

    if (mysqli_num_rows($queryAbsensi1) > 0) {
        echo "
        <script>alert('Nama sudah terdaftar dalam absensi');
        document.location.href = 'absensi.php';
        </script>";
    } else {
        $querySimpan = mysqli_query($koneksi, "INSERT INTO tbl_absensi VALUES ('','$nama','$keterangan','$tanggal')");

        if ($querySimpan == true) {
            echo "<script>alert('Data absensi berhasil di tambahkan');</script>";
            echo "<script>window.location='absensi.php'</script>";
        } else {
            echo "<script>alert('Data absensi berhasil di tambahkan');</script>";
            echo "<script>window.location='absensi.php'</script>";
        }
    }
}

if (isset($_POST['update'])) {
    $id_absen = $_POST['id_absen'];
    $keterangan = $_POST['keterangan'];

    $queryUpdate = "UPDATE tbl_absensi SET keterangan='$keterangan' WHERE id_absen = '$id_absen'";

    $query = mysqli_query($koneksi, $queryUpdate);

    if ($query == true) {
        echo "<script>alert('Data absensi berhasil di ubah');</script>";
        echo "<script>window.location='absensi.php'</script>";
    } else {
        echo "<script>alert('Data absensi gagal di ubah');</script>";
        echo "<script>window.location='absensi.php'</script>";
    }
}

if (isset($_POST['delete'])) {

    $id_absen = $_POST['id_absen'];

    $queryDelete = mysqli_query($koneksi, "DELETE FROM tbl_absensi WHERE id_absen = '$id_absen'");

    if ($queryDelete) {
        echo "<script>alert('Data absensi berhasil di hapus');</script>";
        echo "<script>window.location='absensi.php'</script>";
    } else {
        echo "<script>alert('Data absensi gagal di hapus');</script>";
        echo "<script>window.location='absensi.php'</script>";
    }
}
?>