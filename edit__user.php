<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['rol'] != 'admin') {
    header("Location: login.php");
    exit();
}

include 'config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT username, rol FROM usuarios WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->bind_result($username, $rol);
    $stmt->fetch();
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuario</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h2>Editar Usuario</h2>
    <form action="edit_user_process.php" method="post">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <label for="username">Usuario:</label>
        <input type="text" id="username" name="username" value="<?php echo $username; ?>" required><br>
        <label for="rol">Rol:</label>
        <select id="rol" name="rol">
            <option value="user" <?php if ($rol == 'user') echo 'selected'; ?>>Usuario</option>
            <option value="admin" <?php if ($rol == 'admin') echo 'selected'; ?>>Administrador</option>
        </select><br>
        <input type="submit" value="Actualizar">
    </form>
</body>
</html>