<?php include("../includes/db.php"); ?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Panel de Administración</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #1b2838;
      color: white;
      padding: 20px;
    }
    h1 { color: #66c0f4; }
    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
      background: #2a475e;
    }
    th, td {
      border: 1px solid #171a21;
      padding: 10px;
      text-align: center;
    }
    th { background: #66c0f4; color: #1b2838; }
    a {
      color: #66c0f4;
      text-decoration: none;
      margin: 0 5px;
    }
    .btn-add {
      display: inline-block;
      background: #66c0f4;
      color: #1b2838;
      padding: 8px 15px;
      border-radius: 5px;
      margin-top: 10px;
      text-decoration: none;
      font-weight: bold;
    }
  </style>
</head>
<body>
  <h1>Panel de Administración</h1>
  <a class="btn-add" href="add.php">➕ Añadir nuevo juego</a>

  <table>
    <tr>
      <th>ID</th>
      <th>Título</th>
      <th>Precio</th>
      <th>Categoría</th>
      <th>Imagen</th>
      <th>Acciones</th>
    </tr>
    <?php
    $res = $conn->query("SELECT * FROM juegos ORDER BY id DESC");
    while ($fila = $res->fetch_assoc()):
    ?>
    <tr>
      <td><?php echo $fila['id']; ?></td>
      <td><?php echo $fila['titulo']; ?></td>
      <td>$<?php echo $fila['precio']; ?></td>
      <td><?php echo $fila['categoria']; ?></td>
      <td>
        <img src="../assets/images/<?php echo $fila['imagen']; ?>" width="80">
      </td>
      <td>
        <a href="edit.php?id=<?php echo $fila['id']; ?>">✏️ Editar</a>
        <a href="delete.php?id=<?php echo $fila['id']; ?>" onclick="return confirm('¿Eliminar este juego?')">🗑️ Eliminar</a>
      </td>
    </tr>
    <?php endwhile; ?>
  </table>
</body>
</html>
