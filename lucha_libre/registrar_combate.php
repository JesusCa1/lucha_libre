<?php
include 'conexion.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <title>Registrar Combate - Lucha Libre</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />

  <style>
    @import url('https://fonts.googleapis.com/css2?family=Bangers&display=swap');

    body {
      background: linear-gradient(135deg, #4b0000, #d91a1a);
      color: #ffd700;
      font-family: 'Bangers', cursive, Arial, sans-serif;
      margin: 0;
      padding: 0;
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .container {
      max-width: 600px;
      background: #5a0000cc;
      border-radius: 15px;
      padding: 30px 40px;
      box-shadow: 0 0 25px #ffd700aa;
      margin-top: 40px;
      margin-bottom: 40px;
    }

    h2 {
      text-align: center;
      font-size: 48px;
      margin-bottom: 30px;
      text-shadow: 3px 3px 0 #000000aa;
    }

    label {
      font-weight: bold;
      font-size: 18px;
      color: #ffd700;
      text-shadow: 1px 1px 2px #000;
    }

    select.form-select, input.form-control {
      font-family: 'Bangers', cursive, Arial, sans-serif;
      font-weight: bold;
      font-size: 18px;
      border-radius: 12px;
      border: 2px solid #d91a1a;
      background: #fff3b0;
      color: #5a0000;
      transition: border-color 0.3s ease;
    }

    select.form-select:focus, input.form-control:focus {
      outline: none;
      border-color: #ffd700;
      box-shadow: 0 0 8px #ffd700cc;
    }

    .btn-success {
      font-family: 'Bangers', cursive, Arial, sans-serif;
      font-size: 22px;
      font-weight: bold;
      background-color: #ffd700;
      border-color: #d91a1a;
      color: #5a0000;
      border-radius: 12px;
      transition: background-color 0.3s ease, color 0.3s ease;
      width: 100%;
      padding: 12px 0;
      margin-top: 15px;
    }

    .btn-success:hover {
      background-color: #d91a1a;
      color: #ffd700;
    }

    .alert {
      font-family: Arial, sans-serif;
      font-weight: bold;
      font-size: 16px;
      margin-top: 20px;
      border-radius: 12px;
      padding: 10px 15px;
      text-align: center;
    }
  </style>
</head>
<body>

<?php include 'includes/navbar.php'; ?>

<div class="container">
  <h2>Registrar Combate</h2>

  <form method="POST" autocomplete="off">

    <div class="mb-3">
      <label for="id_evento">Evento</label>
      <select id="id_evento" name="id_evento" class="form-select" required>
        <option value="">-- Seleccionar evento --</option>
        <?php
        $evt = $conn->query("SELECT id_evento, nombre, fecha FROM eventos");
        while ($e = $evt->fetch_assoc()) {
          echo "<option value='{$e['id_evento']}'>{$e['nombre']} ({$e['fecha']})</option>";
        }
        ?>
      </select>
    </div>

    <div class="mb-3">
      <label for="luchador1">Luchador 1</label>
      <select id="luchador1" name="luchador1" class="form-select" required>
        <option value="">-- Seleccionar luchador 1 --</option>
        <?php
        $luch1 = $conn->query("SELECT id_luchador, nombre, apodo FROM luchadores");
        while ($l = $luch1->fetch_assoc()) {
          $nombreCompleto = $l['apodo'] ? "{$l['nombre']} ({$l['apodo']})" : $l['nombre'];
          echo "<option value='{$l['id_luchador']}'>{$nombreCompleto}</option>";
        }
        ?>
      </select>
    </div>

    <div class="mb-3">
      <label for="luchador2">Luchador 2</label>
      <select id="luchador2" name="luchador2" class="form-select" required>
        <option value="">-- Seleccionar luchador 2 --</option>
        <?php
        $luch2 = $conn->query("SELECT id_luchador, nombre, apodo FROM luchadores");
        while ($l = $luch2->fetch_assoc()) {
          $nombreCompleto = $l['apodo'] ? "{$l['nombre']} ({$l['apodo']})" : $l['nombre'];
          echo "<option value='{$l['id_luchador']}'>{$nombreCompleto}</option>";
        }
        ?>
      </select>
    </div>

    <div class="mb-3">
      <label for="ganador">Ganador</label>
      <select id="ganador" name="ganador" class="form-select" required>
        <option value="">-- Seleccionar ganador --</option>
        <?php
        $luchGanador = $conn->query("SELECT id_luchador, nombre, apodo FROM luchadores");
        while ($l = $luchGanador->fetch_assoc()) {
          $nombreCompleto = $l['apodo'] ? "{$l['nombre']} ({$l['apodo']})" : $l['nombre'];
          echo "<option value='{$l['id_luchador']}'>{$nombreCompleto}</option>";
        }
        ?>
      </select>
    </div>

    <div class="mb-3">
      <label for="resultado">Resultado del combate</label>
      <select id="resultado" name="resultado" class="form-select" required>
        <option value="">-- Seleccionar resultado --</option>
        <option value="Conteo de tres">Conteo de tres</option>
        <option value="Rendición">Rendición</option>
        <option value="Descalificación">Descalificación</option>
        <option value="Empate">Empate</option>
        <option value="Sin resultado">Sin resultado</option>
        <option value="KO técnico">KO técnico</option>
        <option value="Interferencia externa">Interferencia externa</option>
      </select>
    </div>

    <button type="submit" name="guardar" class="btn btn-success">Guardar Combate</button>
  </form>

  <div class="mt-4">
    <?php
    if (isset($_POST['guardar'])) {
        $sql = "INSERT INTO combates (id_evento, id_luchador1, id_luchador2, ganador, resultado)
                VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param(
          "iiiss",
          $_POST['id_evento'],
          $_POST['luchador1'],
          $_POST['luchador2'],
          $_POST['ganador'],
          $_POST['resultado']
        );

        if ($stmt->execute()) {
            echo "<div class='alert alert-success'>✅ Combate registrado exitosamente.</div>";
        } else {
            echo "<div class='alert alert-danger'>❌ Error: {$conn->error}</div>";
        }
        $stmt->close();
    }
    ?>
  </div>
</div>

</body>
</html>
