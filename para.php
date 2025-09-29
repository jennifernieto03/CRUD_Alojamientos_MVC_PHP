<?php 

    require_once 'controller/Accomodation_Controller.php';
    $accommodations = Accomodation_Controller::getAccomodation();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>Alojamientos</title>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light fs-3 mb-3">
            <a class="navbar-brand fs-1" href="index.php">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-house-door-fill" viewBox="0 0 16 16">
                    <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5"/>
                </svg>
                AlojaSV
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Iniciar Sesión</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Registrarse</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <main>
        <section>
            <h1>Encuentra tu Alojamiento Perfecto</h1>
            <p>Descubre nuestros alojamientos únicos en los destinos más increíbles del mundo. Desde hoteles de lujo hasta cabañas acogedoras.</p>
        </section>
        <article>
            <h3>Alojamientos disponibles</h3>
            
            <div class="container py-4">
                    <div class="row g-4">
                        <?php foreach ($accommodations as $item): ?>
                            <div class="col-md-4">
                            <div class="card h-100">
                                <img src="img/<?= htmlspecialchars($item['image']) ?>" class="card-img-top" alt="<?= htmlspecialchars($item['name']) ?>">
                                <div class="card-body">
                                <h5 class="card-title"><?= htmlspecialchars($item['name']) ?></h5>
                                <p class="card-text"><?= htmlspecialchars($item['description']) ?></p>
                                <ul class="list-unstyled">
                                    <li>📍 <?= htmlspecialchars($item['ubication']) ?></li>
                                    <li>⭐ <?= htmlspecialchars($item['review']) ?></li>
                                </ul>
                                <a href="#" class="btn btn-primary">Ver detalles</a>
                                </div>
                            </div>
                            </div>
                        <?php endforeach; ?>
                </div>
            </div>
        </article>
    </main>

</body>
</html>