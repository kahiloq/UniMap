<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap-icons.css">
    <link rel="stylesheet" href="./public/Style.css">
    <title>Universidades</title>
</head>

<body>
    <div class="menu">
        <nav id="navbar">
            <div class="container">
                <img id="logoImage" src="./public/imagenes/U.png" alt="" width="200px" height="100px">
                <ul>
                    <li><a class="T1" href="./Registro.php">Iniciar sesión</a></li>
                    <li><a class="T1" href="Univer.php">Universidades</a></li>
                    <li><a class="T1" href="#mainfooter">Final</a></li>
                    <li><a href="./Productos.php">Productos</a></li>
                </ul>
            </div>
        </nav>
    </div>

    <main>
        <?php
        // agregar_comentario.php

        if (isset($_GET['id'])) {
            $id_universidad = $_GET['id'];
        ?>
            <div class="container py-5">
                <h2>Agregar Comentario para la Universidad con ID: <?php echo $id_universidad; ?></h2>
                <!-- Formulario para agregar comentarios -->
                <form action="procesar_comentario.php" method="post">
                    <input type="hidden" name="id_universidad" value="<?php echo $id_universidad; ?>">

                    <div class="mb-3">
                        <label for="calificacion" class="form-label">Calificación:</label>
                        <!-- Componente de calificación de Bootstrap -->
                        <div class="rating">
                            <input type="radio" name="calificacion" value="1" id="star1"><label for="star1"></label>
                            <input type="radio" name="calificacion" value="2" id="star2"><label for="star2"></label>
                            <input type="radio" name="calificacion" value="3" id="star3"><label for="star3"></label>
                            <input type="radio" name="calificacion" value="4" id="star4"><label for="star4"></label>
                            <input type="radio" name="calificacion" value="5" id="star5"><label for="star5"></label>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="comentario" class="form-label">Comentario:</label>
                        <textarea name="comentario" class="form-control" rows="4" required></textarea>
                    </div>

                    <input type="submit" value="Agregar Comentario" class="btn btn-primary">
                </form>
            </div>
        <?php
        } else {
            echo "ID de universidad no válido";
        }
        ?>
    </main>

    <!-- Scripts de Bootstrap (asegúrate de incluirlos al final del cuerpo) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
