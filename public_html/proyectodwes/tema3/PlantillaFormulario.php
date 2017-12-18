<html>
<head>
    <META http-equiv=Content-Type content="text/html; charset=UTF-8">
    <link rel="icon" type="image/ico"  href="imagenes/favicon.ico">
    <link rel="stylesheet" type="text/css" href="../css/ejercicios1-30.css">
</head>
<body>
<?php
//Autor: Sergio Marqués Martín
//Ultima modificación: 23/10/2017
require 'LibreriaValidacion.php';// Instrucción para importar la libreria de funciones.
$entradaOK=true;//Variable que controla si hay errores en el formulario. Si esta en 'true' la entrada es correcta.
$aErrores;// Array para guardar mensajes y errores:
$aEncuesta = array();//Array que contiene las respuestas de la encuesta.
//Inicialización del array que contiene las respuestas de la encuesta y los errores.

   
    $aErrores = array(
        'alfabetico'=>'',
        'fecha'=>'',
        'radio'=>'',
        'numerico'=>'',
        'numericof'=>'',
        'select'=>'',
        'checkbox'=>'',
    );


// Condición para ver si se ha pulsado el botón de enviar.
if(isset($_POST['Enviar'])) {


        // Usamos las funciones de validación y guardamos el resultado en el array $aErrores
        // si hay algun campo erroneo entonces asigna al error null.

        $aErrores['alfabetico']=comprobarTexto($_POST['alfabetico'],40,3,1);
        $aErrores['fecha']=validarFecha($_POST['fecha'],1);
        $aErrores['numerico']=comprobarEntero($_POST['numerico'],1);

    //Bucle que recorre el array de errores para comprobar si hay alguno que tiene el valor null.
    //Si encuentra un error en null entonces cambia el valor de $entradaOK a false.
    foreach($aErrores as $valor){
            if($valor!=null){
                $entradaOK=false;
            }
        }

}
//Condición que controla que nunca se haya pulsado el boton enviar y la entrada no este en true.
if(!filter_has_var(INPUT_POST,'Enviar')|| $entradaOK==false ){
?>
<!--    Estructura del formulario.-->
<form name="input" action="<?PHP echo $_SERVER['PHP_SELF']; ?>" method="post">


            <div id="primeraEncuesta">
                <!--        Tipo alfabetico -->
                Alfabetico:<br>
                <input type="text" name="alfabetico" <?php if(isset($_POST['alfabetico']) && empty($mensajeError['alfabetico'])){ echo 'value="',$_POST['alfabetico'],'"';}?>/>
                <span class="error"><?php echo $aErrores["alfabetico"];?></span><hr>

                <!--        Tipo fecha -->
                Date<br>
                <input type="date" name="fecha" <?php if(isset($_POST['fecha']) && empty($mensajeError['fecha'])){ echo 'value="',$_POST['fecha'],'"';}?>/>
                <span class="error"><?php echo $aErrores["fecha"];?></span><hr>

                <!--        Tipo radio button -->
                Radio:<br>
                Si<input type="radio" name="radio" value="si" <?php if(!isset($_POST['radio'])){ echo "checked";}?>
                    <?php if(isset($_POST['radio']) && $_POST['radio']=="si" ){ echo "checked";}?>>
                No<input type="radio" name="radio" value="no" <?php if(isset($_POST['radio']) && $_POST['radio']=="no" ){ echo "checked";}?>> <br>
                <hr>

                <!--        Tipo numerico entero-->
                Numerico entero:<br>
                <input type="number" name="numerico" min="20" max="250"<?php if(isset($_POST['numerico']) && empty($mensajeError['numerico'])){ echo 'value="',$_POST['numerico'],'"';}?> />
                <span class="error"><?php echo $aErrores["numerico"];?></span><hr>

                <!--        Tipo numerico flotante-->
                Numerico flotante:<br>
                <input type="number" name="numericof" step="0.01" min="20" max="250"<?php if(isset($_POST['numericof']) && empty($mensajeError['numericof'])){ echo 'value="',$_POST['numericof'],'"';}?> />
                <span class="error"><?php echo $aErrores["numericof"];?></span><hr>

                <!--        Tipo select -->
                Tipo Select:
                <select name="select" required >
                    <option value="Opcion 1">Opción 1</option>
                    <option value="Opcion 2">Opción 2</option>
                    <option value="Opcion 3">Opción 3</option>
                </select><hr>

                <!--        Tipo checkbox -->
                Tipo checkbox:
                Opcion 1
                <input type="checkbox" name="checkbox[]" value="Opcion1" checked/>
                Opcion 2
                <input type="checkbox" name="checkbox[]" value="Opcion 2"  />
                Opcion 3
                <input type="checkbox" name="checkbox[]" value="Opcion 3"  />

            </div>


        <!--      Botones para enviar el formulario y para limpiar los campos-->
        <input id="enviar" type="submit" value="Enviar" name="Enviar"/>
        <input id="reset" type="reset" value="Limpiar campos"/>

    </form>
    <!--        Fin de la estructura del formulario.-->
    <?php
    //Y en caso de que no haya error y se haya pulsado el botón de enviar se muestra la información del formulario.
    }else{
        //Instruccion para rellenar los arrays con los datos que nos pasan en la encuesta.

            $aEncuesta = array(

                'alfabetico' => $_POST['alfabetico'],
                'fecha' => $_POST['fecha'],
                'radio' => $_POST['radio'],
                'numerico' => $_POST['numerico'],
                'numericof' => $_POST['numericof'],
                'select'=>$_POST['select'],
                'checkbox'=>$_POST['checkbox'],
            );


        //Instruciones para mostrar los datos introducidos en el formulario.
        echo "<div>";

            echo "<h3>","Persona","</h3>", "<br>";
            echo "Tipo alfabetico: ",$aEncuesta['alfabetico'],"<br>";
            echo "Tipo fecha: ",$aEncuesta['fecha'],"<br>";
            echo "Tipo radio: ",$aEncuesta['radio'],"<br>";
            echo "Tipo numerico entero: ",$aEncuesta['numerico'],"<br>";
            echo "Tipo numerico flotante: ",$aEncuesta['numericof'],"<br>";
            echo "Tipo select: ",$aEncuesta['select']."<br/>";
            echo "Tipo checkbox: ";
            if(count($aEncuesta['checkbox'])!=0) {
                foreach ($aEncuesta['checkbox'] as $valor) {
                    echo("$valor<br />");
                }
            }else{
                echo "No has seleccionado nada";
            }


        echo "</div>";
    }
    ?>
</body>
</html>