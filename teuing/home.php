<?php
    require 'components/connection.php';
    session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Klinik Sumber Sehat </title>

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
    <?php require 'components/hero.php'; ?>
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