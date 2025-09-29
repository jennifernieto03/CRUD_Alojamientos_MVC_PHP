<?php
require_once "./controller/Accomodation_Controller.php";
$accommodations = Accomodation_Controller::getAccomodation();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Alojamientos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles/styleContent.css?v=2">
</head>

<body>
    <!-- Navbar con menú y perfil -->
    <nav class="navbar navbar-expand-lg bg-orange text-white fixed-top shadow-sm px-4">
        <div class="container-fluid">
            <a class="navbar-brand text-white fw-bold" href="#">Aloha</a>
            <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMenu">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-between" id="navbarMenu">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="contenido.php">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="user.php">Reservas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="user.php">Perfil</a>
                    </li>
                </ul>

                <div class="d-flex align-items-center gap-2">
                    <img src="https://cdn-icons-png.flaticon.com/512/847/847969.png" alt="Perfil" class="profile-icon">
                    <a href="login.php" class="btn btn-outline-light">Iniciar Sesión</a>
                    <a href="signin.php" class="btn btn-outline-light">Registrarse</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Contenido principal -->
    <main class=" pt-5 mt-5 px-4">
        <div class="banner-alojamientos text-center mb-5">
            <h1 class="text-center text-orange mb-4" style="color: white;">Encuentra tu Alojamiento Perfecto</h1>
            <p class="text-center mb-5">Descubre nuestros alojamientos únicos en los destinos más increíbles del mundo. Desde hoteles de lujo hasta cabañas acogedoras.</p>
        </div>
        <div class="container">
    <h2>Alojamientos Disponibles</h2>
    <p>Alojamientos Encontrados:</p>
    <div class="row">
        <?php foreach ($accommodations as $item): ?>
            <div class="col-12 col-md-6 col-lg-4 mb-4">
                <div class="card h-100 shadow-sm">
                    <img src="<?= htmlspecialchars($item['image']) ?>" alt="" class="card-img-top img-ajustada">

                    <div class="card-body">
                        <h5 class="card-title text-orange"><?= htmlspecialchars($item['name']) ?></h5>
                        <p class="card-text"><?= htmlspecialchars($item['description']) ?></p>
                        <ul class="list-unstyled">
                            <li>📍 <?= htmlspecialchars($item['ubication']) ?></li>
                            <li>⭐ <?= htmlspecialchars($item['review']) ?></li>
                        </ul>
                        <a href="#" class="btn btn-danger ">Ver detalles</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>


    </main>


    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>