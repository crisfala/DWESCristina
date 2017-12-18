<?php
   echo"<h1>1.Inicializar variables de los distintos tipos de datos básicos y mostrar los datos por pantalla</h1>";
   $entero=5;//gettype muestra el tipo de la variable en este caso es un entero.
   $decimal=1.5;//cuando pones el simbolo $llamas a la variable con el nombre respectivo.
   $texto="Hola soy cris";//al poner .'$entero'. muestra el nombre de la varible
   $booleano=true;
   echo "<p>Muestro las variables asignadas a ".'$entero'." que es de tipo ".gettype($entero)." : $entero</p>";
   echo "<p>Muestro las variables asignadas a ".'$decimal'." que es de tipo ".gettype($decimal)." : $decimal</p>";
   echo "<p>Muestro las variables asignadas a ".'$texto'." que es de tipo ".gettype($texto)." : $entero</p>";
   echo "<p>Muestro las variables asignadas a ".'$booleano'." que es de tipo ".gettype($booleano)." : $entero</p>";

   
?>