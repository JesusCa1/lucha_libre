<?php include 'conexion.php'; ?>
<!DOCTYPE html>
<html>
<head>
  <title>Ver Luchadores</title>
  <link rel="stylesheet" href="estilos.css">
</head>
<body>
<?php include 'includes/navbar.php'; ?>
<div class="container">
  <h2>Luchadores Registrados</h2>

  <?php
  // Eliminar luchador si se envió el formulario
  if (isset($_POST['eliminar'])) {
      $id = intval($_POST['id_luchador']);
      $conn->query("DELETE FROM luchadores WHERE id_luchador = $id");
      echo "<p class='success'>Luchador eliminado correctamente.</p>";
  }
  ?>

  <table>
    <tr>
      <th>ID</th>
      <th>Nombre</th>
      <th>Apodo</th>
      <th>Nacionalidad</th>
      <th>Acciones</th>
    </tr>
    <?php
    $sql = "SELECT * FROM luchadores";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['id_luchador']}</td>
                <td>{$row['nombre']}</td>
                <td>{$row['apodo']}</td>
                <td>{$row['nacionalidad']}</td>
                <td>
                  <form method='POST' onsubmit=\"return confirm('¿Estás seguro de que deseas eliminar a este luchador?');\">
                    <input type='hidden' name='id_luchador' value='{$row['id_luchador']}'>
                    <input type='submit' name='eliminar' value='Eliminar'>
                  </form>
                </td>
              </tr>";
      }
    } else {
      echo "<tr><td colspan='5'>No hay luchadores registrados.</td></tr>";
    }
    ?>
  </table>
</div>
</body>
</html>
