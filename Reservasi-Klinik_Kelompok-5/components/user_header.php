<?php
$antrian = mysqli_query($conn, "select * from antrian where user_id = '$user_id'");
$totalAntrian = mysqli_num_rows($antrian);
?>
<nav class="navbar navbar-expand-lg bg-light fixed-top">
    <div class="container p-1">
        <a href="../user/reservasi.php" class="navbar-brand fs-4">
            <i class="fas fa-heart-pulse d-inline-block" style="color: #16a085"></i> Klinik Sumber Sehat
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse show" id="navbarNav">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item mx-2">
                    <a href="../user/usernotif.php" class="nav-link" id="notif">
                        <span class="fas fa-bell"></span> <?= $totalAntrian ?>
                    </a>
                </li>
                <div class="dropdown">
                    <li class="nav-item mx-2">
                        <a class="nav-link muter head" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-user"></i>
                            <?= $profile ?>
                            <i class="fas fa-chevron-down"></i>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <li>
                                <a class="dropdown-item" href="../user/userprofile.php"> My Profile </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="../user/logout.php"> Sign Out </a>
                            </li>
                        </ul>
                    </li>
                </div>
            </ul>
        </div>
    </div>
</nav>