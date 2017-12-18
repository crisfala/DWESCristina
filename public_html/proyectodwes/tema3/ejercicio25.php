<!DOCTYPE html>

<html>
<head>
     <META http-equiv=Content-Type content="text/html; charset=UTF-8">
    <link rel="icon" type="image/ico"  href="imagenes/favicon.ico">
    <link rel="stylesheet" type="text/css" href="ejercicio20/formulario.css">
    <title>ejercicio 25</title>
</head>

<body>
<?php
//Autor: Cristina falagán
//Ultima modificación: 25/10/2017
require 'LibreriaValidacion.php';// Instrucción para importar la libreria de funciones.
$entradaOK=true;//Variable que controla si hay errores en el formulario. Si esta en 'true' la entrada es correcta.
$registro;// Array para guardar mensajes y errores:
$aEncuesta = array();//Array que contiene las respuestas de la encuesta.
//Inicialización del array que contiene las respuestas de la encuesta y los errores.
$con=0;
 $registro = array(
        'fecha'=>'',
        'temperatura'=>'',
        'presion'=>''
    );
 
 if(isset($_POST['Calcular_registro'])) {
          $registro['fecha']=validarFecha($_POST['fecha'],1);
          $registro['temperatura']=comprobarFloat($_POST['temperatura'],1);
          $registro['presion']=comprobarEntero($_POST['presion'],1);

foreach($registro as $valor){
            if($valor!=null){
                $entradaOK=false;
            }
        }

}
//Condición que controla que nunca se haya pulsado el boton enviar y la entrada no este en true.
if(!filter_has_var(INPUT_POST,'Calcular_registro')|| $entradaOK==false ){
?>

<form name="input" action="<?PHP echo $_SERVER['PHP_SELF']; ?>" method="post">


 <div class="contenedor">
               <!--Tipo fecha -->
<label>Fecha</label><br>
<input type="date" name="fecha" <?php if(isset($_POST['fecha']) && empty($mensajeError['fecha'])){ echo 'value="',$_POST['fecha'],'"';}?>/>
<span class="error"><?php echo $registro["fecha"];?></span>
<br /><br />
          <!-- Tipo numerico flotante-->
<label>Temperatura</label><br>
<input type="number" name="temperatura" step="0.01" min="30" max="50"<?php if(isset($_POST['temperatura']) && empty($mensajeError['temperatura'])){ echo 'value="',$_POST['temperatura'],'"';}?> />
<span class="error"><?php echo $registro["temperatura"];?></span>
<br /><br />
       <!-- Tipo numerico entero-->
<label>Presion:</label><br>
<input type="number" name="presion" min="950" max="1050"<?php if(isset($_POST['presion']) && empty($mensajeError['presion'])){ echo 'value="',$_POST['presion'],'"';}?> />
<span class="error"><?php echo $registro["presion"];?></span>
<br /><br />
 
  <!--      Botones para enviar el formulario y para limpiar los campos-->
        <input id="añadir_Registro" type="submit" value="Añadir_registro" name="Añadir_registro"/>
        <input id="enviar" type="submit" value="Calcular_registro" name="Calcular_registro"/>
 </form>

<?php
    //Y en caso de que no haya error y se haya pulsado el botón de enviar se muestra la información del formulario.
    }else{
        //Instruccion para rellenar los arrays con los datos que nos pasan en la encuesta.

            $aEncuesta = array(
                'fecha' => $_POST['fecha'],
                'temperatura' => $_POST['temperatura'],
                'presion' => $_POST['presion']
            );
            
 //Instruciones para mostrar los datos introducidos en el formulario.
        echo "<div>";

            echo "<h3>","Analisis de Resultado","</h3>", "<br>";
            echo "fecha: ",$aEncuesta['fecha'],"<br>";
            echo "temperatura: ",$aEncuesta['temperatura'],"<br>";
            echo "presion: ",$aEncuesta['presion'],"<br>";
     $maxtemp=0;
          if($aEncuesta['temperatura']>$maxtemp){
               $maxtemp=$aEncuesta['temperatura'];
          }
     $maxpresion=0;
          if($aEncuesta['presion']>$maxpresion){
               $maxpresion=$aEncuesta['presion'];
          }
          echo "temperatura maxima: ",$maxtemp,"<br>";
           echo "presion maxima: ",$maxpresion,"<br>";


        echo "</div>";
    }
    ?>
 </div>
</body>
</html>
