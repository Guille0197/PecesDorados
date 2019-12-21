<?php
include("funcionesSQL/atletaSQL.php");
$conn = mysqli_connect("localhost","root","","clubnatacion")or die ("No se ha podido conectar al servidor de Base de datos");

/// Realizar el registro del Adulto Responsable
if(isset($_POST["btnGuardarAdulto"])){
    // Variables Atleta
    @$cedulaAdulto = $_POST["idAdulto"];
    @$nombreAdulto = $_POST["nombreAdulto"];
    @$parentescoAdulto = $_POST["parentescoAdulto"];
    @$celularAdulto = $_POST["celularAdulto"];
    @$edadAdulto = $_POST["edadAdulto"];

    $Inscripcion = AtletaSQL::registrarAdulto($cedulaAdulto, $nombreAdulto, $parentescoAdulto, $celularAdulto, $edadAdulto);
    header("Location:add.php");
} else {
    echo"ERROR adulto";
}
///FIN DEL Adulto

/// Realizar el registro del ATLETA
if(isset($_POST["btnGuardarAtleta"])){
    // Variables Atleta
    @$cedulaAtleta = $_POST["idAtleta"];
    @$nombreAtleta = $_POST["nombreAtleta"];
    @$edadAtleta = $_POST["edadAtleta"];
    @$conocimientoAtleta = $_POST["conocimientoAtleta"];
    @$direccionAtleta = $_POST["direccionAtleta"];
    @$cedulaAdultoResponsabelAtleta = $_POST["cedulaAdultoResponsableAtleta"];
    @$valorSelectCurso = $_POST["curso"];

    $Inscripcion = AtletaSQL::registrarAtleta($cedulaAtleta, $nombreAtleta, $edadAtleta, $conocimientoAtleta, $direccionAtleta, $cedulaAdultoResponsabelAtleta, $valorSelectCurso);
    header("Location:add.php");
} else {
    echo"ERROR atleta";
}
///FIN DEL entrenador

/// Realizar el registro del entrenador
if(isset($_POST["btnGuardarEntrenador"])){
    // Variables Atleta
    @$cedula = $_POST["idEntrenador"];
    @$nombre = $_POST["nombreEntrenador"];
    @$telefono = $_POST["telefonoEntrenador"];

    $Inscripcion = AtletaSQL::registrarEntrenador($cedula, $nombre, $telefono);
    header("Location:add.php");
} else {
    echo"ERROR entrenador";
}
///FIN DEL entrenador


/// Registrar administrador
if(isset($_POST['btnGuardarAdmin'])){
    try {
      $usuario=$_POST['nombreAdmin'];
      $password=$_POST['password'];
      $repet_password=$_POST['repet_password'];
      $cedula=$_POST['idAdmin'];
      $edad=$_POST['edadAdmin'];
      $tipo=1; // Tipo de rol Admin
  
          if ($password == $repet_password ) {
              $pdoQuery='INSERT INTO usuarios(usuario,password,cedula,edad,rol_id) VALUES(:usuario, :password, :cedula, :edad, :rol_id)';
              $db = new BaseDeDatos();
              $pdoResult=$db->obtenerConexion()->prepare($pdoQuery);
              $pdoExec= $pdoResult->execute([':usuario' => $usuario, ':password' => $password, ':cedula' => $cedula, ':edad' => $edad, ':rol_id'=>$tipo ]);
          
              if($pdoExec){
                  header('location: add.php');
              }   
          }else{
              ?>
              <script>
                  alert("⚠ ERROR: las contraseñas no son iguales ⚠");
                  window.location="add.php";
              </script>
          <?php   
          }
  
    } catch (Exception $exc) {
      echo $exc->getMessage();
      exit();
    } 
  }
// fin admin

/// Realizar el registro del cajero
if(isset($_POST["btnGuardarCajero"])){
    // Variables Atleta
    @$cedula = $_POST["idCajero"];
    @$nombre = $_POST["nombreCajero"];
    @$passCajero = $_POST["passCajero"];
    @$edad = $_POST["edadCajero"];
    $tipo=2; // Tipo de rol cajero

    $Inscripcion = AtletaSQL::registrarCajero($nombre, $passCajero,$cedula, $edad, $tipo);
    header("Location:add.php");
    echo" - entrooo";
} else {
    echo"ERROR Cajero";
}
///FIN DEL cajero

/// Realizar el registro del Asistente
if(isset($_POST["btnGuardarAsistente"])){
    // Variables Atleta
    @$cedula = $_POST["idAsistente"];
    @$nombre = $_POST["nombreAsistente"];
    @$passAsistente = $_POST["passAsistente"];
    @$edad = $_POST["edadAsistente"];
    $tipo=3; // Tipo de rol Asistente

    $Inscripcion = AtletaSQL::registrarAsistente($nombre, $passAsistente,$cedula, $edad, $tipo);
    header("Location:add.php");
    echo" - entrooo";
} else {
    echo"ERROR Asistente";
}
///FIN DEL cajero

// Borrar ADULTO
if (isset($_POST['deleteAdulto_btn'])) {

    $id = $_POST['deleteAdulto_id'];

    $sql =  "DELETE FROM adultoresponsable WHERE idadulto ='$id' ";
    $consulta =  mysqli_query($conn, $sql);

    if ($sql ) {
        header('Location: add.php');
    }
    else {
        header('Location: codigo.php');
    }
}#

// Borrar ATLETA
if (isset($_POST['deleteAtleta_btn'])) {

    $id = $_POST['deleteAtleta_id'];

    $sql =  "DELETE FROM atletas WHERE id ='$id' ";
    $consulta =  mysqli_query($conn, $sql);

    if ($sql ) {
        header('Location: add.php');
    }
    else {
        header('Location: codigo.php');
    }
}#

// Borrar Entrenador
if (isset($_POST['deleteEntrenador_btn'])) {

    $id = $_POST['deleteteEntrenador_id'];

    $sql =  "DELETE FROM Entrenadores WHERE cedulaentrenador ='$id' ";
    $consulta =  mysqli_query($conn, $sql);

    if ($sql ) {
        header('Location: add.php');
    }
    else {
        header('Location: codigo.php');
    }
}#
 
// Borrar Administardor
if (isset($_POST['deleteAdmin_btn'])) {

    $id = $_POST['deleteAdmin_id'];

    $sql =  "DELETE FROM usuarios WHERE id ='$id' ";
    $consulta =  mysqli_query($conn, $sql);

    if ($sql ) {
        header('Location: add.php');
    }
    else {
        header('Location: codigo.php');
    }
}#

// Borrar Cajero
if (isset($_POST['deleteCajero_btn'])) {

    $id = $_POST['deleteCajero_id'];

    $sql =  "DELETE FROM usuarios WHERE id ='$id' ";
    $consulta =  mysqli_query($conn, $sql);

    if ($sql ) {
        header('Location: add.php');
    }
    else {
        header('Location: codigo.php');
    }
}#

// Borrar Entrenador
if (isset($_POST['deleteEntrenador_btn'])) {

    $id = $_POST['deleteEntrenador_id'];

    $sql =  "DELETE FROM entrenadores WHERE cedulaentrenador ='$id' ";
    $consulta =  mysqli_query($conn, $sql);

    if ($sql ) {
        header('Location: add.php');
    }
    else {
        header('Location: codigo.php');
    }
}#

// Borrar Asistente
if (isset($_POST['deleteAsistente_btn'])) {

    $id = $_POST['deleteAsistente_id'];

    $sql =  "DELETE FROM usuarios WHERE id ='$id' ";
    $consulta =  mysqli_query($conn, $sql);

    if ($sql ) {
        header('Location: add.php');
    }
    else {
        header('Location: codigo.php');
    }
}#



  ######### UPDATE ADMIN
  if (isset($_POST['btnActualizarAdmin'])) {

    $id = $_POST['idAdmin'];
    $nombreAdmin = $_POST['nombreAdmin'];
    $cedulaAdmin = $_POST['cedulaAdmin'];
    $edadAdmin = $_POST['edadAdmin'];
    $contrase = $_POST['contrase'];

    $query =  "UPDATE usuarios SET usuario ='$nombreAdmin', password ='$contrase', cedula ='$cedulaAdmin', edad ='$edadAdmin' WHERE id='$id' ";
    $query_run = mysqli_query($conn, $query);

    if ($query_run ) {
        header('Location: add.php');
    }
    else {
        header('Location: codigo.php');
    }
}#

?>