<?php
 echo"<h1>5.Inicializar y mostrar una variable que tiene una marca de tiempo (timestamp)</h1>";
 $tiempo=time();
  $fecha=date("d-m-Y h:i:s"); //como poner timestamp.Sale en un número entero.
    echo "<p>el timestamp de españa es: $tiempo que equivale a: $fecha</p>";
?>