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

if (isset($_POST['submit'])) {
    $layanan = $_POST['layanan'];

    $sql1 = "SELECT * FROM layanan WHERE namaLayanan = '$layanan'";
    $result1 = mysqli_query($conn, $sql1);
    $resultCheck1 = mysqli_num_rows($result1);

    $message = array();
    if ($resultCheck1 > 0) {
        $message[] = 'Layanan Sudah Tersedia!';
    } else {
        $insert = "INSERT INTO layanan VALUES('', '$layanan')";
        mysqli_query($conn, $insert);
        $message[] = 'Berhasil Tambah Layanan!';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Edit Layanan </title>

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
        <div class="card py-3 px-3 w-50">
            <h5 class="fw-bold text-center my-3"> Edit Layanan </h5>
            <?php
            if (isset($message)) {
                foreach ($message as $message) {
                    echo '<p class="msg rounded-2 p-2">' . $message . '</p>';
                }
            }
            ?>
            <form method="post">
                <label class="fw-bold mb-1"> Data Layanan </label>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th style="width:90%"> Layanan </th>
                                <th> Hapus </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $limit = 7;
                            $page = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
                            $pages = ($page > 1) ? ($page * $limit) - $limit : 0;

                            $previous = $page - 1;
                            $next = $page + 1;

                            $layanan = mysqli_query($conn, "select * from layanan");
                            $totalLayanan = mysqli_num_rows($layanan);
                            $totalHalaman = ceil($totalLayanan / $limit);

                            $dataLayanan = mysqli_query($conn, "SELECT * 
                            FROM layanan
                            limit $pages, $limit");

                            while ($data = mysqli_fetch_array($dataLayanan)) {
                            ?>
                                <tr>
                                    <td><?= $data['namaLayanan']; ?></td>
                                    <form action="delete_layanan.php" method="post">
                                        <input type="hidden" name="id" value="<?= $data['layanan_id'] ?>">
                                        <td class="text-center"><input type="submit" name="delete" value="X"></input></td>
                                    </form>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                    <nav>
                        <ul class="pagination justify-content-center">
                            <li class="page-item">
                                <a class="page-link" <?php if ($page > 1) {
                                                            echo "href='?halaman=$previous'";
                                                        } ?>><span aria-hidden="true">&laquo;</span></a>
                            </li>
                            <?php
                            for ($x = 1; $x <= $totalHalaman; $x++) {
                            ?>
                                <li class="page-item"><a class="page-link" href="?halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
                            <?php
                            }
                            ?>
                            <li class="page-item">
                                <a class="page-link" <?php if ($page < $totalHalaman) {
                                                            echo "href='?halaman=$next'";
                                                        } ?>><span aria-hidden="true">&raquo;</span></a>
                            </li>
                        </ul>
                    </nav>
                </div>
                <div class="text-center container d-flex justify-content-between">
                    <a type="submit" class="btn mt-2 center" id="login" href="layanan_admin.php"> Kembali </a>
                    <button type="button" class="btn mt-2 center" id="login" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Tambah Data
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel"> Tambah Layanan </h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="floatingInput" required name="layanan" maxlength="50">
                                        <label for="floatingInput"> Nama Layanan </label>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"> Tutup </button>
                                    <button type="submit" id="login" name="submit" class="btn btn-primary"> Tambah </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Copyright -->
    <footer class="fixed-bottom">
        <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
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