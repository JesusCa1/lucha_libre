<style>
  @import url('https://fonts.googleapis.com/css2?family=Bangers&display=swap');

  .navbar {
    background: linear-gradient(90deg, #d91a1a, #5a0000);
    padding: 12px 20px;
    display: flex;
    gap: 25px;
    font-family: 'Bangers', cursive;
    box-shadow: 0 4px 8px rgba(0,0,0,0.7);
    border-bottom: 4px solid #ffd700; /* color dorado para dar brillo */
  }

  .navbar a {
    color: #ffd700; /* dorado */
    text-decoration: none;
    font-size: 20px;
    padding: 8px 15px;
    border: 2px solid transparent;
    border-radius: 6px;
    text-transform: uppercase;
    letter-spacing: 2px;
    transition: all 0.3s ease;
    text-shadow:
      2px 2px 0 #000,
      -1px -1px 0 #000,
      1px -1px 0 #000,
      -1px 1px 0 #000,
      1px 1px 0 #000;
  }

  .navbar a:hover {
    background-color: #ffd700;
    color: #5a0000;
    border-color: #5a0000;
    box-shadow: 0 0 10px #ffd700, 0 0 20px #ffd700;
  }
</style>

<div class="navbar">
  <a href="index.php">Inicio</a>
  <a href="registrar_luchador.php">Registrar Luchador</a>
  <a href="ver_luchadores.php">Ver Luchadores</a>
  <a href="registrar_evento.php">Registrar Evento</a>
  <a href="registrar_combate.php">Registrar Combate</a>
  <a href="informe.php">Informe</a>
</div>
