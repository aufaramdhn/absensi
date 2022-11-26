<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Absensi</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/styles/style.css">
</head>

<body class="overflow-hidden">
    <!-- Alert -->
    <?php if (isset($_SESSION['info'])) : ?>
        <div class="info-data" data-infodata="<?php echo $_SESSION['info']; ?>"></div>
    <?php
        session_destroy();
    // unset($_SESSION['info']);
    endif;
    ?>

    <div class="row">
        <div class="col-6 d-flex align-items-center">
            <div class="container w-75">
                <form action="auth/login_proses.php" method="POST">
                    <h2 class="fw-bold text-center mb-4">Login</h2>
                    <!-- <div style="border-bottom: 4px solid; margin-bottom: 1rem; border-color: #D5EBFF; width: 20%;"></div> -->
                    <div class="mb-4">
                        <label for="inputUsername" class="form-label">Username</label>
                        <input type="username" name="username" class="form-control" id="inputUsername" placeholder="Masukan Username Anda" required>
                    </div>
                    <div class="mb-4">
                        <label for="inputPassword" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Masukan Password Anda" required>
                    </div>
                    <div class="mb-2">
                        <button type="submit" name="submit" class="btn w-100 text-white pt-2 pb-2" style="background-color: #2A3990;">Login</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-6" style="background-color: #9C254D; height: 100vh;">
            <div class="d-flex justify-content-center align-items-center h-100">
                <!-- <img class="img-login" src="assets/img/3081783.jpg" alt="background-login" width="500"> -->
            </div>
        </div>
    </div>
    <script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="assets/script/jquery.js"></script>

</body>

</html>