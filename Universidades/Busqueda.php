<?php
require('include/dbconn.php');
$database = new Connection();
$db = $database->open();

// Lógica de filtrado
$ubicacion = isset($_POST['ubicacion']) ? $_POST['ubicacion'] : '';
$precio = isset($_POST['precio']) ? $_POST['precio'] : '';

// Consulta SQL con filtros
$sql = "SELECT id, nombre, ubicacion, precio_inscripcion, descripcion FROM universidad";

if (!empty($ubicacion) && empty($precio)) {
    $sql .= " WHERE ubicacion LIKE :ubicacion";
} elseif (empty($ubicacion) && !empty($precio)) {
    $sql .= " ORDER BY precio_inscripcion " . ($precio == 'asc' ? 'ASC' : 'DESC');
} elseif (!empty($ubicacion) && !empty($precio)) {
    $sql .= " WHERE ubicacion LIKE :ubicacion ORDER BY precio_inscripcion " . ($precio == 'asc' ? 'ASC' : 'DESC');
}

// Ejecutar la consulta
$sql = $db->prepare($sql);

if (!empty($ubicacion)) {
    $sql->bindParam(':ubicacion', '%' . $ubicacion . '%');
}

$sql->execute();
$resultado = $sql->fetchAll(PDO::FETCH_ASSOC);

$database->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Encabezado ... -->
</head>

<body>
    <div class="menu">
        <!-- Menú ... -->
    </div>

    <main>
        <header>
            <!-- Formulario de filtro -->
            <div class="container py-3">
                <form method="post" action="Univer.php">
                    <div class="form-row">
                        <div class="col">
                            <input type="text" class="form-control" placeholder="Ubicación" name="ubicacion">
                        </div>
                        <div class="col">
                            <select class="form-control" name="precio">
                                <option value="">Ordenar por Precio</option>
                                <option value="asc">Ascendente</option>
                                <option value="desc">Descendente</option>
                            </select>
                        </div>
                        <div class="col">
                            <button type="submit" class="btn btn-primary">Filtrar</button>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Tabla de universidades -->
            <div class="container py-5">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-1 g-3">
                    <?php foreach ($resultado as $row) { ?>
                        <div class="col">
                            <div class="card shadow-sm">
                                <!-- Contenido de la tarjeta ... -->
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>

            <!-- Pie de página ... -->
        </header>
    </main>

    <!-- Scripts de Bootstrap ... -->
</body>

</html>
