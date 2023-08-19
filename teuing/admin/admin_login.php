<?php
require '../components/connection.php';
session_start();

if (isset($_SESSION['admin_id'])) {
    $admin_id = $_SESSION['admin_id'];
} else {
    $admin_id = '';
}

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $sql = "SELECT * FROM admin WHERE username = '$username' AND adminpass = '$password'";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);
    if ($resultCheck > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['admin_id'] = $row['admin_id'];
        header('location:dashboard.php'); 
    } else {
        $message[] = 'Akun Tidak Ditemukan!';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Admin Log In </title>

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
    <section id="hero" class="hero d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 hero-img mt-3 ms-5 d-flex flex-column justify-content-center border-end">
                    <img width="400px" src="../img/login-image.svg" class="img-fluid">
                </div>
                <div class="col-lg-1"></div>
                <div class="col-lg-5 d-flex flex-column justify-content-center">
                    <form action="" method="post">
                        <h2 class="fw-bold mb-3 mt-3"> Admin Log In </h2>

                        <!-- Form -->
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="username" required placeholder="Username" name="username" maxlength="50" oninput="this.value = this.value.replace(/\s/g, '')">
                            <label for="floatingInput"> Username </label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" id="userpass" required placeholder="Password" name="password" maxlength="50" oninput="this.value = this.value.replace(/\s/g, '')">
                            <label for="floatingPassword"> Password </label>
                        </div>

                        <?php
                        if (isset($message)) {
                            foreach ($message as $message) {
                                echo '<p class="msg rounded-2 p-2">' . $message . '</p>';
                            }
                        }
                        ?>

                        <button type="submit" class="btn" id="login" name="submit"> Login </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="../js/scripts.js"></script>
</body>

</html>