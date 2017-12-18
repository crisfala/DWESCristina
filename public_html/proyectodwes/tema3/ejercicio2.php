<?php
echo"<h1>2.Inicializar y mostrar una variable heredoc.</h1>";
$cadena = <<< CAD
 ejemplo de mi cadena de texto con heredoc.
CAD;
 echo $cadena;  // utilizacion de heredoc
?>