<!DOCTYPE html>

<html>
<head>
    <title> ejercicio 3 Añadir</title>
     <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link rel="stylesheet" type="text/css" href="../../tema3/ejercicio20/formulario.css">
</head>

<body>
<h2>3.Formulario para añadir un departamento a la tabla Departamento con validación de entrada y 
control de errores</h2>
<?php
require 'LibreriaValidacion.php';
$errores=array();//guarda errores.
$entrada=true;//que los datos esten bien intruducidos.

//inicio de array errores.
$errores=array(
    'codDepartamento'=>'',
    'descDepartamento'=>''
);

//condicion que indica que se pulsa el boton enviar
if(isset($_POST['enviar'])){
    $errores['codDepartamento']=comprobarTexto($_POST['codDepartamento'],3,1,1);
    $errores['descDepartamento']=comprobarTexto($_POST['descDepartamento'],250,1,1);
    //recorrer array errores
    
    foreach($errores as $valor){
        if($valor!=null){
            $entrada=false;
        }
    }
}
//si la variable entrada es false tiene que mostrar de nuevo el formulario
if(!isset($_POST['enviar']) || $entrada==false){ 
?>
<div class="contenedor">
<h2>Formulario</h2>

     <form action="<?PHP echo $_SERVER['PHP_SELF']; ?>" method="post" name="formulario" id="formulario">
        <label for="codDepartamento">Código Departamento </label><br>
        <input type="text" name="codDepartamento"
        <?php if(isset($_POST['codDepartamento']) && empty($Errores['codDepartamento'])){ echo 'value="',$_POST['codDepartamento'],'"';}?>/>
        <?php echo $errores['codDepartamento'];?>
        <br>
         <label for="descDepartamento">descripción Departamento </label><br>
        <input type="text" name="descDepartamento"
         <?php if(isset($_POST['descDepartamento']) && empty($Errores['descDepartamento'])){ echo 'value="',$_POST['descDepartamento'],'"';}?>/>
          <?php echo $errores['descDepartamento'];?>
        <br>
        <input type="submit" name="enviar" value="enviar"/>
     </form>
        <?php
        //si los datos son correctos
          }else{
            try{
                //conexion
                $info = "mysql:host=192.168.20.18;dbname=DAW209_DBDepartamento";
                $conexion = new PDO($info, 'DAW209', 'paso');
                $conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                //consulta
                $consulta="INSERT INTO Departamentos(codDepartamento,descDepartamento)
                VALUES (\"".$_POST['codDepartamento']."\",\"".$_POST['descDepartamento']."\")";
                $registros=$conexion->exec($consulta);
                //exec() devuelve el numero de filas afectada si es 1 se ha insertado con exito
                if($registros==1){
                   echo"los registros han sido insetados con exito"; 
                }
                unset($conexion);
                //si hay error en la conexión salta una excepción
            }catch(PDOException $excepcion){
                echo $excepcion->getMessage();
                unset($conexion);
            }
            
            
            }
    ?>
</div>
</body>
</html>
