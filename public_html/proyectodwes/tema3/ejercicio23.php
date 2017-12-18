<!doctype html>

<html lang="es">
<head>
   
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="ejercicio20/formulario.css">
    <title>ejercicio 23</title>
</head>
<body> 
<?php
// Autora:Cristina Falagán cuesta, ultima modificacion:24/10/2017
//inicializo variables vacias;
include "ejercicio19.php";
$valida = 0;
$errores = array(
    'nombre' => '',
    'apellido1'=>'',
    'apellido2'=>'',
    'movil'=>'',
    'genero'=>'',
    'direccion'=>'',
    'pais'=>'',
    'informacionAdicional'=>''
    );

$respuesta = array(
    'nombre' => '',
    'apellido1'=>'',
    'apellido2'=>'',
    'movil'=>'',
    'genero'=>'',
    'direccion'=>'',
    'pais'=>'',
    'informacionAdicional'=>''
    );

 $error=false;// variable si es false no ha habido error y si es true hay error.
 $arrayErrores = ['','El campo esta vacio','El valor introducido no es valido','la longitud es inferior a la requerida','la longitud es mayor a la debida'];
 //comprobación de que el boton aceptar a sido pulsado
  if(isset($_POST['aceptar']))
    {
        $valida = validarCadenaAlfabetica($_POST['nombre'],3,50);
        if($valida!=0)
        {
        $errores['nombre']=$arrayErrores[$valida];
        $error = true;
        }
        else{
             $respuesta['nombre'] = $_POST['nombre'];
            
        }
        $valida = validarCadenaAlfabetica($_POST['apellido1'],3,50);
        if($valida!=0)
        {
        $errores['apellido1']=$arrayErrores[$valida];
        $error = true;
        }
        else{
             $respuesta['apellido1'] = $_POST['apellido1'];
            
        }
        $valida = validarCadenaAlfabetica($_POST['apellido2'],3,50);
        if($valida!=0)
        {
        $errores['apellido2']=$arrayErrores[$valida];
        $error = true;
        }
        else{
             $respuesta['apellido2']= $_POST['apellido2'];
            
        }
        $valida=validarTelefono($_POST['movil']);
        if($valida!=0)
        {
        $errores['movil']=$arrayErrores[$valida];
        $error = true;
        }
        else{
             $respuesta['movil']= $_POST['movil'];
            
        }
        if(empty($_POST['genero']))
        {
        $errores['genero']=$arrayErrores[1];
        $error = true;
        }
        else{
             $respuesta['genero'] = $_POST['genero'];
            
        }
        $valida=validarCadenaAlfanumerica($_POST['direccion'],5,150);
        if($valida!=0)
        {
        $errores['direccion']=$arrayErrores[$valida];
        $error = true;
        }
        else{
             $respuesta['direccion'] = $_POST['direccion'];
            
        }
        
        if(empty($_POST['pais']))
        {
        $errores['pais']="introducir un pais!!";
        $error = true;
        }
        else{
             $respuesta['pais']= $_POST['pais'];
            
        }
        $valida=validarCadenaAlfabetica($_POST['informacionAdicional'],3,300);
        if($valida!=0)
        {
        $errores['informacionAdicional']=$arrayErrores[$valida];
        $error = true;
        }
        else{
             $respuesta['informacionAdicional'] = $_POST['informacionAdicional'];
            
        }
        
        
   }
  if(!isset($_POST['aceptar']) || $error){ 
?>


<h2>23.Construir un formulario para recoger un cuestionario realizado a una persona y mostrar en la  misma pagina las
    preguntas y las respuestas recogidas; en el caso de que alguna respuesta este vacia o erronea volvera a salir el
    formulario con el mensaje correspondiente, pero las respuestas que habiamos tecleado correctamente apareceran
    en el formulario y no tendremos que volver a teclearlas.</h2>
    <div class="contenedor">
     <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" id="formulario"> 
        <label for="nombre">Nombre: </label>
            <input type="text" name="nombre" id="nombre" value="<?php echo  $respuesta['nombre']; ?>">
            <?php
            echo $errores['nombre'];
            ?> 
        <br/> <br/>
        
        <label for="apellido1">Primer Apellido: </label>
            <input type="text" name="apellido1" id="apellido1" value="<?php echo $respuesta['apellido1']  ?>">
            <?php
            echo $errores['apellido1'];
            ?>
        <br/> <br/>
        
        <label for="apellido2">Segundo Apellido: </label>
            <input type="text" name="apellido2" id="apellido2" value="<?php echo $respuesta['apellido2'] ?>">
            <?php
            echo $errores['apellido2'];
            ?>
        <br/> <br/>
        
         <label for="movil">Movil: </label>
            <input type="text" name="movil" id="movil" value="<?php echo $respuesta['movil'] ?>">
            <?php
            echo $errores['movil'];;
            ?>
        <br/> <br/>
        
        <label for="genero">Genero: </label>  
            <p>hombre<input type="radio" name="genero" checked="checked" value="hombre" /> </p>
            <p>mujer<input type="radio" name="genero" value="mujer" /></p>
            <?php
            echo $errores['genero']; // checked deja por defecto un botón asignado
            ?>
            <br/>
        <label for="direccion">Direccion: </label>
            <input type="text" name="direccion" id="direccion" value="<?php echo $respuesta['direccion'] ?>">
            <?php
            echo $errores['direccion'];
            ?>
        <br/> <br/>
            
        <label for="pais">Pais </label>
            <select name="pais">
                <option value="Espania">Espania</option>
                <option value="Francia">Francia</option>
            </select>
            <?php
            echo $errores['pais'];
            ?>
            <br/> <br/>
         <!--
            Cuando mandamos un textarera tenemos que darle un id al formulario e indicarle al textarea
            que pertenece a ese formulario con la etiqueta form="id del formulario"
         --> 
        <textarea name="informacionAdicional" rows="10" cols="30" form="formulario" ><?php echo $respuesta['informacionAdicional']; ?></textarea>
        <?php
            echo $errores['informacionAdicional'];
            ?>
        <br/> <br/>
            <input type="submit" value="aceptar" name="aceptar">

    </form>
     
<?php    //si todo esta contestado entonces se devolveran las respuestas;            
        }
        else{
           
           //print_r($respuesta);
           
           echo "nombre:".$respuesta['nombre']."<br />";
           echo " primer apellido:".$respuesta['apellido1']."<br />";
           echo " segundo apellido:".$respuesta['apellido2']."<br />";
           echo "movil:".$respuesta['movil']."<br />";
           echo "genero:".$respuesta['genero']."<br />";
           echo "direccion:".$respuesta['direccion']."<br />";
           echo "pais:".$respuesta['pais']."<br />";
           echo "informacion Adicional:".$respuesta['informacionAdicional']."<br />";
        }
        
?>
    </div>
</body>
</html>
