<!doctype html>

<html lang="en">
<head>
    <title>ejercicio 22</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link rel="stylesheet" type="text/css" href="ejercicio20/formulario.css">
</head>
<body> 
<?php
//inicializo variables vacias;
$errorNombre="";
$errorapellido1="";
$errorapellido2="";
$errormovil="";
$errorgenero="";
$errordireccion="";
$errorpais="";
$nombre= "";
$apellido1="";
$apellido2= "";
$movil="";
$genero= "";
$direccion="";
$pais="";

 $error=false;
 
 //comprobación de que el boton aceptar a sido pulsado
  if(isset($_POST['aceptar'])){
    if(empty($_POST['nombre']))
    {
    $errorNombre="introducir un nombre!!";
    $error = true;
    }
    else{
        $nombre = $_POST['nombre'];
        
    }
    if(empty($_POST['apellido1']))
    {
    $errorapellido1="introducir un apellido!!";
    $error = true;
    }
    else{
        $apellido1 = $_POST['apellido1'];
        
    }
    if(empty($_POST['apellido2']))
    {
    $errorapellido2="introducir otro apellido!!";
    $error = true;
    }
    else{
        $apellido2 = $_POST['apellido2'];
        
    }
    if(empty($_POST['movil']))
    {
    $errormovil="introducir un movil!!";
    $error = true;
    }
    else{
        $movil = $_POST['movil'];
        
    }
    if(empty($_POST['genero']))
    {
    $errorgenero="introducir un genero!!";
    $error = true;
    }
    else{
        $genero = $_POST['genero'];
        
    }
    if(empty($_POST['direccion']))
    {
    $errordireccion="introducir una direccion!!";
    $error = true;
    }
    else{
        $direccion = $_POST['direccion'];
        
    }
    if(empty($_POST['pais']))
    {
    $errorpais="introducir un pais!!";
    $error = true;
    }
    else{
        $pais = $_POST['pais'];
        
    }
   }
  if(!isset($_POST['aceptar']) || $error){ 
?>

   <h2>22.Construir un formulario para recoger un cuestionario realizado a una persona y mostrar en la misma página las 
    preguntas y las respuestas recogidas; en el caso de que alguna respuesta esté vacía o errónea volverá a salir el
    formulario con el mensaje correspondiente</h2>
    <div class="contenedor">
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>"> 
        <label for="nombre">Nombre: </label>
            <input type="text" name="nombre" id="nombre">
            <?php
            echo $errorNombre;
            ?> 
        <br/> <br/>
        
        <label for="apellido1">Primer Apellido: </label>
            <input type="text" name="apellido1" id="apellido1">
            <?php
            echo $errorapellido1;
            ?>
        <br/> <br/>
        
        <label for="apellido2">Segundo Apellido: </label>
            <input type="text" name="apellido2" id="apellido2">
            <?php
            echo $errorapellido2;
            ?>
        <br/> <br/>
        
         <label for="movil">Movil: </label>
            <input type="text" name="movil" id="movil">
            <?php
            echo $errormovil;
            ?>
        <br/> <br/>
        
        <label for="genero">Genero: </label>
            <p>hombre<input type="radio" name="genero" checked="checked" value="hombre" /> </p>
            <p>mujer<input type="radio" name="genero" value="mujer" /></p>
            <?php
            echo $errorgenero;
            ?>
        <label for="direccion">Dirección: </label>
            <input type="text" name="direccion" id="direccion">
            <?php
            echo $errordireccion;
            ?>
        <br/> <br/>
            
        <label for="pais">Pais </label>
            <select name="pais">
                <option value="españa">España</option>
                <option value="francia">Francia</option>
            </select>
            <?php
            echo $errorpais;
            ?>
            <br/> <br/>
            <input type="submit" value="aceptar" name="aceptar">

    </form>
     
<?php               
        }
        else{
            echo "$nombre <br/>";
            echo "$apellido1 <br/>";
            echo "$apellido2 <br/>";
            echo "$movil <br/>";
            echo "$genero <br/>";
            echo "$direccion <br/>";
            echo "$pais<br/>";
        }
        
?>

</body>
</html>