<header class="header">
    <a href="home.php" class="logo"> <i class="fas fa-heartbeat"></i> Klinik Sumber Sehat </a>
    <nav class="navbar">
        <a href="#layanan" class="btn"> Layanan Kami<i class="fa-solid fa-chevron-down"></i> </a>
        <a href="#lokasi" class="btn"> Lokasi Klinik </a>
        <a href="user/login.php" class="navbar-extra btn"> <i class="fa-solid fa-user"></i> Login </a> 
    </nav>
</header>

<!-- ?php 
            $sql = "SELECT * FROM users WHERE username = '$username'";

            if ($result = $conn->query($sql)) {
                while ($obj = $result->fetch_object()) {
                    printf("%s (%s)\n", $obj->Lastname, $obj->Age);
                }
                $result -> free_result();
            }
        ?>