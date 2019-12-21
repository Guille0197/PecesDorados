<?php
include('includes/header.php'); 
include('includes/sidebar.php'); 
include("funcionesSQL/atletaSQL.php");

///
$carrerabd = AtletaSQL::obtenerCurso();
$idAdultoAdd = AtletaSQL::obtenerAdultoAdd();

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
                                                <li class="breadcrumb-item active" aria-current="page">Administración</li>
                                            </ol>
                                        </nav>
                                        
                                        <nav>
                                        <div class="nav nav-tabs " id="nav-tab" role="tablist">
                                            <a class="nav-item nav-link active" id="nav-home-tab1" data-toggle="tab" href="#nav-home1" role="tab" aria-controls="nav-home1" aria-selected="true">Administradores</a>
                                            <a class="nav-item nav-link" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Acudiente</a>
                                            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Atleta</a>
                                            <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Entrenador</a>
                                            <a class="nav-item nav-link" id="nav-contact-tab1" data-toggle="tab" href="#nav-contact1" role="tab" aria-controls="nav-contact1" aria-selected="false">Cajero</a>
                                            <a class="nav-item nav-link" id="nav-contact-tab2" data-toggle="tab" href="#nav-contact2" role="tab" aria-controls="nav-contact2" aria-selected="false">Asistente</a>
                                        </div>
                                        </nav>

<div class="tab-content" id="nav-tabContent">

<div class="tab-pane fade show active" id="nav-home1" role="tabpanel1" aria-labelledby="nav-home-tab1">

      
                                    <div class="modal fade" id="addadminprofile1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Ingresar adulto Responsable</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="codigo.php" method="POST">
                                            <div class="modal-body">
                                            <div class="row">
                                                <div class="form-group col-6">
                                                    <label> Nombre de Usuario </label>
                                                    <input type="text" name="nombreAdmin" class="form-control" placeholder="Nombre de usuario"  required autofocus>
                                                </div>
                                                <div class="form-group col-6">
                                                    <label> Número de identificación </label>
                                                    <input type="text" name="idAdmin" class="form-control" placeholder="Número de cédula"  required >
                                                </div>
                                                <div class="form-group col-6">
                                                    <label>Edad</label>
                                                    <input type="number" name="edadAdmin" class="form-control" placeholder="Edad del admin" required>
                                                </div>
                                                <div class="form-group col-6">
                                                    <label for="gender">Seleccione el género</label>
                                                    <select id="gender" name="gender" class="form-control" required>
                                                        <option  disabled selected>Seleccione un género</option>
                                                        <option value="Masculino">Masculino</option>
                                                        <option value="Femenino">Femenino</option>
                                                    </select>
                                                </div>
                                                <div class="input-group col-6">
                                                    <input type="password" class="form-control" name="password" placeholder="Contraseña" required>
                                                    <div class="input-group-append">
                                                    <div class="input-group-text">
                                                        <span class="fas fa-lock"></span>
                                                    </div>
                                                    </div>
                                                </div>

                                                <div class="input-group col-6">
                                                    <input type="password" class="form-control" name="repet_password" placeholder="Repetir Contraseña" required>
                                                    <div class="input-group-append">
                                                    <div class="input-group-text">
                                                        <span class="fas fa-lock"></span>
                                                    </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <!-- row -->
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                                <button type="submit" name="btnGuardarAdmin"  class="btn btn-primary">Guardar</button>
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
                                            <h1 class="h3 mb-0 text-gray-800">Administardores</h1>
                                            <button type="button" class=" d-none d-sm-inline-block btn btn-lg btn-primary shadow-sm" data-toggle="modal" data-target="#addadminprofile1">
                                                <i class="fas fa-user-plus"></i> Añadir Admin</button>
                                        </div>
                                    </div>

                                    <div class="card-body">
                                        <div class="table-responsive">

                                        <?php 
                                        $connection = mysqli_connect("localhost","root","","clubnatacion")or die ("No se ha podido conectar al servidor de Base de datos");

                                        $query = "SELECT * FROM usuarios where rol_id = 1";
                                        $query_run = mysqli_query($connection,$query);
                                        ?>
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Nombre</th>
                                                <th>Contraseña</th>
                                                <th>Cédula</th>
                                                <th>Edad</th>
                                                <th>Editar</th>
                                                <th>Borrar</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            <?php
                                            if (mysqli_num_rows($query_run) > 0) {
                                                while ($row = mysqli_fetch_assoc($query_run)) {
                                                    @$contador++ ;
                                            ?>
                                                <tr>
                                                <td> <?php echo $contador; ?> </td>
                                                <td> <?php echo $row['usuario']; ?> </td>
                                                <td> <?php echo $row['password']; ?> </td>
                                                <td> <?php echo $row['cedula']; ?> </td>
                                                <td> <?php echo $row['edad']; ?> </td>

                                                <td>
                                                    <form action="editAdmin.php" method="post">
                                                        <input type="hidden" name="editAdmin_id" value="<?php echo $row['id']; ?>">
                                                        <button  type="submit" name="editAdmin_btn" class="btn btn-warning"><i class="fas fa-edit"></i> Editar</button>
                                                    </form>
                                                </td>
                                                <td>
                                                    <form action="codigo.php" method="POST">
                                                    <input type="hidden" name="deleteAdmin_id" value="<?php echo $row['id']; ?>">
                                                    <button type="submit" name="deleteAdmin_btn" class="btn btn-danger"><i class="fas fa-trash"></i> Borrar</button>
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
<!-- END Home1 -->



  <div class="tab-pane fade show" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">

      
                                    <div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Ingresar adulto Responsable</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="codigo.php" method="POST">
                                            <div class="modal-body">
                                            <div class="row">
                                                <div class="form-group col-6">
                                                    <label> Nombre y Apellido </label>
                                                    <input type="text" name="nombreAdulto" class="form-control" placeholder="Nombre completo"  required autofocus>
                                                </div>
                                                <div class="form-group col-6">
                                                    <label> Número de identificación </label>
                                                    <input type="text" name="idAdulto" class="form-control" placeholder="Número de cédula"  required >
                                                </div>
                                                <div class="form-group col-6">
                                                    <label>Edad</label>
                                                    <input type="number" name="edadAdulto" class="form-control" placeholder="Edad del adulto responsable" required>
                                                </div>
                                                <div class="form-group col-6">
                                                    <label> Teléfono celular </label>
                                                    <input type="number" name="celularAdulto" class="form-control" placeholder="+507 xxxx-xxxx"  required>
                                                </div>
                                                <div class="form-group col-6">
                                                    <label for="parentesco">Seleccione el parentesco</label>
                                                    <select id="parentesco" name="parentescoAdulto" class="form-control" required>
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
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                                <button type="submit" name="btnGuardarAdulto" id="btnGuardarAdulto" class="btn btn-primary">Guardar</button>
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
                                        $connection = mysqli_connect("localhost","root","","clubnatacion")or die ("No se ha podido conectar al servidor de Base de datos");

                                        $query = "SELECT * FROM adultoresponsable";
                                        $query_run = mysqli_query($connection,$query);
                                        ?>
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Nombre</th>
                                                <th>Parentesco</th>
                                                <th>Celular</th>
                                                <th>Edad</th>
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
                                                <td> <?php echo $row['idadulto']; ?> </td>
                                                <td> <?php echo $row['nombreadulto']; ?> </td>
                                                <td> <?php echo $row['parentescoadulto']; ?> </td>
                                                <td> <?php echo $row['celularadulto']; ?> </td>
                                                <td> <?php echo $row['edadadulto']; ?> </td>

                                                <td>
                                                    <form action="editAdulto.php" method="post">
                                                        <input type="hidden" name="edit_id" value="<?php echo $row['idadulto']; ?>">
                                                        <button  type="submit" name="edit_btn" class="btn btn-warning"><i class="fas fa-edit"></i> Editar</button>
                                                    </form>
                                                </td>
                                                <td>
                                                    <form action="codigo.php" method="POST">
                                                    <input type="hidden" name="deleteAdulto_id" value="<?php echo $row['idadulto']; ?>">
                                                    <button type="submit" name="deleteAdulto_btn" class="btn btn-danger"><i class="fas fa-trash"></i> Borrar</button>
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
<!-- END Home -->

  <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">

                                    <div class="modal fade" id="exampleModalLabel1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel1">Ingresar atleta</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="codigo.php" method="POST">
                                            <div class="modal-body">
                                            <div class="row">
                                                <div class="form-group col-6">
                                                    <label> Nombre del Atleta </label>
                                                    <input type="text" name="nombreAtleta" class="form-control" placeholder="Nombre completo"  required autofocus>
                                                </div>
                                                <div class="form-group col-6">
                                                    <label> Número de identificación </label>
                                                    <input type="text" name="idAtleta" class="form-control" placeholder="Número de cédula"  required >
                                                </div>
                                                <div class="form-group col-6">
                                                    <label>Edad</label>
                                                    <input type="number" min="1" max="35" class="form-control" required name="edadAtleta" placeholder="Edad del atleta">
                                                </div>
                                                <div class="form-group col-6">
                                                <label>Dirección</label>
                                                    <select class="form-control" id="direccion" name="direccionAtleta" required="require">
                                                        <option default selected disabled>Seleccione el distrito</option>
                                                        <option value="Monagrillo">Monagrillo</option>
                                                        <option value="La Arena">La Arena</option>
                                                        <option value="San Juan Bautista">San Juan Bautista</option>
                                                        <option value="Llano Bonito">Llano Bonito</option>
                                                        <option value="Chitré">Chitré</option>

                                                    </select>
                                                </div>
                                                <div class="form-group col-6">
                                                <label>Conocimiento</label>
                                                <select class="form-control" id="conocimiento" name="conocimientoAtleta" required>
                                                    <option default selected disabled>Conocimiento de natación</option>
                                                    <option value="SabeNadar">Sé nadar</option>
                                                    <option value="NoSabeNadar">No sé nadar</option>
                                                </select>
                                            </div>
                                                <div class="form-group col-6">
                                                    <label>Curso</label>
                                                    <select class="form-control form-control" required name="curso">
                                                        <option selected disabled>Seleccione el curso</option>
                                                        <?php
                                                        foreach ($carrerabd as $key => $value) {
                                                            $idcurso = $value['idcurso'];
                                                            echo "<option value=$idcurso>$idcurso</option>";
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="form-group col-6">
                                                    <label for="parentesco">Seleccione el responsable</label>
                                                    <select id="parentesco" name="cedulaAdultoResponsableAtleta" class="form-control" required>
                                                        <option  disabled selected>Seleccione adulto responasble</option>
                                                        <?php
                                                            foreach ($idAdultoAdd as $key => $value) {
                                                                $idAdulto = $value['idadulto'];
                                                                $nombre = $value['nombreadulto'];
                                                                echo "<option value=$idAdulto>$idAdulto -$nombre </option>";
                                                            }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="form-group col-6">
                                                    <label for="gender">Seleccione el género</label>
                                                    <select id="gender" name="generoAtleta" class="form-control" required>
                                                        <option  disabled selected>Seleccione un género</option>
                                                        <option value="Masculino">Masculino</option>
                                                        <option value="Femenino">Femenino</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-6">
                                                    <label> Contraseña *</label>
                                                    <input type="password" class="form-control" name="passw"  placeholder="Contraseña" required>
                                                </div>
                                            </div>
                                            <!-- row -->
                                                <input type="hidden" name="tipoRol" value="4">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                                <button type="submit" name="btnGuardarAtleta" class="btn btn-primary">Guardar</button>
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
                                            <h1 class="h3 mb-0 text-gray-800">Consultar Atleta</h1>
                                            <button type="button" class=" d-none d-sm-inline-block btn btn-lg btn-primary shadow-sm" data-toggle="modal" data-target="#exampleModalLabel1">
                                                <i class="fas fa-user-plus"></i> Añadir Atleta</button>
                                        </div>
                                    </div>

                                    <div class="card-body">
                                        <div class="table-responsive">

                                        <?php 
                                        $connection = mysqli_connect("localhost","root","","clubnatacion")or die ("No se ha podido conectar al servidor de Base de datos");

                                        $query = "SELECT * FROM atletas";
                                        $query_run = mysqli_query($connection,$query);
                                        ?>
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Nombre</th>
                                                <th>Identificación</th>
                                                <th>Edad</th>
                                                <th>Nada?</th>
                                                <th>Adulto</th>
                                                <th>Curso</th>
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
                                                <td> <?php echo $row['nombreatleta']; ?> </td>
                                                <td> <?php echo $row['cedulaatleta']; ?> </td>
                                                <td> <?php echo $row['edadatleta']; ?> </td>
                                                <td> <?php echo $row['nadar']; ?> </td>
                                                <td> <?php echo $row['idrespo']; ?> </td>
                                                <td> <?php echo $row['idcur']; ?> </td>

                                                
                                                <td>
                                                    <form action="editAtleta.php" method="post">
                                                        <input type="hidden" name="curso_id" value="<?php echo $row['id']; ?>">
                                                        <button  type="submit" name="edit_btn" class="btn btn-warning"><i class="fas fa-edit"></i> Editar</button>
                                                    </form>
                                                </td>
                                                <td>
                                                    <form action="codigo.php" method="post">
                                                    <input type="hidden" name="deleteteAtleta_id" value="<?php echo $row['id']; ?>">
                                                    <button type="submit" name="deleteAtleta_btn" class="btn btn-danger" onClick="Delete()"><i class="fas fa-trash"></i> Borrar</button>
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
  <!-- ENDprofile -->


  <!-- Cajero -->
  <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">

  <div class="modal fade" id="exampleModalLabel2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel1">Ingresar Entrenador</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="codigo.php" method="POST">
                                            <div class="modal-body">
                                            <div class="row">
                                                <div class="form-group col-12">
                                                    <label> Nombre del Entrenador </label>
                                                    <input type="text" name="nombreEntrenador" class="form-control" placeholder="Nombre completo"  required autofocus>
                                                </div>
                                                <div class="form-group col-12">
                                                    <label> Número de identificación </label>
                                                    <input type="text" name="idEntrenador" class="form-control" placeholder="Número de cédula"  required >
                                                </div>
                                                <div class="form-group col-6">
                                                    <label>Número teléfono </label>
                                                    <input type="number" class="form-control" required name="telefonoEntrenador" placeholder="Edad del entrenador">
                                                </div>
                                                <div class="form-group col-6">
                                                    <label for="gender">Seleccione el género</label>
                                                    <select id="gender" name="generoEntrenador" class="form-control" required>
                                                        <option  disabled selected>Seleccione un género</option>
                                                        <option value="Masculino">Masculino</option>
                                                        <option value="Femenino">Femenino</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <!-- row -->
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                                <button type="submit" name="btnGuardarEntrenador" class="btn btn-primary">Guardar</button>
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
                                            <h1 class="h3 mb-0 text-gray-800">Consultar Entrenador</h1>
                                            <button type="button" class=" d-none d-sm-inline-block btn btn-lg btn-primary shadow-sm" data-toggle="modal" data-target="#exampleModalLabel2">
                                                <i class="fas fa-user-plus"></i> Añadir Entrenador</button>
                                        </div>
                                    </div>

                                    <div class="card-body">
                                        <div class="table-responsive">

                                        <?php 
                                        $connection = mysqli_connect("localhost","root","","clubnatacion")or die ("No se ha podido conectar al servidor de Base de datos");

                                        $query = "SELECT * FROM entrenadores";
                                        $query_run = mysqli_query($connection,$query);
                                        ?>
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Nombre</th>
                                                <th>Cédula</th>
                                                <th>Telefono</th>
                                                <th>Editar</th>
                                                <th>Borrar</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            <?php
                                            @$contador=0 ;

                                            if (mysqli_num_rows($query_run) > 0) {
                                                while ($row = mysqli_fetch_assoc($query_run)) {
                                                    @$contador++ ;
                                            ?>
                                                <tr>
                                                <td> <?php echo $contador; ?> </td>
                                                <td> <?php echo $row['nombreentrenador']; ?> </td>
                                                <td> <?php echo $row['cedulaentrenador']; ?> </td>
                                                <td> <?php echo $row['telefonoentrenador']; ?> </td>

                                                <td>
                                                    <form action="editAdmin.php" method="post">
                                                        <input type="hidden" name="editAdmin_id" value="<?php echo $row['id']; ?>">
                                                        <button  type="submit" name="editAdmin_btn" class="btn btn-warning"><i class="fas fa-edit"></i> Editar</button>
                                                    </form>
                                                </td>
                                                <td>
                                                    <form action="codigo.php" method="POST">
                                                    <input type="hidden" name="deleteEntrenador_id" value="<?php echo $row['cedulaentrenador']; ?>">
                                                    <button type="submit" name="deleteEntrenador_btn" class="btn btn-danger"><i class="fas fa-trash"></i> Borrar</button>
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
  <!-- fin entrenador -->

  <div class="tab-pane fade" id="nav-contact1" role="tabpanel" aria-labelledby="nav-contact-tab1">
       
  <div class="modal fade" id="exampleModalLabel3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel3" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel3">Ingresar Cajero</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="codigo.php" method="POST">
                                            <div class="modal-body">
                                            <div class="row">
                                                <div class="form-group col-12">
                                                    <label> Nombre del Cajero </label>
                                                    <input type="text" name="nombreCajero" class="form-control" placeholder="Nombre completo"  required autofocus>
                                                </div>
                                                <div class="form-group col-12">
                                                    <label> Número de identificación </label>
                                                    <input type="text" name="idCajero" class="form-control" placeholder="Número de cédula"  required >
                                                </div>
                                                <div class="form-group col-12">
                                                    <label> Contraseña </label>
                                                    <input type="text" name="passCajero" class="form-control" placeholder="Contraseña"  required >
                                                </div>
                                                <div class="form-group col-6">
                                                    <label>edad </label>
                                                    <input type="number" class="form-control" required name="edadCajero" placeholder="Edad del Cajero">
                                                </div>
                                                <div class="form-group col-6">
                                                    <label for="gender">Seleccione el género</label>
                                                    <select id="gender" name="generoCajero" class="form-control" required>
                                                        <option  disabled selected>Seleccione un género</option>
                                                        <option value="Masculino">Masculino</option>
                                                        <option value="Femenino">Femenino</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <!-- row -->
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                                <button type="submit" name="btnGuardarCajero" class="btn btn-primary">Guardar</button>
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
                                            <h1 class="h3 mb-0 text-gray-800">Consultar Cajero</h1>
                                            <button type="button" class=" d-none d-sm-inline-block btn btn-lg btn-primary shadow-sm" data-toggle="modal" data-target="#exampleModalLabel3">
                                                <i class="fas fa-user-plus"></i> Añadir Cajero</button>
                                        </div>
                                    </div>

                                    <div class="card-body">
                                        <div class="table-responsive">

                                        <?php 
                                        $connection = mysqli_connect("localhost","root","","clubnatacion")or die ("No se ha podido conectar al servidor de Base de datos");

                                        $query = "SELECT * FROM usuarios where rol_id = 2";
                                        $query_run = mysqli_query($connection,$query);
                                        ?>
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Nombre</th>
                                                <th>Contraseña</th>
                                                <th>Cédula</th>
                                                <th>Edad</th>
                                                <th>Editar</th>
                                                <th>Borrar</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            <?php
                                            @$contador=0 ;

                                            if (mysqli_num_rows($query_run) > 0) {
                                                while ($row = mysqli_fetch_assoc($query_run)) {

                                                    @$contador++ ;
                                            ?>
                                                <tr>
                                                <td> <?php echo $contador; ?> </td>
                                                <td> <?php echo $row['usuario']; ?> </td>
                                                <td> <?php echo $row['password']; ?> </td>
                                                <td> <?php echo $row['cedula']; ?> </td>
                                                <td> <?php echo $row['edad']; ?> </td>

                                                <td>
                                                    <form action="editAdmin.php" method="post">
                                                        <input type="hidden" name="editAdmin_id" value="<?php echo $row['id']; ?>">
                                                        <button  type="submit" name="editAdmin_btn" class="btn btn-warning"><i class="fas fa-edit"></i> Editar</button>
                                                    </form>
                                                </td>
                                                <td>
                                                    <form action="codigo.php" method="POST">
                                                    <input type="hidden" name="deleteCajero_id" value="<?php echo $row['id']; ?>">
                                                    <button type="submit" name="deleteCajero_btn" class="btn btn-danger"><i class="fas fa-trash"></i> Borrar</button>
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
  <!-- cajero -->


  <!-- asistente -->
  <div class="tab-pane fade" id="nav-contact2" role="tabpane2" aria-labelledby="nav-contact-tab2">
  <div class="modal fade" id="exampleModalLabel4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel4" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel4">Ingresar Asistente</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="codigo.php" method="POST">
                                            <div class="modal-body">
                                            <div class="row">
                                                <div class="form-group col-12">
                                                    <label> Nombre del Asistente </label>
                                                    <input type="text" name="nombreAsistente" class="form-control" placeholder="Nombre completo"  required autofocus>
                                                </div>
                                                <div class="form-group col-12">
                                                    <label> Número de identificación </label>
                                                    <input type="text" name="idAsistente" class="form-control" placeholder="Número de cédula"  required >
                                                </div>
                                                <div class="form-group col-12">
                                                    <label> Contraseña </label>
                                                    <input type="text" name="passAsistente" class="form-control" placeholder="Contraseña"  required >
                                                </div>
                                                <div class="form-group col-6">
                                                    <label>edad </label>
                                                    <input type="number" class="form-control" required name="edadAsistente" placeholder="Edad del Asistente">
                                                </div>
                                                <div class="form-group col-6">
                                                    <label for="gender">Seleccione el género</label>
                                                    <select id="gender" name="generoAsistente" class="form-control" required>
                                                        <option  disabled selected>Seleccione un género</option>
                                                        <option value="Masculino">Masculino</option>
                                                        <option value="Femenino">Femenino</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <!-- row -->
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                                <button type="submit" name="btnGuardarAsistente" class="btn btn-primary">Guardar</button>
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
                                            <h1 class="h3 mb-0 text-gray-800">Consultar Asistente</h1>
                                            <button type="button" class=" d-none d-sm-inline-block btn btn-lg btn-primary shadow-sm" data-toggle="modal" data-target="#exampleModalLabel4">
                                                <i class="fas fa-user-plus"></i> Añadir Asistente</button>
                                        </div>
                                    </div>

                                    <div class="card-body">
                                        <div class="table-responsive">

                                        <?php 
                                        $connection = mysqli_connect("localhost","root","","clubnatacion")or die ("No se ha podido conectar al servidor de Base de datos");

                                        $query = "SELECT * FROM usuarios where rol_id = 3";
                                        $query_run = mysqli_query($connection,$query);
                                        ?>
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Nombre</th>
                                                <th>Contraseña</th>
                                                <th>Cédula</th>
                                                <th>Edad</th>
                                                <th>Editar</th>
                                                <th>Borrar</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            <?php
                                            @$contador=0 ;

                                            if (mysqli_num_rows($query_run) > 0) {
                                                while ($row = mysqli_fetch_assoc($query_run)) {

                                                    @$contador++ ;
                                            ?>
                                                <tr>
                                                <td> <?php echo $contador; ?> </td>
                                                <td> <?php echo $row['usuario']; ?> </td>
                                                <td> <?php echo $row['password']; ?> </td>
                                                <td> <?php echo $row['cedula']; ?> </td>
                                                <td> <?php echo $row['edad']; ?> </td>

                                                <td>
                                                    <form action="editAdmin.php" method="post">
                                                        <input type="hidden" name="editAdmin_id" value="<?php echo $row['id']; ?>">
                                                        <button  type="submit" name="editAdmin_btn" class="btn btn-warning"><i class="fas fa-edit"></i> Editar</button>
                                                    </form>
                                                </td>
                                                <td>
                                                    <form action="codigo.php" method="POST">
                                                    <input type="hidden" name="deleteAsistente_id" value="<?php echo $row['id']; ?>">
                                                    <button type="submit" name="deleteAsistente_btn" class="btn btn-danger"><i class="fas fa-trash"></i> Borrar</button>
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
  <!-- asistente -->
                                    </div>
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