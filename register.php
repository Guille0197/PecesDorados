<?php
include_once 'funcionesSQL/BaseDeDatos.php';

if(isset($_POST['Registrar'])){
  try {
    $usuario=$_POST['usuario'];
    $password=$_POST['password'];
    $repet_password=$_POST['repet_password'];
    $cedula=$_POST['cedula'];
    $edad=$_POST['edad'];
    $tipo=4; // Tipo de rol Atleta para todo quien se registra por medio de este formulario sera de rol Atleta

        if ($password == $repet_password ) {
            $pdoQuery='INSERT INTO usuarios(usuario,password,cedula,edad,rol_id) VALUES(:usuario, :password, :cedula, :edad, :rol_id)';
            $db = new BaseDeDatos();
            $pdoResult=$db->obtenerConexion()->prepare($pdoQuery);
            $pdoExec= $pdoResult->execute([':usuario' => $usuario, ':password' => $password, ':cedula' => $cedula, ':edad' => $edad, ':rol_id'=>$tipo ]);
        
            if($pdoExec){
                header('location: atleta.php');
            }   
        }else{
            ?>
            <script>
                alert("⚠ ERROR: las contraseñas no son iguales ⚠");
                window.location="register.php";
            </script>
        <?php   
        }

  } catch (Exception $exc) {
    echo $exc->getMessage();
    exit();
  } 
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Peces Dorados | Registro</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
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

<body class="hold-transition register-page" style="background-image: url('img/background.jpg'); background-repeat: no-repeat; background-attachment: fixed; background-size: 100% 100%;">
    <div class="register-box">
        <div class="login-box">
            <div class="text-center text-white">
                <h2 class="badge-primary"><strong>Club de Natación <br>Peces Dorados - Chitré</strong> </h2>
            </div>

            <div class="card">
                <div class="card-body register-card-body">
                    <p class="login-box-msg"><strong>Registrate como nuevo usuario</strong></p>

                    <p class="text-center p-2"> Ya tengo una cuenta,
                        <a href="login.php" class="text-center"> Iniciar Sesión</a>
                    </p>

                    <form action="#" method="POST">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="usuario" placeholder="Nombre del Atleta" required>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-swimmer"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="cedula" placeholder="Cédula" required>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-id-card"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="number" class="form-control" name="edad" placeholder="Edad" required min="3" max="70">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-user"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                        <input type="password" class="form-control" name="password"  placeholder="Contraseña" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                            </div>
                        </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" class="form-control" name="repet_password" placeholder="Repetir Contraseña" required>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="icheck-primary">
                                    <input type="checkbox" id="agreeTerms" name="terms" value="agree" required>
                                    <label for="agreeTerms">
                                      Estoy de acuerdo con los <a href="#">terminos</a>
                                    </label>
                                </div>
                            </div>
                            <!-- /.col -->
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary btn-block btn-lg" name="Registrar"><b>Registrate</b> <i class="nav-icon fas fa-fish text-warning"></i> </button>
                            </div>
                            <!-- /.col -->
                        </div>
                    </form>
                </div>
                <!-- /.form-box -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.register-box -->

        <!-- jQuery -->
        <script src="../../plugins/jquery/jquery.min.js"></script>
        <!-- Bootstrap 4 -->
        <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- AdminLTE App -->
        <script src="../../dist/js/adminlte.min.js"></script>
</body>

</html>