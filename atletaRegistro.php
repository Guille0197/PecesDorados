<?php
include("funcionesSQL/atletaSQL.php");
include("menus/atletaMenu.php");
include("menus/menuGlobal.php");

$carrerabd = AtletaSQL::obtenerCurso();



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

    @$guardarInscripcion = $_POST["guardar"];
    // Variables Atleta
    @$cedulaAtleta = $_POST["idAtleta"];
    @$nombreAtleta = $_POST["nombreAtleta"];
    @$edadAtleta = $_POST["edadAtleta"];
    @$conocimientoAtleta = $_POST["conocimientoAtleta"];
    @$direccionAtleta = $_POST["direccionAtleta"];
    @$cedulaAdultoResponsabelAtleta = $_POST["cedulaAdultoResponsableAtleta"];
    @$valorSelectCurso = $_POST["curso"];


    if (@$guardarInscripcion) {
        $Inscripcion = AtletaSQL::registrarAtleta($cedulaAtleta, $nombreAtleta, $edadAtleta, $conocimientoAtleta, $direccionAtleta, $cedulaAdultoResponsabelAtleta, $valorSelectCurso);
        @$cedulaAtleta = "";
        @$nombreAtleta = "";
        @$edadAtleta = "";
        @$conocimientoAtleta = "";
        @$direccionAtleta = "";
        @$cedulaAdultoResponsabelAtleta = "";
        @$valorSelectCurso = "";
    } else {
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

                            <form method="POST" action="atletaRegistro.php">




                                <!--Inicio Registro Atleta-->


                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Atleta</h3>
                                    </div>
                                    <div class="card-body p-0">

                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Cédula</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1" name="idAtleta" required="require" placeholder="Ej: x-xxx-xxxx">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Nombre</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1" name="nombreAtleta" required="require" placeholder="Ej: Juan">
                                            </div>

                                            <div class="form-group">

                                                <label for="exampleInputEmail1">Edad</label>
                                                <input type="number" min="1" max="35" class="form-control" required="require" id="exampleInputEmail1" name="edadAtleta" placeholder="Ej: 5">


                                            </div>


                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Dirección</label>
                                                <select class="form-control" id="direccion" name="direccionAtleta" required="require">
                                                    <option default selected hidden></option>
                                                    <option value="Monagrillo">Monagrillo</option>
                                                    <option value="La Arena">La Arena</option>
                                                    <option value="San Juan Bautista">San Juan Bautista</option>
                                                    <option value="Llano Bonito">Llano Bonito</option>
                                                    <option value="Chitré">Chitré</option>

                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Conocimiento</label>
                                                <select class="form-control" id="conocimiento" name="conocimientoAtleta" required="require">
                                                    <option default selected hidden></option>
                                                    <option value="Si">Sabe nadar</option>
                                                    <option value="No">No sabe nadar</option>
                                                </select>
                                            </div>


                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Cedula de acudiente</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1" name="cedulaAdultoResponsableAtleta" required="require" placeholder="Ej: x-xx-xxx-xxx">
                                            </div>


                                        </div>
                                        <!-- /.card-body -->

                                        <div class="card-footer">

                                            <label for="exampleInputEmail1">Curso</label>
                                            <select class="form-control form-control-sm" required="require" name="curso">
                                                <option selected default hidden></option>
                                                <?php

                                                foreach ($carrerabd as $key => $value) {
                                                    $idcurso = $value['idcurso'];

                                                    echo "<option value=$idcurso>$idcurso</option>";
                                                }
                                                ?>
                                            </select>


                                            <br>


                                            <!-- Inicio Codigo PHP  -->

                                            <!-- Fin Codigo PHP  -->
                                            <input class='btn btn-warning' type='submit' name='guardar' value='Inscribir'>


                                        </div>

                                    </div>

                                </div>
                            </form>
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

                    <script>
                        $(function() {
                            $("#example1").DataTable();
                            $('#example2').DataTable({
                                "paging": true,
                                "lengthChange": false,
                                "searching": false,
                                "ordering": true,
                                "info": true,
                                "autoWidth": false,
                                "language": {
                                    "paginate": {
                                        "next": "Siguiente",
                                        "previous": "Anterior"
                                    },
                                    "info": "Mostrando _PAGE_ of _PAGES_ Resultados"
                                },
                            });




                        });
                    </script>


</body>

</html>