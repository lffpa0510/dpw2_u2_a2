<?php 

require "connect.php";
$db = new Database();
$con = $db ->conectar();

$msg = '';

if (isset($_POST['login'])) {
    $matricula = $_POST['matricula'];
    $password = $_POST['pass'];
    
    if ($matricula != '' && $password != '') {
        $select_query = $con->prepare("SELECT * FROM usuarios WHERE matricula=:matricula AND password=:pass");
        $select_query->execute(array('matricula' => $matricula, 'pass' => $password));
        $count = $select_query->rowCount();
        $result_select = $select_query ->fetch(PDO::FETCH_ASSOC);
        if ($count > 0) {
            session_start();
            $_SESSION['matricula'] = $result_select['matricula'];
            $_SESSION['nombre'] = $result_select['nombre'];
            $_SESSION['appaterno'] = $result_select['apellidopaterno'];
            $_SESSION['apmaterno'] = $result_select['apellidomaterno'];
            $_SESSION['tipo'] = $result_select['tipousuario'];
            header("Location: ../private/index.php");
        } else {
            $msg = 'USUARIO_NO_EXISTE';
            header("Location: ../access.php?msg=$msg");
        }
    } else {
        $msg = 'CAMPOS_VACIOS';
    }
}
?> 