<?php
session_start();
require_once("conexao.php");

$conexao = conexao::getInstance();
$SENHA = $_POST['senha'];
$EMAIL = $_POST['email'];

$sql = "SELECT * from profissional where senha =:SENHA and email =:EMAIL";
echo $sql;
			
$stm = $conexao->prepare($sql);
$stm->bindValue(':EMAIL', $EMAIL);
$stm->bindValue(':SENHA', $SENHA);

$stm->execute();
$profissional = $stm->fetchAll(PDO::FETCH_OBJ);
if(count($profissional) == 1){
	$_SESSION["profissional"]  = $profissional[0];
	var_dump($_SESSION);
	header("Location: indexProfissional.php");

}
else{
	echo	
	"<script>   
		alert('Usuario ou senha incorretos!');
		window.location.href='login_col.php';
	</script>";
};
//if(!$retorno){
	//$retorno = $retorno->fetchAll(\PDO::FETCH_ASSOC);
	//var_dump($retorno);
//}
//else

?>