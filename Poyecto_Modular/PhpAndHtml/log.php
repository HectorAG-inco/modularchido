<?php

	session_start();
    require_once '../PhpAndHtml/config.php';
    require_once '../PhpAndHtml/functions.php';
    $conexion = connect($server, $port, $db, $user, $pass);

	if (isset($_SESSION['correo'])) {
	  header('Location: ../PhpAndHtml/log.php');
	}

	if (!empty($_POST['correo']) && !empty($_POST['contra'])) {
	  $records = $conexion->prepare("SELECT idempleado, correo, contra FROM empleados WHERE correo = :correo  AND contra = :contra");
	  $records->bindParam(':correo', $_POST['correo']);
	  $records->execute(array(
		  ':correo'=> $_POST['correo'],
		  ':contra'=> $_POST['contra']
		  
	  ));
	  $results = $records->fetchAll();
  
	  if (count($results) > 0 ) {
		$_SESSION['correo'] = $results['correo'];
		header("Location: ../PhpAndHtml/index.php");
	  } else {
		$message = 'Sorry, those credentials do not match';
	  }
	}
    
?>

<!DOCTYPE html>
<html>
    
<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>BasePet</title>
    <meta charset="UTF-8">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link rel="stylesheet" href="../estilos/log.css" >
  	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="icon" href="../imag/logo_basepet_2.png">

</head>

<body>
	<div class="container h-100">
		<div class="d-flex justify-content-center h-100">
			<div class="user_card">
				<div class="d-flex justify-content-center">
					<div class="brand_logo_container">
						<img src="../imag/logo_basepet_2.png" class="brand_logo" alt="Logo">
					</div>
				</div>
				<div class="d-flex justify-content-center form_container">
					<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">
						<div class="input-group mb-3">
							<div class="input-group-append">
                <div class="input-group-text">
                  <span class="material-icons" >
                  account_circle
                  </span>
                </div>
								
							</div>
							<input type="email" name="correo" class="form-control input_user" placeholder="correo">
						</div>
						<div class="input-group mb-2">
							<div class="input-group-append">
                <div class="input-group-text">
                  <span class="material-icons" >
                    vpn_key
                  </span>
                </div>
								
							</div>
							<input type="password" name="contra" class="form-control input_pass" placeholder="contraseña">
						</div>
						<div class="form-group">
							<div class="custom-control custom-checkbox">
								<input type="checkbox" class="custom-control-input" id="customControlInline">
								<label class="custom-control-label" for="customControlInline">Recordar contaseña</label>
							</div>
						</div>
							<div class="d-flex justify-content-center mt-3 login_container">
				 	<button type="submit" name="button" class="btn login_btn">Entrar</button>
				   </div>
					</form>
				</div>
		
				<div class="mt-4">
					<div class="d-flex justify-content-center links">
						No tienes cuenta? <a href="../PhpAndHtml/registro.php" class="ml-2">Registrate</a>
					</div>
					<div class="d-flex justify-content-center links">
						<a href="#">Olvidaste tu contraseña?</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
