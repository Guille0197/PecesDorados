<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />

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





<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="index3.html" class="brand-link">
    <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8" />
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
        <a href="#" class="d-block">Atleta</a>
      </div>
    </div>

    <!-- Sidebar Menu | menu lateral-->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Seccion atleta -->
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-swimmer"></i>
            <p>
              Opciones
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="atletaInscripcion.php" class="nav-link">
                <i class="far fa-circle nav-icon text-warning"></i>
                <p>Inscribir a un curso</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="atletaHistorial.php" class="nav-link">
                <i class="far fa-circle nav-icon text-success"></i>
                <p>Historial de pago</p>
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