<!DOCTYPE html>

<html>
<head >
    <title>Ejercicio 5</title>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="../../tema3/ejercicio20/formulario.css">
</head>
<body>
<h2>Pagina web que añade tres registros a nuestra tabla Departamento utilizando tres instrucciones 
insert y una transaccion, de tal forma que se añadan los tres registros o no se añada ninguno.</h2>
<?php

$info="mysql:host=192.168.20.18;dbname=DAW209_DBDepartamento";
$conexion=new PDO($info,"DAW209","paso");
$conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);//si hay error se lanza excepciones
try{
    $correcto=true;
    $conexion->beginTransaction();//transacciones de operaciones
    //consulas
    
    $consulta1="INSERT INTO Departamentos VALUES ('B','informatica')";
    $conexion->exec($consulta1);
    $consulta2="INSERT INTO Departamentos VALUES ('C','musica')";
    $conexion->exec($consulta2);
    $consulta3="INSERT INTO Departamentos VALUES ('D','didactica')";
    $conexion->exec($consulta3);
    }catch(PDOException $ex){
        $correcto=false;
    }
    if($correcto==true){//se realizan las operaciones y se muestran si todo esta bien
    $conexion->commit();
    echo"proceso realizado correctamente <br />";
    
    }
    $consulta="SELECT * FROM Departamentos";//consulta todos los registros
    $resultado=$conexion->query($consulta);//ejercucion de la consulta
    $numRegistros=$resultado->rowCount();//numero de registros totales en la tabla
    echo"el numero total de registro son: $numRegistros <br />";
    
    while($registro=$resultado->fetch(PDO::FETCH_OBJ)){
        echo"$registro->codDepartamento ";
        echo"$registro->descDepartamento <br />";
    }
    unset($conexion);//cierra conexion
    ?>
</body>
</html>
