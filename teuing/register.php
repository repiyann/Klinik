<?php
require 'components/connection.php';
session_start();

if (isset($_SESSION['username'])) {
    $user_id = $_SESSION['username'];
} else {
    $user_id = '';
}

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);
    if ($resultCheck > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['username'] = $row['username'];
        header('location:home.php');
    } else {
        $message[] = 'Username atau Password Salah!';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Sign In </title>

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
    <section id="hero" class="hero d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 hero-img mt-3 ms-5 d-flex flex-column justify-content-center border-end">
                    <img width="400px" src="img/signup-image.svg" class="img-fluid">
                </div>
                <div class="col-lg-1"></div>
                <div class="col-lg-5 d-flex flex-column justify-content-center">
                    <form action="" method="post">
                        <h2 class="fw-bold mb-3 mt-3"> Sign In </h2>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" required placeholder="Username" name="username" maxlength="50" oninput="this.value = this.value.replace(/\s/g, '')">
                            <label for="floatingInput"> Username </label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="floatingInput" required placeholder="name@example.com" name="email" maxlength="50" oninput="this.value = this.value.replace(/\s/g, '')">
                            <label for="floatingInput"> Email </label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" id="floatingPassword" required placeholder="Password" name="password" maxlength="50" oninput="this.value = this.value.replace(/\s/g, '')">
                            <label for="floatingPassword"> Password </label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" id="floatingPassword" required placeholder="Confirm Password" name="confirm_password" maxlength="50" oninput="this.value = this.value.replace(/\s/g, '')">
                            <label for="floatingPassword"> Confirm Password </label>
                        </div>

                        <button type="submit" class="btn" id="login" name="submit"> Sign In </button>

                        <p class="mt-3"> Sudah Punya Akun? <a href="login.php"> Login </a> </p>
                        <center>
                            <a class="back text-decoration-none float-start" href="home.php"> Kembali </a>
                        </center>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script src="js/scripts.js"></script>
</body>

</html>