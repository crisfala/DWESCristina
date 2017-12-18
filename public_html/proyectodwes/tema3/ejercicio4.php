<?php
	echo"<h1>4.Mostrar en tu página index la fecha y hora actual en Oporto formateada en portugués.</h1>";
 	 date_default_timezone_set('Europe/Lisbon');
    $fecha=date("d-m-Y h:i:s");		//fecha formateada para la zona horaria de portugal.
    echo "<p>Mostrar fecha actual en Portugal: $fecha</p>";
?>