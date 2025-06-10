<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <title>Sistema de Lucha Libre</title>
  <link rel="stylesheet" href="estilos.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <style>
    body {
      background-color: #f0f2f5;
      color: #3a1a00; /* Marrón oscuro para buen contraste */
      font-weight: bold;
      text-shadow: 1px 1px 2px rgba(0,0,0,0.2); /* sombra sutil para texto */
    }
    .container {
      margin-top: 60px;
    }
    h2 {
      color: #a43400; /* rojo quemado para destacar */
      text-shadow: 2px 2px 5px rgba(0,0,0,0.3);
      font-family: 'Bangers', cursive, Arial, sans-serif;
    }
    p {
      font-size: 1.2rem;
      color: #5a3000;
      text-shadow: 1px 1px 3px rgba(0,0,0,0.15);
    }
    .imagen-lucha {
      max-width: 100%;
      border-radius: 12px;
      box-shadow: 0 5px 20px rgba(0,0,0,0.1);
      margin-top: 30px;
    }
  </style>
  <link href="https://fonts.googleapis.com/css2?family=Bangers&display=swap" rel="stylesheet" />
</head>
<body>

<?php include 'includes/navbar.php'; ?>

<div class="container text-center">
  <h2 class="mb-4">Bienvenido al sistema de gestión de lucha libre</h2>
  <p class="mb-5">Utiliza el menú superior para registrar luchadores, eventos y combates.</p>

  <!-- Imagen temática -->
  <img src="../lucha_libre/images/historia_lucha_libre_mexico-1536x1024.webp" alt="Lucha Libre" class="imagen-lucha" />
</div>

</body>
</html>
