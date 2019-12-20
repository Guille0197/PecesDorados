<?php
include("funcionesSQL/InformeSQL.php");
$registro = InformeSQL::obtenerInformeAtleta();
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
                                                <th>Edad</th>
                                                <th>Nada</th>
                                                <th>Direccion</th>
                                                <th>ID Responsable</th>
                                                <th>Nomb. Responsable</th>
                                                <th>Parentesco</th>
                                                <th>ID Curso </th>
                                                <th>Horario</th>
                                                <th>Nivel</th>
                                            </tr>
                                        </thead>
                                        <tbody>


                                            <?php
                                            foreach ($registro as $key => $value) {
                                                @$cedula = $value['cedulaatleta'];
                                                @$nombre = $value['nombreatleta'];
                                                @$edad = $value['edadatleta'];
                                                @$nadar = $value['nadar'];
                                                @$direccion = $value['direccion'];
                                                @$idr = $value['idrespo'];
                                                @$nombr = $value['nombreadulto'];
                                                @$parent = $value['parentescoadulto'];
                                                @$idc = $value['idcur'];
                                                @$nombcurso = $value['horariocurso'];
                                                @$nivel = $value['nivelcurso'];
                                                echo "<tr>";
                                                echo "<td>$cedula</td>";
                                                echo "<td>$nombre</td>";
                                                echo "<td >$edad</td>";
                                                echo "<td>$nadar</td>";
                                                echo "<td>$direccion</td>";
                                                echo "<td >$idr</td>";
                                                echo "<td >$nombr</td>";
                                                echo "<td >$parent</td>";
                                                echo "<td >$idc</td>";
                                                echo "<td >$nombcurso</td>";
                                                echo "<td >$nivel</td>";
                                                echo "</tr>";
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