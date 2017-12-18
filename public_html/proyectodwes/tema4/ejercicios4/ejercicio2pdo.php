<?php
echo"2.Mostrar el contenido de la tabla Departamento y el número de registros.(PDO) <br />";
$info = "mysql:host=192.168.20.18;dbname=DAW209_DBDepartamento"; //Información de la base de datos. Host y nombre de la BD
$BD = new PDO($info, 'DAW209', 'paso'); //Creación de la conexión. Información de la BD,nombre y contraseña

//Consulta de todos los registros para generar la tabla
$consulta = "select * from Departamentos";
//Ejecución de la consulta
$resultado = $BD->query($consulta);
//Número de registros que devuelve
$numRegistros = $resultado->rowCount();
print "<p>" . "Número de registros: $numRegistros" . "</p>";
//recorrer resultados y fech avanza puntero
 while ($registro = $resultado->fetch(PDO::FETCH_OBJ)) {
        echo "$registro->codDepartamento  ";
        echo "$registro->descDepartamento<br />";
 
    }
    //cierra conexion
    unset($BD); 
?>