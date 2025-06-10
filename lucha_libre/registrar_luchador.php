<?php include 'conexion.php'; ?>
<!DOCTYPE html>
<html>
<head>
  <title>Registrar Luchador</title>
  <link rel="stylesheet" href="estilos.css">
</head>
<body>
<?php include 'includes/navbar.php'; ?>
<div class="container">
  <h2>Registrar Nuevo Luchador</h2>

  <!-- Imagen decorativa o ilustrativa -->
  <img src="../lucha_libre/images/f1280x720-6387_138062_5050.jpg" alt="Luchador" class="img-centrada">

  <form method="POST">
    <input type="text" name="nombre" placeholder="Nombre completo" required>
    <input type="text" name="apodo" placeholder="Apodo">
    <input type="text" name="nacionalidad" placeholder="Nacionalidad">
    <input type="submit" name="guardar" value="Guardar">
  </form>

  <?php
    if (isset($_POST['guardar'])) {
        $sql = "INSERT INTO luchadores (nombre, apodo, nacionalidad) VALUES (
            '{$_POST['nombre']}',
            '{$_POST['apodo']}',
            '{$_POST['nacionalidad']}')";
        if ($conn->query($sql) === TRUE) {
            echo "<p class='success'>Luchador registrado exitosamente.</p>";
        } else {
            echo "<p class='error'>Error: {$conn->error}</p>";
        }
    }
  ?>
</div>
</body>
</html>
