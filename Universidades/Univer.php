<?php
require('include/dbconn.php');
$database = new Connection();
$db = $database->open();
$sql = $db->prepare("SELECT id,nombre, ubicacion, precio_inscripcion, descripcion FROM universidad  ");
$sql->execute();
$resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
?>




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
<div class="menu" >
        
        <nav id="navbar">
            <div class="container">
                <img id="logoImage" src="./public/imagenes/U.png" alt="" width="200px" height="100px" >

                <ul>
                    
                    <li><a class="T1" href="index.php"> Inicio</a></li>
                   
                    

                </ul>
            </div>
        </nav>
</div> 
    

    <main>
        <header>

        
  
            <div class="container py-5 ">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-1 g-3">
                    <?php foreach ($resultado as $row) { ?>
                        <div class="col">
                            <div class="card shadow-sm">
                                <?php 
                                $id = $row ['id'];
                                $imagen = "./public/img/".$id ."/Principal.jpg" ;
                                
                                if(!file_exists($imagen)){
                                    $imagen = "./public/img/PerroIcon.png";
                                }
                                ?>
                                <img src="<?php echo $imagen; ?>" alt="" width="200px" height="100px">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $row['nombre'];?></h5>
                                    <p class="card-title">ubicacion: <?php echo $row['ubicacion'];?></p>
                                    <p class="card-title">Precio de inscrpcion: $ <?php echo $row['precio_inscripcion'];?></p>
                                    <p class="card-title">Descripcion: <?php echo $row['descripcion'];?></p>
                                    <div class="d-flex justify-content-between align-items-center">

                                        <div class="btn-group">
                                        <a href="detalles_universidad.php?id=<?php echo $row['id']; ?>" class="btn btn-outline-primary">Detalles</a>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>


            <tr>
                <td colspan="2">
                    <footer class="text-center">
                        <img src="./public/imagenes/U.png" width="140px" alt="">

                        <p>
                           
                        </p>

                    </footer>
                </td>
            </tr>

        </header>

    </main>
    <script src="./public/js/bootstrap.min.js"></script>

</body>

</html>