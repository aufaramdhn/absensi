<?php include("../layouts/header.php") ?>
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
                    <tr>
                        <td>No</td>
                        <td>Nama</td>
                        <td>Keterangan</td>
                        <td>Tanggal</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include("../layouts/footer.php") ?>