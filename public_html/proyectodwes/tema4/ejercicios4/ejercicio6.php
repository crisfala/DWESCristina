<!DOCTYPE html>
<html>
<head>
    <title>ejercicio 6</title>
</head>

<body>
<h2>6.Pagina web que cargue registros en la tabla Departamento desde un array departamentosnuevos 
utilizando una consulta preparada</h2>
<?php
$correcto=true; //si se realizan correctamente los cambios.
$nuevos=[
$departamento1=['codDepartamento' => 'AA', 'descDepartamento' => 'desAA'],
$departamento2=['codDepartamento' => 'BB', 'descDepartamento' => 'desBB'],
$departamento3=['codDepartamento' => 'CC', 'descDepartamento' => 'desCC']
];
try{
$info="mysql:host=192.168.20.18;dbname=DAW209_DBDepartamento";
$conexion=new PDO($info,"DAW209","paso");
$conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);//si hay error se lanza excepciones
$conexion->beginTransaction();
$consulta=$conexion->prepare("INSERT INTO Departamentos VALUES (?,?)");
foreach($nuevos as $departamentos){//recorrec cada departamento y los inserta.
$consulta->bindParam(1,$departamentos['codDepartamento']);
$consulta->bindParam(2,$departamentos['descDepartamento']);
$consulta->execute();}
}catch(PDOException $ex){
    $correcto=false;
}

if($correcto==true){
    $conexion->commit();
    echo"registros insertados";
}else{
    $conexion->rollBack();
    echo"error";
}
unset($conexion);

?>

</body>
</html>
