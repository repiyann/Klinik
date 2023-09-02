<?php
require 'components/connection.php';
session_start();

if (isset($_SESSION['username'])) {
    $user_id = $_SESSION['username'];
} else {
    $user_id = '';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Layanan </title>

    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">

    <!-- Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,300;0,400;0,700;1,700&display=swap">

    <!-- My Style -->
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>

<body>
    <!-- Start Header -->
    <?php require 'components/header.php'; ?>
    <!-- End Header -->

    <!-- Start Hero -->
    <!-- Umum Section Start -->
    <a id="umum">
        <section id="#umum" class="hero d-flex align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 d-flex flex-column justify-content-center">
                        <h1 class="fw-bold"> Poli Umum </h1>
                        <h3 class="mb-3"> Atur janji temu dengan dokter kapan saja dan di mana saja </h3>
                        <div>
                            <div class="text-center text-lg-start d-inline-block">
                                <a href="register.php" class="button text-decoration-none p-2 btn-collapsible">
                                    <span> Atur Sekarang </span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 hero-img mt-5">
                        <img src="img/home-image.svg" class="img-fluid">
                    </div>
                </div>
            </div>
        </section>
    </a>
    <!-- Umum Section End -->

    <hr>

    <!-- Lab Section Start -->
    <a id="lab">
        <section id="#lab" class="hero d-flex align-items-center">
            <div class="container mt-5">
                <div class="row">
                    <div class="col-lg-6 hero-img mt-5">
                        <img src="img/about-image.svg" class="img-fluid">
                    </div>
                    <div class="col-lg-6 d-flex flex-column justify-content-center">
                        <h1 class="fw-bolder mb-5"> Laboratorium </h1>
                        <h3 class="fw-bolder mb-2"> Kenapa Memilih Kami? </h3>
                        <div>
                            <div class="text-center text-lg-start d-inline-block">
                                <p>
                                    Kami adalah platform reservasi bertemu dokter bagi anda yang malas untuk menunggu berjam-jam 
                                    hanya untuk melakukan pemeriksaan selama 30 menit.
                                </p>
                                <p> Kami membantu anda dalam mengatur pertemuan dengan dokter di klinik kami menyesuaikan dengan
                                    jadwal anda, anda bisa memilih dokter mana yang tersedia di hari yang anda inginkan.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>>
    </a>
    <!-- Lab Section End -->
    <!-- End Hero -->

    <hr>

    <!-- Start Footer -->
    <?php require 'components/footer.php'; ?>
    <!-- End Footer -->

    <!-- JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script src="js/scripts.js"></script>
</body>

</html>