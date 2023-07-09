<?php
    $conn = mysqli_connect("localhost", "root", "", "klinik");

    if (mysqli_connect_errno()) {
        echo'Error : ', mysqli_connect_error();
    }
?>