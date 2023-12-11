<?php
include_once('include/dbconn.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['editar'])) {
    $id_usuario_editar = $_GET['id']; // Obtener el ID del usuario a editar desde la URL
    $nombre_editar = $_POST['nombres'];
    $correo_editar = $_POST['correo'];
    $contrasena_editar = $_POST['contrasena'];

    $database = new Connection();
    $db = $database->open();

    try {
        // Verificar si la contraseña ha sido proporcionada
        if (!empty($contrasena_editar)) {
            $hashed_password = password_hash($contrasena_editar, PASSWORD_DEFAULT);

            $stmt = $db->prepare("UPDATE usuarios SET nom = :nombre, correo = :correo, pass = :pass WHERE id = :id");
            $stmt->bindParam(':pass', $hashed_password);
        } else {
            // No se proporcionó una nueva contraseña, actualizar solo nombre y correo
            $stmt = $db->prepare("UPDATE usuarios SET nom = :nombre, correo = :correo WHERE id = :id");
        }

        $stmt->bindParam(':nombre', $nombre_editar);
        $stmt->bindParam(':correo', $correo_editar);
        $stmt->bindParam(':id', $id_usuario_editar);

        if ($stmt->execute()) {
            echo '<script>alert("Usuario editado correctamente");</script>';
        } else {
            echo '<script>alert("Error al editar usuario");</script>';
        }
    } catch (PDOException $e) {
        echo "Error en la conexión: " . $e->getMessage();
    }

    $database->close();
}

header("Location: Datos.php"); // Redirigir de vuelta a la página principal
exit();
?>
