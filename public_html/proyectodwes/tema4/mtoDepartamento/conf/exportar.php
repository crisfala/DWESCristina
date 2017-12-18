<html>
	<!--
	 autor:Cristina falagán
	 ultima modificación:20/11/2017
	 -->
    <head>
        <title>Exportar</title>
		<meta content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="../css/estilo2.css">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body> 
		<h1>Exportar a XML</h1>
        <div class="contenedor">
            <nav>
				<a title="Inicio" href="../mantenimiento.php"><img src="../imagenes/inicio.png"/></a>INICIO
                <a title="importar" href="importar.php"><img src="../imagenes/importar.png"/></a>IMPORTAR
                <a title="exportar" href="exportar.php"><img src="../imagenes/exportar.png"/></a>EXPORTAR
				<a title="añadir registro" href="editar.php"><img src="../imagenes/anadir.png"/></a>A&Ntilde;ADIR
				
			</nav>
            <section>
				<form>
					<br>
					<label for="exportar" title="Exportar_XML">Guardar en formato XML:</label>
					<input type="submit" name="exportar" id="exportar" value="exportar">
					</form>	
				<?php
				require'../DB/conexionDB.php';
				$correcto=true;
				if (isset($_REQUEST['exportar'])) {//si se ha pulsado el botón de exportar archivo...
				$conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION); 
				$consulta = "select * from Departamentos"; //Consulta de todos los registros
				$resultado= $conexion->query($consulta); //Se almacena el resultado de la consulta
				//Cotenido del fichero XML
				$xml = new SimpleXMLElement("<?xml version='1.0' encoding='UTF-8'?>\n<departamentos>\n</departamentos>\n");//creación del XML y su nodo raiz
				while ($registro = $resultado->fetch(PDO::FETCH_OBJ)) {//Mientras haya resultados, se imprimen. FETCH avanza el puntero
					 $departamento = $xml->addChild('departamento' );//nuevo elemento hijo

					$departamento->addChild('codigo' , $registro->codDepartamento);//nuevo elemento hijo de departamento
					$departamento->addChild('descripcion ' , $registro->descDepartamento);//nuevo elemento hijo de departamento
				}
				 header('Content-type: text/xml');
				header('Content-Disposition: attachment; filename="departamentos.xml"');
				echo $xml->asXML();
				unset($conexion);
			}else{
				$correcto=false;
				unset($conexion);
			}
			?>
			</section>
            <footer></footer>
        </div>
    </body>
</html>