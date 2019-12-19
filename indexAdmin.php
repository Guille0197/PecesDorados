<?php
session_start();

    if (!isset($_SESSION['rol'])){
        header('location: login.php');

    }else{
        if($_SESSION['rol']!=1){
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

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i
            ></a>
                </li>
            </ul>
            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown user-menu">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                        <img src="dist/img/user2-160x160.jpg" class="user-image img-circle elevation-2" alt="User Image" />
                        <span class="d-none d-md-inline">Alexander Pierce</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <!-- User image -->
                        <li class="user-header bg-primary">
                            <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image" />
                            <!-- Aqui ira la imagen del usuario con el cual se registro -->

                            <h3>Alexander Pierce</h3>
                            <!-- Aqui ira el nombre del usuario con el cual se registro -->
                        </li>
                        <!-- Menu Body -->
                        <li class="user-body">
                            <div class="row">
                                <div class="col-12 text-center">
                                    <h3>Administrador</h3>
                                    <!-- Aqui ira el rol del usuario con el cual se registro -->
                                </div>
                            </div>
                            <!-- /.row -->
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <a href="#" class="btn btn-default btn-flat">Perfil</a>
                            <a href="#" data-toggle="modal" data-target="#logoutModal" class="btn btn-default btn-flat float-right">Cerrar Sesión</a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.navbar -->

      <!-- Logout Modal de cerrar sesion-->
     <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">¿Preparado para irte?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Seleccione "Cerrar sesión" a continuación si está listo para finalizar su sesión
                    actual.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                    <a class="btn btn-primary" href="cerrar.php">Cerrar sesión</a>
                </div>
            </div>
        </div>
    </div>


      <!-- Main Sidebar Container -->
      <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="index3.html" class="brand-link">
          <img
            src="dist/img/AdminLTELogo.png"
            alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3"
            style="opacity: .8"
          />
          <span class="brand-text font-weight-light">Club Peces Dorados</span>
        </a>

                            <!-- Sidebar -->
                            <div class="sidebar">
                                <!-- Sidebar user panel (optional) -->
                                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                                    <div class="image">
                                        <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image" />
                                    </div>
                                    <div class="info">
                                        <a href="#" class="d-block">Administrador</a>
                                    </div>
                                </div>

                                <!-- Sidebar Menu | menu lateral-->
                                <nav class="mt-2">
                                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                                        <!-- Add icons to the links using the .nav-icon class
                        with font-awesome or any other icon font library -->
                                        <li class="nav-item has-treeview menu-open">
                                            <a href="./index.html" class="nav-link active">
                                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                                <p>Tablero</p>
                                            </a>
                                        </li>
                                        <!-- Seccion del Administrador  -->
                                        <li class="nav-item has-treeview">
                                            <a href="#" class="nav-link">
                                                <i class="nav-icon fas fa-user-cog"></i>
                                                <p>
                                                    Administración
                                                    <i class="fas fa-angle-left right"></i>
                                                </p>
                                            </a>
                                            <ul class="nav nav-treeview">
                                                <li class="nav-item">
                                                    <a href="#" class="nav-link">
                                                        <i class="fas fa-plus-circle nav-icon text-warning"></i>
                                                        <p>Adicionar</p>
                                                    </a>
                                                </li>
                                            </ul>
                                            <ul class="nav nav-treeview">
                                                <li class="nav-item">
                                                    <a href="#" class="nav-link">
                                                        <i class="fas fa-cloud-upload-alt nav-icon text-warning"></i>
                                                        <p>Actualizar</p>
                                                    </a>
                                                </li>
                                            </ul>
                                            <ul class="nav nav-treeview">
                                                <li class="nav-item">
                                                    <a href="#" class="nav-link">
                                                        <i class="fas fa-chart-pie nav-icon text-warning"></i>
                                                        <p>Consultar</p>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <!-- Fin Administrador -->
                                        <li class="nav-item has-treeview">
                                            <a href="#" class="nav-link">
                                                <i class="nav-icon fas fa-swimmer"></i>
                                                <p>
                                                    Atleta
                                                    <i class="fas fa-angle-left right"></i>
                                                </p>
                                            </a>
                                            <ul class="nav nav-treeview">
                                                <li class="nav-item">
                                                    <a href="#" class="nav-link">
                                                        <i class="fas fa-swimming-pool nav-icon text-warning"></i>
                                                        <p>Inscribir a un curso</p>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="#" class="nav-link">
                                                        <i class="fas fa-history nav-icon text-warning"></i>
                                                        <p>Historial de pago</p>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="nav-item has-treeview">
                                            <a href="#" class="nav-link">
                                                <i class="nav-icon fas fa-cash-register"></i>
                                                <p>
                                                    Cajero
                                                    <i class="right fas fa-angle-left"></i>
                                                </p>
                                            </a>
                                            <ul class="nav nav-treeview">
                                                <li class="nav-item">
                                                    <a href="#" class="nav-link">
                                                        <i class="fas fa-cart-plus nav-icon text-warning"></i>
                                                        <p>Inscribir</p>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="#" class="nav-link">
                                                        <i class="fas fa-file-invoice-dollar nav-icon text-warning"></i>
                                                        <p>Registrar Pagos</p>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="#" class="nav-link">
                                                        <i class="fas fa-chart-pie nav-icon text-warning"></i>
                                                        <p>Ver informes</p>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="nav-item has-treeview">
                                            <a href="#" class="nav-link">
                                                <i class="nav-icon fas fa-clipboard-list"></i>
                                                <p>
                                                    Asistente
                                                    <i class="fas fa-angle-left right"></i>
                                                </p>
                                            </a>
                                            <ul class="nav nav-treeview">
                                                <li class="nav-item">
                                                    <a href="#" class="nav-link">
                                                        <i class="fas fa-clipboard-check nav-icon text-warning"></i>
                                                        <p>Registrar Asistencia</p>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </nav>
                                <!-- /.sidebar-menu -->
                            </div>
                            <!-- /.sidebar -->
                            </aside>

                            <!-- Content Wrapper. Contains page content -->
                            <div class="content-wrapper">
                                <!-- Content Header (Page header) -->
                                <div class="content-header">
                                    <div class="container-fluid">
                                        <div class="row mb-2">
                                            <div class="col-sm-6">
                                                <h1 class="m-0 text-dark">Tablero</h1>
                                            </div>
                                            <!-- /.col -->
                                            <div class="col-sm-6">
                                                <ol class="breadcrumb float-sm-right">
                                                    <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                                                    <li class="breadcrumb-item active">Tablero</li>
                                                </ol>
                                            </div>
                                            <!-- /.col -->
                                        </div>
                                        <!-- /.row -->
                                    </div>
                                    <!-- /.container-fluid -->
                                </div>
                                <!-- /.content-header -->

                                <!-- Main content -->
                                <section class="content">
                                    <div class="container-fluid">
                                        <!-- Small boxes (Stat box) -->
                                        <div class="row">
                                            <div class="col-lg-4 col-6">
                                                <!-- small box -->
                                                <div class="small-box bg-info">
                                                    <div class="inner">
                                                        <h3>15</h3>
                                                        <!-- Aqui ira la cantidad de cursos registrados -->
                                                        <p>Cursos</p>
                                                    </div>
                                                    <div class="icon">
                                                        <i class="fas fa-water"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- ./col -->
                                            <div class="col-lg-4 col-6">
                                                <!-- small box -->
                                                <div class="small-box bg-success">
                                                    <div class="inner">
                                                        <h3>53</h3>

                                                        <p>Atletas</p>
                                                    </div>
                                                    <div class="icon">
                                                        <i class="nav-icon fas fa-swimmer"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- ./col -->
                                            <div class="col-lg-4 col-6">
                                                <!-- small box -->
                                                <div class="small-box bg-warning">
                                                    <div class="inner">
                                                        <h3>14</h3>

                                                        <p>Instructores</p>
                                                    </div>
                                                    <div class="icon">
                                                        <i class="fas fa-users"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- ./col -->
                                        </div>
                                        <!-- /.row -->
                                        <!-- Main row -->
                                        <div class="row">
                                            <!-- Left col -->
                                            <section class="col-lg-6 connectedSortable">
                                                <!-- TO DO List  Lista de tareas pendientes-->
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h3 class="card-title">
                                                            <i class="ion ion-clipboard mr-1"></i> Lista de tareas pendientes
                                                        </h3>
                                                    </div>
                                                    <!-- /.card-header -->
                                                    <div class="card-body">
                                                        <ul class="todo-list" data-widget="todo-list">
                                                            <li>
                                                                <!-- drag handle -->
                                                                <span class="handle">
                                                                <i class="fas fa-ellipsis-v"></i>
                                                                <i class="fas fa-ellipsis-v"></i>
                                                                </span>
                                                                <!-- checkbox -->
                                                                <div class="icheck-primary d-inline ml-2">
                                                                    <input type="checkbox" value="" name="todo1" id="todoCheck1" />
                                                                    <label for="todoCheck1"></label>
                                                                </div>
                                                                <!-- todo text -->
                                                                <span class="text">Revisar los pagos de este mes</span>
                                                                <!-- General tools such as edit or delete-->
                                                                <div class="tools">
                                                                    <i class="fas fa-edit"></i>
                                                                    <i class="fas fa-trash-o"></i>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <span class="handle">
                                                                <i class="fas fa-ellipsis-v"></i>
                                                                <i class="fas fa-ellipsis-v"></i>
                                                                </span>
                                                                <div class="icheck-primary d-inline ml-2">
                                                                    <input type="checkbox" value="" name="todo2" id="todoCheck2" checked />
                                                                    <label for="todoCheck2"></label>
                                                                </div>
                                                                <span class="text">Realizar mantenimiento de la piscina</span>
                                                                <div class="tools">
                                                                    <i class="fas fa-edit"></i>
                                                                    <i class="fas fa-trash-o"></i>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <span class="handle">
                                                                <i class="fas fa-ellipsis-v"></i>
                                                                <i class="fas fa-ellipsis-v"></i>
                                                                </span>
                                                                <div class="icheck-primary d-inline ml-2">
                                                                    <input type="checkbox" value="" name="todo3" id="todoCheck3" />
                                                                    <label for="todoCheck3"></label>
                                                                </div>
                                                                <span class="text">Agregar las fecha de los eventos al calendario</span>
                                                                <div class="tools">
                                                                    <i class="fas fa-edit"></i>
                                                                    <i class="fas fa-trash-o"></i>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <span class="handle">
                                                                <i class="fas fa-ellipsis-v"></i>
                                                                <i class="fas fa-ellipsis-v"></i>
                                                                </span>
                                                                <div class="icheck-primary d-inline ml-2">
                                                                    <input type="checkbox" value="" name="todo4" id="todoCheck4" />
                                                                    <label for="todoCheck4"></label>
                                                                </div>
                                                                <span class="text">Reunión con los asistentes</span>
                                                                <div class="tools">
                                                                    <i class="fas fa-edit"></i>
                                                                    <i class="fas fa-trash-o"></i>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <span class="handle">
                                                                <i class="fas fa-ellipsis-v"></i>
                                                                <i class="fas fa-ellipsis-v"></i>
                                                                </span>
                                                                <div class="icheck-primary d-inline ml-2">
                                                                    <input type="checkbox" value="" name="todo5" id="todoCheck5" />
                                                                    <label for="todoCheck5"></label>
                                                                </div>
                                                                <span class="text">Actualizaciones pendientes del sitio</span>
                                                                <div class="tools">
                                                                    <i class="fas fa-edit"></i>
                                                                    <i class="fas fa-trash-o"></i>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <span class="handle">
                                                                <i class="fas fa-ellipsis-v"></i>
                                                                <i class="fas fa-ellipsis-v"></i>
                                                                </span>
                                                                <div class="icheck-primary d-inline ml-2">
                                                                    <input type="checkbox" value="" name="todo6" id="todoCheck6" />
                                                                    <label for="todoCheck6"></label>
                                                                </div>
                                                                <span class="text">Reunión con los Instructores</span>
                                                                <div class="tools">
                                                                    <i class="fas fa-edit"></i>
                                                                    <i class="fas fa-trash-o"></i>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <!-- /.card-body -->
                                                    <div class="card-footer clearfix">
                                                        <button type="button" class="btn btn-info float-right">
                                                        <i class="fas fa-plus"></i> Agregar tarea
                                                        </button>
                                                    </div>
                                                </div>
                                                <!-- /.card -->


                                            </section>
                                            <!-- /.Left col -->
                                            <!-- right col (We are only adding the ID to make the widgets sortable)-->
                                            <section class="col-lg-6 connectedSortable">
                                                <!-- Map card -->
                                                <div class="card bg-gradient-primary" hidden>
                                                    <!-- Esta oculto para que el calendario pueda funcionar -->
                                                    <div class="card-header border-0">
                                                        <h3 class="card-title">
                                                            <i class="fas fa-map-marker-alt mr-1"></i> Visitors
                                                        </h3>
                                                        <!-- card tools -->
                                                        <div class="card-tools">
                                                            <button type="button" class="btn btn-primary btn-sm" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                                              <i class="fas fa-minus"></i>
                                                            </button>
                                                        </div>
                                                        <!-- /.card-tools -->
                                                    </div>
                                                    <div class="card-body">
                                                        <!-- <div id="world-map" style="height: 250px; width: 100%;"></div> -->
                                                    </div>
                                                    <!-- /.card-body-->
                                                    <div class="card-footer bg-transparent">
                                                        <div class="row">
                                                            <div class="col-4 text-center">
                                                                <div id="sparkline-1"></div>
                                                                <div class="text-white">Visitors</div>
                                                            </div>
                                                            <!-- ./col -->
                                                            <div class="col-4 text-center">
                                                                <div id="sparkline-2"></div>
                                                                <div class="text-white">Online</div>
                                                            </div>
                                                            <!-- ./col -->
                                                            <div class="col-4 text-center">
                                                                <div id="sparkline-3"></div>
                                                                <div class="text-white">Sales</div>
                                                            </div>
                                                            <!-- ./col -->
                                                        </div>
                                                        <!-- /.row -->
                                                    </div>
                                                </div>
                                                <!-- /.card -->

                                                <!-- Calendar Calendario-->
                                                <div class="card bg-gradient-success">
                                                    <div class="card-header border-0">
                                                        <h3 class="card-title">
                                                            <i class="far fa-calendar-alt"></i> Calendario
                                                        </h3>
                                                        <!-- tools card -->
                                                        <div class="card-tools">
                                                            <!-- button with a dropdown -->
                                                            <div class="btn-group">
                                                                <button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown">
                                                                  <i class="fas fa-bars"></i>
                                                                </button>
                                                            </div>
                                                            <button type="button" class="btn btn-success btn-sm" data-card-widget="collapse">
                                                              <i class="fas fa-minus"></i>
                                                            </button>
                                                            <button type="button" class="btn btn-success btn-sm" data-card-widget="remove">
                                                            <i class="fas fa-times"></i>
                                                          </button>
                                                        </div>
                                                        <!-- /. tools -->
                                                    </div>
                                                    <!-- /.card-header -->
                                                    <div class="card-body pt-0">
                                                        <!--The calendar -->
                                                        <div id="calendar" style="width: 100%"></div>
                                                    </div>
                                                    <!-- /.card-body -->
                                                </div>
                                                <!-- /.card -->
                                            </section>
                                            <!-- right col -->
                                        </div>
                                        <!-- /.row (main row) -->
                                    </div>
                                    <!-- /.container-fluid -->
                                </section>
                                <!-- /.content -->
                            </div>
                            <!-- /.content-wrapper -->
                            <footer class="main-footer">
                                <strong>Copyright &copy;2019 Club Peces Dorados
                                  <i class="nav-icon fas fa-fish text-warning"></i> |
                                </strong> All rights reserved.<a href="https://github.com/Eliosth/PecesDorados/tree/informes" target="_blank">Desarrollo 💻</a>.
                            </footer>

                            <!-- Control Sidebar -->
                            <aside class="control-sidebar control-sidebar-dark">
                                <!-- Control sidebar content goes here -->
                            </aside>
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
    <script src="plugins/chart.js/Chart.js"></script>
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
</body>

</html>