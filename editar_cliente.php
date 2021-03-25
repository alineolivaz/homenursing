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
	$usuario = $_SESSION["usuario"];
    $idusuario = $usuario->idusuario;

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
		$celular = $_POST['celular'];
		$rua = $_POST['rua'];
		$bairro = $_POST['bairro'];
		$cidade = $_POST['cidade'];
		
		
		// attempt insert query execution
		$sql = "
		UPDATE `usuario` 
		SET nome = '$nome',
		`cpf` = '$cpf',
		`senha` = '$senha',
		`telefone` = '$telefone',
		`celular` = '$celular',
		`rua` = '$rua',
		`bairro` = '$bairro', 
		`cidade` = '$cidade'
		WHERE `usuario`.`idusuario` = '$idusuario';
		
		";
		
		
		if(mysqli_query($conexao, $sql)){
			
			require_once("conexao.php");

			$conexao = conexao::getInstance();
			$sql = "SELECT * from usuario where idusuario =:IDER;";
			$stm = $conexao->prepare($sql);
			$stm->bindValue(':IDER', $usuario->idusuario);
			$stm->execute();
			$usuario = $stm->fetch(PDO::FETCH_OBJ);
			$_SESSION["usuario"]  = $usuario;
			
			//header("Location: index_usuarios.php");
			echo
		"<script>   
				alert('Dados Editados com sucesso...');
				window.location.href='seus_dados.php';
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