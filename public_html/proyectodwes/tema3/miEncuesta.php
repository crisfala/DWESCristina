<!doctype html>

<html lang="es">
<head>
    <title>ejercicio 23</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="ejercicio20/formulario.css">
</head>
<body> 
<?php
//inicializo variables vacias;
include('ejercicio19.php');
define ("MIN",3);
define ("MAX",30);
$personas=3;
$valida=0;
$cuestionario = array();
$errores = array();
$arrayGenero = array();
$arrayPais = array();

$arrayErrores = array(" ", "No ha introducido ningun valor<br />",
                            "El valor introducido no es valido<br />",
                            "Tamaño minimo no valido<br />",
                            "Tamaño maximo no valido<br />");

//preguntas del cuestionario
for($i = 0;$i <=$personas; $i++){
$cuestionario[$i] = array(
    'nombre'=>'',
    'apellido1'=>'',
    'apellido2'=>'',
    'movil'=>'',
    'genero'=> '',
    'email'=>'',
    'pais'=>'',
   
);                         
//errores del cuestionario
$erroresCampos[$i] = array(
    'nombre' => '',
    'apellido1'=>'',
    'apellido2'=>'',
    'movil'=>'',
    'genero'=>'',
    'email'=>'',
    'pais'=>'',

);
$tipoGenero[$i]=array(
    'hombre'=>'',
    'mujer'=>'',
);

$pais[$i]=array(
    'españa'=>'',
    'francia'=>'',
);

}

 $error=false;// variable si es false no ha habido error y si es true hay error.
 
 //comprobación de que el boton aceptar a sido pulsado
  if(isset($_POST['aceptar'])){
    for ($i = 0;$i<$personas;$i++){ 
        $valida = validarCadenaAlfabetica($_POST['nombre'][$i],MIN,MAX);
        
        if($valida != 0) {
            $erroresCampos[$i]['nombre'] = $arrayErrores[$valida];
            $error = true;
            } 
            else {
                    $cuestionario[$i]['nombre'] = $_POST['nombre'][$i];
                }
        $valida = validarCadenaAlfabetica($_POST['apellido1'][$i],MIN,MAX);
        if($valida != 0) {
            $erroresCampos[$i]['apellido1'] = $arrayErrores[$valida];
            $error = true;
            } 
            else {
                    $cuestionario[$i]['apellido1'] = $_POST['apellido1'][$i];
                }
        $valida = validarCadenaAlfabetica($_POST['apellido2'][$i],MIN,MAX);
        if($valida != 0) {
            $erroresCampos[$i]['apellido2'] = $arrayErrores[$valida];
            $error = true;
            } 
            else {
                    $cuestionario[$i]['apellido2'] = $_POST['apellido2'][$i];
                }
        $valida = validarTelefono($_POST['movil'][$i],MIN,MAX);
        if($valida != 0) {
            $erroresCampos[$i]['movil'] = $arrayErrores[$valida];
            $error = true;
            } 
            else {
                    $cuestionario[$i]['movil'] = $_POST['movil'][$i];
                }
         if(!isset($_POST['genero'.$i])) {
                    $erroresCampos[$i]['genero'] = $arrayErrores[1];
                    $error = true;
                }
                else {
                    $cuestionario[$i]['genero'] = $_POST['genero'.$i];
                    $tipoGenero[$i][$cuestionario[$i]['genero']] = 'checked';
                } 
          
            $valida =  validarEmail($_POST['email'][$i]);
        if($valida != 0) {
            $erroresCampos[$i]['email'] = $arrayErrores[$valida];
            $error = true;
        }
        else {
            $cuestionario[$i]['email'] = $_POST['email'][$i];
        } 
         
    }
    
   }
  if(!isset($_POST['aceptar']) || $error){ 
?>


<h2>Encuesta</h2>
    <div class="contenedor">
    <form id="encuesta1" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <div class="persona1">
        <label for="nombre[0]">Nombre:</label>
                <input type="text" name="nombre[0]" value="<?PHP echo $cuestionario[0]['nombre']; ?>"><br /><br />
                <?PHP echo $erroresCampos[0]['nombre']; ?>
        <br/> <br/>
        
        <label for="apellido1[0]">Primer Apellido: </label>
                <input type="text" name="apellido1[0]" value="<?PHP echo $cuestionario[0]['apellido1']; ?>"><br /><br />
                <?PHP echo $erroresCampos[0]['apellido1']; ?>
        <br/> <br/>
        <label for="apellido2[0]">Segundo Apellido: </label>
                <input type="text" name="apellido2[0]" value="<?PHP echo $cuestionario[0]['apellido2']; ?>"><br /><br />
                <?PHP echo $erroresCampos[0]['apellido2']; ?>
        <br/> <br/>
         <label for="movil[0]">Movil: </label>
                <input type="text" name="movil[0]" value="<?PHP echo $cuestionario[0]['movil']; ?>"><br /><br />
                <?PHP echo $erroresCampos[0]['movil']; ?>
        <br/> 
        <label for="genero">Genero: </label><br />
           <input type="radio" name="Genero1" checked="checked" value="hombre" <?php echo $tipoGenero[0]['hombre'];?>>Hombre <br />
           <input type="radio" name="Genero1" value="mujer" <?php echo $tipoGenero[0]['mujer'];?>>Mujer<br />
            <?PHP echo $erroresCampos[0]['genero']; ?>
        <br/> <br/>
         <label for="email[0]">Email: </label>
                <input type="text" name="email[0]" value="<?PHP echo $cuestionario[0]['email']; ?>"><br /><br />
                <?PHP echo $erroresCampos[0]['email']; ?>
        <br/> <br/>
        
           
    </div>
    <div class="persona2">
        <label for="nombre[1]">Nombre:</label>
                <input type="text" name="nombre[1]" value="<?PHP echo $cuestionario[1]['nombre']; ?>"><br /><br />
                <?PHP echo $erroresCampos[1]['nombre']; ?>
        <br/> <br/>
        
        <label for="apellido1[1]">Primer Apellido: </label>
                <input type="text" name="apellido1[1]" value="<?PHP echo $cuestionario[1]['apellido1']; ?>"><br /><br />
                <?PHP echo $erroresCampos[1]['apellido1']; ?>
        <br/> <br/>
        <label for="apellido2[1]">Segundo Apellido: </label>
                <input type="text" name="apellido2[1]" value="<?PHP echo $cuestionario[1]['apellido2']; ?>"><br /><br />
                <?PHP echo $erroresCampos[1]['apellido2']; ?>
        <br/> <br/>
        <label for="movil[1]">Movil: </label>
                <input type="text" name="movil[1]" value="<?PHP echo $cuestionario[1]['movil']; ?>"><br /><br />
                <?PHP echo $erroresCampos[1]['movil']; ?>
        <br/> 
        <label for="genero">Genero: </label><br />
           <input type="radio" name="Genero2" checked="checked"  value="hombre" <?php echo $tipoGenero[1]['hombre'];?>>Hombre<br />
           <input type="radio" name="Genero2" value="mujer" <?php echo $tipoGenero[1]['mujer'];?>>Mujer<br />
            <?PHP echo $erroresCampos[1]['genero']; ?>
        <br/> <br/>
         <label for="email[1]">Email: </label>
                <input type="text" name="email[1]" value="<?PHP echo $cuestionario[1]['email']; ?>"><br /><br />
                <?PHP echo $erroresCampos[1]['email']; ?>
        <br/> <br/>
    </div>
    <div class="persona3">
        <label for="nombre[2]">Nombre:</label>
                <input type="text" name="nombre[2]" value="<?PHP echo $cuestionario[2]['nombre']; ?>"><br /><br />
                <?PHP echo $erroresCampos[2]['nombre']; ?>
        <br/> <br/>
        
        <label for="apellido1[2]">Primer Apellido: </label>
                <input type="text" name="apellido1[2]" value="<?PHP echo $cuestionario[2]['apellido1']; ?>"><br /><br />
                <?PHP echo $erroresCampos[2]['apellido1']; ?>
        <br/> <br/>
        <label for="apellido2[0]">Segundo Apellido: </label>
                <input type="text" name="apellido2[2]" value="<?PHP echo $cuestionario[2]['apellido2']; ?>"><br /><br />
                <?PHP echo $erroresCampos[2]['apellido2']; ?>
        <br/> <br/>
        <label for="movil[2]">Movil: </label>
                <input type="text" name="movil[2]" value="<?PHP echo $cuestionario[2]['movil']; ?>"><br /><br />
                <?PHP echo $erroresCampos[2]['movil']; ?>
        <br/> 
        <label for="genero">Genero: </label><br />
           <input type="radio" name="Genero3" checked="checked" value="hombre"<?php echo $tipoGenero[2]['hombre'];?>>Hombre<br />
           <input type="radio" name="Genero3" value="mujer" <?php echo $tipoGenero[2]['mujer'];?>>Mujer<br />
            <?PHP echo $erroresCampos[2]['genero']; ?>
        <br/> <br/>
         <label for="email[2]">Email: </label>
                <input type="text" name="email[2]" value="<?PHP echo $cuestionario[2]['email']; ?>"><br /><br />
                <?PHP echo $erroresCampos[2]['email']; ?>
        <br/> <br/>
         
    </div>
            <input type="submit" value="aceptar" name="aceptar">
    </div>
      </div>
    </form>
     
<?php               
        }
        */else{
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