<!DOCTYPE html>

<html>
<head>
    <title>ejercicio 4</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link rel="stylesheet" type="text/css" href="../../tema3/ejercicio20/formulario.css">
</head>

<body>
<h2>4.Formulario de búsqueda de departamentos por descripción (por una parte del campo 
DescDepartamento)</h2>

<?php
require 'LibreriaValidacion.php';
$errores=array();//guarda errores.
$entrada=true;//que los datos esten bien intruducidos.

//inicio de array errores.
$errores=array(
    'descDepartamento'=>''
);
//condicion que indica que se pulsa el boton enviar
if(isset($_POST['enviar'])){
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
                                <!--formulario-->
<div class="contenedor">
<h2>Formulario</h2>
     <form action="<?PHP echo $_SERVER['PHP_SELF']; ?>" method="post" name="formulario" id="formulario">
         <label for="descDepartamento">descripción Departamento </label><br>
        <input type="text" name="descDepartamento"
         <?php if(isset($_POST['descDepartamento']) && empty($errores['descDepartamento'])){ echo 'value="',$_POST['descDepartamento'],'"';}?>/>
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
                $consulta=$conexion->prepare("SELECT * FROM Departamentos WHERE descDepartamento LIKE CONCAT('%',\"" . $_POST['descDepartamento'] . "\",'%') ");
                $consulta->bindParam(':descDepartamento', $_POST['descDepartamento']);
                $consulta->execute(); 
        //recorrer resultados y fech avanza puntero
         while ($registro = $consulta->fetch(PDO::FETCH_OBJ)) {
            echo "$registro->codDepartamento ";
            echo "$registro->descDepartamento ";
 
    }
            
            
    // exception y cierra conexion
            }catch (PDOException $exception) {
                    echo $exception->getMessage();
                    unset($conexion); 
          }
    }
?>



</body>
</html>
