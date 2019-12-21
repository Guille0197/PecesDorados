<?php
include('includes/header.php'); 
include('includes/sidebar.php'); 
include("funcionesSQL/atletaSQL.php");

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
                                                <li class="breadcrumb-item active" aria-current="page">Editar</li>
                                            </ol>
                                        </nav>
                                    </div>
                                    <!--  -->
                                    <div class="card">
<?php
$connection = mysqli_connect("localhost","root","","clubnatacion")or die ("No se ha podido conectar al servidor de Base de datos");

    if (isset($_POST['editAdmin_btn'])) {
        $id = $_POST['editAdmin_id'];

        $query = "SELECT * FROM usuarios WHERE id='$id' ";
        $query_run = mysqli_query($connection, $query);

        foreach ($query_run as $row) {
?>
                                    <form action="codigo.php" method="POST">
                                            <div class="modal-body">
                                            <div class="row">
                                                <div class="form-group col-6">
                                                    <label> Nombre de Usuario </label>
                                                    <input type="text" name="nombreAdmin" class="form-control" value="<?php echo $row['usuario'] ?>"  required autofocus>
                                                </div>
                                                <div class="form-group col-6">
                                                    <label> Número de identificación </label>
                                                    <input type="text" name="cedulaAdmin" class="form-control" value="<?php echo $row['cedula'] ?>"  required >
                                                </div>
                                                <div class="form-group col-6">
                                                    <label>Edad</label>
                                                    <input type="number" name="edadAdmin" class="form-control" value="<?php echo $row['edad'] ?>" required>
                                                </div>
                                                <div class="form-group col-6">
                                                    <label>Contraseña</label>
                                                    <input type="text" name="contrase" class="form-control" value="<?php echo $row['password'] ?>" required>
                                                </div>

                                                <input type="hidden" name="idAdmin"  value="<?php echo $row['id'] ?>">
                                            </div>
                                            <!-- row -->
                                            </div>
                                            <div class="modal-footer float-left">
                                                <a href="add.php" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</a>
                                                <button href="codigo.php" type="submit" name="btnActualizarAdmin"  class="btn btn-success">Actualizar</button>
                                            </div>
                                        </form>
                                        <?php
                                                }
                                            }
                                        ?>
                                    </div>
                                    <!--  -->
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