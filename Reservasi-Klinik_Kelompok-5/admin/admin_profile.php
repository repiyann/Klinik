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
    $username = $_POST['username'];
    $empty_password = 'da39a3ee5e6b4b0d3255bfef95601890afd80709';
    $password = md5($_POST['password']);
    $confirm_password = md5($_POST['confirm_password']);

    $sql1 = "SELECT * FROM admin WHERE adminpass = '$password'";
    $result1 = mysqli_query($conn, $sql1);
    $resultCheck1 = mysqli_num_rows($result1);

    $message = array();
    if ($resultCheck1 > 0) {
        $message[] = 'Anda menggunakan password lama!';
    } elseif ($password != $confirm_password) {
        $message[] = 'Password tidak sesuai!';
    } elseif ($password == $empty_password) {
        $message[] = 'Masukkan Password';
    } elseif ($confirm_password == $empty_password) {
        $message[] = 'Masukkan Password';
    } else {
        $insert = "UPDATE admin SET username = '$username', adminpass = '$confirm_password' WHERE admin_id = '$admin_id'";
        mysqli_query($conn, $insert);
        $message[] = 'Berhasil update akun!';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Admin Profile </title>

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
            <h5 class="fw-bold text-center my-3"> Profile Admin </h5>
            <?php
            if (isset($message)) {
                foreach ($message as $message) {
                    echo '<p class="msg rounded-2 p-2">' . $message . '</p>';
                }
            }
            ?>
            <form method="post" id="cekDok">
                <label class="fw-bold mb-1"> Data Admin </label>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" required name="username" maxlength="50" value="<?= $profile; ?>">
                    <label for="floatingInput"> Username </label>
                </div>
                <div class="form-floating mb-3">
                    <input type="password" class="form-control" id="floatingPassword" required placeholder="Password" name="password" maxlength="50" oninput="this.value = this.value.replace(/\s/g, '')">
                    <label for="floatingPassword"> Password </label>
                </div>
                <div class="form-floating mb-3">
                    <input type="password" class="form-control" id="floatingPassword" required placeholder="Confirm Password" name="confirm_password" maxlength="50" oninput="this.value = this.value.replace(/\s/g, '')">
                    <label for="floatingPassword"> Confirm Password </label>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn mt-2 center" id="login" name="submit"> Ubah Data </button>
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