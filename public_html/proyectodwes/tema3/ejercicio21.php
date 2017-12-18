<!DOCTYPE html>

<html>
<head>
    <meta http-equiv="Content-Type" content="text/html" charset="utf-8">
     <link rel="stylesheet" type="text/css" href="ejercicio20/formulario.css">
    <title>formulario</title>
</head>

<body>
    <h2>21.Construir un formulario para recoger un cuestionario realizado a una persona y mostrar en la misma página las
    preguntas y las respuestas recogidas</h2>
<div class="contenedor">
<?php
//codigo qu ese ejecuta cuando se envia el formulario.
if (ISSET($_POST['aceptar'])) 
{
$nombre= $_POST['nombre'];
$apellido1= $_POST['apellido1'];
$apellido2= $_POST['apellido2'];
$movil= $_POST['movil'];
$genero= $_POST['genero'];
$direccion= $_POST['direccion'];
$pais= $_POST['pais'];
$informaciónAdicional=$_POST['informaciónAdicional'];
echo "$nombre <br/>";
echo "$apellido1 <br/>";
echo "$apellido2 <br/>";
echo "$movil <br/>";
echo "$genero <br/>";
echo "$direccion <br/>";
echo "$pais<br/>";
echo "$informaciónAdicional<br/>";
}
else{
?>
    <!--codigo que se ejecuta para poder rellenar el formulario.-->
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        
<label for="nombre">Nombre: </label>
    <input type="text" name="nombre" id="nombre">
<br/> <br/>

<label for="apellido1">Primer Apellido: </label>
    <input type="text" name="apellido1" id="apellido1">
<br/> <br/>

<label for="apellido2">Segundo Apellido: </label>
    <input type="text" name="apellido2" id="apellido2">
<br/> <br/>

 <label for="movil">Movil: </label>
    <input type="text" name="movil" id="movil">
<br/> <br/>

<label for="genero">Genero: </label>
<br/>
    <p>hombre<input type="radio" name="genero" checked="checked" value="hombre" />mujer<input type="radio" name="genero" value="mujer" /></p> 
  <br/>  

<label for="direccion">Dirección: </label>
    <input type="text" name="direccion" id="direccion">
<br/> <br/>
    
<label for="pais">Pais </label>
    <select name="pais">
        <option value="españa">España</option>
        <option value="francia">Francia</option>
    </select>
<br/> <br/>
<textarea style="vertical-align:top;" name="informaciónAdicional" rows="10" cols="30" >
    
    

</textarea>
<br/> <br/>
<input type="submit" value="aceptar" name="aceptar">

    </form>
    </div>
<?php
}       //necesitas volver a meter codigo php cada vez que lo uses.
?>

</body>
</html>
