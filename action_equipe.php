
<?php

//Login de Acesso ao DATABASE
$username = "root";
$password = "";

//DECLARAÇÃO VARIAVEL FORM
$rp = $_POST['registro_profissao'];
$nome = $_POST['nome'];
$tel = $_POST['telefone'];
$data_nascimento = $_POST['data_nascimento'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$tipo_profissional_idtipo_profissional = $_POST['tipo_profissional_idtipo_profissional'];
$cpf = $_POST['cpf'];
//$tipo_s = $_POST['tipo_s_neutro'];

// TESTE DE CONEXAO AND INSERT PDO
try {
    $pdo = new PDO('mysql:host=localhost;dbname=homenursing', $username, $password , array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $pdo->prepare('INSERT INTO `profissional`(`idprofissional`, `registro_profissao`, `nome`, `telefone`, `email`, `senha`, `cpf`, `data_nascimento`, `tipo_profissional_idtipo_profissional`) VALUES (NULL ,:rp,:nome,:telefone,:email,:senha,:cpf,:data_nascimento,:tipo_profissional_idtipo_profissional)');
    $stmt->execute(array(
        ':rp'   => $rp,
        ':nome'   => $nome,
        ':telefone'   => $tel,
        ':email'   => $email,
        ':senha'   => $senha,
        ':tipo_profissional_idtipo_profissional' => $tipo_profissional_idtipo_profissional,
        ':cpf'   => $cpf,
		':data_nascimento' => $data_nascimento
    ));

    echo
    "<script>   
				alert('Registro inserido com sucesso!');
				window.location.href='login_col.php';
			</script>";

    echo $stmt->rowCount();
} catch(PDOException $e) {
    echo 'Error: ' . $e->getMessage();
}
?>