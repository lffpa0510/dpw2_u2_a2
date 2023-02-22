<?php 

require "connect.php";
$db = new Database();
$con = $db ->conectar();

$msg = '';

if (isset($_POST['registro'])) {
    $matricula = $_POST['matricula'];
    $nombre = $_POST['nombre'];
    $appaterno = $_POST['appaterno'];
    $apmaterno = $_POST['apmaterno'];
    $turno = $_POST['turno'];
    $password = $_POST['pass'];
    $tipo = "AL";

    if ($matricula != '' && $nombre != '' && $appaterno != '' && $apmaterno != '' && $turno != '' && $password != '') {
        if (preg_match("/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,20}/", $password)) {
            $select_query = $con->prepare("SELECT * FROM usuarios WHERE matricula=:matricula");
            $select_query->execute(['matricula' => $matricula]);
            $result_select = $select_query->fetchAll(PDO::FETCH_ASSOC);
            if ($result_select) {
                $msg = 'MATRICULA_EXISTE';
            } else {
                $insert_query = $con->prepare("INSERT INTO usuarios (matricula, nombre, apellidopaterno, apellidomaterno, turno, tipousuario, password) VALUES(:matricula, :nombre, :appaterno, :apmaterno, :turno, :tipo, :pass)");
                $result_insert = $insert_query->execute(array('matricula' => $matricula, 'nombre' => $nombre, 'appaterno' => $appaterno, 'apmaterno' => $apmaterno, 'turno' => $turno, 'tipo' => $tipo, 'pass' => $password));
                if ($result_insert) {
                    $msg = 'INSERTADO';
                } else {
                    $msg = 'ERROR_INSERTAR';
                }
            }
        } else {
            $msg = 'ERROR_CONTRASEÑA';
        }
    } else {
        $msg = 'CAMPOS_VACIOS';
    }
}
header("Location: ../register.php?msg=$msg");
?>
