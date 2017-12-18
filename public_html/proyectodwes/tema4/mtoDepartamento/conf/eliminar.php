<!DOCTYPE html>
<html lang="es">
	<!--
	 autor:Cristina falagán
	 ultima modificación:23/11/2017
	 inicio:21//11/2017
	 -->
    <head>
        <title>eliminar</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="../css/estilo2.css">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body> 
		<h1>Eliminar departamento</h1>
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
				$codDepartamento=$_GET['codDepartamento'];
				
				if(isset($_POST['enviar'])){
					$conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
					//consulta para eliminar
					$consulta="DELETE FROM Departamentos WHERE codDepartamento = \"".$codDepartamento."\"";
					$resultado=$conexion->query($consulta);
					header('Location: ../mantenimiento.php');
				}
				$conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
				//se crea otra consulta.
				$consulta2="SELECT * FROM Departamentos WHERE codDepartamento = \"".$_GET['codDepartamento']."\"";
				$resultado2=$conexion->query($consulta2);
				
				while($departamento=$resultado2->FETCH(PDO::FETCH_OBJ)){
				?>
					<form name="formulario" action="<?php echo $_SERVER['PHP_SELF'].
					"?codDepartamento=".$codDepartamento; ?>" method="post">
					<p>borrado</p><br>
					<label>Codigo:</label><br>
					<input type="text" value="<?php echo $departamento->codDepartamento?>"
					readonly><br>
					<label>Descripcion:</label><br>
					<input type="text" value="<?php echo $departamento->descDepartamento?>"
					readonly><br><br>
					<button id="envio" type="submit" value="enviar" name="enviar">borrar</button>
					<button id="envio"  type="submit" value="cancelar" name="cancelar">cancelar</button>
		<?php		
				}
				if(isset($_POST['cancelar'])){
					header('Location:../mantenimiento.php');
				}
		?>
			</section>
            <footer></footer>
        </div>
    </body>
</html>
