<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Tours</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="header">
        <img src="header.png" alt="Imagen de Bienvenida" class="header-image">
        <h1>Bienvenido a Nuestro Portal de Tours</h1>
        <p>Explora nuestros tours y encuentra el viaje perfecto para ti.</p>
    </div>
    <div class="gallery-container">
        <h2>Nuestros Tours</h2>
        <div class="gallery">
            <?php
            include 'config.php';

            $sql = "SELECT id, nombre, descripcion, imagen FROM tours";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<div class='gallery-item'>
                            <img src='" . $row["imagen"] . "' alt='" . $row["nombre"] . "' class='gallery-image'>
                            <div class='overlay'>
                                <div class='text'>" . $row["descripcion"] . "</div>
                            </div>
                          </div>";
                }
            } else {
                echo "<p>No hay tours disponibles.</p>";
            }
            $conn->close();
            ?>
        </div>
    </div>
</body>
</html>