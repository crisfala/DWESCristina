<!DOCTYPE html>

<html>
<head>
    <title>ejercicio 0</title>
</head>

<body>
<?php
echo'<h2>$_SERVER contenido</h2>';
    foreach($_SERVER as $clave =>$valor){
        echo"$clave=>$valor".'<br/>';
    }
    echo'<h2>$_SESSION contenido</h2>';
    
    if(isset($_SESSION)){
    foreach($_SESSION as $clave =>$valor){
     echo" $clave Valor: $valor.'<br>'";
    }
    }else{
        echo"no existe sesión";
    }
    
    echo'<h2>$_COOKIE contenido</h2>';
    
    if(isset($_COOKIE)){
    foreach($_COOKIE as $clave =>$valor){
        echo"{$clave}=>{$valor}".'<br/>';
    }
    }else{
        echo"no hay nada que mostrar";
    }
    echo'<h2>phpinfo() contenido</h2>';
    phpinfo();
    
    
?>


</body>
</html>
