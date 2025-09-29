<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Perfil del Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles/styleUsers.css">

</head>

<body>

  <div class="container mt-4">
    <!-- Perfil del usuario -->
    <div class="card perfil-card mb-4">
      <div class="card-body d-flex align-items-center">
        <img src="https://res.cloudinary.com/dhotqeo6c/image/upload/v1759105578/OIP_w5vksw.webp" alt="Foto de perfil" class="profile-icon me-3">
        <div>
          <h5 class="mb-0 nombre-usuario" >id</h5>
          <small class="email-usuario">valeria@email.com</small>
        </div>
      </div>
    </div>

    <!-- Alojamientos reservados -->
    <h4 class="titulo-seccion mb-3">Alojamientos reservados</h4>
    <div class="row">
      <div class="col-md-4 mb-4">
        <div class="card alojamiento-card h-100">
          <img src="../assets/hotel.jpg" class="card-img-top" alt="Hotel reservado">
          <div class="card-body">
            <h5 class="card-title alojamiento-titulo">Hotel de Lujo Premium</h5>
            <p class="card-text alojamiento-descripcion">Experimenta el máximo confort en nuestro hotel de lujo con vistas panorámicas y servicios exclusivos.</p>
            <p class="alojamiento-ubicacion"><strong>Ubicación:</strong> Madrid, España</p>
            <p class="alojamiento-resena"><strong>Reseña:</strong> ⭐ 4.8</p>
          </div>
        </div>
      </div>
    </div>
  </div>

</body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</html>