<?php

include("menus/menuGlobal.php");
include("menus/atletaMenu.php");
include("funcionesSQL/CajeroSQL.php");
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Peces Dorados</title>

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

<div class="wrapper">
  

    
       
          
       

  <!-- Content Wrapper. Contains page content -->
  <div class="content">
    <!-- Content Header (Page header) -->
    
      <div class="container-fluid">
        <div class="col-2">
          <div class="col-md-12">
        
          </div>
          
        </div>
      </div>

  <?php


@$botonr = $_POST["guardar"];

@$cedulaAtleta = $_POST["cedulaatleta"];
@$nombreAtleta = $_POST["nombreatleta"];
@$edadAtleta = $_POST["edadatleta"];
@$nadarAtleta = $_POST["nadar"];
@$direccionAtleta = $_POST["direccion"];
@$responsableAtleta = $_POST["idrespo"];
@$cursoAtleta = $_POST["idcur"];

if (@$botonr) {
    $Inscripcion = CajeroSQL::realizarInscripcion($cedulaAtleta,$nombreAtleta,$edadAtleta,$nadarAtleta,$direccionAtleta,$responsableAtleta,$cursoAtleta);
    $mensaje = "Registro Insertado";
    @$cedulaAtleta = "";
    @$nombreAtleta = "";
    @$edadAtleta = "";
    @$nadarAtleta = "";
    @$direccionAtleta = "";
    @$resposanbleAtleta = "";
    @$cursoAtleta = "";
} else {
    $mensaje = "No se pudo realizar el registro";
}
?>
                <div class="wrapper">

<div class="content-wrapper">
    
    <section class="content">
        <div class="container-fluid">
            <div class="col-12">
                <!-- left column -->
                <div class="col-md-12">
                    
                    <br>

                    <form method="POST" action="Cajero.php">




                        <!--Inicio Registro Atleta-->


                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Registro de Atletas</h3>
                            </div>
                            <div class="card-body p-0">

                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Cédula</label>
                                        <input type="text" class="form-control" id="cedulaatleta" name="cedulaatleta" required="require" placeholder="Ej: x-xxx-xxxx">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Nombre</label>
                                        <input type="text" class="form-control" id="nombreatleta" name="nombreatleta" required="require" placeholder="Ej: Juan">
                                    </div>

                                    <div class="form-group">

                                        <label for="exampleInputEmail1">Edad</label>
                                        <input type="number" min="1" max="35" class="form-control" required="require" id="edadatleta" name="edadatleta" placeholder="Ej: 20">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Dirección</label>
                                        <select class="form-control" id="direccion" name="direccion" required="require">
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
                                        <select class="form-control" id="nadar" name="nadar" required="require">
                                            <option default selected hidden></option>
                                            <option value="Si">Sabe nadar</option>
                                            <option value="No">No sabe nadar</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Cedula de acudiente</label>
                                        <input type="text" class="form-control" id="idrespo" name="idrespo" required="require" placeholder="Ej: x-xx-xxx-xxx">
                                    </div>


                                </div>
                                <div class="card-footer">

                                    <label for="exampleInputEmail1">Curso</label>
                                    <select class="form-control form-control-sm"  name="idcur">
                                        <option selected default hidden></option>
                                        <?php
                                           /*Trae la lista de curso*/$listCurso = CajeroSQL::obtenerCurso();
                                        foreach ($listCurso as $key => $value) {
                                            
                                            $idcurso = $value['idcurso'];

                                            echo "<option value=$idcurso>$idcurso</option>";
                                        }
                                        ?>
                                    </select>
                                    <br>
                                    <input class='btn btn-primary' type='submit' name='guardar' value='Registrar'>


                                </div>

                            </div>

                        </div>
                    </form>
                
            </div>
                     
                    </div>
                   

 

 
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
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

<script type="text/javascript">
$(document).ready(function () {
  bsCustomFileInput.init();
});
</script>
</body>
</html>
