<!DOCTYPE html>
<html lang="es">
	<!--
	 autor:Cristina falagán
	 ultima modificación:20/11/2017
	 -->
    <head>
        <title>Importar</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="../css/estilo2.css">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body> 
		<h1>Importar desde XML</h1>
        <div class="contenedor">
            <nav>
				<a title="Inicio" href="../mantenimiento.php"><img src="../imagenes/inicio.png"/></a>INICIO
                <a title="importar" href="importar.php"><img src="../imagenes/importar.png"/></a>IMPORTAR
                <a title="exportar" href="exportar.php"><img src="../imagenes/exportar.png"/></a>EXPORTAR
				<a title="añadir registro" href="editar.php"><img src="../imagenes/anadir.png"/></a>A&Ntilde;ADIR
			
			</nav>
            <section>
					
<?php
				require'../DB/conexionDB.php';
				$insertadas=0;
			   try {

				$xml=simplexml_load_file("archivo.xml");
				
				if($xml===false){
					echo"error al cargar el fichero XML <br />";
				}else{
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
				echo"<p>"."numero de registros agregados: $insertadas"."</p>"."<br />";
				$consulta2 = "select * from Departamentos";
									//Ejecución de la consulta
									$resultado2 = $conexion->query($consulta2);
									//Número de registros que devuelve
									$numRegistros2 = $resultado2->rowCount();
									//recorrer resultados y fech avanza puntero
									echo"<table>";
												echo"<tr>";
												echo "<td>"."Codigo"."</td> ";
												echo "<td>"."Descripcion"."</td> ";
												echo"</tr>";
									 while ($registro2 = $resultado2->fetch(PDO::FETCH_OBJ)) {
												echo"<tr>";
												echo "<td>"."$registro2->codDepartamento"."</td> ";
												echo "<td>"."$registro2->descDepartamento"."</td> ";
												echo"</tr>";		 
									}
									echo"</table>";
				$conexion->commit();
			}
			
		   }catch(PDOException $ex){
			echo"error";
			echo $ex->getMessage();
			$conexion->rollBack();
		   }
		   exit();
		   unset($conexion);
?>
			</section>
            <footer></footer>
        </div>
    </body>
</html>
