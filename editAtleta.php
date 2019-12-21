<?php
include('includes/header.php'); 
include('includes/sidebar.php'); 
include("funcionesSQL/atletaSQL.php");

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
                                                <li class="breadcrumb-item active" aria-current="page">Editar Adulto</li>
                                            </ol>
                                        </nav>
                                    </div>
                                    <!--  -->
                                    <div class="card">

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
                                            <div class="modal-footer float-left">
                                                <a href="add.php" type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</a>
                                                <button type="submit" name="btnGuardarAtleta" class="btn btn-success">Guardar</button>
                                            </div>
                                        </form>

<?php
include('includes/scriptJS.php');
include('includes/footer.php');
?>