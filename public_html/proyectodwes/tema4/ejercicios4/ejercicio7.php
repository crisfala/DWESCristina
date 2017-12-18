<!DOCTYPE html>

<html>
<head>
    <title>ejercicio 7</title>
</head>

<body>
<h2>7.Página web que toma datos (código y descripción) de un fichero xml y los añade a la tabla 
Departamento de nuestra base de datos. (IMPORTAR)</h2>

<?php
    require 'LibreriaValidacion.php';
    $insertadas=0;
   try {

        $xml=simplexml_load_file("ejercicio7.xml");
        
        if($xml===false){
            echo"error al cargar el fichero XML <br />";
        }else{
        $info = "mysql:host=192.168.20.18;dbname=DAW209_DBDepartamento";
        $conexion = new PDO($info, 'DAW209', 'paso');
        $conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $conexion->beginTransaction();//transacciones de operaciones
        //consulta preparada
        $consulta=$conexion->prepare("INSERT INTO Departamentos VALUES(:codigo,:descripcion)");
        $consulta->bindParam(':codigo',$codigo);
        $consulta->bindParam(':descripcion',$descripcion);
        //llenar de datos
        foreach($xml->departamento as $departamento){
            $codigo=$departamento->codigo;
            $descripcion=$departamento->descripcion;
            if($consulta->execute()){
                $insertadas++;
            }
        }
        //mensaje si todo sale bien y se muestran los registros
        echo"Se han agregado correctamente los datos <br />";
        echo"numero de registros agregados: $insertadas <br /> ";
        $conexion->commit();
        
    }
    
   }catch(PDOException $ex){
    echo"error";
    echo $ex->getMessage();
    $conexion->rollBack();
   }
   exit();
   unset($conexion);
     show_source("ejercicio7.xml");
?>

</body>
</html>
