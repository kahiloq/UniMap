<?php
// Verifica si se ha enviado el formulario de edición
if (isset($_POST['editar'])) {
    // Obtiene el ID de la universidad desde la URL
    $id_universidad = $_GET['id'];

    // Obtiene los datos del formulario
    $nombre_universidad = $_POST['nombre_universidad'];
    $ubicacion_universidad = $_POST['ubicacion_universidad'];
    $precio_inscripcion = $_POST['precio_inscripcion'];

    // Realiza la conexión a la base de datos
    include_once('include/dbconn.php');
    $database = new Connection();
    $db = $database->open();

    try {
        // Prepara la consulta SQL para actualizar los datos de la universidad
        $sql = "UPDATE universidad SET nombre = :nombre, ubicacion = :ubicacion, precio_inscripcion = :precio WHERE id = :id";
        $stmt = $db->prepare($sql);

        // Vincula los parámetros
        $stmt->bindParam(':nombre', $nombre_universidad);
        $stmt->bindParam(':ubicacion', $ubicacion_universidad);
        $stmt->bindParam(':precio', $precio_inscripcion);
        $stmt->bindParam(':id', $id_universidad);

        // Ejecuta la consulta
        if ($stmt->execute()) {
            echo '<script>alert("Universidad actualizada correctamente");</script>';
        } else {
            echo '<script>alert("Error al actualizar universidad");</script>';
        }
    } catch (PDOException $e) {
        echo "Error en la conexión: " . $e->getMessage();
    }

    // Cierra la conexión a la base de datos
    $database->close();
}

// Redirecciona de nuevo a la página principal después de la edición
header("Location: Datos.php");
exit();
?>
