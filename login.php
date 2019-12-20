<?php
include_once 'funcionesSQL/BaseDeDatos.php';
session_start();


if (isset($_POST['cedula']) && isset($_POST['password'])) {
  $cedula = $_POST['cedula'];
  $password = $_POST['password'];
  $db = new BaseDeDatos();
  $query = $db->obtenerConexion()->prepare('SELECT * FROM usuarios WHERE cedula= :cedula AND password=:password');
  $query->execute(['cedula' => $cedula, 'password' => $password]);


  $row = $query->fetch(PDO::FETCH_NUM);
  if ($row == true) {
    $rol = $row[5];
    $username =$row[1];
    $_SESSION['rol'] = $rol;
    $_SESSION['usuario']=$username;
    $_SESSION['cedula']=$cedula;

    switch ($_SESSION['rol']) {
      case 1:
        header('location: indexAdmin.php');
        break;
      case 2:

        header('location: cajero.php');
        break;
      case 3:
        header('location: asistente.php');
        break;
      case 4:
        header('location: atleta.php');

        break;

      default:
    }
  } else {
    echo "Este usuario y/o conraseña son incorrectos";
  }
}

?>




<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Club Peces Dorados | Login</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css" />
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" />
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css" />
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css" />
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css" />
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css" />
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css" />
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css" />
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css" />
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet" />
</head>

<body class="hold-transition login-page" style="background-image: url('img/3021957.jpg'); background-repeat: no-repeat; background-attachment: fixed; background-size: 100% 100%;">
  <div class="login-box">
    <div class="text-center text-white">
      <h2 class="badge-primary"><strong>Club de Natación <br>Peces Dorados - Chitré</strong> </h2>
    </div>
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">
        <!--Logo del club de natacion-->
        <!-- <img src="img/pecesDorados.jpg" class="card-img-top" width="10px" height="150px" alt="..."> Logo del club de natacion-->
        <h2 class="login-box-msg">Inicio de sessión</h2>

        <p class="mb-0 text-center p-2"> Aún no tienes cuenta,
          <a href="register.php">Registrate</a>
        </p>
        <form action="#" method="post">
          <div class="input-group mb-3">
            <input type="text" class="form-control" name="cedula" placeholder="Cédula" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" name="password" placeholder="Contraseña" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <div class="icheck-primary">
                <input type="checkbox" id="remember" required>
                <label for="remember">
                  Recordar usuario
                </label>
              </div>
            </div>
            <!-- /.col -->
            <div class="col-12">
              <!-- <i class="fas fa-sign-in-alt"></i> -->
              <button type="submit" class="btn btn-primary btn-block btn-lg"><b> Iniciar</b> <i class="nav-icon fas fa-fish text-warning"></i> </button>
            </div>
            <!-- /.col -->
          </div>
        </form>

        <p class="text-center p-3">
          <a href="#">Olvidé mi contraseña</a>
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