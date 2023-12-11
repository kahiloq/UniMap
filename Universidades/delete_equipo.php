<?php
include_once('include/dbconn.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['eliminar'])) {
    $id_usuario_eliminar = $_GET['id']; // Obtener el ID del usuario a eliminar desde la URL

    $database = new Connection();
    $db = $database->open();

    try {
        $stmt = $db->prepare("DELETE FROM usuarios WHERE id = :id");
        $stmt->bindParam(':id', $id_usuario_eliminar);

        if ($stmt->execute()) {
            echo '<script>alert("Usuario eliminado correctamente");</script>';
        } else {
            echo '<script>alert("Error al eliminar usuario");</script>';
        }
    } catch (PDOException $e) {
        echo "Error en la conexión: " . $e->getMessage();
    }

    $database->close();
}

header("Location: Datos.php"); // Redirigir de vuelta a la página principal
exit();
?>
