<?php
 echo "<h1>6. Operar con fechas: calcular la fecha y el día de la semana de dentro de 60 día</h1>";
    $fecha=date('d-m-y'); // fecha actual en variable
    $nuevafecha = strtotime ('+ 60 day' , strtotime ( $fecha)); // fecha actual + 60 dias
    $nuevafecha = date ( 'd-m-y' , $nuevafecha ); 
    echo "la fecha de hoy es ".$fecha." dentro de 60 dias sera ".$nuevafecha; 
?>