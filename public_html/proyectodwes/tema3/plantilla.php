<!doctype html>

<html lang="es">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="ejercicio20/formulario.css">
    <title>Plantilla</title>
</head>
<body> 
<?php
//inicializo variables vacias;
include "ejercicio19.php";
$valida = 0;
$errores = array(
    'campoAlfabetico' => '',
    'campoNumerico'=>'',
    'radioButon'=>'',
    'campoAlfaNumerico'=>'',
    'selectBox'=>'',
    'textArea'=>'',
    'rangeInput'=>'',
    'direccion'=>'',
    'fecha'=>''
    );

$preguntas = array(
    'campoAlfabetico' => '',
    'campoNumerico'=>'',
    'radioButon'=>'',
    'campoAlfaNumerico'=>'',
    'selectBox'=>'',
    'textArea'=>'',
    'rangeInput'=>'',
    'direccion'=>'',
    'fecha'=>''
    
    );

 $error=false;// variable si es false no ha habido error y si es true hay error.
 $arrayErrores = ['','El campo esta vacio','El valor introducido no es valido','El tamaño es inferior al requerido','EL tamaño es mayor al debido'];
 //comprobación de que el boton aceptar a sido pulsado
  if(isset($_POST['aceptar']))
    {
        $valida = validarCadenaAlfabetica($_POST['campoAlfabetico'],3,50);
        if($valida!=0)
        {
        $errores['campoAlfabetico']=$arrayErrores[$valida];
        $error = true;
        }
        else{
             $preguntas['campoAlfabetico'] = $_POST['campoAlfabetico'];
            
        }
        
        $valida=validarTelefono($_POST['campoNumerico']);
        if($valida!=0)
        {
        $errores['campoNumerico']=$arrayErrores[$valida];
        $error = true;
        }
        else{
             $preguntas['campoNumerico']= $_POST['campoNumerico'];
            
        }
        if(empty($_POST['radioButon']))
        {
        $errores['radioButon']=$arrayErrores[1];
        $error = true;
        }
        else{
             $preguntas['radioButon'] = $_POST['radioButon'];
            
        }
        $valida=validarCadenaAlfanumerica($_POST['campoAlfaNumerico'],5,150);
        if($valida!=0)
        {
        $errores['campoAlfaNumerico']=$arrayErrores[$valida];
        $error = true;
        }
        else{
             $preguntas['campoAlfaNumerico'] = $_POST['campoAlfaNumerico'];
            
        }
        
        if(empty($_POST['selectBox']))
        {
        $errores['selectBox']="introducir un selectBox!!";
        $error = true;
        }
        else{
             $preguntas['selectBox']= $_POST['selectBox'];
            
        }
        
        $valida=validarCadenaAlfabetica($_POST['textArea'],3,300);
        if($valida!=0)
        {
        $errores['textArea']=$arrayErrores[$valida];
        $error = true;
        }
        else{
             $preguntas['textArea'] = $_POST['textArea'];
            
        }
        
         if(empty($_POST['rangeInput']))
        {
        $errores['rangeInput']="introducir un rango!!";
        $error = true;
        }
        else{
             $preguntas['rangeInput']= $_POST['rangeInput'];
            
        }
        
        $valida=validarURL($_POST['direccion']);
        if($valida!=0)
        {
        $errores['direccion']=$arrayErrores[$valida];
        $error = true;
        }
        else{
             $preguntas['direccion'] = $_POST['direccion'];
            
        }
        
        if(empty($_POST['fecha']))
        {
        $errores['fecha']="introducir una fecha!!";
        $error = true;
        }
        else{
             $preguntas['fecha']= $_POST['fecha'];
            
        }
        
        
        
   }
  if(!isset($_POST['aceptar']) || $error){ 
?>


<h2>Plantilla</h2>
    <div class="contenedor">
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" id="formulario"> 
        <label for="campoAlfabetico">Alfabetico: </label>
            <input type="text" name="campoAlfabetico" id="campoAlfabetico" value="<?php echo  $preguntas['campoAlfabetico']; ?>">
            <?php
            echo $errores['campoAlfabetico'];
            ?> 
        <br/> <br/>
         <label for="campoNumerico">Numerico: </label>
            <input type="text" name="campoNumerico" id="campoNumerico" value="<?php echo $preguntas['campoNumerico'] ?>">
            <?php
            echo $errores['campoNumerico'];;
            ?>
        <br/> <br/>
        <label for="radioButon">Button: </label>  
            <p>radio1<input type="radio" name="radioButon" checked="checked" value="hombre" /> </p>
            <p>radio2<input type="radio" name="radioButon" value="mujer" /></p>
            <?php
            echo $errores['radioButon']; // checked deja por defecto un botón asignado
            ?>
        <label for="campoAlfaNumerico">AlfaNumerico: </label>
            <input type="text" name="campoAlfaNumerico" id="campoAlfaNumerico" value="<?php echo $preguntas['campoAlfaNumerico'] ?>">
            <?php
            echo $errores['campoAlfaNumerico'];
            ?>
        <br/> <br/>
            
        <label for="selectBox">Seleccion: </label>
            <select name="selectBox">
                <option value="opcion1">Opcion1</option>
                <option value="opcion2">Opcion2</option>
            </select>
            <?php
            echo $errores['selectBox'];
            ?>
            <br/> <br/>
         <!--
            Cuando mandamos un textarera tenemos que darle un id al formulario e indicarle al textarea
            que pertenece a ese formulario con la etiqueta form="id del formulario"
         -->
        <label for="textArea">Area de texto: </label><br />
        <textarea name="textArea" rows="10" cols="30" form="formulario" ><?php echo $preguntas['textArea']; ?></textarea>
        <?php
            echo $errores['textArea'];
        ?>
        <br/> <br/>
        
        <label for="rangeInput">range Input: </label>
        18<input type="range" name="rangeInput" min="18" max="99" step="1" value="<?php echo $preguntas['rangeInput']; ?>">99
        <br/> <br/>
        
        <label for="direccion">direccion web: </label>
        <input type="url" name="direccion" form="formulario" value="<?php echo $preguntas['direccion']; ?>">
        <?php
            echo $errores['direccion'];
        ?>
        <br/> <br/>
         <label for="fecha">Fecha: </label>
        <input type="date" name="fecha" min="1890-01-01" max="2000-12-31"  value="<?php echo $preguntas['fecha']; ?>1999-09-25">
        <?php
            echo $errores['fecha'];
        ?>
        
            <input type="submit" value="aceptar" name="aceptar">

    </form>
     
<?php    //si todo esta contestado entonces se devolveran las respuestas;            
        }
        else{
           
           //print_r($preguntas);
           
           echo "campoAlfabetico:".$preguntas['campoAlfabetico']."<br />";
           echo "campoNumerico:".$preguntas['campoNumerico']."<br />";
           echo "radioButon:".$preguntas['radioButon']."<br />";
           echo "campoAlfaNumerico:".$preguntas['campoAlfaNumerico']."<br />";
           echo "selectBox:".$preguntas['selectBox']."<br />";
           echo "text Area:".$preguntas['textArea']."<br />";
           echo "rangeInput:".$preguntas['rangeInput']."<br />";
           echo "direccion:".$preguntas['direccion']."<br />";
           echo "fecha:".$preguntas['fecha']."<br />";
        }
        
?>

</body>
</html>
