<?php
include('includes/header.php'); 
include('includes/sidebar.php'); 
?>
                            <!-- Content Wrapper. Contains page content -->
                            <div class="content-wrapper">
                                <!-- Content Header (Page header) -->
                                <div class="content-header">
                                    <div class="container-fluid">
                                    <!--Contenido de la pagina a mostrar  -->
                                    <nav class="container" aria-label="breadcrumb">
                                            <ol class="breadcrumb">
                                                <li class="breadcrumb-item"><a href="indexAdmin.php">Tablero</a></li>
                                                <li class="breadcrumb-item active" aria-current="page">Consulta Adulto Responsable</li>
                                            </ol>
                                        </nav>
                                    <div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Ingresar adulto responsable</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="codigo.php" method="POST">
                                            <div class="modal-body">
                                            <div class="row">
                                                <div class="form-group col-6">
                                                    <label> Nombre y Apellido </label>
                                                    <input type="text" name="name" class="form-control" placeholder="Nombre completo"  required autofocus>
                                                </div>
                                                <div class="form-group col-6">
                                                    <label> Número de identificación </label>
                                                    <input type="text" name="numerid" class="form-control" placeholder="Número de cédula"  required >
                                                </div>
                                                <div class="form-group col-6">
                                                    <label>Edad</label>
                                                    <input type="number" name="edad" class="form-control" placeholder="Edad del adulto responsable" required>
                                                </div>
                                                <div class="form-group col-6">
                                                    <label> Teléfono celular </label>
                                                    <input type="number" name="phone" class="form-control" placeholder="+507 xxxx-xxxx"  required>
                                                </div>
                                                <div class="form-group col-6">
                                                    <label for="parentesco">Seleccione el parentesco</label>
                                                    <select id="parentesco" name="parentesco" class="form-control" required>
                                                        <option  disabled selected>Seleccione parentesco</option>
                                                        <option value="Madre">Madre</option>
                                                        <option value="Padre">Padre</option>
                                                        <option value="Abuelo/Abuela">Abuelo / Abuela</option>
                                                        <option value="Tio/Tia">Tío / Tía</option>
                                                        <option value="Amistad">Amistad</option>
                                                        <option value="Otro">Otro</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-6">
                                                    <label for="gender">Seleccione el género</label>
                                                    <select id="gender" name="gender" class="form-control" required>
                                                        <option  disabled selected>Seleccione un género</option>
                                                        <option value="Masculino">Masculino</option>
                                                        <option value="Femenino">Femenino</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <!-- row -->
                                                <input type="hidden" name="usertype" value="teachers">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                                <button type="submit" name="teacherbtn" class="btn btn-primary">Guardar</button>
                                            </div>
                                        </form>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="container-fluid">

                                    <!-- Data Tables  -->
                                    <div class="card shadow mb-4">
                                    <div class="card-header py-3">

                                        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                                            <h1 class="h3 mb-0 text-gray-800">Adulto responsable</h1>
                                            <button type="button" class=" d-none d-sm-inline-block btn btn-lg btn-primary shadow-sm" data-toggle="modal" data-target="#addadminprofile">
                                                <i class="fas fa-user-plus"></i> Añadir Adulto</button>
                                        </div>
                                    </div>

                                    <div class="card-body">
                                        <div class="table-responsive">

                                        <?php 
                                        $connection = mysqli_connect("localhost","root","","projectbd")or die ("No se ha podido conectar al servidor de Base de datos");

                                        $query = "SELECT * FROM teachers";
                                        $query_run = mysqli_query($connection,$query);
                                        ?>
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Nombre</th>
                                                <th>Identificación</th>
                                                <th>Celular</th>
                                                <th>Edad</th>
                                                <th>Sexo</th>
                                                <th>Editar</th>
                                                <th>Borrar</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            <?php
                                            if (mysqli_num_rows($query_run) > 0) {
                                                while ($row = mysqli_fetch_assoc($query_run)) {
                                            ?>
                                                <tr>
                                                <td> <?php echo $row['id']; ?> </td>
                                                <td> <?php echo $row['name']; ?> </td>
                                                <td> <?php echo $row['numerid']; ?> </td>
                                                <td> <?php echo $row['email']; ?> </td>
                                                <td> <?php echo $row['username']; ?> </td>
                                                <td> <?php echo $row['department']; ?> </td>

                                                <td>
                                                    <form action="editteachers.php" method="post">
                                                        <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
                                                        <button  type="submit" name="edit_btn" class="btn btn-warning"><i class="fas fa-edit"></i> Editar</button>
                                                    </form>
                                                </td>
                                                <td>
                                                    <form action="code.php" method="post">
                                                    <input type="hidden" name="deleteteachers_id" value="<?php echo $row['id']; ?>">
                                                    <button type="submit" name="deleteteachers_btn" class="btn btn-danger" onClick="Delete()"><i class="fas fa-trash"></i> Borrar</button>
                                                    </form>
                                                </td>
                                                
                                            <?php
                                                }
                                                }
                                            else {
                                            echo "No record Found";
                                            }
                                            ?>
                                            </tbody>
                                        </table>

                                        </div>
                                    </div>

                                    </div>

                                    </div>
                                    <!-- /.container-fluid -->

                                    <!--fin del contenido de la pagina  -->
                                    </div>
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