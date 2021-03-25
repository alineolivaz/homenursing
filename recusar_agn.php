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
$idstatus = $_GET['idstatus'];


// attempt insert query execution
$sql = "
		UPDATE `status` 
		SET 
		`aceita` = '2'
		WHERE idstatus = '$idstatus';";


if(mysqli_query($conexao, $sql)){

    require_once("conexao.php");

    $conexao = conexao::getInstance();
    $sql = "SELECT * from status where idstatus =:ID;";
    $stm = $conexao->prepare($sql);
    @$stm->bindValue(':ID', $status->idstatus);
    $stm->execute();

    @$status = $stm->fetch(PDO::FETCH_OBJ);
    @$_SESSION["status"]  = $status;


    //header("Location: index_col.php");
    echo
    "<script>   
				alert('Recusado com sucesso...');
				window.location.href='servicoProfissional.php';
			</script>";

} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conexao);
}

// close connection
@mysqli_close($conexao);
?>

</div>
</body>
</html>