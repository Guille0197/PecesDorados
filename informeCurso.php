<?php
include("funcionesSQL/InformeSQL.php");
$resp = InformeSQL::obtenerCurso();
include("menus/informeMenu.php");
include("menus/menuGlobal.php");

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Peces Dorados| Atletas</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="css/all.min.css">
    <!-- Ionicons -->
    <!-- <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"> -->
    <!-- DataTables -->
    <link rel="stylesheet" href="css/dataTables.bootstrap4.css">

    <!-- Theme style -->
    <link rel="stylesheet" href="css/adminlte.min.css">


    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->

        <!-- /.navbar -->

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
                            <div class="col col-5">

                                <div class="">
                                    <div>


                                        <div class="card-header ">
                                            <h3 class="card-title">Cursos</h3>
                                        </div>

                                        <div class="form-group">
                                            <form method="POST" action="informeCurso.php">
                                                <select class="form-control form-control-sm" required="require" name="curso">
                                                    <option selected default hidden>Seleccione el curso</option>

                                                    <?php

                                                    foreach ($resp as $key => $value) {
                                                        $id = $value['idcurso'];

                                                        echo "<option value=$id> $id</option>";
                                                    }
                                                    ?>
                                                </select>


                                                <br>




                                                <input class='btn btn-warning' type='submit' name='buscar' value='Buscar'>

                                            </form>
                                        </div>


                                    </div>





                                </div>


                                <!-- /.card-body -->
                            </div>



                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Informe</h3>
                                </div>
                                <div class="card-body p-0">

                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Cedula</th>
                                                <th>Nombre</th>
                                                <th>Recibo de pago</th>
                                                <th>Instructor</th>
                                                <th>Horario</th>
                                            </tr>
                                        </thead>
                                        <tbody>


                                            <?php



                                            //@$cedAtleta = $_GET["ceduatleta"];
                                            @$buscar = $_POST["buscar"];
                                            @$cursoSelecionnado = $_POST["curso"];


                                            if (@$buscar) {
                                                $registro = InformeSQL::obtenerInforme($cursoSelecionnado);




                                                foreach ($registro as $key => $value) {
                                                    $cedula = $value['cedulaatleta'];
                                                    $nombre = $value['nombreatleta'];
                                                    $recibo = $value['numerorecibo'];
                                                    $nombentrenador = $value['nombreentrenador'];
                                                    $horario = $value['horariocurso'];
                                            ?>


                                                    <tr>

                                                        <td> <?php echo $cedula; ?> </td>
                                                        <td> <?php echo $nombre; ?> </td>
                                                        <td> <?php echo $recibo; ?> </td>
                                                        <td> <?php echo $nombentrenador; ?> </td>
                                                        <td> <?php echo $horario; ?> </td>
                                                    </tr>

                                            <?php

                                                }
                                            }
                                            ?>





                                        </tbody>

                                    </table>

                                </div>

                            </div>








                            <!-- Main content -->

                            <!-- /.content -->
                        </div>
                        <!-- /.content-wrapper -->


                        <!-- Control Sidebar -->

                        <!-- /.control-sidebar -->
                    </div>
                    <!-- ./wrapper -->

                    <!-- jQuery -->
                    <script src="plugins/jquery/jquery.min.js"></script>
                    <!-- Bootstrap 4 -->
                    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
                    <!-- DataTables -->
                    <script src="plugins/datatables/jquery.dataTables.js"></script>
                    <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
                    <!-- AdminLTE App -->
                    <script src="dist/js/adminlte.min.js"></script>
                    <!-- AdminLTE for demo purposes -->
                    <script src="dist/js/demo.js"></script>
                    <!-- page script -->

                    <!-- <script>
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
          </script> -->


</body>

</html>