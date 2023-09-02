<?php
require '../components/connection.php';
session_start();

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    $sql = "SELECT * FROM users WHERE user_id = '$user_id'";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);
    if ($resultCheck > 0) {
        $row = mysqli_fetch_assoc($result);
        $profile = $row['username'];
    } else {
        header('location:home.php');
    }
} else {
    header('location:home.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Notifikasi </title>

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
    <?php require '../components/user_header.php' ?>
    <!-- Header End -->

    <!-- Form -->
    <div class="d-flex justify-content-center align-items-center container">
        <div class="card py-3 px-3 w-100">
            <h5 class="fw-bold text-center my-3"> Antrian Saya </h5>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th> Nomor </th>
                            <th> Nama </th>
                            <th> Tanggal Lahir </th>
                            <th> Jenis Kelamin </th>
                            <th> Alamat </th>
                            <th> Tanggal </th>
                            <th> Jam </th>
                            <th> Layanan </th>
                            <th> Dokter </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $limit = 8;
                        $page = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
                        $pages = ($page > 1) ? ($page * $limit) - $limit : 0;

                        $previous = $page - 1;
                        $next = $page + 1;

                        $antrian = mysqli_query($conn, "select * from antrian where user_id = '$user_id'");
                        $totalAntrian = mysqli_num_rows($antrian);
                        $totalHalaman = ceil($totalAntrian / $limit);

                        $dataAntrian = mysqli_query($conn, "SELECT * 
                        FROM antrian 
                        LEFT JOIN dokter ON antrian.layanan = dokter.layanan
                        LEFT JOIN layanan ON dokter.layanan = layanan.layanan_id
                        WHERE user_id = '$user_id'
                        GROUP BY antrian.antrian_id limit $pages, $limit");

                        while ($data = mysqli_fetch_array($dataAntrian)) {
                        ?>
                            <tr>
                                <td><?= $data['antrian_id']; ?></td>
                                <td><?= $data['namaPasien']; ?></td>
                                <td><?= $data['tanggalPasien']; ?></td>
                                <td><?= $data['kelamin']; ?></td>
                                <td><?= mb_strimwidth($data['alamatPasien'], 0, 30, "..."); ?></td>
                                <td><?= $data['tanggal']; ?></td>
                                <td><?= $data['jam']; ?></td>
                                <td><?= $data['namaLayanan']; ?></td>
                                <td><?= $data['namaDokter']; ?></td>
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