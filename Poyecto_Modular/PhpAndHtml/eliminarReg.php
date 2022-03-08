<?php
require_once '../PhpAndHtml/config.php';
require_once '../PhpAndHtml/functions.php';
$conexion = connect($server, $port, $db, $user, $pass);
$id = $_GET['id'];
if(!isset($_POST['eliminar'])){
////////////// Elimianr registro de la tabla /////////
    $consulta = "DELETE FROM mascotas WHERE idmascota = '$id'";
    $sql = $conexion->prepare($consulta);
    // $sql->bindParam('id', $id, PDO::PARAM_INT);
    // $id=trim($_POST['id']);
    $sql->execute();

    if($sql->rowCount() > 0){
        $count = $sql -> rowCount();
        echo "<div class='content alert alert-primary' > 

        Gracias: $count registro ha sido eliminado  </div>";
        
        header("Location: ../PhpAndHtml/index.php");
    }
    else{
        echo "<div class='content alert alert-danger'> No se pudo eliminar el registro  </div>";

        print_r($sql->errorInfo()); 
    }
}// Cierra envio de guardado -->
?>
