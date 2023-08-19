<?php
require '../components/connection.php';

if (isset($_POST['delete'])) {
    $delete = $_POST['id'];
    $sql = "DELETE FROM layanan WHERE layanan_id = '$delete'";
    $query = mysqli_query($conn, $sql);

    if ($query) {
        echo "<script> alert('Data Terhapus!'); </script>";
        header("location:edit_layanan.php");
    } else {
        echo "<script> alert('Data Belum Dihapus!') </script>";
    }
}
?>