
<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['rol'] != 'admin') {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h2>Registrar Usuario</h2>
    <form action="register_process.php" method="post">
        <label for="username">Usuario:</label>
        <input type="text" id="username" name="username" required><br>
        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" required><br>
        <label for="rol">Rol:</label>
        <select id="rol" name="rol">
            <option value="user">Usuario</option>
            <option value="admin">Administrador</option>
        </select><br>
        <input type="submit" value="Registrar">
    </form>
</body>
</html>

<!--
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h2>Registrar Usuario</h2>
    <form action="register_process.php" method="post">
        <label for="username">Usuario:</label>
        <input type="text" id="username" name="username" required><br>
        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" required><br>
        <label for="rol">Rol:</label>
        <select id="rol" name="rol">
            <option value="user">Usuario</option>
            <option value="admin">Administrador</option>
        </select><br>
        <input type="submit" value="Registrar">
    </form>
</body>
</html>

-->