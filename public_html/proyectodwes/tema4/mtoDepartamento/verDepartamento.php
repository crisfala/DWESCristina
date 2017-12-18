<!DOCTYPE html>

<html>
     <!--
	 autor:Cristina falagán
	 ultima modificación:23/11/2017
	 -->
<head>
    <title>ver codigo Departamento</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link rel="stylesheet" type="text/css" href="../../tema3/php.css">
</head>

<body>
    <div class="caja">
    <h2>Ver Libreria de Vlaidacion</h2>
    <?php
    show_source('libreriaValidacion/libreriaValidacion.php');
    ?>
    <br /><hr>
    <h2>Ver Configuracion de conexion</h2>
    <?php
    show_source('DB/conexionDB.php');
    ?>
    <br /><hr> 
    <h2>Ver Buscar</h2>
    <?php
    show_source('mantenimiento.php');
    ?>
    <br /><hr>
    <h2>Ver Añadir</h2>
    <?php
    show_source('conf/editar.php');
    ?>
    <br /><hr>
    <h2>Ver editar</h2>
    <?php
    show_source('conf/modificar.php');
    ?>
    <br /><hr>
    <h2>Ver borrar</h2>
    <?php
    show_source('conf/eliminar.php');
    ?>
    <br /><hr>
     <h2>Ver Importar</h2>
    <?php
    show_source('conf/importar.php');
    ?>
    <br /><hr>
     <h2>Ver Exportar</h2>
    <?php
    show_source('conf/exportar.php');
    ?>
    <hr>
    </div>
</body>
</html>
