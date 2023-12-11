
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['id_universidad'], $_POST['calificacion'], $_POST['comentario'])) {
        $id_universidad = $_POST['id_universidad'];
        $calificacion = $_POST['calificacion'];
        $comentario = $_POST['comentario'];

        // Realizar la conexión a la base de datos y realizar la inserción del comentario
        require('include/dbconn.php');
        $database = new Connection();
        $db = $database->open();

        $sql = $db->prepare("INSERT INTO comentarios (id_universidad, calificacion, comentario) VALUES (:id_universidad, :calificacion, :comentario)");
        $sql->bindParam(':id_universidad', $id_universidad);
        $sql->bindParam(':calificacion', $calificacion);
        $sql->bindParam(':comentario', $comentario);


        if ($sql->execute()) {
            echo "Comentario agregado correctamente.";
            echo '<br><a href="detalles_universidad.php?id=' . $id_universidad . '">Volver a Detalles de la Universidad</a>';
        } else {
            echo "Error al agregar el comentario.";
        }

        $database->close();
    } else {
        echo "Datos incompletos para agregar comentario.";
    }
} else {
    echo "Método de solicitud no válido.";
}
?>
