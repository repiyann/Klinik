<?php
require '../components/connection.php';
session_start();

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
} else {
    $user_id = '';
}

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $empty_password = 'da39a3ee5e6b4b0d3255bfef95601890afd80709';
    $password = md5($_POST['password']);
    $confirm_password = md5($_POST['confirm_password']);

    $sql = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);

    $message = array();
    if ($resultCheck > 0) {
        $message[] = 'Username sudah ada!';
    } elseif ($password == $empty_password) {
        $message[] = 'Masukkan Password';
    } elseif ($confirm_password == $empty_password) {
        $message[] = 'Masukkan Password';
    } elseif ($password != $confirm_password) {
        $message[] = 'Password tidak sesuai!';
    } else {
        $insert = "INSERT INTO users VALUES('', '$username', '$email', '$confirm_password')";
        mysqli_query($conn, $insert);
        $message[] = 'Berhasil membuat akun!';
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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

    <!-- Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,300;0,400;0,700;1,700&display=swap"
    rel="stylesheet">

    <!-- My Style -->
    <link href="../css/style.css" rel="stylesheet" type="text/css">
</head>

<body>
    <section id="hero" class="hero d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 hero-img mt-3 ms-5 d-flex flex-column justify-content-center border-end">
                    <img width="400px" src="../img/signup-image.svg" class="img-fluid">
                </div>
                <div class="col-lg-1"></div>
                <div class="col-lg-5 d-flex flex-column justify-content-center">
                    <form action="" method="post">
                        <h2 class="fw-bold mb-3 mt-3"> Sign Up </h2>

                        <!-- Form -->
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="username" required placeholder="Username" 
                                name="username" maxlength="50" oninput="this.value = this.value.replace(/\s/g, '')">
                            <label for="floatingInput"> Username </label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="email" required placeholder="name@example.com" 
                                name="email" maxlength="50" oninput="this.value = this.value.replace(/\s/g, '')">
                            <label for="floatingInput"> Email </label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" id="userpass" required placeholder="Password" 
                                name="password" maxlength="50" oninput="this.value = this.value.replace(/\s/g, '')">
                            <label for="floatingPassword"> Password </label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" id="confirm_userpass" required placeholder="Confirm Password" 
                                name="confirm_password" maxlength="50" oninput="this.value = this.value.replace(/\s/g, '')">
                            <label for="floatingPassword"> Confirm Password </label>
                        </div>

                        <?php
                        if (isset($message)) {
                            foreach ($message as $message) {
                                echo '<p class="msg rounded-2 p-2">' . $message . '</p>';
                            }
                        }
                        ?>

                        <button type="submit" class="btn" id="login" name="submit"> Sign In </button>
                        <p class="mt-3"> Sudah Punya Akun? <a href="login.php"> Login </a> </p>
                        <a class="back text-decoration-none float-start" href="../home.php"> Kembali </a>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script src="../js/scripts.js"></script>
</body>

</html>