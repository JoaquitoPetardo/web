<?php
include("../includes/db.php");

if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $conn->query("DELETE FROM juegos WHERE id = $id");
}

header("Location: index.php");
exit;
?>
