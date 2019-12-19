<?php include("funcionesSQL/atletaSQL.php");
include("menus/atletaMenu.php");
include("menus/menuGlobal.php");

// REEMPLAZAR POR VARIABLE GLOBAL
// @$cedula = "6-719-1951"; 
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
 <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    <!-- Navbar -->




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


              <!-- Main content -->
              <section class="content">

                <div class="row">
                  <div class="col-12">
                    <div class="card">
                      <div class="card-header">
                        <h3 class="card-title">Historial de pagos</h3>
                      </div>
                      <!-- /.card-header -->
                      <div class="card-body">
                        <table id="example2" class="table table-bordered table-hover">
                          <thead>
                            <tr>
                              <th>Recibo</th>
                              <th>Curso</th>
                              <th>Fecha</th>
                              <th>Monto</th>

                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <?php
                              //@$cedula = "6-719-1951"; REMPLAZAR POR LA VARIABLE GLOBAL DE CEDULA
                              //Toma el valor de la cedula con la que se logueo
                              $registro = AtletaSQL::obtenerHistorialPago($cedula);


                              foreach ($registro as $key => $data) {
                                $recibo = $data['numerorecibo'];
                                $curso = $data['idcur'];
                                $fecha = $data['fecha'];
                                $monto = $data['monto'];
                              ?>
                            <tr>

                              <td> <?php echo $recibo; ?> </td>
                              <td> <?php echo $curso; ?> </td>
                              <td> <?php echo $fecha; ?> </td>
                              <td> <?php echo "$" . $monto; ?> </td>
                            </tr>


                            <tr>

                            <?php

                              }


                            ?>
                          </tbody>
                          <tfoot>

                          </tfoot>
                        </table>
                      </div>
                      <!-- /.card-body -->
                    </div>
                    <!-- /.card -->


                    <!-- /.card-header -->

                    <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->


    <!-- Control Sidebar -->

    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->


  <!-- jQuery -->
  <script src="jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="js/bootstrap.bundle.min.js"></script>
  <!-- DataTables -->
  <script src="js/jquery.dataTables.js"></script>
  <script src="js/dataTables.bootstrap4.js"></script>
  <!-- AdminLTE App -->
  <script src="js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="js/demo.js"></script>
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