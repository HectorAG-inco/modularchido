<?php
require_once '../PhpAndHtml/config.php';
require_once '../PhpAndHtml/functions.php';
$conexion = connect($server, $port, $db, $user, $pass);
$id = $_GET['id'];

if(!isset($_POST['actualizar'])){
    ////// Informacion enviada por el formulario /////
    $nombre=$_POST['nombre'];
    $color=$_POST['color'];
    $genero=$_POST['genero'];
    $raza=$_POST['raza'];
    $especie=$_POST['especie'];
    $peso=$_POST['peso'];
    $edad=$_POST['edad'];
    $fecha = date('fecha');
    //// Fin informacion enviada por el formulario ///
    
    //////////// Actualizar la tabla /////////
    $actualizar = "UPDATE mascotas SET nombre='$nombre', color='$color', genero='$genero', raza='$raza', especie='$especie', peso='$peso', edad='$edad', fecha='$fecha' WHERE idmascota='$id'";
    $sql = $conexion->prepare($actualizar);
    
    $sql->execute();
    
    if($sql->rowCount() > 0){
        echo $nombre;
        $count = $sql -> rowCount();
        echo "<div class='content alert alert-primary' >
        Gracias: $count registro ha sido actualizado </div>";
        //header("Location: ../PhpAndHtml/index.php");
    }
    else{
        echo $nombre;
        echo "<div class='content alert alert-danger'> No se pudo actulizar el registro </div>";
        print_r($sql->errorInfo());
    }
}// Cierra envio
else {
    echo "<div class='content alert alert-danger'> COÑOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOO </div>";
}

?>