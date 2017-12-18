<!DOCTYPE html>
<html lang="es">
    <head>
        <title>editar</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <link rel="stylesheet" type="text/css" href="../css/estilo2.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body> 
        <h1>editar departamento</h1>
        <div class="contenedor">
            <nav>
                <a class="nav" title="Inicio" href="../mantenimiento.php"><img src="../imagenes/inicio.png"/></a>INICIO
                <a class="nav" title="importar" href="importar.php"><img src="../imagenes/importar.png"/></a>IMPORTAR
                <a class="nav" title="exportar" href="exportar.php"><img src="../imagenes/exportar.png"/></a>EXPORTAR
                <a class="nav" title="a&ntilde;adir registro" href="editar.php"><img src="../imagenes/anadir.png"/></a>A&Ntilde;ADIR
                <a class="nav" title="borrar" href="eliminar.php"><img src="../imagenes/borrar.png"/></a>BORRAR
            </nav>
            <section>
                <?php
                require '../libreriaValidacion/libreriaValidacion.php';
                require'../DB/conexionDB.php';
                //array que recoge los errores.
                $errores = array(
                    'codDepartamento' => '',
                    'descDepartamento' => ''
                );
                //variable para comprobar
                $entrada = false;
                try {

                    $codDepartamento = $_GET['codDepartamento'];

                    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $consultaBusqueda = "SELECT * FROM Departamentos WHERE codDepartamento = :codDepartamento";
                    $sentencia = $conexion->prepare($consultaBusqueda);
                    $sentencia->bindParam(':codDepartamento', $codDepartamento);
                    $resultado = $sentencia->execute();

                    if ($sentencia->rowCount() == 1) {
                        $departamento = $sentencia->fetch(PDO::FETCH_OBJ);
                        ?>

                        <form name="formulario" action="<?php echo $_SERVER['PHP_SELF'] .
                        "?codDepartamento=" . $codDepartamento;?>" method="post">
                            <label for="codDepartamento">Codigo Departamento: </label>
                            <input type="text" name="codDepartamento" value="<?php echo $departamento->codDepartamento; ?>" readonly />

                            <br><br>
                            <label for="descDepartamento">Descripcion Departamento: </label>
                            <input type="text" name="descDepartamento" value="<?php echo $departamento->descDepartamento; ?>"/>

                            <br>
                            <button id="envio" type="submit" name="enviar" value="enviar">editar</button>
                            <button id="envio"  type="submit" value="cancelar" name="cancelar">cancelar</button>

                        </form>		 

                        <?php
                        if (isset($_POST['enviar'])) {
                            $departamento->descDepartamento = $_POST['descDepartamento'];
                            $error = false;
                            if (!$error) {
                                $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                $consultaActualizar = "UPDATE Departamentos SET descDepartamento = :descDepartamento WHERE codDepartamento = :codDepartamento";
                                $sentencia2 = $conexion->prepare($consultaActualizar);
                                $sentencia2->bindParam(':codDepartamento', $departamento->codDepartamento);
                                $sentencia2->bindParam(':descDepartamento', $departamento->descDepartamento);
                                if ($sentencia2->execute()) {
                                    header("Location:../mantenimiento.php");
                                } else {
                                    echo "error,registro no actualizado";
                                }
                            }
                        }
                        if (isset($_POST['cancelar'])) {
                            header("Location:../mantenimiento.php");
                        }
                    }
                } catch (PDOException $Pdoe) {

                    unset($conexion);
                }
                ?>

            </section>
            <footer></footer>
        </div>
    </body>
</html>