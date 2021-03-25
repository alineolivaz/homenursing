<!DOCTYPE html>
<?php
	session_start();    

	$agendamento = $_GET["agendamento"];
	$id_colaborador = $_GET["id_colaborador"];
    $user = $_SESSION["usuario"];    
    $id_user = $user->idusuario;

    $con = new PDO("mysql:host=localhost; dbname=homenursing;charset=utf8", "root", "");

    $sql = $con->prepare("INSERT INTO `status` (`idstatus`, `data_solicitacao`, `aceita`, `usuario_idusuario`, `profissional_idprofissional`, `servico_idservico`) VALUES (NULL, '$agendamento', '0', '$id_user', '$id_colaborador', '1');");    
    $sql->execute();

    header('Location: ./agendamentos.php');
?>