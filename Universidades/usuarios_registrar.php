<?php
session_start();
include('./include/dbconn.php');
if(isset($_SESSION['usuarioingresando']))
{
	header('location: principal.php');
}
?>
<html>
<head>
<title>VickeryShop</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="./public/style3.css">
</head>
<body>
<div class="FormCajaLogin">

<div class="FormLogin">
<form method="post">
<h1>Crear nueva cuenta</h1>
<br>

<div class="TextoCajas">• Ingresar nombre</div>
<input type="text" name="txtnombre" class="CajaTexto" required>

<div class="TextoCajas">• Ingresar correo</div>
<input type="email" name="txtcorreo" class="CajaTexto" required>

<div class="TextoCajas">• Ingresar contraseña</div>
<input type="password" id="txtpassword" name="txtpassword" class="CajaTexto" required>
 
<div class="CheckBox1">
<input type="checkbox" onclick="verpassword()" >Mostrar contraseña
</div>
 
<div>
<input type="submit" value="Crea nueva cuenta" class="BtnRegistrar" name="btnregistrar">
</div>
<hr>
<br>
<div >
<a href="index.php" class="BtnLogin">Regresar</a>
<a href="Registro.php" class="BtnLogin">inisiar sesion</a>
</div>

</div>
</form>
</div>
 
</body>
<script>
  function verpassword(){
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

if(isset($_POST["btnregistrar"]))
{

$nombre = $_POST["txtnombre"];
$correo = $_POST["txtcorreo"];
$pass 	= $_POST["txtpassword"];


$insertarusu = mysqli_query($conn,"INSERT INTO usuarios(nom,pass,correo) values ('$nom','$pass','$correo')");
	
if(!$insertarusu)
{
  echo "<script> alert('Usuario registrado con exito: $nombre'); window.location='index.php' </script>";
 
}
else
{
  echo "<script>alert('Correo ya existente,intente de nuevo por favor');</script>";		
}
} 
?>