<?php
include 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    var_dump($_POST);
    $cedula = $_POST['cedula'];
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $contraseña = $_POST['contraseña'];
    $correo = $_POST['correo'];
    $numero_cel = $_POST['numero_cel'];
    $fecha_cumple = $_POST['fecha_cumple'];

    if (!empty($cedula) && !empty($nombre) && !empty($apellidos) && !empty($contraseña) && !empty($correo) && !empty($numero_cel) && !empty($fecha_cumple)) {
      // Preparar la consulta de inserción
      $sql = "INSERT INTO tbl_usuarios (cedula, nombre, apellidos, contraseña, correo, numero_cel, fecha_cumple) 
              VALUES ('$cedula', '$nombre', '$apellidos', '$contraseña', '$correo', '$numero_cel', '$fecha_cumple')";

      // Ejecutar la consulta
      if ($conexion->query($sql) === TRUE) {
          echo '<script>
                  window.onload = function() {
                      Swal.fire({
                          title: "¡Buen trabajo!",
                          text: "¡Usuario insertado exitosamente!",
                          icon: "success"
                      }).then(function() {
                          window.location = "index.html";
                      });
                  };
                </script>';
      } else {
          echo '<script>
                  window.onload = function() {
                      Swal.fire({
                          title: "¡Error!",
                          text: "No se pudo insertar el usuario.",
                          icon: "error"
                      }).then(function() {
                          window.location = "index.html";
                      });
                  };
                </script>';
      }
  } else {
      echo '<script>
              alert("Por favor, complete todos los campos.");
              window.location = "index.html";
            </script>';
  }
}


$conexion->close();
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link rel="stylesheet" href="style.css">

    
    <link rel="stylesheet" href="style.css"> 
    <title>Registro de Usuario</title>


</head>

<body>
<nav class="navbar navbar-dark bg-dark fixed-top">
      <div class="container-fluid">
        
      <a class="navbar-brand fs-5 fw-bold" href="index.html" target="_self">Inicio</a>
    
        
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar">
          <span class="navbar-toggler-icon"></span>
        </button>
    
        
        <div class="offcanvas offcanvas-end bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
          <div class="offcanvas-header">
            
            <h4 class="offcanvas-title text-center w-100 text-white" id="offcanvasDarkNavbarLabel">Festival de Frecuencias</h4>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
          </div>
    
          <div class="offcanvas-body">
            <ul class="navbar-nav justify-content-center flex-grow-1 pe-3">
              
              <li class="nav-item mb-4">
                <h5 class="text-center text-info fw-bold">Eventos musicales</h5>
                <a class="nav-link active text-center text-light" href="conciertos.html">Frecuencias contigo</a>
              </li>
              
              <li class="nav-item mb-4">
                <h5 class="text-center text-info fw-bold">Eventos deportivos</h5>
                <a class="nav-link text-center text-light" href="basquet.html">Basquetball</a>
                <a class="nav-link text-center text-light" href="futbol.html">Fútbol</a>
                <a class="nav-link text-center text-light" href="ufc.html">UFC</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </nav>

    <div class="container mt-5">
    <div class="registration-form">
        <form method="POST" action="">
            <div class="form-icon text-center">
                <span><i class="fas fa-user"></i></span> <!-- Asegúrate de que el icono se muestra -->
            </div>
            <div class="form-group">
                <input type="text" class="form-control item" name="nombre" placeholder="Nombre" required>
            </div>
            <div class="form-group">
                <input type="text" class="form-control item" name="apellidos" placeholder="Apellidos" required>
            </div>
            <div class="form-group">
                <input type="text" class="form-control item" name="cedula" placeholder="Cédula" required>
            </div>
            <div class="form-group">
                <input type="password" class="form-control item" name="contraseña" placeholder="Contraseña" required>
            </div>
            <div class="form-group">
                <input type="email" class="form-control item" name="correo" placeholder="Correo electrónico" required>
            </div>
            <div class="form-group">
                <input type="tel" class="form-control item" name="numero_cel" placeholder="Número celular" required>
            </div>
            <div class="form-group">
                <label for="fecha_cumple" class="form-label">Fecha de cumpleaños:</label>
                <input type="date" class="form-control" name="fecha_cumple" required>
            </div>
            <div class="form-group text-center">
                <button type="submit" class="btn btn-primary create-account">Crear cuenta</button>
            </div>
            <div class="form-group text-center mt-3">
              <a href="index.html?showModal=true" class="btn create-account">¿Ya tienes cuenta?</a>
              </div>

        </form>
    </div>
</div>

  
  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.14.4/dist/sweetalert2.all.min.js"></script>
</body>
</html>
