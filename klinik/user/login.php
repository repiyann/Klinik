<?php

require '../components/connection.php';

session_start();

if (isset($_SESSION['username'])) {
    $user_id = $_SESSION['username'];
} else {
    $user_id = '';
};

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = sha1($_POST['password']);

    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);
    if ($resultCheck > 0) {
        $_SESSION['user_id'] = $row['user_id'];
        header('location:../home.php');
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
    <title> Login </title>

    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- My Style -->
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <div class="container">
        <h1> Login </h1>
        <form action="" method="post">
            <?php
                if (isset($message)) {
                    foreach ($message as $message) {
                        echo '
                            <div class="message">
                                <p>' . $message . '</p>
                            </div>
                        ';
                    }
                }
            ?>
            <label> Username </label>
            <input type="text" name="username" class="form" required placeholder="Username" maxlength="50" oninput="this.value = this.value.replace(/\s/g, '')">

            <label> Password </label>
            <input type="password" name="password" class="form" required placeholder="Password" maxlength="50" oninput="this.value = this.value.replace(/\s/g, '')">

            <input type="submit" class="btn-login" name="submit" value="LOGIN">

            <br>
            <br>

            <p class="info"> Belum Daftar? <a href="register.php"> Daftar Di Sini </a> </p>
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