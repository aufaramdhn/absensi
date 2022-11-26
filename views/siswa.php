<?php
$active = 'siswa';
include("../layouts/header.php");

$querySiswa = mysqli_query($koneksi, "SELECT * FROM tbl_siswa")
?>

<div class="container">
    <div class="card mt-5">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center px-3 pt-1">
                <h4>Siswa</h4>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Tambah Siswa</button>
            </div>
        </div>
        <div class="card-body">
            <table id="table" class="table table-striped table-bordered  d-md-block d-lg-table overflow-auto">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Alamat</th>
                        <th>No Telepon</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($querySiswa as $siswa) {
                    ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $siswa['nama'] ?></td>
                            <td><?= $siswa['email'] ?></td>
                            <td><?= $siswa['alamat'] ?></td>
                            <td><?= $siswa['notelp'] ?></td>
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
                                            <div class="mb-3">
                                                <label class="form-label">Nama</label>
                                                <input type="hidden" name="id_siswa" value="<?= $siswa['id_siswa'] ?>">
                                                <input type="text" class="form-control" name="nama" value="<?= $siswa['nama'] ?>">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Email</label>
                                                <input type="Email" class="form-control" name="email" value="<?= $siswa['email'] ?>">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">alamat</label>
                                                <input type="text" class="form-control" name="alamat" value="<?= $siswa['alamat'] ?>">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">No Telepon</label>
                                                <input type="number" class="form-control" name="notelp" value="<?= $siswa['notelp'] ?>">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">batal</button>
                                            <button type="submit" class="btn btn-success" name="update">Simpan</button>
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
                                        <form action="" method="post">
                                            <input type="hidden" name="id_siswa" value="<?= $siswa['id_siswa'] ?>">
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
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Siswa</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST">
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Nama</label>
                        <input type="text" class="form-control" name="nama" placeholder="Masukan nama siswa" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="Email" class="form-control" name="email" placeholder="Masukan email siswa" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">alamat</label>
                        <input type="text" class="form-control" name="alamat" placeholder="Masukan alamat siswa" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">No Telepon</label>
                        <input type="number" class="form-control" name="notelp" placeholder="Masukan no telepon siswa" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">batal</button>
                    <button type="submit" class="btn btn-success" name="submit">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include("../layouts/footer.php") ?>

<?php

if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $alamat = $_POST['alamat'];
    $telp = $_POST['notelp'];
    $queryCreate = mysqli_query($koneksi, "INSERT INTO tbl_siswa VALUES ('','$nama','$email','$alamat','$telp')");

    if ($queryCreate) {
        echo "<script>alert('Data siswa berhasil di tambahkan');</script>";
        echo "<script>window.location='siswa.php'</script>";
    } else {
        echo "<script>alert('Data siswa gagal di tambahkan');</script>";
        echo "<script>window.location='siswa.php'</script>";
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
        echo "<script>alert('Data siswa berhasil di ubah');</script>";
        echo "<script>window.location='siswa.php'</script>";
    } else {
        echo "<script>alert('Data siswa gagal di ubah');</script>";
        echo "<script>window.location='siswa.php'</script>";
    }
}

if (isset($_POST['delete'])) {

    $id_siswa = $_POST['id_siswa'];

    $queryDelete = mysqli_query($koneksi, "DELETE FROM tbl_siswa WHERE id_siswa = '$id_siswa'");

    if ($queryDelete) {
        echo "<script>alert('Data siswa berhasil di hapus');</script>";
        echo "<script>window.location='siswa.php'</script>";
    } else {
        echo "<script>alert('Data siswa gagal di hapus');</script>";
        echo "<script>window.location='siswa.php'</script>";
    }
}

?>