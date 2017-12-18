<!DOCTYPE html>
<html lang="es">
	<!--
	 autor:Cristina falagán
	 ultima modificación:21/11/2017
	 inicio:20//11/2017
	 -->
    <head>
        <title>Mantenimiento</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="css/estilos.css">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <h1>Aplicación de mantenimiento</h1>
        <div class="contenedor">
            <nav>
				<a title="Inicio" href="mantenimiento.php"><img src="imagenes/inicio.png"/></a>INICIO
                <a title="importar" href="conf/importar.php"><img src="imagenes/importar.png"/></a>IMPORTAR
                <a title="exportar" href="conf/exportar.php"><img src="imagenes/exportar.png"/></a>EXPORTAR
				<a title="a&ntilde;adir_registro" href="conf/editar.php"><img src="imagenes/anadir.png"/></a>AÑADIR
			</nav>
            <section>
				<?php
				require 'libreriaValidacion/libreriaValidacion.php';
				require'DB/conexionDB.php';
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
				?>
												<!--formulario-->
					 <form action="<?PHP echo $_SERVER['PHP_SELF']; ?>" method="post" name="formulario" id="formulario">
						 <label class="input" for="descDepartamento">Descripción: </label>
						<input type="text" name="descDepartamento"
						 <?php if(isset($_POST['descDepartamento']) && empty($errores['descDepartamento'])){ echo 'value="',$_POST['descDepartamento'],'"';}?>/>
						<input type="submit" name="enviar" value="buscar"/>
												<?php
												echo"<div class='errores'>";
												echo $errores['descDepartamento'];
												echo"</div>";
												?>
												
					 </form>
					 
					 
				<?php
						
						//si la variable entrada es false tiene que mostrar de nuevo el formulario
						if(!isset($_POST['enviar']) || $entrada==false){
							$consulta2 = "select * from Departamentos";
							//Ejecución de la consulta
							$resultado2 = $conexion->query($consulta2);
							//Número de registros que devuelve
							$numRegistros2 = $resultado2->rowCount();
							print "<p>" . "Registros Totales: $numRegistros2" . "</p>";
							//recorrer resultados y fech avanza puntero
						
							echo"<table>";
										echo"<tr>";
										echo "<td>"."Codigo"."</td> ";
										echo "<td>"."Descripción"."</td> ";
										echo"</tr>";
							 while ($registro2 = $resultado2->fetch(PDO::FETCH_OBJ)) {
										echo"<tr>";
										echo "<td>"."$registro2->codDepartamento"."</td> ";
										echo "<td>"."$registro2->descDepartamento"."</td> ";
										echo "<td>"."<a href='conf/modificar.php?codDepartamento=$registro2->codDepartamento'><img src='imagenes/editar.png'/></a>
										<a href='conf/eliminar.php?codDepartamento=$registro2->codDepartamento'><img src='imagenes/borrar.png'/></a>"."</td> ";
										echo"</tr>";		 
							}
							echo"</table>";
							
							//si los datos son correctos
						  }else{
							try{
								$conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION); 
								$consulta=$conexion->prepare("SELECT * FROM Departamentos WHERE descDepartamento LIKE
								CONCAT('%',\"" . $_POST['descDepartamento'] . "\",'%') ");
								$consulta->bindParam(':descDepartamento', $_POST['descDepartamento']);
								$consulta->execute(); 
							//recorrer resultados y fech avanza puntero
								echo"<table>";
									echo"<tr>";
									echo "<td>"."Codigo"."</td> ";
									echo "<td>"."Descripción"."</td> ";
									echo"</tr>";
								while ($registro = $consulta->fetch(PDO::FETCH_OBJ)) {
							
									echo"<tr>";
									echo "<td>$registro->codDepartamento</td> ";
									echo "<td>$registro->descDepartamento</td> ";
									echo"</tr>";
								}
								echo"</table>";
					
							
						// exception y cierra conexion
							}catch (PDOException $exception) {
									echo $exception->getMessage();
									unset($conexion); 
									}
    }
			?>
			
			</section>
			<br>
            <footer>Cristina Falagan Cuesta <a class="repo" href="https://github.com/crisfala/CristinaDAW2">Repositorio github</a>
		<a class="repo" href="http://daw-usgit.sauces.local/CFC_1718/DWES-Cristina/tree/master">Repositorio gitLab</a></footer>
        </div>
    </body>
</html>
