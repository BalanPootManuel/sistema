<?php
session_start();
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES['imagen'])) {
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $usuario_id = $_SESSION['user_id'];

    $imagen = $_FILES['imagen']['name'];
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($imagen);

    if (move_uploaded_file($_FILES['imagen']['tmp_name'], $target_file)) {
        $sql = "INSERT INTO tours (nombre, descripcion, precio, imagen, usuario_id) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssdsi", $nombre, $descripcion, $precio, $target_file, $usuario_id);

        if ($stmt->execute()) {
            echo "Tour subido exitosamente.";
        } else {
            echo "Error al subir el tour: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Error al subir la imagen.";
    }

    $conn->close();
    header("Location: index.php");
    exit();
}
?>