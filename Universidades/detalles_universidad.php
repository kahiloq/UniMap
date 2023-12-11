<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./public/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="./public/Style.css">
    <title>Universidades</title>
</head>

<body>
    <div class="menu">
                
    <nav id="navbar">
            <div class="container">
                <img id="logoImage" src="./public/imagenes/U.png" alt="" width="200px" height="100px" >

                <ul>
                    <li><a class="T1" href="./Registro.php">Iniciar sesión</a></li>
                    <li><a class="T1" href="Univer.php"> Universidades</a></li>
                    <li><a class="T1" href="#mainfooter">Final</a></li>
                    <li><a href="./Productos.php">Productos</a></li>

                </ul>
            </div>
        </nav>
    </div>

    <main>
        <?php
        // detalles_universidad.php

        if (isset($_GET['id'])) {
            $id_universidad = $_GET['id'];

            // Realizar la consulta a la base de datos para obtener los detalles de la universidad
            require('include/dbconn.php');
            $database = new Connection();
            $db = $database->open();

            $sql = $db->prepare("SELECT id, nombre, ubicacion, precio_inscripcion, descripcion FROM universidad WHERE id = :id");
            $sql->bindParam(':id', $id_universidad);
            $sql->execute();
            $resultado = $sql->fetch(PDO::FETCH_ASSOC);

            if ($resultado) {
                // Mostrar la información en la página
                ?>
                <div class="container py-5">
                    <h2>Detalles de la Universidad con ID: <?php echo $resultado['id']; ?></h2>
                    <h1>Nombre: <?php echo $resultado['nombre']; ?></h1>
                    <p>Ubicación: <?php echo $resultado['ubicacion']; ?></p>
                    <p>Precio de Inscripción: $ <?php echo $resultado['precio_inscripcion']; ?></p>
                    <p>Descripción: <?php echo $resultado['descripcion']; ?></p>
                    <!-- Puedes mostrar la imagen de alguna manera, por ejemplo: -->
                    <img src="./public/img/<?php echo $resultado['id']; ?>/Principal.jpg" alt="Imagen de la universidad">
                </div>
                <?php
            } else {
                echo "No se encontró ninguna universidad con el ID proporcionado.";
            }

            $database->close();
        } else {
            // Manejo si no se proporciona un ID válido
            echo "ID de universidad no válido";
        }
        ?>

        <!-- Mostrar comentarios -->
        <div class="container py-5">
                    <h3>Comentarios:</h3>
                    <?php
                    $sql_comentarios = $db->prepare("SELECT * FROM comentarios WHERE id_universidad = :id_universidad");
                    $sql_comentarios->bindParam(':id_universidad', $id_universidad);
                    $sql_comentarios->execute();
                    $comentarios = $sql_comentarios->fetchAll(PDO::FETCH_ASSOC);

                    if ($comentarios) {
                        foreach ($comentarios as $comentario) {
                            echo "<p><strong>Calificación:</strong>  {$comentario['calificacion']} <br> Comentario: {$comentario['comentario']}</p>";
                        }
                    } else {
                        echo "No hay comentarios para esta universidad.";
                    }
                    ?>
                </div>
              


        
<div class="container py-5">
    
    <a href="agregar_comentario.php?id=<?php echo $id_universidad; ?>" class="btn btn-primary">Agregar Comentario</a>
</div>

<div class="container py-5"><a href="Univer.php" class="btn btn-primary">Volver</a></div>

    </main>
</body>

</html>
