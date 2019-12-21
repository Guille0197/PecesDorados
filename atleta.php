<?php
session_start();
include("funcionesSQL/atletaSQL.php");
include("menus/atletaMenu.php");
include("menus/menuGlobal.php");

$registro = AtletaSQL::miPerfil($cedula);

if (!isset($_SESSION['rol'])) {
    header('location: login.php');
} else {
    if ($_SESSION['rol'] != 4) {
        session_destroy();  
        session_unset();
        header('location: login.php');
    }
}

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Peces Dorados | Dashboard</title>
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

<body class="hold-transition sidebar-mini">


    <?php

    foreach ($registro as $key => $data) {
        $cedulaatleta = $data['cedulaatleta'];
        $nombreatleta = $data['nombreatleta'];
        $edadatleta = $data['edadatleta'];
        $nadar = $data['nadar'];
        $direccion = $data['direccion'];
        $idrespo = $data['idrespo'];
    }
    ?>
    <div class="wrapper">



        <!-- Main Sidebar Container -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content">
                <div class="container-fluid">
                    <div class="col-12">
                        <!-- left column -->
                        <div class="col-md-12">
                            <!-- general form elements -->
                            <br>
                            <!--Inicio Registro Atleta-->
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Mi Perfil</h3>
                                </div>
                                <div class="card-body p-0">

                                    <div class="card-body">
                                        <div class="form-group">
                                            <label class="text-primary">Cédula</label><br>
                                            <label class="text-muted"><?php echo  $cedulaatleta;   ?></label>

                                        </div>
                                        <div class="form-group">
                                            <label class="text-primary">Nombre</label><br>
                                            <label class="text-muted"><?php echo $nombreatleta;  ?></label>
                                        </div>

                                        <div class="form-group">

                                            <label class="text-primary">Edad</label><br>
                                            <label class="text-muted"><?php echo $edadatleta;  ?></label>

                                        </div>


                                        <div class="form-group">
                                            <label class="text-primary">Dirección</label><br>
                                            <label fclass="text-muted"><?php echo $direccion;  ?></label>
                                        </div>
                                        <div class="form-group">
                                            <label class="text-primary">Conocimiento</label><br>
                                            <label class="text-muted"><?php echo $nadar;   ?></label>
                                        </div>


                                        <div class="form-group">
                                            <label class="text-primary">Cedula de acudiente</label><br>
                                            <label class="text-muted"><?php echo $idrespo;  ?></label>
                                        </div>


                                    </div>
                                    <!-- /.card-body -->
                                </div>

                            </div>

                            <!-- Fin  Registro Atleta -->




                        </div>
                        <!-- /.content-wrapper -->


                        <!-- Control Sidebar -->

                        <!-- /.control-sidebar -->
                    </div>
                    <!-- ./wrapper -->


                    <!-- jQuery -->
                    <script src="plugins/jquery/jquery.min.js"></script>
                    <!-- jQuery UI 1.11.4 -->
                    <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
                    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
                    <script>
                        $.widget.bridge("uibutton", $.ui.button);
                    </script>
                    <!-- Bootstrap 4 -->
                    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
                    <!-- ChartJS -->
                    <script src="plugins/chart.js/Chart.min.js"></script>
                    <!-- Sparkline -->
                    <script src="plugins/sparklines/sparkline.js"></script>
                    <!-- JQVMap -->
                    <script src="plugins/jqvmap/jquery.vmap.min.js"></script>
                    <script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
                    <!-- jQuery Knob Chart -->
                    <script src="plugins/jquery-knob/jquery.knob.min.js"></script>
                    <!-- daterangepicker -->
                    <script src="plugins/moment/moment.min.js"></script>
                    <script src="plugins/daterangepicker/daterangepicker.js"></script>
                    <!-- Tempusdominus Bootstrap 4 -->
                    <script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
                    <!-- Summernote -->
                    <script src="plugins/summernote/summernote-bs4.min.js"></script>
                    <!-- overlayScrollbars -->
                    <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
                    <!-- AdminLTE App -->
                    <script src="dist/js/adminlte.js"></script>
                    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
                    <script src="dist/js/pages/dashboard.js"></script>
                    <!-- AdminLTE for demo purposes -->
                    <script src="dist/js/demo.js"></script>
                    <!-- page script -->



</body>

</html>