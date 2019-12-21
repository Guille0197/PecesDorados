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
                                                <li class="breadcrumb-item active" aria-current="page">Editar Adulto</li>
                                            </ol>
                                        </nav>
                                    </div>
                                    <!--  -->
                                    <div class="card">
<?php
$connection = mysqli_connect("localhost","root","","clubnatacion")or die ("No se ha podido conectar al servidor de Base de datos");

    if (isset($_POST['edit_btn'])) {
        $id = $_POST['edit_id'];

        $query = "SELECT * FROM adultoresponsable WHERE idadulto='$id' ";
        $query_run = mysqli_query($connection, $query);

        foreach ($query_run as $row) {
?>
                                    <form action="codigo.php" method="POST">
                                            <div class="modal-body">
                                            <div class="row">
                                                <div class="form-group col-6">
                                                    <label> Nombre y Apellido </label>
                                                    <input type="text" name="nombreAdulto" class="form-control" value="<?php echo $row['nombreadulto'] ?>"  required autofocus>
                                                </div>
                                                <div class="form-group col-6">
                                                    <label> Número de identificación </label>
                                                    <input type="text" name="idAdulto" class="form-control" value="<?php echo $row['idadulto'] ?>"  required >
                                                </div>
                                                <div class="form-group col-6">
                                                    <label>Edad</label>
                                                    <input type="number" name="edadAdulto" class="form-control" value="<?php echo $row['edadadulto'] ?>" required>
                                                </div>
                                                <div class="form-group col-6">
                                                    <label> Teléfono celular </label>
                                                    <input type="number" name="celularAdulto" class="form-control" value="<?php echo $row['celularadulto'] ?>"  required>
                                                </div>
                                            </div>
                                            <!-- row -->
                                            </div>
                                            <div class="modal-footer float-left">
                                                <a href="add.php" type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</a>
                                                <button type="submit" name="btnGuardarAdulto" id="btnActualizarAdulto" class="btn btn-success">Actualizar</button>
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