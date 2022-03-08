<?php

require_once '../PhpAndHtml/config.php';
    require_once '../PhpAndHtml/functions.php';
    $conexion = connect($server, $port, $db, $user, $pass);

	if(!$conexion){
        header('Location: ../PhpAndHtml/citas.php');
    }

    if($_SERVER['REQUEST_METHOD'] == 'POST'){

            $state = $conexion->prepare('INSERT INTO empleados (nombre, apellido1, apellido2, correo, contra) VALUES (:nombre, :apellido1, :apellido2, :correo, :contra);');

            $state->execute(array(
                ':nombre'=> $_POST['nombreU'],
                ':apellido1'=> $_POST['apellido1U'],
                ':apellido2'=> $_POST['apellido2U'],
                ':correo'=> $_POST['correoU'],
                ':contra'=> $_POST['contraU']
                
            ));

            $msg = "Usuario registrado correctamente";
        
    }else{
        $error = "No se pudo hacer el registro";
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="../estilos/registro.css">
	<link rel="icon" href="../imag/logo_basepet_2.png">
	<title>Registrate</title>
</head>
<body>

	<div class="modal-dialog sombra">
		<div class="modal-content">
			<div class="modal-body">

	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST" enctype="multipart/form-data">
		<div class="col-12">
			<label for="inputNombre" class="form-label">Nombre</label>
			<input type="text" name="nombreU" class="form-control" id="inputNombreE" >
		  </div>
		  <div class="col-12">
			<label for="inputApellido1" class="form-label">Apellido paterno</label>
			<input type="text" name="apellido1U" class="form-control" id="inputApellido1E" >
		  </div>
		  <div class="col-12">
			<label for="inputApellido2" class="form-label">Apellido materno</label>
			<input type="text" name="apellido2U" class="form-control" id="inputApellido2E" >
		  </div>
		<div class="row mb-3 separar">
		  <label for="inputEmail3" class="col-sm-2 col-form-label">Correo</label>
		  <div class="col-sm-10">
			<input type="email" name="correoU" class="form-control" id="inputEmail3">
		  </div>
		</div>
		<div class="row mb-3">
		  <label for="inputPassword3" class="col-sm-2 col-form-label">Contraseña</label>
		  <div class="col-sm-10">
			<input type="password" name="contraU" class="form-control" id="inputPassword3">
		  </div>
		</div>
		<div class="row mb-3">
		  <div class="col-sm-10 offset-sm-2">
			<div class="form-check">
			  <input class="form-check-input" type="checkbox" id="gridCheck1">
			  <label class="form-check-label" for="gridCheck1">
				Recordar contraseña
			  </label>
			</div>
		  </div>
		</div>
		<div class="modal-footer">
			
			<a href="../PhpAndHtml/log.php" class="btn btn-secondary" >Atrás</a>
			<input type="submit" value="Registrar"  name="boton" id="boton" class="btn btn-primary">
		</div>
	  </form>
	</div>
	</div>
</div>

	
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
	
</body>
</html>