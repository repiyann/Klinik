<nav class="navbar navbar-expand-lg bg-light fixed-top">
    <div class="container p-1">
        <a class="navbar-brand fs-4" href="./home.php">
            <i class="fas fa-heart-pulse d-inline-block" style="color: #16a085;"></i> Klinik Sumber Sehat
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse show" id="navbarNav">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item mx-2">
                    <a class="nav-link active" aria-current="page" href="home.php"> Home </a>
                </li>
                <div class="dropdown">
                    <li class="nav-item mx-2">
                        <a class="nav-link muter head" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                            Layanan <i class="fas fa-chevron-down"></i>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <li>
                                <a class="dropdown-item" href="layanan.php#umum"> Poli Umum </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="layanan.php#lab"> Laboratorium </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="layanan.php#vaksin"> Vaksinasi </a>
                            </li>
                        </ul>
                    </li>
                </div>
                <li class="nav-item mx-2">
                    <a class="nav-link" href="home.php#about"> Tentang Kami </a>
                </li>
                <li class="nav-item mx-3">
                    <a class="nav-link button" href="user/login.php"> Login </a>
                </li>
            </ul>
        </div>
    </div>
</nav>