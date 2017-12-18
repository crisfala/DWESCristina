<!DOCTYPE html>

<html>
<head>
    <title>ejercicio 8</title>
</head>

<body>
<h2>8.Página web que toma datos (código y descripción) de la tabla Departamento y guarda en un
fichero departamento.xml. (COPIA DE SEGURIDAD / EXPORTAR).</h2>
<?php
 $xml=new DOMDocument('1.0','UTF-8');
 //la raiz es departamentos
 $raiz=$xml->createElement('departamentos');
 $raiz=$xml->appendChild($raiz);
try{
    //se realiza la conexion
 $info = "mysql:host=192.168.20.19;dbname=DAW209_DBDepartamento";
        $conexion = new PDO($info, 'DAW209', 'paso');
    //errores
        $conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    //consulta    
        $consulta=$conexion->query("SELECT * FROM Departamentos");
    //ejecuta la consulta   
        $consulta->execute();

 while($registros=$consulta->fetch(PDO::FETCH_OBJ)){
    $departamento=$xml->createElement('departamento');
    $departamento=$raiz->appendChild($departamento);
    //se crean los hijos y se asigna el valor
    
    $codigo=$xml->createElement('codigo',$registros->codDepartamento);
    $codigo =$departamento->appendChild($codigo);

    $descripcion=$xml->createElement('descripcion',$registros->descDepartamento);
    $descripcion =$departamento->appendChild($descripcion);

 }
 //guardar en le fichero xml
 $xml->formatOutput=true;
 $strings_xml = $xml->saveXML();
 //nombre al guardar
 $xml->save('ejercicio8.xml');
 echo"el archivo ha sido guardado:<br><br>";
 show_source("ejercicio8.xml");
 
}catch(PDOException $ex){
    echo"error";
    exit();
}finally{
    unset($conexion);
}
?>

</body>
</html>
