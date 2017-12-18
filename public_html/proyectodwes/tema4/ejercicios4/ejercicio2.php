<?php
echo"<h2>2.Mostrar el contenido de la tabla Departamento y el número de registros.</h2>";
$conexion =new  mysqli("192.168.20.18","DAW209","paso","DAW209_DBDepartamento");
if($conexion->connect_errno){
    echo"error de conexion";
}else{
    $consulta="SELECT * FROM Departamentos";
    //sentencia preparada y ejecucion
    $sentencia=$conexion->prepare($consulta);
    $sentencia->execute();
    //resultado
    $resultado=$sentencia->get_result();
    //numero total de resultados
    $registros=$resultado->num_rows;
    echo" <h3> El numero total de registros son: $registros </h3> <br />";
    //guardar como objeto
    $objeto=$resultado->fetch_object();
    
    while($objeto !=null){
        echo"codigo: ".$objeto->codDepartamento."<br />";
        echo"descripcion: ".$objeto->descDepartamento."<br />";
        $objeto=$resultado->fetch_object();
        echo"<hr>";
    }
}
$conexion->close();
?>