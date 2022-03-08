<?php

include('conexion.php');

$correo = $_POST["correo"];
$contra = $_POST["contra"];
$consulta = mysqli_query ($conexion, "SELECT * FROM empleados WHERE correo = '".$correo."' AND contra = '".$contra."'");

$nr = mysqli_num_rows($consulta);

if($nr == 1){
    header("Location: Index.html");
}else if($nr == 0){
    header("Location: log.html");
}

?>