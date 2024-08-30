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
    <title>Subir Imagen de Tour</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h2>Subir Imagen de Tour</h2>
    <form action="upload_process.php" method="post" enctype="multipart/form-data">
        <label for="nombre">Nombre del Tour:</label>
        <input type="text" id="nombre" name="nombre" required><br>
        <label for="descripcion">Descripción:</label>
        <textarea id="descripcion" name="descripcion" required></textarea><br>
        <label for="precio">Precio:</label>
        <input type="number" id="precio" name="precio" required><br>
        <label for="imagen">Imagen:</label>
        <input type="file" id="imagen" name="imagen" accept="image/*" required><br>
        <input type="submit" value="Subir Tour">
    </form>

    <div class="table-container">
        <table border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Precio</th>
                    <th>Acccion</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include 'config.php';

                $sql = "SELECT id, nombre, descripcion, precio FROM tours";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>" . $row["id"]. "</td>
                                <td>" . $row["nombre"]. "</td>
                                <td>" . $row["descripcion"]. "</td>
                                <td>$" . $row["precio"]. "</td>
                              
                              <td>
                                  <form action='delete_tour.php' method='post' style='display:inline;'>
                                        <input type='hidden' name='id' value='" . $row["id"] . "'>
                                        <input type='submit' value='Eliminar' class='delete-button'>
                                    </form>
                                    <form action='edit_tour.php' method='get' style='display:inline;'>
                                        <input type='hidden' name='id' value='" . $row["id"] . "'>
                                        <input type='submit' value='Modificar' class='edit-button'>
                                    </form>

                              </td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>0 resultados</td></tr>";
                }
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>