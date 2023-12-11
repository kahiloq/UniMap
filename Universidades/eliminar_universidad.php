<?php
// eliminar_universidad.php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Verificar si se proporcionó un ID válido
    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $universidad_id = $_GET['id'];

        // Incluir la conexión a la base de datos
        include_once('include/dbconn.php');
        $database = new Connection();
        $db = $database->open();

        try {
            // Preparar y ejecutar la consulta de eliminación
            $stmt = $db->prepare("DELETE FROM universidad WHERE id = :universidad_id");
            $stmt->bindParam(':universidad_id', $universidad_id);

            if ($stmt->execute()) {
                echo '<script>alert("Universidad eliminada correctamente");</script>';
            } else {
                echo '<script>alert("Error al eliminar universidad");</script>';
            }
        } catch (PDOException $e) {
            echo "Error en la conexión: " . $e->getMessage();
        }

        // Cerrar la conexión a la base de datos
        $database->close();
    } else {
        echo '<script>alert("ID de universidad no válido");</script>';
    }
} else {
    echo '<script>alert("Acceso no permitido");</script>';
}

// Redirigir a la página principal después de la eliminación
header('Location: Datos.php');
?>
