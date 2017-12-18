<?php
echo "<h3>15.Crear e inicializar un array con el sueldo percibido de lunes a domingo. Recorrer el array para calcular el sueldo
percibido durante la semana. (Array asociativo con los nombres de los días de la semana)</h3></br>";

    $sueldoSemanal = array (
        "lunes"=> 25,
        "martes"=>40,
        "miercoles"=>32,        //guardas en un array el sueldo de los dias de la semana
        "jueves"=>30,
        "viernes"=>35,
        "sabado"=>45,
        "domingo"=>48
    );
    $sueldoTotal=0;
    foreach( $sueldoSemanal as $diasemana => $sueldo){
        echo"el sueldo del ".$diasemana." es ".$sueldo."</br>";
        $sueldoTotal=$sueldoTotal+$sueldo;  //suma todos los datos del array
    };
    echo"el sueldo total semanal es: $sueldoTotal";
?>