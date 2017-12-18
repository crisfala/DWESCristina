<!DOCTYPE html>
<html lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="ejercicio20/formulario.css">
    <title>Encuesta</title>
</head>
<body> 
<?php
//incluir validación
include "ejercicio19.php";
//inicializo variables vacias;
$valida = 0;
for($i=0;$i<=$personas;$i++){
$errores = array(
    'nombre' => '',
    'apellido1'=>'',
    'movil'=>'',
    'email'=>'',
    'direccion'=>'',
    'informacionAdicional'=>''
    );

$respuesta = array(
    'nombre' => '',
    'apellido1'=>'',
    'movil'=>'',
    'email'=>'',
    'direccion'=>'',
    'informacionAdicional'=>''
    );                        
}
 $error=false;// variable si es false no ha habido error y si es true hay error.
 $arrayErrores = ['','El campo esta vacio','El valor introducido no es valido','la longitud es inferior a la requerida','la longitud es mayor a la debida'];
 //comprobación de que el boton aceptar a sido pulsado
  if(isset($_POST['aceptar'])){
   for ($i = 0;$i<$personas;$i++){ 

        $valida = validarCadenaAlfabetica($_POST['nombre'][$i],3,50);
        if($valida!=0)
        {
            $errores[$i]['nombre']=$arrayErrores[$valida];
            $error = true;
        }
        else{
             $respuesta['nombre'] = $_POST['nombre'];
            
        }
        $valida = validarCadenaAlfabetica($_POST['apellido1'],3,50);
        if($valida!=0)
        {
            $errores[$i]['apellido1']=$arrayErrores[$valida];
            $error = true;
        }
        else{
             $respuesta['apellido1'] = $_POST['apellido1'];
            
        }
        $valida=validarTelefono($_POST['movil']);
        if($valida!=0)
        {
            $errores[$i]['movil']=$arrayErrores[$valida];
            $error = true;
        }
        else{
             $respuesta['movil']= $_POST['movil'];
            
        }
         $valida =  validarEmail($_POST['email'][$i]);
        if($valida != 0) {
            $errores[$i]['email'] = $arrayErrores[$valida];
            $error = true;
        }
        else {
            $cuestionario[$i]['email'] = $_POST['email'][$i];
        } 
        $valida=validarCadenaAlfanumerica($_POST['direccion'],5,150);
        if($valida!=0)
        {
            $errores[$i]['direccion']=$arrayErrores[$valida];
            $error = true;
        }
        else{
             $respuesta['direccion'] = $_POST['direccion'];
            
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
    <h2>Encuesta</h2>
     <div class="contenedor">
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" id="formulario">
        <div class="persona1">
        <label for="nombre[0]">Nombre:</label>
                <input type="text" name="nombre[0]" value="<?PHP echo $respuesta[0]['nombre']; ?>"><br /><br />
                <?PHP echo $errores[0]['nombre']; ?>
        <br/> <br/>
        
        <label for="apellido1[0]">Primer Apellido: </label>
            <input type="text" name="apellido1[0]" id="apellido1" value="<?php echo $respuesta[0]['apellido1']  ?>">
            <?php
            echo $errores[0]['apellido1'];
            ?>
        <br/> <br/>
        
        <label for="apellido2[0]">Segundo Apellido: </label>
            <input type="text" name="apellido2[0]" id="apellido2" value="<?php echo $respuesta[0]['apellido2'] ?>">
            <?php
            echo $errores[0]['apellido2'];
            ?>
        <br/> <br/>
        
         <label for="movil[0]">Movil: </label>
            <input type="text" name="movil[0]" id="movil" value="<?php echo $respuesta[0]['movil'] ?>">
            <?php
            echo $errores[0]['movil'];
            ?>
        <br/> <br/>
         <label for="email[0]">Email: </label>
            <input type="text" name="email[0]" value="<?PHP echo $cuestionario[0]['email']; ?>"><br /><br />
                <?
                PHP echo $erroresCampos[0]['email'];
                ?>
        <br/> <br/>
        <label for="direccion[0]">Direccion: </label>
            <input type="text" name="direccion[0]" id="direccion" value="<?php echo $respuesta[0]['direccion']?>">
            <?php
            echo $errores[0]['direccion'];
            ?>
        <br/> <br/>

         <!--
            Cuando mandamos un textarera tenemos que darle un id al formulario e indicarle al textarea
            que pertenece a ese formulario con la etiqueta form="id del formulario"
         --> 
        <textarea name="informacionAdicional[0]" rows="10" cols="30" form="formulario" ><?php echo $respuesta[0]['informacionAdicional']; ?></textarea>
        <?php
            echo $errores[0]['informacionAdicional'];
            ?>
        <br/> <br/>
       </div>
         <div class="persona2">
        <label for="nombre[1]">Nombre:</label>
                <input type="text" name="nombre[1]" value="<?PHP echo $respuesta[1]['nombre']; ?>"><br /><br />
                <?PHP echo $errores[1]['nombre']; ?>
        <br/> <br/>
        
        <label for="apellido1[1]">Primer Apellido: </label>
            <input type="text" name="apellido1[1]" id="apellido1" value="<?php echo $respuesta[1]['apellido1']  ?>">
            <?php
            echo $errores[1]['apellido1'];
            ?>
        <br/> <br/>
        
        <label for="apellido2[1]">Segundo Apellido: </label>
            <input type="text" name="apellido2[1]" id="apellido2" value="<?php echo $respuesta[1]['apellido2'] ?>">
            <?php
            echo $errores[1]['apellido2'];
            ?>
        <br/> <br/>
        
         <label for="movil[1]">Movil: </label>
            <input type="text" name="movil[1]" id="movil" value="<?php echo $respuesta[1]['movil'] ?>">
            <?php
            echo $errores[1]['movil'];
            ?>
        <br/> <br/>
         <label for="email[1]">Email: </label>
            <input type="text" name="email[1]" value="<?PHP echo $cuestionario[1]['email']; ?>"><br /><br />
                <?
                PHP echo $erroresCampos[1]['email'];
                ?>
        <br/> <br/>
        <label for="direccion[1]">Direccion: </label>
            <input type="text" name="direccion[1]" id="direccion" value="<?php echo $respuesta[1]['direccion']?>">
            <?php
            echo $errores[1]['direccion'];
            ?>
        <br/> <br/>

         <!--
            Cuando mandamos un textarera tenemos que darle un id al formulario e indicarle al textarea
            que pertenece a ese formulario con la etiqueta form="id del formulario"
         --> 
        <textarea name="informacionAdicional[1]" rows="10" cols="30" form="formulario" ><?php echo $respuesta[1]['informacionAdicional']; ?></textarea>
        <?php
            echo $errores[1]['informacionAdicional'];
            ?>
        <br/> <br/>
       </div>
         <div class="persona3">
        <label for="nombre[2]">Nombre:</label>
                <input type="text" name="nombre[2]" value="<?PHP echo $respuesta[2]['nombre']; ?>"><br /><br />
                <?PHP echo $errores[2]['nombre']; ?>
        <br/> <br/>
        
        <label for="apellido1[2]">Primer Apellido: </label>
            <input type="text" name="apellido1[2]" id="apellido1" value="<?php echo $respuesta[2]['apellido1']  ?>">
            <?php
            echo $errores[2]['apellido1'];
            ?>
        <br/> <br/>
        
        <label for="apellido2[2]">Segundo Apellido: </label>
            <input type="text" name="apellido2[2]" id="apellido2" value="<?php echo $respuesta[2]['apellido2'] ?>">
            <?php
            echo $errores[2]['apellido2'];
            ?>
        <br/> <br/>
        
         <label for="movil[2]">Movil: </label>
            <input type="text" name="movil[2]" id="movil" value="<?php echo $respuesta[2]['movil'] ?>">
            <?php
            echo $errores[2]['movil'];
            ?>
        <br/> <br/>
         <label for="email[2]">Email: </label>
            <input type="text" name="email[2]" value="<?PHP echo $cuestionario[2]['email']; ?>"><br /><br />
                <?
                PHP echo $erroresCampos[2]['email'];
                ?>
        <br/> <br/>
        <label for="direccion[2]">Direccion: </label>
            <input type="text" name="direccion[2]" id="direccion" value="<?php echo $respuesta[2]['direccion']?>">
            <?php
            echo $errores[2]['direccion'];
            ?>
        <br/> <br/>

         <!--
            Cuando mandamos un textarera tenemos que darle un id al formulario e indicarle al textarea
            que pertenece a ese formulario con la etiqueta form="id del formulario"
         --> 
        <textarea name="informacionAdicional[2]" rows="10" cols="30" form="formulario" ><?php echo $respuesta[2]['informacionAdicional']; ?></textarea>
        <?php
            echo $errores[2]['informacionAdicional'];
            ?>
        <br/> <br/>
       </div> 
            <input type="submit" value="aceptar" name="aceptar">

    </form>
     </div>
     
<?php    //si todo esta contestado entonces se devolveran las respuestas;            
        }
        else{
           
           //print_r($respuesta);
            for($i = 0; $i <$personas; $i++){
            foreach($cuestionario[$i] as $clave => $valor){
                if(is_array($valor)){
                    foreach($valor as $campo){
                        echo "$campo </br>";
                    }
                }
                else{
                    echo $clave.":".$valor."<br />";
                }
            }
            } 
        }
        
?>
</body>
</html>