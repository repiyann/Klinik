<?php
    $conn = new mysqli('localhost', 'root', '', 'klinik');
    
    if ($conn->connect_errno) {
        echo'Erorr : ', $conn->connect_error;
    }
?>