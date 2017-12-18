<!DOCTYPE html>
<html lang="es">
    <head>
		<!--
		autor:Cristina falagán
		ultima modificación:22/11/2017
		-->
        <title>a&ntilde;adir</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="../css/estilo2.css">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body> 
		<h1>A&ntilde;adir departamento</h1>
        <div class="contenedor">
            <nav>
				<a title="Inicio" href="../mantenimiento.php"><img src="../imagenes/inicio.png"/></a>INICIO
                <a title="importar" href="importar.php"><img src="../imagenes/importar.png"/></a>IMPORTAR
                <a title="exportar" href="exportar.php"><img src="../imagenes/exportar.png"/></a>EXPORTAR
				<a title="a&ntilde;adir registro" href="editar.php"><img src="../imagenes/anadir.png"/></a>A&Ntilde;ADIR
			</nav>
            <section>
				<?php
				require '../libreriaValidacion/libreriaValidacion.php';
				require'../DB/conexionDB.php';
				$errores=array();//guarda errores.
				$entrada=true;//que los datos esten bien intruducidos.

				//inicio de array errores.
				$errores=array(
				'codDepartamento'=>'',
				'descDepartamento'=>''
				);
					//si pulsas el boton cancelar vuelve a la portada
					if(isset($_POST['cancelar'])) {
					 header('Location: ../mantenimiento.php');
					} 
			
					//condicion que indica que se pulsa el boton enviar
					if(isset($_POST['enviar'])){
						if(($errores['codDepartamento']=comprobarTexto($_POST['codDepartamento'],3,3,1))==null)
							{
							$conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
							$consulta1 = $conexion->query("SELECT * FROM Departamentos WHERE codDepartamento = \"".$_POST['codDepartamento']."\"");
							$resul = $consulta1->fetchColumn(0);
								if ($resul) {
									$errores['codDepartamento']="Este codigo ya existe";
									}
							}
					$errores['descDepartamento']=comprobarTexto($_POST['descDepartamento'],250,1,1);
				
					//recorrer array errores
						foreach($errores as $valor){
							if($valor!=null){
							$entrada=false;
							}
						}
					}
			
				//si no se pulsa enviar o los datos no son correctos
				if(!isset($_POST['enviar']) || $entrada==false){ 
					?>
					<div class="contenedor">
					<form action="<?PHP echo $_SERVER['PHP_SELF']; ?>" method="post" name="formulario" id="formulario">
					<label for="codDepartamento">Codigo Departamento: </label>
					<input type="text" name="codDepartamento"
					<?php if(isset($_POST['codDepartamento']) && empty($Errores['codDepartamento'])){ echo 'value="',$_POST['codDepartamento'],'"';}?>/>
					                           <?php
												echo"<div class='errores'>";
												echo $errores['codDepartamento'];
												echo"</div>";
												?>
					<br><br>
					 <label for="descDepartamento">Descripcion Departamento: </label>
					<input type="text" name="descDepartamento"
					 <?php if(isset($_POST['descDepartamento']) && empty($Errores['descDepartamento'])){ echo 'value="',$_POST['descDepartamento'],'"';}?>/>
				                               <?php
												echo"<div class='errores'>";
												echo $errores['descDepartamento'];
												echo"</div>";
												?>
					<br>
					<input id="envio" type="submit" name="enviar" value="a&ntilde;adir"/>
					<input id="envio" type="submit" name="cancelar" value="cancelar"/>
				 </form>
					<?php
					//si los datos son correctos
				}else{
					try{
							
						$conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
						//consulta
						$consulta="INSERT INTO Departamentos(codDepartamento,descDepartamento)
						VALUES (\"".$_POST['codDepartamento']."\",\"".$_POST['descDepartamento']."\")";
						$registros=$conexion->exec($consulta);
						//exec() devuelve el numero de filas afectada si es 1 se ha insertado con exito
						if($registros==1){
						   echo"<p>" ."los registros han sido insetados con exito."."</p>" ."<br />";
						   
								$consulta2 = "select * from Departamentos";
								//Ejecucion de la consulta
								$resultado2 = $conexion->query($consulta2);
								//Numero de registros que devuelve
								$numRegistros2 = $resultado2->rowCount();
								print "<p>" . "Registros Totales: $numRegistros2" . "</p>";
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
						}	
						
						unset($conexion);
						//si hay error en la conexion salta una excepcion
						}catch(PDOException $excepcion){
							echo $excepcion->getMessage();
							unset($conexion);
							}
						
						
						 }
							
			?>
			</section>
            <footer></footer>
        </div>
    </body>
</html>
