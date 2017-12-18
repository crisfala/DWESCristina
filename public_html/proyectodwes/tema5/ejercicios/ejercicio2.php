<!--si no se introduce bien la contraseña o usuario no se autentica el usuario.-->
<?php
if(!isset($_SERVER['PHP_AUTH_USER'])){
   header('WWW-Authenticate: Basic realm="cristina"');
   header('HTTP/1.0 401 Unauthorized');
          echo"error, datos incorrectos";
          exit;
}else{
 //conexion a la base de datos 
     require 'conBD.php';
 try{
     $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $consulta = "Select * from Usuarios WHERE codUsuario='" . $_SERVER['PHP_AUTH_USER'] . "' and password= SHA2('".$_SERVER['PHP_AUTH_PW']."',256)";
 //si el usuario no existe:
     if($conexion->query($consulta)->rowCount()==0){
          header('WWW-Authenticate: Basic realm="cristina"');
          header('HTTP/1.0 401 Unauthorized');
          exit;
     }
     unset($conexion);
}catch (PDOException $ex){
     echo($ex->getMessage());
     unset($conexion);
}
}
//inicio de sesión
    session_start();
      $_SESSION['usuario'] =$_SERVER['PHP_AUTH_USER'];
      $_SESSION['usuario']=$_COOKIE['fecha_conexion'];
 //se muestra la fecha y la hora.
    setcookie("fecha_conexion",date("j,n,Y, g:i a"),time()+3600);
//contenido de $_SERVER
    echo'<h2>$_SERVER</h2>';
    foreach($_SERVER as $clave =>$valor){
        echo"$clave=>$valor".'<br/>';
    }
 //contenido de $_COOKIE
    echo'<h2>$_COOKIE contenido:</h2>';
    if(isset($_COOKIE['fecha_conexion'])){
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

