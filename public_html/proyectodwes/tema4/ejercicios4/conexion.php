<?php
$host="192.168.20.19";
$user="DAW209";
$pw="paso";
$db="DAW209_DBDepartamento";
$conexion =new mysqli($host,$user,$pw,$db);
print $conexion->server_info;
echo"<br />";
if($conexion->connect_errno){
    echo "error de conexion".$conexion->connect_errno;
} else{
    echo "conectado";
}
?>