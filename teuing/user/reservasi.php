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

if (isset($_POST['submit'])) {
    $namaPasien = $_POST['namaPasien'];
    $tanggalPasien = $_POST['tanggalPasien'];
    $alamatPasien = $_POST['alamatPasien'];
    $tanggal = $_POST['tanggal'];
    $jam = $_POST['jam'];
    $layanan = $_POST['layanan'];
    $dokter = $_POST['dokter'];

    $sql = "SELECT * FROM antrian WHERE tanggal = '$tanggal' AND jam = '$jam' AND layanan = '$layanan' AND dokter = '$dokter'";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);

    $message = array();
    if ($resultCheck > 0) {
        $message[] = 'Antrian sudah ada!';
    } else {
        $insert = "INSERT INTO antrian VALUES('', '$user_id', '$namaPasien', '$tanggalPasien', '$alamatPasien', '$tanggal', '$jam', '$layanan', '$dokter')";
        mysqli_query($conn, $insert);
        $message[] = 'Berhasil membuat antrian!';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Reservasi </title>

    <!-- Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

    <!-- Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Datepicker -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.10.0/css/bootstrap-datepicker.min.css" rel="stylesheet">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,300;0,400;0,700;1,700&display=swap" rel="stylesheet">

    <!-- My Style -->
    <link href="../css/style.css" rel="stylesheet" type="text/css">
</head>
<script type="text/javascript">
    function loadDokter(layananId) {
        var dokterSelect = document.getElementById("dokter");
        dokterSelect.innerHTML = "<option selected='' disabled selected>Loading...</option>";

        var xhr = new XMLHttpRequest();
        xhr.open("GET", "getDok.php?layanan_id=" + layananId, true);
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                dokterSelect.innerHTML = xhr.responseText;
            }
        };
        xhr.send();
    }
</script>

<body>
    <!-- Header Start -->
    <?php require '../components/user_header.php' ?>
    <!-- Header End -->

    <!-- Form -->
    <div class="d-flex justify-content-center align-items-center container">
        <div class="card py-3 px-3 w-50">
            <h5 class="fw-bold text-center"> Reservasi Dokter </h5>
            <h5 class="fw-bold text-center"> Klinik Sumber Sehat </h5>
            <?php
            if (isset($message)) {
                foreach ($message as $message) {
                    echo '<p class="msg rounded-2 p-2">' . $message . '</p>';
                }
            }
            ?>
            <form method="post" id="cekDok">
                <label class="fw-bold mb-1"> Data Diri </label>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" required name="namaPasien" maxlength="50">
                    <label for="floatingInput"> Nama Lengkap </label>
                </div>
                <label> Tanggal Lahir </label>
                <div class="col-4">
                    <div class="input-group date" id="datepicker" data-provide="datepicker" data-date-end-date="+0d">
                        <input type="text" class="form-control" name="tanggalPasien" readonly>
                        <span class="input-group-append">
                            <span class="input-group-text bg-light d-block">
                                <i class="fa fa-calendar"></i>
                            </span>
                        </span>
                    </div>
                </div>
                <div class="form-floating my-3">
                    <textarea class="form-control" id="floatingTextarea" required name="alamatPasien" style="height: 100px" oninput="this.value = this.value.replace(/\n/g, '')"></textarea>
                    <label for="floatingTextarea"> Alamat </label>
                </div>
                <label class="fw-bold mb-1"> Jadwal Kunjungan </label>
                <br>
                <label> Tanggal </label>
                <div class="col-4">
                    <div class="input-group date" id="reservasi">
                        <input type="text" class="form-control" name="tanggal" readonly>
                        <span class="input-group-append">
                            <span class="input-group-text bg-light d-block">
                                <i class="fa fa-calendar"></i>
                            </span>
                        </span>
                    </div>
                </div>
                <div class="form-floating my-4">
                    <select class="form-select" name="jam" id="floatingSelect">
                        <option selected="" disabled selected> Pilihan Jadwal </option>
                        <option value="08.00"> 08.00 </option>
                        <option value="09.00"> 09.00 </option>
                        <option value="10.00"> 10.00 </option>
                        <option value="11.00"> 11.00 </option>
                        <option value="13.00"> 13.00 </option>
                        <option value="14.00"> 14.00 </option>
                        <option value="15.00"> 15.00 </option>
                        <option value="16.00"> 16.00 </option>
                    </select>
                    <label for="floatingSelect"> Jam </label>
                </div>
                <label class="fw-bold mb-1"> Dokter </label>
                <div class="form-floating mb-4">
                    <select class="form-select" name="layanan" id="layanan" onchange="loadDokter(this.value)">
                        <option selected="" disabled selected> Pilihan Layanan </option>
                        <?php
                        $sql = "SELECT * FROM layanan";
                        $result = mysqli_query($conn, $sql);
                        while ($rows = mysqli_fetch_assoc($result)) {
                            echo "<option value='" . $rows['layanan_id'] . "'>" . $rows['namaLayanan'] . "</option>";
                        }
                        ?>
                    </select>
                    <label for="floatingSelect"> Layanan </label>
                </div>
                <div class="form-floating my-1">
                    <select class="form-select" name="dokter" id="dokter">
                        <option selected="" disabled selected> Pilihan Dokter </option>
                    </select>
                    <label for="floatingSelect"> Dokter </label>
                    </select>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn mt-3 center" id="login" name="submit"> Pesan </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Copyright -->
    <div class="text-center p-4 mt-5" style="background-color: rgba(0, 0, 0, 0.05);">
        © 2023 Copyright:
        <a class="text-reset fw-bold text-decoration-none" href="https://github.com/repiyann"> @repiyann </a>
    </div>

    <!-- JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.10.0/js/bootstrap-datepicker.min.js"></script>
    <script src="../js/user_scripts.js"></script>
</body>

</html>