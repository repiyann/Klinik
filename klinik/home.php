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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- My Style -->
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>

<body>
    <!-- Header Start -->
    <?php include 'components/user_header.php'; ?>
    <!-- Header End -->

    <!-- Home Section Start -->
    <section class="home" id="home">
        <div class="content">
            <h3> Pelayanan Kesehatan </h3>
            <p class="awal"> Di mana saja dan kapan saja </p>

            <!-- Modal Trigger -->
            <button type="button" class="btn" id="myBtn"> Pesan Sekarang </button>
            <!-- Modal Trigger -->

        </div>
    </section>
    <!-- Home Section End -->

    <!-- Modal Start -->
    <?php include 'components/modal.php'; ?>
    <!-- Modal End -->

    <!-- Icon Section Start -->
    <section class="icons-container">
        <div class="icons">

        </div>
    </section>
    <!-- Icon Section End -->

    <!-- Footer Start -->
    <?php include 'components/user_footer.php'; ?>
    <!-- Footer End -->

    <!-- JavaScript -->
    <script src="js/script.js"></script>
</body>

</html>