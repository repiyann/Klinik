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
    <title> Klinik Sumber Sehat </title>

    <!-- Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

    <!-- Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,300;0,400;0,700;1,700&display=swap" rel="stylesheet">

    <!-- My Style -->
    <link href="css/style.css" rel="stylesheet" type="text/css">
</head>

<body>
    <!-- Start Header -->
    <?php require 'components/header.php'; ?>
    <!-- End Header -->

    <!-- Start Hero -->
    <!-- Home Section Start -->
    <section id="hero" class="hero d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 d-flex flex-column justify-content-center">
                    <h1 class="fw-bold"> Pelayanan Kesehatan </h1>
                    <h3 class="mb-3"> Atur janji temu dengan dokter kapan saja dan di mana saja </h3>
                    <div>
                        <div class="text-center text-lg-start d-inline-block">
                            <a href="user/register.php" class="button text-decoration-none p-2">
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
    <!-- Home Section End -->

    <hr>

    <!-- About Section Start -->
    <section id="about" class="hero d-flex align-items-center">
        <div class="container mt-5">
            <div class="row">
                <div class="col-lg-6 hero-img mt-5">
                    <img src="img/about-image.svg" class="img-fluid">
                </div>
                <div class="col-lg-6 d-flex flex-column justify-content-center">
                    <h1 class="fw-bolder mb-5"> Tentang Kami </h1>
                    <h3 class="fw-bolder mb-2"> Kenapa Memilih Kami? </h3>
                    <div>
                        <div class="text-center text-lg-start d-inline-block">
                            <p>
                                Kami adalah platform reservasi bertemu dokter bagi anda yang malas untuk menunggu berjam-jam hanya
                                untuk melakukan pemeriksaan selama 30 menit.
                            </p>
                            <p> Kami membantu anda dalam mengatur pertemuan dengan dokter di klinik kami menyesuaikan dengan jadwal
                                anda, anda bisa memilih dokter mana yang tersedia di hari yang anda inginkan.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>>
    <!-- About Section End -->
    <!-- End Hero -->

    <hr>

    <!-- Start Footer -->
    <?php require 'components/footer.php'; ?>
    <!-- End Footer -->

    <!-- JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="js/scripts.js"></script>
</body>

</html>