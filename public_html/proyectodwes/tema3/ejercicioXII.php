<?php
echo "<h1>12.Mostrar el contenido de las variables superglobales (utilizando print_r() y foreach().</h1></br>";
    echo"<h2>post</h2>";
	foreach ($_POST as $p=>$po)
   		{
   		echo "El valor de $p es: $po"; //muestra todo lo que contiene la variable $_POST
   		}
        echo"</br>";
        echo"<h2>get</h2>";
    foreach ($_GET as $clave=>$valor)
   		{
   		echo "El valor de $clave es: $valor"; //muestra todo lo que contiene la variable $_GET
   		}
        echo"</br>";
        echo"<h2>server</h2>";
	foreach ($_SERVER as $clave=>$valor)
   		{
   		echo "El valor de $clave es: $valor"; //muestra todo lo que contiene la variable $_SERVER
   		}
        echo"</br>";
        echo"<h2>files</h2>";
   foreach ($_FILES as $clave=>$valor)
   		{
   		echo "El valor de $clave es: $valor"; //muestra todo lo que contiene la variable $_FILE
   		}
        echo"</br>";
        echo"<h2>cookie</h2>";
    foreach ($_COOKIE as $clave=>$valor)
   		{
   		echo "El valor de $clave es: $valor"; //muestra todo lo que contiene la variable $_COOKIE
   		}
        echo"</br>";
        echo"<h2>request</h2>";
    foreach ($_REQUEST as $clave=>$valor)
   		{
   		echo "El valor de $clave es: $valor"; //muestra todo lo que contiene la variable $_REQUEST
   		}
        echo"</br>";
        echo"<h2>env</h2>";
    foreach ($_ENV as $clave=>$valor)
   		{
   		echo "El valor de $clave es: $valor"; //muestra todo lo que contiene la variable $_ENV
   		}
        echo"</br>";
    echo"<h2>Globales con print_r</h2>"; 
        print_r($_COOKIE);
        print_r($_ENV);
        print_r($_FILES);
        print_r($_GET);
        print_r($_POST);
        print_r($_REQUEST);
        print_r($_SERVER);
        
	
?>