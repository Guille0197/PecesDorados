<?php
include("funcionesSQL/atletaSQL.php");
$carrerabd = AtletaSQL::obtenerCurso();
include("menus/atletaMenu.php");
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
                      <form method="POST" action="atletaInscripcion.php">
                        <select class="form-control form-control-sm" required="require" name="curso">
                          <option selected default disabled>Seleccione el curso</option>

                          <?php
                         
                          foreach ($carrerabd as $key => $value) {
                            $idcurso = $value['idcurso'];

                            echo "<option value=$idcurso>$idcurso</option>";
                          }
                          ?>
                        </select>


                        <br>


                        <!-- php aqui  -->
                        <?php
                          // @$cedula = "6-719-1951";

                          @$cedAtleta = $_GET["ceduatleta"];
                          @$codigoCurso = $_GET["codicurso"];

                          @$guardarInscripcion = $_POST["guardar"];
                          @$valorSelectCurso = $_POST["curso"];
                            
                          
                        //Validacion El atleta no se puede inscribir en el mismo curso.

                        if($cedula == $cedAtleta And $codigoCurso == $valorSelectCurso){                          
                         AtletaSQL::validacionAtleta($cedula, $codigoCurso);
                        
                          ?>

                         <script> 
                          alert('¡ADVERTENCIA! Usted ya está inscrito en este curso.'); 
                          </script> 

                         <?php
                        }else if (@$guardarInscripcion) {

                            AtletaSQL::inscribirAtleta($cedula, $valorSelectCurso);
                          }

                        ?>
                        <input class='btn btn-warning' type='submit' name='guardar' value='Inscribir'>

                      </form>
                    </div>


                  </div>





                </div>


                <!-- /.card-body -->
              </div>



              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Mis cursos</h3>
                </div>
                <div class="card-body p-0">

                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>Código del curso</th>
                        <th>Horario</th>
                        <th>Entrenador</th>
                      </tr>
                    </thead>
                    <tbody>


                      <?php
                          @$cedula = "6-719-1951";//S REMPLAZAR POR LA VARIABLE GLOBAL DE CEDULA
                          //Toma el valor de la cedula con la que se logueo
                          $registro = AtletaSQL::obtenerCursos($cedula);


                          foreach ($registro as $key => $data) {
                            $codigoCurso = $data['codicurso'];
                            $horarioCurso = $data['horariocurso'];
                            $entrenadorCodigo = $data['nombreentrenador'];
                      ?>

                        <!-- echo "<td > $codigoCurso </td ";
                        echo "<td >$horarioCurso </td>";
                        echo "<td >$entrenadorCodigo </td> "; -->
                        <tr>

                          <td> <?php echo $codigoCurso; ?> </td>
                          <td> <?php echo $horarioCurso; ?> </td>
                          <td> <?php echo $entrenadorCodigo; ?> </td>
                        </tr>

                      <?php

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