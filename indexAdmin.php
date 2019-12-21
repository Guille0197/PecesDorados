<?php
include('includes/header.php'); 
include('includes/sidebar.php'); 
?>
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

<?php
include('includes/scriptJS.php');
include('includes/footer.php');
?>