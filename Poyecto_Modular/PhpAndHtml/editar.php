<?php

require_once '../PhpAndHtml/config.php';
require_once '../PhpAndHtml/functions.php';
$conexion = connect($server, $port, $db, $user, $pass);
$id = $_GET['id'];

$consulta = "SELECT idmascota, nombre, color, genero, raza, especie, peso, edad, fecha FROM mascotas WHERE idmascota = '$id'";
$query = $conexion->prepare($consulta);
$query->execute();

$resultado = $query->fetchAll();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BasePet</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../estilos/estilos.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="icon" href="../imag/logo_basepet_2.png">
</head>
<body>
    <div class="main" action="actualizarReg.php" method="post">
    <h2 class="titulo">Mascotas</h2>
    <table class="default">      
        <tr>      
        <th>ID</th>      
        <th>Nombre</th>    
        <th>Color</th>
        <th>Género</th>
        <th>Raza</th>
        <th>Especie</th>
        <th>Peso en kg</th>
        <th>Edad</th>
        <th>Fecha de registro</th>      
        </tr>
        <?php foreach($resultado as $mascotas) : ?>
        <tr>
            <td ><?php echo $mascotas['idmascota']?></td>
            <td><input type="text" value="<?php echo $mascotas['nombre']?>" name="nombre" class="form-control" id="inputNombreM"></td>
            <td><input type="text" value="<?php echo $mascotas['color']?>" name="color" class="form-control" id="inputColor"></td>
            <td>
                <select class="form-select" name="genero" aria-label="Default select example" value="<?php echo $mascotas['genero']?>" class="form-select">
                    <option selected>Seleccione...</option>
                    <option value="1">HEMBRA</option>
                    <option value="2">MACHO</option>
                </select>
            </td>
            <td><input type="text" value="<?php echo $mascotas['raza']?>" name="raza"></td>
            <td>
                <select class="form-select" name="especie" aria-label="Default select example" value="<?php echo $mascotas['especie']?>" class="form-control" id="inputRaza">
                    <option selected>Seleccione...</option>
                    <option value="1">Conejo</option>
                    <option value="2">Cuyo</option>
                    <option value="3">Erizo</option>
                    <option value="4">Gato</option>
                    <option value="5">PERRO</option>
                    <option value="6">Reptil</option>
                    <option value="7">Uron</option>
                </select>
            </td>
            <td><input type="number" value="<?php echo $mascotas['peso']?>" name="peso" class="form-control" min="1" max="120" id="inputPeso"></td>
            <td><input type="number" value="<?php echo $mascotas['edad']?>" name="edad" class="form-control" min="1" max="20" id="inputEdadM"></td>
            <td><input type="date" value="<?php echo $mascotas['fecha']?>" name="fecha" class="form-control" id="inputFechaM"></td>
            <td class="especial"><a type="button" class="btn btn-outline-danger" href="actualizarReg.php?id=<?php echo $mascotas['idmascota']?>" class="table__item__link" >Actualizar</a></td>
            
        </tr>
        <?php endforeach;?>  
    </table>
    </div>   
    
    <script src="../scrip/eliminarRegis.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
    </script>

</body>