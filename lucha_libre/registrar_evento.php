<?php include 'conexion.php'; ?>
<!DOCTYPE html>
<html>
<head>
  <title>Registrar Evento</title>
  <link rel="stylesheet" href="estilos.css">
  <style>
    .imagen-evento {
      display: block;
      margin: 0 auto 20px;
      width: 500px;
      max-width: 100%;
      height: auto;
      border-radius: 12px;
      box-shadow: 0 0 15px rgba(0,0,0,0.4);
    }

    .container {
      max-width: 800px;
      margin: 50px auto;
      padding: 20px;
      background-color:rgb(0, 0, 0);
      border-radius: 10px;
      box-shadow: 0 0 20px rgba(0,0,0,0.2);
    }

    h2 {
      text-align: center;
      margin-bottom: 30px;
    }

    form {
      display: flex;
      flex-direction: column;
      gap: 15px;
    }

    input[type="text"],
    input[type="date"],
    input[type="submit"] {
      padding: 10px;
      font-size: 16px;
      border: 1px solid #aaa;
      border-radius: 6px;
    }

    input[type="submit"] {
      background-color: #d91a1a;
      color: white;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    input[type="submit"]:hover {
      background-color: #a31515;
    }

    .success {
      color: green;
      font-weight: bold;
      text-align: center;
      margin-top: 20px;
    }

    .error {
      color: red;
      font-weight: bold;
      text-align: center;
      margin-top: 20px;
    }
  </style>
</head>
<body>
<?php include 'includes/navbar.php'; ?>
<div class="container">
  <h2>Registrar Evento de Lucha Libre</h2>

  <!-- Imagen decorativa -->
  <img src="../lucha_libre/images/cmll-lucha-libre (1).jpg" alt="Evento de Lucha Libre" class="imagen-evento">

  <form method="POST">
    <input type="text" name="nombre" placeholder="Nombre del evento" required>
    <input type="date" name="fecha" required>
    <input type="text" name="lugar" placeholder="Lugar" required>
    <input type="submit" name="guardar" value="Registrar Evento">
  </form>

  <?php
    if (isset($_POST['guardar'])) {
        $nombre = $_POST['nombre'];
        $fecha = $_POST['fecha'];
        $lugar = $_POST['lugar'];

        $sql = "INSERT INTO eventos (nombre, fecha, lugar) VALUES ('$nombre', '$fecha', '$lugar')";

        if ($conn->query($sql) === TRUE) {
            echo "<p class='success'>Evento registrado exitosamente.</p>";
        } else {
            echo "<p class='error'>Error: {$conn->error}</p>";
        }
    }
  ?>
</div>
</body>
</html>
