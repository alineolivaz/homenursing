<!DOCTYPE html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<?php
	session_start();

	$profissional = $_SESSION["profissional"];
    $idprofissional = $profissional->idprofissional;

include("conexao.php");

$connection = new mysqli("localhost", "root", "", "homenursing");
$sql = "SELECT S.data_solicitacao, S.aceita, U.nome, U.rua, U.bairro, U.numero, U.cep, U.email,  U.telefone, R.decricao  
FROM status S 
JOIN profissional P on 
P.idprofissional =  S.profissional_idprofissional 
JOIN usuario U on  
U.idusuario =  
S.usuario_idusuario 
JOIN servico R on 
R.idservico = S.servico_idservico 
WHERE 
S.profissional_idprofissional = $idprofissional;";
 
$result = $connection->query($sql);
//$result = mysqli_fetch_assoc($result);
//$result = $result->fetch_array(MYSQLI_ASSOC);
$result = mysqli_fetch_all($result, MYSQLI_ASSOC);
//var_dump($result);

// echo "<table>";
// echo  "<tr><td>Nome:</td>";
// echo "<td>".$exibe["Nome"]."</td></tr>";


    //$con = new PDO("mysql:host=localhost; dbname=homenursing;charset=utf8", "root", "");
    //$sql = $con->prepare("SELECT * FROM profissional INNER JOIN tipo_profissional ON profissional.tipo_profissional_idtipo_profissional=tipo_profissional.idtipo_profissional WHERE idprofissional = $id");
    //$sql = $con->prepare("select * from profissional.p inner join tipo_profissional t on p.tipo_profissional_idtipo_profissional = t.tipo_profissional");
    //$sql->execute();
    //$produtos = $sql->fetchAll(PDO::FETCH_CLASS);

?>
<?php include "headerProfissional.php";?>

<body>

<section id="main" class="wrapper">
				<div class="inner">
					<div class="content">
<legend><h2>Histórico Agendamentos</h2></legend><br>

                        <table class="table">
                            <thead>
                            <tr>
                                <th>Data</th>
                                <th>Nome Cliente</th>
                                <th>Email</th>
                                <th>Telefone</th>
                                <th>Serviço Prestado</th>
                                <th>Endereço</th>
                                <th>Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach($result as $value): ?>
                            <tr>
                                <td><?=$value['data_solicitacao']?></td>
                                <td><?=$value['nome']?></td>
                                <td><?=$value['email']?></td>
                                <td><?=$value['telefone']?></td>
                                <td><?=$value['decricao']?></td>
                                <td><div class="w3-dropdown-hover">Visualizar
                                    <div class="w3-dropdown-content w3-card-4">
                                        <div class="w3-container"><br>
                                            <p>Rua: <?=$value['rua']?></p>
                                            <p>Número: <?=$value['numero']?></p>
                                            <p>CEP: <?=$value['cep']?></p>
                                            <p>Bairro: <?=$value['bairro']?></p>
                                            
                                        </div>
                                    </div>
                                </div></td>
                                <td><?php if($value['aceita'] == 1){echo "Aceito";}elseif($value['aceita']== 2){ echo "Recusado";}else{echo "Pendente";}?></td>
                            </tr>
                            <?php endforeach;?>
                            </tbody>
                        </table>

</div>	
</div>				
</section>
</body>
				
<?php include "footer.html";?>
