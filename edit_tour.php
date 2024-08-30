<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['rol'] != 'admin') {
    header("Location: login.php");
    exit();
}

include 'config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT nombre, descripcion, precio, imagen FROM tours WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->bind_result($nombre, $descripcion, $precio, $imagen);
    $stmt->fetch();
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Tour</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h2>Editar Tour</h2>
    <form action="edit_tour_process.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <label for="nombre">Nombre del Tour:</label>
        <input type="text" id="nombre" name="nombre" value="<?php echo $nombre; ?>" required><br>
        <label for="descripcion">Descripción:</label>
        <textarea id="descripcion" name="descripcion" required><?php echo $descripcion; ?></textarea><br>
        <label for="precio">Precio:</label>
        <input type="number" id="precio" name="precio" value="<?php echo $precio; ?>" required><br>
        <label for="imagen">Imagen Actual:</label>
        <img src="<?php echo $imagen; ?>" alt="Imagen del Tour" class="current-image"><br>
        <label for="imagen">Nueva Imagen (opcional):</label>
        <input type="file" id="imagen" name="imagen" accept="image/*"><br>
        <input type="submit" value="Actualizar Tour">
    </form>
</body>
</html>