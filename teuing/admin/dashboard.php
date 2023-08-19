<?php
require '../components/connection.php';
session_start();

if (isset($_SESSION['admin_id'])) {
    $admin_id = $_SESSION['admin_id'];
    $sql = "SELECT * FROM admin WHERE admin_id = '$admin_id'";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);
    if ($resultCheck > 0) {
        $row = mysqli_fetch_assoc($result);
        $profile = $row['username'];
    } else {
        header('location:admin_login.php');
    }
} else {
    header('location:admin_login.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Dashboard Admin </title>

    <!-- Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

    <!-- Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,300;0,400;0,700;1,700&display=swap" rel="stylesheet">

    <!-- My Style -->
    <link href="../css/style.css" rel="stylesheet" type="text/css">
</head>

<body>
    <!-- Header Start -->
    <?php require '../components/admin_header.php' ?>
    <!-- Header End -->

    <!-- Form -->
    <div class="d-flex justify-content-center align-items-center container">
        <div class="card py-3 px-3 w-75">
            <h5 class="fw-bold text-center"> Dashboard Admin </h5>
            <div class="row">
                <div class="col">
                    <div class="card mt-5">
                        <a class="card-block text-decoration-none text-reset" href="admin_notif.php">
                            <h4 class="card-title text-center my-3"> Antrian </h4>
                            <?php
                            $antrian = mysqli_query($conn, "select * from antrian");
                            $totalAntrian = mysqli_num_rows($antrian);
                            ?>
                            <hr>
                            <h3 class="text-center"><?= $totalAntrian ?></h3>
                        </a>
                    </div>
                </div>
                <div class="col">
                    <div class="card mt-5">
                        <a class="card-block text-decoration-none text-reset" href="user_admin.php">
                            <h4 class="card-title text-center my-3"> Users </h4>
                            <?php
                            $users = mysqli_query($conn, "select * from users");
                            $totalUser = mysqli_num_rows($users);
                            ?>
                            <hr>
                            <h3 class="text-center"><?= $totalUser ?></h3>
                        </a>
                    </div>
                </div>
                <div class="col">
                    <div class="card mt-5">
                        <a class="card-block text-decoration-none text-reset" href="dokter_admin.php">
                            <h4 class="card-title text-center my-3"> Dokter</h4>
                            <?php
                            $dokter = mysqli_query($conn, "select * from dokter");
                            $totalDokter = mysqli_num_rows($dokter);
                            ?>
                            <hr>
                            <h3 class="text-center"><?= $totalDokter ?></h3>
                        </a>
                    </div>
                </div>
                <div class="col">
                    <div class="card mt-5">
                        <a class="card-block text-decoration-none text-reset" href="layanan_admin.php">
                            <h4 class="card-title text-center my-3"> Layanan </h4>
                            <?php
                            $layanan = mysqli_query($conn, "select * from layanan");
                            $totalLayanan = mysqli_num_rows($layanan);
                            ?>
                            <hr>
                            <h3 class="text-center"><?= $totalLayanan ?></h3>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Copyright -->
    <footer class="fixed-bottom">
        <div class="text-center p-4 mt-5" style="background-color: rgba(0, 0, 0, 0.05);">
            © 2023 Copyright:
            <a class="text-reset fw-bold text-decoration-none" href="https://github.com/repiyann"> @repiyann </a>
        </div>
    </footer>

    <!-- JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.10.0/js/bootstrap-datepicker.min.js"></script>
    <script src="../js/user_scripts.js"></script>
</body>

</html>