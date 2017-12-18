   <?php
          $entrada=true;
          if(isset($_REQUEST['enviar'])){
            try{
              $info = "mysql:host=192.168.20.18;dbname=DAW209_DBUsuarios";
              $conexion = new PDO($info, 'DAW209', 'paso');
              $conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $ex){
                echo"error de conexión";
                unset($conexion);
            }  
              $usuario=trim($_REQUEST['usuario']);
              $hash=hash('sha256',$_REQUEST['pass']);
              $consulta="select codUsuario from Usuarios where codUsuario='$usuario' AND password='$hash'";
              $resultado=$conexion->query($consulta);
              $numRegistros=$resultado->rowCount();
              if ($numRegistros !=0) {
                  session_start();
                  $_SESSION['username']=$usuario; 
                   //hora del ultimo login
                       $_COOKIE['fecha_conexion'];
                        //se muestra la fecha y la hora.
                        setcookie("fecha_conexion",date("j,n,Y, g:i a"),time()+3600);
                        header("Location:programa.php");
                    $_SESSION['fecha_ultima_conexion']= $_COOKIE['fecha_conexion'];
                  
                  
          }else{
            header("Location:login.php"); 
              $entrada=false;
          }
          }
          if($entrada){      
        ?>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="icon" type="image/png" href="../corazon.png">
        <title>login</title>
        <link rel="stylesheet" type="text/css" href="../css/estilo.css">
        
    </head>
    <body>
        <div class="contenedor">
                <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
                    <p><label>Usuario:</label>
                    <input type="text" name="usuario" id="usuario"/></p>
                    <p><label>Contraseña:</label>
                    <input type="password" name="pass" id="pass"/></p>
             
                    <button type="submit" name="enviar" value="enviar">Enviar</button>
                </form>
                
            </div>
            <?php
          }
          ?>
        </div>
        <span>Arbol de navegación</span><br />
        <img src="../imagenes/arbolNav.JPG" />
         <span>Almacenamiento</span><br />
        <img src="../imagenes/almacenamiento.jpg" />
         <span>estructura</span><br />
        <img src="../imagenes/estructura.jpg" />
        <footer>
	 <a class="repo" href="../../../index.html">Cristina Falagan Cuesta</a>
	 <a class="repo" href="https://github.com/crisfala/CristinaDAW2">Repositorio github</a>
	 <a class="repo" href="http://daw-usgit.sauces.local/CFC_1718/DWES-Cristina/tree/master">Repositorio gitLab</a>
	</footer>
      
    </body>
    
</html>


