<?php
session_start();
if (!isset ($_SESSION['username'])){
 die("es necasario identificarse!!<a href='login.php'></a>.<br />");                
}
if (isset ($_POST['volver'])){
header("Location:programa.php");                
}
?>
<html>
    <head>
       <link rel="icon" type="image/png" href="../corazon.png">
       <link rel="stylesheet" type="text/css" href="../css/estilo.css">
       <title>Programa</title>
    </head>
    <body>
     <div class="contenedor">
    <?php
    //bienvenida
 if(isset($_SESSION['username'])){
                  echo $_SESSION['username']." hola!!"."<br/>";
//que contiene cookie
                   echo'<h2>$_COOKIE contenido:</h2>';
                   if(isset($_COOKIE)){
                    foreach($_COOKIE as $clave =>$valor){
                    echo"{$clave}=>{$valor}".'<br/>';
                    }
                   }
// que contiene $_SESSION
                    echo'<h2>$_SESSION contenido:</h2>';
                    if(isset($_SESSION)){
                    foreach($_SESSION as $clave => $valor){
                     echo" {$clave} => {$valor} <br /> ";
                    }
                    }else{
                        echo"no existe sesión";
                    }

}
    ?>
    
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
     <input type="submit" value="volver" name="volver" />
    </form>
     </div>
    </body>
    
</html>