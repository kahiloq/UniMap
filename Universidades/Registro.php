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
?>




<html lang="es">
<head>
<title>UniMap</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="./public/style3.css">
<script src="script.js" defer></script>
</head>
<body>

<div class="FormCajaLogin">

    <div class="FormLogin">
    <form method="POST" action="Univer.php">
    <img src="./public/imagenes/U.png" alt="" width="100" height="100">
    <h1 id="login-heading">Iniciar sesión</h1>
    <br>

    <div class="TextoCajas">• Ingresar correo</div>
    <input type="text" name="txtcorreo" class="CajaTexto" required>

    <div class="TextoCajas">• Ingresar contraseña</div>
    <input type="password" id="txtpassword" name="txtpassword" class="CajaTexto" required>

    <div class="CheckBox1">
    <input type="checkbox" onclick="verpassword()" >Mostrar contrseña
    </div>

    <div>
    <input type="submit" value="Iniciar sesión" class="BtnLogin" name="btningresar" >
</div>
<hr>
<br>

<div>
<a href="usuarios_registrar.php" class="BtnRegistrar">Crea nueva cuenta</a>
</div>

</div>
</form>
</div>
 
</body>
<script>

function verpassword()
  {
  var tipo = document.getElementById("txtpassword");
    if(tipo.type == "password")
	  {
        tipo.type = "text";
      }
	  else
	  {
        tipo.type = "password";
      }
  }
</script>
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