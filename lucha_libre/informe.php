<?php
include 'conexion.php';

// PROCESAR ELIMINACIÓN
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['eliminar'])) {
    $id_combate = intval($_POST['id_combate']);

    $stmt = $conn->prepare("DELETE FROM combates WHERE id_combate = ?");
    $stmt->bind_param("i", $id_combate);
    $stmt->execute();
    $stmt->close();

    header("Location: informe.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <title>Informe de Combates - Lucha Libre</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Bangers&display=swap');

        body {
            background: linear-gradient(135deg, #4b0000, #d91a1a);
            color: #ffd700;
            font-family: 'Bangers', cursive, Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 1100px;
            margin: 80px auto 40px;
            background: #5a0000cc;
            border-radius: 15px;
            padding: 30px 40px;
            box-shadow: 0 0 25px #ffd700aa;
        }

        h1 {
            text-align: center;
            font-size: 48px;
            margin-bottom: 30px;
            text-shadow: 3px 3px 0 #000000aa;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #ffd700;
            color: #5a0000;
            font-weight: bold;
            font-size: 18px;
            box-shadow: 0 0 15px #ffd700bb;
            border-radius: 12px;
            overflow: hidden;
        }

        thead tr {
            background: linear-gradient(90deg, #d91a1a, #5a0000);
            color: #ffd700;
            text-transform: uppercase;
            font-size: 20px;
            letter-spacing: 3px;
            box-shadow: inset 0 -4px 8px #00000077;
        }

        tbody tr:nth-child(even) {
            background-color: #fff3b0;
        }

        tbody tr:hover {
            background-color: #ffd700cc;
            color: #5a0000;
            cursor: pointer;
            font-weight: 900;
            box-shadow: 0 0 10px #5a0000;
            transition: 0.3s ease-in-out;
        }

        tbody td {
            padding: 12px 15px;
            vertical-align: middle;
        }

        .btn-eliminar {
            font-family: Arial, sans-serif;
            font-weight: bold;
            color: white;
            background-color: #d91a1a;
            border: none;
            border-radius: 6px;
            padding: 6px 12px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn-eliminar:hover {
            background-color: #a31717;
        }

        @media (max-width: 768px) {
            h1 {
                font-size: 32px;
            }
            table {
                font-size: 14px;
            }
        }
    </style>

    <script>
        function confirmarEliminar() {
            return confirm('¿Seguro que deseas eliminar este combate?');
        }
    </script>
</head>
<body>
<?php include 'includes/navbar.php'; ?>
<div class="container">
    <h1>Informe de Combates</h1>

    <table>
        <thead>
            <tr>
                <th>Evento</th>
                <th>Luchador 1</th>
                <th>Luchador 2</th>
                <th>Ganador</th>
                <th>Resultado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT c.id_combate, c.resultado, 
                           e.nombre AS evento, 
                           l1.nombre AS nombre1, l1.apodo AS apodo1, 
                           l2.nombre AS nombre2, l2.apodo AS apodo2, 
                           g.nombre AS nombre_ganador, g.apodo AS apodo_ganador
                    FROM combates c
                    JOIN eventos e ON c.id_evento = e.id_evento
                    JOIN luchadores l1 ON c.id_luchador1 = l1.id_luchador
                    JOIN luchadores l2 ON c.id_luchador2 = l2.id_luchador
                    JOIN luchadores g ON c.ganador = g.id_luchador";

            $resultado = $conn->query($sql);

            if ($resultado && $resultado->num_rows > 0) {
                while ($fila = $resultado->fetch_assoc()) {
                    $luchador1 = $fila['apodo1'] ? "{$fila['nombre1']} ({$fila['apodo1']})" : $fila['nombre1'];
                    $luchador2 = $fila['apodo2'] ? "{$fila['nombre2']} ({$fila['apodo2']})" : $fila['nombre2'];
                    $ganador   = $fila['apodo_ganador'] ? "{$fila['nombre_ganador']} ({$fila['apodo_ganador']})" : $fila['nombre_ganador'];

                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($fila['evento']) . "</td>";
                    echo "<td>" . htmlspecialchars($luchador1) . "</td>";
                    echo "<td>" . htmlspecialchars($luchador2) . "</td>";
                    echo "<td>" . htmlspecialchars($ganador) . "</td>";
                    echo "<td>" . htmlspecialchars($fila['resultado']) . "</td>";
                    echo "<td>
                            <form method='POST' style='margin:0;' onsubmit='return confirmarEliminar();'>
                                <input type='hidden' name='id_combate' value='" . $fila['id_combate'] . "' />
                                <button type='submit' name='eliminar' class='btn-eliminar'>Eliminar</button>
                            </form>
                          </td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='6' style='text-align:center; color:#5a0000;'>No hay combates registrados.</td></tr>";
            }

            $conn->close();
            ?>
        </tbody>
    </table>
</div>

</body>
</html>
