<?php
// session_start();
// require_once '../PhpAndHtml/config.php';
// require_once '../PhpAndHtml/functions.php';
// $conexion = connect($server, $port, $db, $user, $pass);
// $usuario = $_SESSION['user_id'];
// if(!isset($usuario)){
//   header('Location: ../PhpAndHtml/log.php');
// }
?>

<?php
    require_once '../PhpAndHtml/config.php';
    require_once '../PhpAndHtml/functions.php';
    $conexion = connect($server, $port, $db, $user, $pass);

    if(!$conexion){
        header('Location: ../PhpAndHtml/citas.php');
    }

    if($_SERVER['REQUEST_METHOD'] == 'POST'){

            $state = $conexion->prepare('INSERT INTO mascotas (nombre, color, genero, raza, especie, peso, edad, fecha) VALUES (:nombre, :color, :genero, :raza, :especie, :peso, :edad, :fecha);');

            $state->execute(array(
                ':nombre'=> $_POST['nombre'],
                ':color'=> $_POST['color'],
                ':genero'=> $_POST['genero'],
                ':raza'=> $_POST['raza'],
                ':especie'=> $_POST['especie'],
                ':peso'=> $_POST['peso'],
                ':edad'=> $_POST['edad'],
                ':fecha'=> $_POST['fecha']
                
            ));

            $msg = "Articulo creado con éxito";
        
    }else{
        $error = "No se pudo establecer conexión con la base de datos";
    }
?>

<!DOCTYPE html>
<html>
<head>
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
  
<nav class="navbar navbar-expand-lg navbar-light bg-light justify-content-first">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
      <img src="../imag/logo_basepet_2.png" alt="" width="40" height="40" class="d-inline-block align-text-top">
      BasePet
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

      <ul class="navbar-nav space-buttons">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Menú
          </a>
          <ul class=" dropdown-menu " aria-labelledby="navbarDarkDropdownMenuLink">
            <li><a class="dropdown-item" href="../PhpAndHtml/Alimentacion.php">Alimentos</a></li>
            <li><a class="dropdown-item" href="../PhpAndHtml/cirugia.php">Cirugía</a></li>
            <li><a class="dropdown-item" href="../PhpAndHtml/citas.php">Citas</a></li>
            <li><a class="dropdown-item" href="../PhpAndHtml/index.php">Mascotas</a></li>
            <li><a class="dropdown-item" href="../PhpAndHtml/estudios.php">Estudios</a></li>
            <li><a class="dropdown-item" href="../PhpAndHtml/hospitalizacion.php">Hospitalización</a></li>
            <li><a class="dropdown-item" href="../PhpAndHtml/Radiografia.php">Radiografías</a></li>
            <li><a class="dropdown-item" href="../PhpAndHtml/vacunas.php">Vacunas</a></li>            
          </ul>
        </li>
      </ul>
    <!-- <div class="collapse navbar-collapse space-buttons" id="navbarSupportedContent">
      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Modalusuario">
        <span class="material-icons">
          person_add_alt_1
        </span>
      </button> -->
      <div class="collapse navbar-collapse space-buttons" id="navbarSupportedContent">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Modalmascota">
          <span class="material-icons">
            pets
            </span>
        </button>
        <!-- Modal mascota-->
      <div class="modal fade" id="Modalmascota" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Registrar mascota </h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form class="row g-3" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST" enctype="multipart/form-data">
                <div class="col-12">
                  <label for="inputNombre" class="form-label">Nombre</label>
                  <input type="text" name="nombre" class="form-control" id="inputNombreM" placeholder="Max">
                </div>
                <div class="col-12">
                  <label for="inputColor" class="form-label">Color</label>
                  <input type="text" name="color" class="form-control" id="inputColor" placeholder="Negro">
                </div>
                <div class="col-md-6">
                  <label for="inputRaza" class="form-label">Raza</label>
                  <input type="text" name="raza" class="form-control" id="inputRaza" placeholder="Labradoodle">
                </div>
                <div class="col-md-6">
                  <label class="form-label">Género</label>
                  <select class="form-select" name="genero" aria-label="Default select example">
                    <option selected>Seleccione...</option>
                    <option value="1">Hembra</option>
                    <option value="2">MACHO</option>
                  </select>
                </div>
                <div class="col-12">
                  <label class="form-label">Especie</label>
                  <select class="form-select" name="especie" aria-label="Default select example">
                    <option selected>Seleccione...</option>
                    <option value="1">Conejo</option>
                    <option value="2">Cuyo</option>
                    <option value="3">Erizo</option>
                    <option value="4">Gato</option>
                    <option value="5">PERRO</option>
                    <option value="6">Reptil</option>
                    <option value="7">Uron</option>
                    <option value="8">Otro</option>
                  </select>
                </div>
                <div class="col-md-6">
                  <label for="inputPeso" class="form-label">Peso en Kg</label>
                  <input type="number" name="peso" class="form-control" min="1" max="120" id="inputPeso" placeholder="20.5">
                </div>
                <div class="col-md-6">
                  <label for="inputEdadM" class="form-label">Edad en años</label>
                  <input type="number" name="edad" class="form-control" min="1" max="20" id="inputEdadM" placeholder="5">
                </div>
                <div class="col-12">
                  <label for="inputFechaM" class="form-label">Fecha de registro</label>
                  <input type="date" name="fecha" class="form-control" id="inputFechaM">
                </div>
                <!-- <?php if(isset($error)) : ?>
                
                <p class="error"><?php  echo $error; ?></p>
            
            <?php elseif(isset($msg)) : ?>
            
                <p class="success"><?php  echo $msg; ?></p>
            
            <?php endif; ?>  -->
            
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
              <input type="submit" value="Guardar" id="boton_inicio" class="btn btn-primary">
            </div>

              </form>
            </div>
           
          </div>
        </div>
      </div>
      
      <!-- Modal usuario-->
      <!-- <div class="modal fade" id="Modalusuario" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Registrar usuario </h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form class="row g-3" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST" enctype="multipart/form-data">
                <div class="col-md-6">
                  <label for="inputEmail4" class="form-label">Correo</label>
                  <input type="email" class="form-control" id="inputEmail4">
                </div>
                <div class="col-md-6">
                  <label for="inputPassword4" class="form-label">Contraseña</label>
                  <input type="password" class="form-control" id="inputPassword4">
                </div>
                <div class="col-12">
                  <label for="inputNombre" class="form-label">Nombre</label>
                  <input type="text" class="form-control" id="inputNombre" placeholder="Héctor">
                </div>
                <div class="col-12">
                  <label for="inputApellido1" class="form-label">Apellido 1</label>
                  <input type="text" class="form-control" id="inputApellido1" placeholder="Aguirre">
                </div>
                <div class="col-12">
                  <label for="inputApellido2" class="form-label">Apellido 2</label>
                  <input type="text" class="form-control" id="inputApellido2" placeholder="González">
                </div>
                <div class="col-12">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="clienteCheck">
                    <label class="form-check-label" for="clienteCheck">
                      Cliente
                    </label>
                  </div>
                </div>
                <div class="col-12">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="empleadoCheck">
                    <label class="form-check-label" for="empleadoCheck">
                      Empleado
                    </label>
                  </div>
                </div>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
              <button type="submit" class="btn btn-primary">Siguiente</button>
            </div>
          </div>
        </div>
      </div> -->

      

      <form class="d-flex space-search">
        <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Buscar</button>
      </form>

      <ul class="navbar-nav space">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Mi cuenta
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Mi perfil</a></li>
            <li><a class="dropdown-item" href="#">Editar</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="../PhpAndHtml/cerrar.php">Cerrar sesión</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>

  <h2>Consultas</h2>
  
  <table class="default">
  
    <tr>
  
      <th>Paciente</th>
  
      <th>fecha de entrada</th>
      
      <th>Doctor</th>
      
      <th>Causa</th>
  
      <th>Tratamiento</th>
      
      <th>Duración</th>
      
      <th>fecha de salida</th>
  
      <th>Costo</th>
  
  
    </tr>
  
    <tr>
      <td>Fulanita</td>
      <td>3/08/2020</td>
      <td>Nicólas Prieto</td>
      <td>Dificultad de parto</td>
      <td>Ayuda en el parto</td>
      <td>2 días</td>
      <td>5/08/2020</td>
      <td>$5000</td>
    </tr>
  
  </table>
  </div>   
  
  </main>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
  <script>
        if ( window.history.replaceState ) {
            window.history.replaceState( null, null, window.location.href );
        }
      </script>
 
</body>
</html>