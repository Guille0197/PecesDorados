<?php
include_once 'funcionesSQL/BaseDeDatos.php';
session_start();
  
  if (isset($_GET['cerrar_sesion'])){
    session_unset();
    session_destroy();
    header('location: login.php');
  }

  if(isset($_SESSION['rol'])){

    switch ($_SESSION['rol']) {
      case 1:

          header('location: admin.php');
        break;
        case 2:
          header('location: atleta.php');
        break;

        case 3:

          header('location: asistente.php');
        break;
        case 4:
          header('location: cajero.php');
        break;
      
      default:
       
    }
  }

  if (isset($_POST['usuario'])&& isset($_POST['password']) ){
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];
  $db = new BaseDeDatos();
  $query = $db->obtenerConexion()->prepare('SELECT * FROM usuario WHERE usuario= :usuario AND password=:password');
  $query->execute(['usuario' => $usuario, 'password' => $password]);

  
  $row = $query->fetch(PDO::FETCH_NUM);
  if($row==true){
    $rol = $row [5];
    $_SESSION['rol'] = $rol;

    switch ($_SESSION['rol']) {
      case 1:
          header('location: admin.php');
        break;
        case 2:
          header('location: usuario.php');
        break;
      
      default:
       
    }

  }else{
    echo "Este usuario o conraseña son incorrectos";
  }
}

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="#"><strong>CLUB DE NATACIÓN <br>PESES DORADOS</strong>   </a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Inicio de sessión</p>

      <form action="#" method="post">
        <div class="input-group mb-3">
          <input type="usuario" class="form-control" name="usuario" placeholder="Usuario">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="password" placeholder="Contraseña">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Recordar
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Iniciar</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

   
      <!-- /.social-auth-links -->

      <p class="mb-0">
        <a href="register.php" class="text-center">Registrar un nuevo usuario</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>

</body>
</html>
