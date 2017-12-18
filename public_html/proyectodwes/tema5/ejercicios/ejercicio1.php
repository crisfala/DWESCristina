<!--si no se introduce bien la contraseña o usuario no se autentica el usuario.-->
<?php
if($_SERVER['PHP_AUTH_USER']!="cristina" && $_SERVER['PHP_AUTH_PW']!="paso"){  
     header('WWW-Authenticate: Basic realm="Hola"');
     header('HTTP/1.0 401 Unauthorized');
     exit;
    }
?>
<html>
<head>
    <title>ejercicio 1</title>
</head>

<body>
    <?php
    
    //si se introduce bien el usuario se inicia sesión
    if($_SERVER['PHP_AUTH_USER']=="cristina" && $_SERVER['PHP_AUTH_PW']=="paso"){  
        echo "<p>Hola {$_SERVER['PHP_AUTH_USER']}.</p>";
        echo "<p>Ha introduccido {$_SERVER['PHP_AUTH_PW']} como su contraseña.";
    }
    session_start();
    $_SESSION['usuario'] =$_SERVER['PHP_AUTH_USER'];
    //cookie que guarda el inicio de sesion
    //se muestra la fecha y la hora.
    setcookie("fecha_ultima_sesion",date("j,n,Y, g:i a"),time()+3600);
    //contenido de $_SERVER
    echo'<h2>$_SERVER</h2>';
    foreach($_SERVER as $clave =>$valor){
        echo"$clave=>$valor".'<br/>';
    }
    //contenido de $_COOKIE
    echo'<h2>$_COOKIE contenido:</h2>';
    if(isset($_COOKIE)){
    foreach($_COOKIE as $clave =>$valor){
        echo"{$clave}=>{$valor}".'<br/>';
    }
    }else{
        echo"no hay nada que mostrar";
    }
    //contenido de $_SESSION
    echo'<h2>$_SESSION contenido:</h2>';
    if(isset($_SESSION)){
    foreach($_SESSION as $clave => $valor){
     echo" {$clave} => {$valor} ";
    }
    }else{
        echo"no existe sesión";
    }
    
    

    
    
?>



</body>
</html>
