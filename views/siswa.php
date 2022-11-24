<?php
include("../layouts/header.php");

$querySiswa = mysqli_query($koneksi, "SELECT * FROM tbl_siswa")
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
            <h5>Siswa</h5>
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
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include("../layouts/footer.php") ?>