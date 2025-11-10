<?php include("../includes/db.php"); ?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Añadir nuevo juego</title>
  <style>
    body { background: #1b2838; color: white; font-family: Arial; padding: 20px; }
    h1 { color: #66c0f4; }
    form { max-width: 500px; margin: auto; background: #2a475e; padding: 20px; border-radius: 10px; }
    input, textarea {
      width: 100%; padding: 10px; margin: 10px 0; border: none; border-radius: 5px;
    }
    button {
      background: #66c0f4; color: #1b2838; border: none; padding: 10px 20px;
      border-radius: 5px; font-weight: bold; cursor: pointer;
    }
    a { color: #66c0f4; text-decoration: none; }
  </style>
</head>
<body>
  <h1>Añadir nuevo juego</h1>
  <form action="" method="POST" enctype="multipart/form-data">
    <label>Título:</label>
    <input type="text" name="titulo" required>

    <label>Descripción:</label>
    <textarea name="descripcion" required></textarea>

    <label>Precio:</label>
    <input type="number" name="precio" step="0.01" required>

    <label>Fecha de lanzamiento:</label>
    <input type="date" name="fecha_lanzamiento">

    <label>Categoría:</label>
    <input type="text" name="categoria">

    <label>Imagen:</label>
    <input type="file" name="imagen" required>

    <button type="submit" name="guardar">Guardar</button>
  </form>

  <p><a href="index.php">⬅️ Volver al panel</a></p>

  <?php
  if (isset($_POST['guardar'])) {
    $titulo = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $fecha = $_POST['fecha_lanzamiento'];
    $categoria = $_POST['categoria'];

    $imagen = $_FILES['imagen']['name'];
    $ruta = "../assets/images/" . $imagen;

    if (move_uploaded_file($_FILES['imagen']['tmp_name'], $ruta)) {
      $sql = "INSERT INTO juegos (titulo, descripcion, precio, imagen, fecha_lanzamiento, categoria)
              VALUES ('$titulo', '$descripcion', '$precio', '$imagen', '$fecha', '$categoria')";

      if ($conn->query($sql)) {
        echo "<p style='color:lightgreen;'>✅ Juego guardado correctamente.</p>";
      } else {
        echo "<p style='color:red;'>❌ Error al guardar: " . $conn->error . "</p>";
      }
    } else {
      echo "<p style='color:red;'>❌ Error al subir la imagen.</p>";
    }
  }
  ?>
</body>
</html>
