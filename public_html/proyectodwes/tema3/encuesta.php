<!DOCTYPE html>

<html lang="es">
<head>
     <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="ejercicio20/formulario.css">
    <title>encuesta</title>
</head>

<body>
<div class="contenedor">
<?php
     //incluir validación
include "ejercicio19.php";
     //inicializo variables vacias;
$valida = 0;
$personas=3;
     for($i=0;$i<$personas;$i++){
          $errores[$i] = array(
         'nombre' => '',
         'apellido1'=>'',
         'movil'=>'',
         'email'=>'',
         'direccion'=>'',
    );

          $respuesta[$i] = array(
          'nombre' => '',
          'apellido1'=>'',
          'movil'=>'',
          'email'=>'',
          'direccion'=>'',
    );                        
}
 $error=false;// variable si es false no ha habido error y si es true hay error.
 $arrayErrores = ['','El campo esta vacio','El valor introducido no es valido',
                  'la longitud es inferior',
                  'la longitud es mayor'];
 if(isset($_POST['aceptar'])){
   for ($i=0;$i<$personas;$i++){ 

        $valida = validarCadenaAlfabetica($_POST['nombre'][$i],3,50);
        if($valida!=0)
        {
            $errores[$i]['nombre']=$arrayErrores[$valida];
            $error = true;
        }
        else{
             $respuesta[$i]['nombre'] = $_POST['nombre'][$i];
            
        }
        $valida = validarCadenaAlfabetica($_POST['apellido1'][$i],3,50);
        if($valida!=0)
        {
            $errores[$i]['apellido1']=$arrayErrores[$valida];
            $error = true;
        }
        else{
             $respuesta[$i]['apellido1'] = $_POST['apellido1'][$i];
            
        }
        $valida=validarTelefono($_POST['movil'][$i]);
        if($valida!=0)
        {
          $errores[$i]['movil']=$arrayErrores[$valida];
          $error = true;
        }
        else{
             $respuesta[$i]['movil']= $_POST['movil'][$i];
            
        }
          $valida =  validarEmail($_POST['email'][$i]);
        if($valida != 0) {
            $errores[$i]['email'] = $arrayErrores[$valida];
            $error = true;
        }
        else {
            $respuesta[$i]['email'] = $_POST['email'][$i];
        } 
        $valida=validarCadenaAlfanumerica($_POST['direccion'][$i],5,150);
        if($valida!=0)
        {
        $errores[$i]['direccion']=$arrayErrores[$valida];
        $error = true;
        }
        else{
             $respuesta[$i]['direccion'] = $_POST['direccion'][$i];
            
        }
   }
 }
  if(!isset($_POST['aceptar']) || $error){
?>
     <h2>Encuesta</h2>
     
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" id="formulario">
        <div class="persona1">
        <label for="nombre[0]">Nombre:</label>
                <input type="text" name="nombre[0]" value="<?PHP echo $respuesta[0]['nombre']; ?>"> <br/>
                <?php echo $errores[0]['nombre']; ?>
        <br/> <br/>
        <label for="apellido1[0]">Primer apellido</label>
                <input type="text" name="apellido1[0]" value="<?PHP echo $respuesta[0]['apellido1']; ?>"> <br/>
                <?php echo $errores[0]['apellido1'];?>
        <br/> <br/>
        <label for="movil[0]">Movil: </label>
            <input type="text" name="movil[0]" id="movil" value="<?php echo $respuesta[0]['movil'] ?>"> <br/>
            <?php echo $errores[0]['movil'];?>
        <br/> <br/>
        <label for="email[0]">Email: </label>
            <input type="text" name="email[0]" value="<?PHP echo $respuesta[0]['email']; ?>"> <br/>
                <?php echo $errores[0]['email'];?>
        <br/> <br/>
        <label for="direccion[0]">Direccion: </label>
            <input type="text" name="direccion[0]" id="direccion" value="<?php echo $respuesta[0]['direccion'] ?>"> <br/>
            <?php echo $errores[0]['direccion'];?>
        <br/> <br/>
        </div>
        <div class="persona2">
        <label for="nombre[1]">Nombre:</label>
                <input type="text" name="nombre[1]" value="<?PHP echo $respuesta[1]['nombre']; ?>"> <br/>
                <?php echo $errores[1]['nombre']; ?>
        <br/> <br/>
         <label for="apellido1[1]">Primer apellido</label>
                <input type="text" name="apellido1[1]" value="<?PHP echo $respuesta[1]['apellido1']; ?>"> <br/>
                <?php echo $errores[1]['apellido1']; ?>
        <br/> <br/>
        <label for="movil[1]">Movil: </label>
            <input type="text" name="movil[1]" id="movil" value="<?php echo $respuesta[1]['movil'] ?>"> <br/>
            <?php echo $errores[1]['movil']; ?>
        <br/> <br/>
        <label for="email[1]">Email: </label>
            <input type="text" name="email[1]" value="<?PHP echo $respuesta[1]['email']; ?>"> <br/>
                <?php echo $errores[1]['email'];?>
        <br/> <br/>
        <label for="direccion[1]">Direccion: </label>
            <input type="text" name="direccion[1]" id="direccion" value="<?php echo $respuesta[1]['direccion'] ?>"> <br/>
            <?php echo $errores[1]['direccion'];?>
        <br/> <br/>
        </div>
        
        <label for="nombre[2]">Nombre:</label>
                <input type="text" name="nombre[2]" value="<?PHP echo $respuesta[2]['nombre']; ?>"> <br/>
                <?php echo $errores[2]['nombre']; ?>
        <br/> <br/>
         <label for="apellido1[2]">Primer apellido</label>
                <input type="text" name="apellido1[2]" value="<?PHP echo $respuesta[2]['apellido1']; ?>"> <br/>
                <?php echo $errores[2]['apellido1']; ?>
        <br/> <br/>
        <label for="movil[2]">Movil: </label>
            <input type="text" name="movil[2]" id="movil" value="<?php echo $respuesta[2]['movil'] ?>"> <br/>
            <?php echo $errores[2]['movil']; ?>
        <br/> <br/>
        <label for="email[2]">Email: </label>
            <input type="text" name="email[2]" value="<?PHP echo $respuesta[2]['email']; ?>"> <br/>
                <?php echo $errores[2]['email'];?>
        <br/> <br/>
        <label for="direccion[2]">Direccion: </label>
            <input type="text" name="direccion[2]" id="direccion" value="<?php echo $respuesta[2]['direccion'] ?>"> <br/>
            <?php echo $errores[2]['direccion']; ?>
        <br/> <br/>
    
     <input type="submit" value="aceptar" name="aceptar">

     </form>
     
     
<?php    //si todo esta contestado entonces se devolveran las respuestas;            
        }else{
    for($i = 0; $i <$personas; $i++){
            foreach($respuesta[$i] as $clave => $valor){
                if(is_array($valor)){
                    foreach($valor as $campo){
                        echo "$campo </br>";
                    }
                }
                else{
                    echo $clave.":".$valor."<br />";
                }
            }
            echo"<br/> <br/>";
            }
        }
 
     ?>
</body>
</html>
