<?php


session_start();
include('./include/dbconn.php');

if (isset($_SESSION['usuarioingresando'])) {
    header('location: principal.php');
}

if (isset($_POST['btningresar'])) {
    $correo = $_POST["txtcorreo"];
    $pass = $_POST["txtpassword"];

    $result = mysqli_query($conn, "SELECT * FROM usuarios WHERE correo = '".$correo."'");

    if ($result) {
        $row = mysqli_fetch_assoc($result);

        if ($row && password_verify($pass, $row['pass'])) {
            $_SESSION['usuarioingresando'] = $correo;

            // Establecer el encabezado Cache-Control para permitir el almacenamiento en caché durante 1 hora
            header('Cache-Control: max-age=3600');

            header("Location: principal.php");
            exit();  // Agrega esta línea para asegurar que la ejecución termine después de la redirección
        } else {
            echo "<script> alert('Credenciales incorrectas'); </script>";
        }
    } else {
        echo "Error en la consulta: " . mysqli_error($conn);
    }
}

$nombre_usuario = isset($_SESSION['nombre_usuario']) ? $_SESSION['nombre_usuario'] : null;
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    
    <link rel="stylesheet" href="./public/style.css">
    <title>UniMap</title>
</head>
<body>

<div class="menu" >

        <nav id="navbar">
            <div class="container">
                <img id="logoImage" src="./public/imagenes/U.png" alt="" width="200px" height="100px" >

                <ul>
                    <li><a class="T1" href="./Registro.php">Iniciar sesión</a></li>
                    <li><a class="T1" href="Univer.php"> Universidades</a></li>
                    <li><a class="T1"  href="Datos.php">datos</a></li>
                    

                </ul>
            </div>
        </nav>
</div>
<div class="ultimo-usuario">
    <?php if ($nombre_usuario): ?>
        Último usuario: <?php echo $nombre_usuario; ?>
    <?php endif; ?>
</div>
<section>
    <img src="./public/imagenes/Clmex.jpg" alt="">
    <img src="./public/imagenes/Itam.jpg" alt="">
    <img src="./public/imagenes/tecm.jpg" alt="">
    <img src="./public/imagenes/uNAM.jpg" alt="">
    <img src="./public/imagenes/Up.jpg" alt="">
</section>
            <br>
            <br>
            <br>
            <br>
    <div class="grid-layout">
        <div class="ads1">
            <img src="./public/imagenes/igue.png" alt="">
            <img src="./public/imagenes/igue.png" alt="">
            <img src="./public/imagenes/igue.png" alt="">
            <img src="./public/imagenes/igue.png" alt="">
        </div>
        <div class="cuerpo1p1">
            <img src="./public/imagenes/U.png" alt="">
        </div>
        <div class="cuerpo2p2"><h1>Unimap</h1></div>
        <div class="cuerpo3">
            <p>
            En la actualidad, muchas personas que buscan ingresar a la universidad se enfrentan a la problemática de la
            limitada disponibilidad de información detallada sobre las instituciones educativas. La falta de plataformas
            especializadas que ofrezcan filtros personalizados según las necesidades individuales de los usuarios agrega
            una capa adicional de complejidad a este proceso crucial de toma de decisiones.
            <br>
            <br>
            Los aspirantes universitarios a menudo se ven abrumados por la cantidad de opciones disponibles y se 
            encuentran con la dificultad de obtener información específica y relevante para sus intereses y objetivos 
            educativos. La mayoría de las páginas web existentes proporcionan datos generales, pero la falta de herramientas de filtrado personalizado dificulta que los usuarios encuentren instituciones que se ajusten a sus necesidades específicas.
            <br>
            <br>
            Esta falta de orientación personalizada puede llevar a decisiones subóptimas en la elección de la universidad,
             afectando negativamente la experiencia académica y profesional de los estudiantes. 
             <br>
            <br>
            UniMap es una página web creada por universitarios con el objetivo de brindar orientación a aquellos
            que desean ingresar a la universidad y desean tomar decisiones informadas que se ajusten a sus necesidades.
            Nuestra plataforma proporciona información detallada sobre diversas instituciones educativas,
            programas académicos y aspectos relevantes para la elección de una carrera universitaria.
            <br>
            <br>
            En UniMap, encontrarás evaluaciones y comentarios honestos de estudiantes actuales y graduados,
            lo que te permitirá obtener una visión realista de la vida universitaria. Además, ofrecemos herramientas
            interactivas para ayudarte a explorar carreras, comparar programas y analizar las características únicas
            de cada universidad.
            <br>
            <br>
            Nuestro equipo está comprometido con proporcionar datos actualizados y precisos para que puedas tomar 
            decisiones informadas sobre tu educación superior. Ya sea que estés buscando información sobre programas
             académicos, instalaciones, vida estudiantil o perspectivas profesionales, UniMap está aquí para guiarte
              en el emocionante viaje de elegir la universidad adecuada para ti. ¡Bienvenido a UniMap, tu guía confiable
               para tomar decisiones educativas informadas!
            </p>
            </div>
        <div class="cuerpo3">
            <p>Estamos emocionados de que estés aquí. Para aprovechar al máximo tu experiencia y acceder a características 
            exclusivas, te invitamos a registrarte en UniMap. El registro es rápido y sencillo, y te proporcionará acceso
             a información personalizada sobre universidades, programas académicos y valiosas opiniones de otros
              estudiantes.
</p>
            
<button type="button" class="btn btn-primary rounded-circle" style="background-color: rgb(178, 218, 249);">
      <a href="usuarios_registrar.php">REGISTRAME</a>
    </button>   
</div>
        
        
         <div class="ads2"><img src="./public/imagenes/igue.png" alt="">
            <img src="./public/imagenes/igue.png" alt="">
            <img src="./public/imagenes/igue.png" alt="">
            <img src="./public/imagenes/igue.png" alt=""></div>
    </div>
    


    <footer class="text-white text-center py-3" style="background-color: rgb(178, 218, 249);">
    <img src="./public/imagenes/U.png" width="140px" alt="">

  </footer>
</body>
</html>
<?php
if(isset($_POST['btningresar']))
{
$correo = $_POST["txtcorreo"];
$pass 	= $_POST["txtpassword"];


$buscandousu = mysqli_query($conn,"SELECT * FROM usuarios WHERE correo = '".$correo."' and pass = '".$pass."'");
$nr = mysqli_num_rows($buscandousu);

$pass = $_POST['passsword'];


if($nr == 1)
{
$_SESSION['usuarioingresando']=$correo;
header("Location: principal.php");
}
else if ($nr == 0) 
{
echo "<script> alert('Usuario no existe');window.location= 'index.php' </script>";
}
}
?>