<?php
/*autor cristina
 *fecha 12/12/2017
 *programa que muestra lo que contien cookie y session y da la bienvenida
 *fecha ultmia modificación: 13/12/2017
 */
//inicio de sesión
session_start();
if (!isset ($_SESSION['username'])){
 die("es necasario identificarse!!<a href='login.php'></a>.<br />");                
}
//si se pulsa detalle se dirige a detalle.php
if(isset($_POST['detalle'])){
 header("Location:detalle.php");
}
// si se pulsa desconectar se cierra sesión y se vuelve al login
if(isset($_POST['salir'])){
 unset($_SESSION['usuario']);
 header("Location:login.php");
}
?>
<html>
<head>
   <link rel="icon" type="image/png" href="../corazon.png">
   <link rel="stylesheet" type="text/css" href="../css/estilo.css">
</head>
<body>
<div class="contenedor">
<?php
 //bienvenida

echo $_SESSION['username']." hola!!"."<br/>";
//que contiene cookie
echo'<h2>$_COOKIE contenido:</h2>';
if(isset($_COOKIE)){
 foreach($_COOKIE as $clave =>$valor){
 echo"{$clave}=>{$valor}".'<br/>';
 }
}
// que contiene $_SESSION
echo'<h2>$_SESSION contenido:</h2>';
if(isset($_SESSION)){
foreach($_SESSION as $clave => $valor){
 echo" {$clave} => {$valor} <br />";
}
}else{
    echo"no existe sesión";
}


?>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
      <input type="submit" name="detalle" value="detalle" />
       <input type="submit" name="salir" value="salir usuario <?php echo $_SESSION['username']; ?>" />
</form>

</div>
</body>
</html>