<?php
echo"<h3>16.Recorrer el array anterior utilizando funciones para obtener el mismo resultado.</h3>";
$sueldoSemanal = array(
      "lunes"=> 25,
      "martes"=>40,
      "miercoles"=>32,
      "jueves"=>30,
      "viernes"=>35,
      "sabado"=>45,
      "domingo"=>48
    );
    $totalSueldoSemanal = 0;
 
     while(key($sueldoSemanal)!== null){  //Esto se hara mientras la clave (la primera parte del array, es decir los dias de la semna) no sean null
        echo key($sueldoSemanal).":".current($sueldoSemanal)."<br>"; //key es la clave y current el valor, es decir key dia,current sueldo
        $totalSueldoSemanal += current($sueldoSemanal); 
        next($sueldoSemanal); 
                 
    }
    
    
    echo "Esta semana has cobrado $totalSueldoSemanal";
?>