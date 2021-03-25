<html>
	<head>
		<title>HOMENURSING</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
<?php
	session_start();
	$profissional = $_SESSION["profissional"];
    $idprofissional = $profissional->idprofissional;

	include("conexao.php");

	$conexao = mysqli_connect ('localhost', 'root', '', 'homenursing');
	
		if($conexao == false){
			die("ERROR: Could not connect. " . mysqli_connect_error());
		}
		 
		// Escape user inputs for security
		$nome = $_POST['nome'];
		$email = $_POST['email'];
		$senha = $_POST['senha'];
		$cpf = $_POST['cpf'];
		$telefone = $_POST['telefone'];
		
		 
		// attempt insert query execution
		$sql = "
		UPDATE `profissional` 
		SET `nome` = '$nome',
		`email` = '$email',
		`cpf` = '$cpf',		
		`senha` = '$senha',
		`telefone` = '$telefone'
		WHERE `profissional`.`idprofissional` = '$idprofissional';";
		
		
		if(mysqli_query($conexao, $sql)){
			
			require_once("conexao.php");

			$conexao = conexao::getInstance();
			$sql = "SELECT * from profissional where idprofissional =:ID;";
			$stm = $conexao->prepare($sql);
			$stm->bindValue(':ID', $profissional->idprofissional);
			$stm->execute();
			$profissional = $stm->fetch(PDO::FETCH_OBJ);
			$_SESSION["profissional"]  = $profissional;
			
			//header("Location: index_col.php");
			echo
		"<script>   
				alert('Dados Editados com sucesso...');
				window.location.href='SeusDadosProfissional.php';
			</script>";
			
		} else{
			echo "ERROR: Could not able to execute $sql. " . mysqli_error($conexao);
		}
		 
		// close connection
		mysqli_close($conexao);
		?>

</div>
</body>
</html>