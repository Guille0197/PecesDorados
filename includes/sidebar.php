 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="indexAdmin.php" class="brand-link">
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
                                        <a href="#" class="d-block">Administrador: <?php echo $cedula;  ?></a>
                                    </div>
                                </div>

                                <!-- Sidebar Menu | menu lateral-->
                                <nav class="mt-2">
                                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                                        <!-- Add icons to the links using the .nav-icon class
                        with font-awesome or any other icon font library -->
                                        <li class="nav-item has-treeview menu-open">
                                            <a href="indexAdmin.php" class="nav-link active">
                                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                                <p>Tablero</p>
                                            </a>
                                        </li>
                                        <!-- Seccion del Administrador  -->
                                        <li class="nav-item has-treeview">
                                            <a href="add.php" class="nav-link">
                                                <i class="nav-icon fas fa-user-cog"></i>
                                                <p>
                                                    Administración
                                                </p>
                                            </a>
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
