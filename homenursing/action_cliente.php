<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Sistema de Cadastro</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/custom.css">
</head>
<body>
<div class='container box-mensagem-crud'>
    <?php
	header("Content-type:text/html; charset=utf8;");
	$conexao = mysqli_connect ('localhost', 'root', '', 'homenursing');
	
		if($conexao == false){
			die("ERROR: Could not connect. " . mysqli_connect_error());
		}
		 
		// Escape user inputs for security
		$nome = $_POST['nome'];
		$email = $_POST['email'];
		$senha = $_POST['senha'];
		$cpf = $_POST['cpf'];
		$data_nascimento = $_POST['data_nascimento'];
		$telefone = $_POST['telefone'];
		$celular = $_POST['celular'];
		$cep = $_POST['cep'];
		$rua = $_POST['rua'];
		$numero = $_POST['numero'];
		$bairro = $_POST['bairro'];
		$cidade = $_POST['cidade'];
		
		 
		// attempt insert query execution
		$sql = "INSERT INTO usuario (`nome`, `cpf`, `senha`,
		`email`, `telefone`, `celular`, `data_nascimento`, `cep`, `rua`, `numero`, `bairro`, `cidade`)
		VALUES ('$nome', '$cpf', '$senha', '$email', '$telefone',
		'$celular', '$data_nascimento', '$cep', '$rua', '$numero', '$bairro', '$cidade');";

		echo
			"<script>   
				alert('Registro inserido com sucesso!');
				window.location.href='login.php';
			</script>";	
		
		
		
		if(mysqli_query($conexao, $sql)){		
				
			
			header("Location: login.php");
			echo
			"<script>   
				alert('Registro inserido com sucesso!');
				window.location.href='login.php';
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