<?php
require '../components/connection.php';

if (isset($_GET['layanan_id'])) {
    $layananId = $_GET['layanan_id'];

    $sql = "SELECT * FROM dokter WHERE layanan = '$layananId'";
    $result = mysqli_query($conn, $sql);

    echo "<option selected='' disabled selected>Pilih Dokter</option>";
    while ($rows = mysqli_fetch_assoc($result)) {
        echo "<option value='" . $rows['dokter_id'] . "'>" . $rows['namaDokter'] . "</option>";
    }
}
?>