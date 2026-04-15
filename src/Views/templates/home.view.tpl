<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrusel</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">

    <!-- Imagen 1 -->
    <div class="carousel-item active">
      <img src="public/img/productos/arreglo.jpeg" class="d-block w-100" alt="Producto 1">
    </div>

    <!-- Imagen 2 -->
    <div class="carousel-item">
      <img src="public/img/productos/arreglo de dulces.jpeg" class="d-block w-100" alt="Producto 2">
    </div>

    <!-- Imagen 3 -->
    <div class="carousel-item">
      <img src="public/img/productos/arreglo de flores .jpeg" class="d-block w-100" alt="Producto 3">
    </div>

  </div>

  <!-- Botones -->
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </button>

  <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
    <span class="carousel-control-next-icon"></span>
  </button>

</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>