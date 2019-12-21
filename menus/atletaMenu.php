<?php

if (!isset($_SESSION)) {
    session_start();
}
// session_start(); //Toma el valor de la variable declarada en el login

$usuario = $_SESSION['usuario'];
?>


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
        <a href="atleta.php" class="d-block"> <?php  echo $usuario;   ?> </a>
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