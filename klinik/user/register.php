<?php
require '../components/connection.php';
session_start();

if (isset($_SESSION['username'])) {
    $user_id = $_SESSION['username'];
} else {
    $user_id = '';
}

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $empty_password = 'da39a3ee5e6b4b0d3255bfef95601890afd80709';
    $password = sha1($_POST['password']);
    $confirm_password = sha1($_POST['confirm_password']);

    $sql = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);
    
    if ($resultCheck > 0) {
        $message[] = 'Username sudah ada!';
    } elseif ($password == $empty_password) {
        $message[] = 'Masukkan Password';
    } elseif ($confirm_password == $empty_password) {
        $message[] = 'Masukkan Password';
    } elseif ($password != $confirm_password) {
        $message[] = 'Password tidak sesuai!';
    } else {
        $insert = "INSERT INTO users VALUES('', '$username', '$email', '$password')";
        mysqli_query($conn, $insert);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Daftar </title>

    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- My Style -->
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <div class="container">
        <h1> Daftar </h1>
        <form action="" method="post">
            <?php
                if (isset($message)) {
                    foreach ($message as $message) {
                        echo '
                            <div class="message">
                                <p class="warn">' . $message . '</p>
                            </div>
                        ';
                    }
                }
            ?>
            <label> Username </label>
            <input type="text" name="username" class="form" required placeholder="Username" maxlength="50" oninput="this.value = this.value.replace(/\s/g, '')">

            <label> Email </label>
            <input type="email" name="email" class="form" required placeholder="Email" maxlength="50" oninput="this.value = this.value.replace(/\s/g, '')">

            <label> Password </label>
            <input type="password" name="password" class="form" required placeholder="Password" maxlength="50" oninput="this.value = this.value.replace(/\s/g, '')">

            <label> Confirm Password </label>
            <input type="password" name="confirm_password" class="form" required placeholder="Confirm Password" maxlength="50" oninput="this.value = this.value.replace(/\s/g, '')">

            <input type="submit" class="btn-login" name="submit" value="DAFTAR">

            <br>
            <br>

            <p class="info"> Sudah Punya Akun? <a href="login.php"> Login </a> </p>
            <br>
            <center>
                <a class="back" href="../home.php"> Kembali </a>
            </center>
        </form>
    </div>
    <!-- JavaScript -->
    <script src="js/script.js"></script>
</body>

</html>