<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./Public/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <title>Document</title>
</head>

<body data-bs-theme="light">
    <div>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php"><img src="./public./imagenes./U.png" alt=""></a>
            </div>
            <div class=" collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">inicio</a>
                    </li>
                    
                    
                    


                </ul>
            </div>
        </nav>

        <div class="row mx-auto">
            <form action="datos.php" method="POST">
                <!-- Formulario para agregar usuario -->
                <div class="col-md-4">
                    <label for="form-label">Nombre del Usuario</label>
                    <input type="text" id="nombre" name="nombre" class="form-control" required autofocus>
                </div>
                <div class="col-md-4">
                    <label for="form-label">Correo Electrónico</label>
                    <input type="email" id="correo" name="correo" class="form-control" required>
                </div>
                <div class="col-md-4">
                    <label for="form-label">Contraseña</label>
                    <input type="password" id="contrasena" name="contrasena" class="form-control" required>
                </div>
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary" name="agregar_usuario">Agregar Usuario</button>
                </div>
            </form>
        </div>
        
        <div class="row mx-auto">
           <table>
            <thead>
                <th>Id usuario</th>
                <th>Nombre del usuario</th>
                <th>correo</th>
                <th>contraseña</th>
                <th>accion</th>
                
            </thead>
                <tbody>
                <?php
                include_once('include/dbconn.php');
                $database = new Connection();
                $db = $database->open();
                try {

                    $sql = 'SELECT * FROM usuarios';
                    foreach ($db->query($sql) as $row) { ?>
                    <tr>
                    <td>
                            <?php echo $row['id'] ?>
                        </td>
                        <td>
                            <?php echo $row['nom'] ?>
                        </td>
                        <td>
                            <?php echo $row['correo'] ?>
                        </td>
                        <td>
                            <?php echo $row['pass'] ?>
                        </td>
                        <td>
    <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal_<?php echo $row['id']; ?>">
        Editar
    </a>
    <!-- Modal -->
    <div class="modal fade" id="editModal_<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModal_">Editar usuario</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="edit_usuario.php?id=<?php echo $row['id']; ?>">
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label" style="position:relative; top:7px;">Usuario:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="nombres" value="<?php echo $row['nom']; ?>">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label" style="position:relative; top:7px;">Correo:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="correo" value="<?php echo $row['correo']; ?>">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" name="editar" class="btn btn-primary">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
                  <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#borrarModal_<?php echo $row['id']; ?>">
                    Eliminar
                  </a>
                   <!-- Modal -->
                   <div class="modal fade" id="borrarModal_<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Eliminar ususario</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <form method="POST" action="delete_equipo.php?id=<?php echo $row['id']; ?>">

                            <div class="row form-group">
                              <h2 class="text-center"><?php echo $row['nom']; ?></h2>

                            </div>

                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                              <button type="submit" name="eliminar" class="btn btn-primary">Eliminar</button>
                            </div>
                          </form>
                        </div>

                      </div>
                    </div>
                  </div>
                </td>
                    </tr>
                    <?php
                    }
                } catch (PDOException $e) {
                    echo "Error en la conexion" .
                        $e->getMessage();
                }
                $database->close();
                ?>
            </tbody>
            </table>

        </div>
        ///////////////////
        
        <div class="row mx-auto">
            <form action="Datos.php" method="POST">
                <div class="col-md-4">
                    <label for="form-label">Nombre de la Universidad</label>
                    <input type="text" id="nombre_universidad" name="nombre_universidad" class="form-control" required>
                </div>
                <div class="col-md-4">
                    <label for="form-label">Ubicación</label>
                    <input type="text" id="ubicacion_universidad" name="ubicacion_universidad" class="form-control" required>
                </div>
                <div class="col-md-4">
                    <label for="form-label">Precio de Inscripción</label>
                    <input type="number" id="precio_inscripcion" name="precio_inscripcion" class="form-control" required>
                </div>
                <div class="col-md-12">
                    <label for="form-label">Descripción</label>
                    <textarea id="descripcion_universidad" name="descripcion_universidad" class="form-control" rows="3" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary" name="agregar_universidad">Agregar Universidad</button>
        </form>
            </form>
        </div>

        <div class="row mx-auto">
           <table>
            <thead>
                <th>Id universidad</th>
                <th>Nombre universidad</th>
                <th>ubicacion</th>
                <th>precio_inscripcion</th>
                <th>accion</th>
                
            </thead>
                <tbody>
                <?php
                include_once('include/dbconn.php');
                $database = new Connection();
                $db = $database->open();
                try {

                    $sql = 'SELECT * FROM universidad';
                    foreach ($db->query($sql) as $row) { ?>
                    <tr>
                    <td>
                            <?php echo $row['id'] ?>
                        </td>
                        <td>
                            <?php echo $row['nombre'] ?>
                        </td>
                        <td>
                            <?php echo $row['ubicacion'] ?>
                        </td>
                        <td>
                            <?php echo $row['precio_inscripcion'] ?>
                        </td>
                        <td>
                        <td>
                        <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editUniModal_<?php echo $row['id']; ?>">
    Editar
</a>
    <!-- Resto del código... -->


                  <!-- Modal -->
                  <div class="modal fade" id="editUniModal_<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="editModal_">Editar universidad</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        <form method="POST" action="edit_uni.php?id=<?php echo $row['id']; ?>">
    <div class="row form-group">
        <div class="col-sm-2">
            <label class="control-label" style="position:relative; top:7px;">Universidad:</label>
        </div>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="nombre_universidad" value="<?php echo $row['nombre']; ?>">
        </div>
        <div class="col-sm-2">
            <label class="control-label" style="position:relative; top:7px;">Ubicación:</label>
        </div>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="ubicacion_universidad" value="<?php echo $row['ubicacion']; ?>">
        </div>
        <div class="col-sm-2">
            <label class="control-label" style="position:relative; top:7px;">Precio de Inscripción:</label>
        </div>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="precio_inscripcion" value="<?php echo $row['precio_inscripcion']; ?>">
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="submit" name="editar" class="btn btn-primary">Guardar</button>
    </div>
</form>

                        </div>

                      </div>
                    </div>
                  </div>
                  <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#borrarUniModal_<?php echo $row['id']; ?>">
                    Eliminar
                  </a>
                   <!-- Modal -->
                   <div class="modal fade" id="borrarUniModal_<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Eliminar universidad</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <form method="POST" action="eliminar_universidad.php?id=<?php echo $row['id']; ?>">

                            <div class="row form-group">
                              <h2 class="text-center"><?php echo $row['nombre']; ?></h2>

                            </div>

                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                              <button type="submit" name="eliminar" class="btn btn-primary">Eliminar</button>
                            </div>
                          </form>
                        </div>

                      </div>
                    </div>
                  </div>
                </td>
                    </tr>
                    <?php
                    }
                } catch (PDOException $e) {
                    echo "Error en la conexion" .
                        $e->getMessage();
                }
                $database->close();
                ?>
            </tbody>
            </table>

        </div>
        ///////////////////////
        <script src="./public/js/bootstrap.min.js"></script>
        <script src="./Funciones.js"></script>


        
    <?php
    // Lógica para agregar usuarios
    include_once('include/dbconn.php');
    $database = new Connection();
    $db = $database->open();

    if (isset($_POST['agregar_usuario'])) {
        $nombre = $_POST['nombre'];
        $correo = $_POST['correo'];
        $contrasena = $_POST['contrasena'];

        // Agregar la lógica para insertar el usuario en tu base de datos
        $hashed_password = password_hash($contrasena, PASSWORD_DEFAULT);
        $stmt = $db->prepare("INSERT INTO usuarios (nom, correo, pass) VALUES (:nombre, :correo, :pass)");
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':correo', $correo);
        $stmt->bindParam(':pass', $hashed_password);

        if ($stmt->execute()) {
            echo '<script>alert("Usuario agregado correctamente");</script>';
        } else {
            echo '<script>alert("Error al agregar usuario");</script>';
        }
    }


    ?>

<?php
    // Lógica para agregar universidades
    include_once('include/dbconn.php');
    $database = new Connection();
    $db = $database->open();

    if (isset($_POST['agregar_universidad'])) {
        $nombre_universidad = $_POST['nombre_universidad'];
        $ubicacion_universidad = $_POST['ubicacion_universidad'];
        $precio_inscripcion = $_POST['precio_inscripcion'];
        $descripcion_universidad = $_POST['descripcion_universidad'];

        $stmt = $db->prepare("INSERT INTO universidad (nombre, ubicacion, precio_inscripcion, descripcion) VALUES (:nombre_universidad, :ubicacion_universidad, :precio_inscripcion, :descripcion_universidad)");
        $stmt->bindParam(':nombre_universidad', $nombre_universidad);
        $stmt->bindParam(':ubicacion_universidad', $ubicacion_universidad);
        $stmt->bindParam(':precio_inscripcion', $precio_inscripcion);
        $stmt->bindParam(':descripcion_universidad', $descripcion_universidad);

        if ($stmt->execute()) {
            echo '<script>alert("Universidad agregada correctamente");</script>';
        } else {
            echo '<script>alert("Error al agregar universidad");</script>';
        }
    }

    // Resto de tu código PHP para mostrar la tabla de universidades
    ?>


<script src="./public/js/bootstrap.min.js"></script>
    <script src="./Funciones.js"></script>
</body>

</html>