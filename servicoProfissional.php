<?php
    session_start();

    $profissional = $_SESSION["profissional"];
    $idprofissional = $profissional->idprofissional;

include("conexao.php");

$connection = new mysqli("localhost", "root", "", "homenursing");
$sql = "SELECT U.nome, S.idstatus, S.data_solicitacao, U.email, U.telefone,
 U.rua, U.bairro, U.numero, U.cep, R.decricao 

FROM status S 

JOIN profissional P on
P.idprofissional = S.profissional_idprofissional

JOIN usuario U on 
U.idusuario = S.usuario_idusuario

JOIN servico R on 
R.idservico = S.servico_idservico 

WHERE

S.profissional_idprofissional = $idprofissional

AND S.aceita = 0

;";
$result = $connection->query($sql);
//$result = mysqli_fetch_assoc($result);
//$result = $result->fetch_array(MYSQLI_ASSOC);
$result = mysqli_fetch_all($result,MYSQLI_ASSOC);

?>

<?php include "headerProfissional.php";?>
<html>
    <head>
        <title>HOMENURSING</title>

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
        <meta name="description" content="" />
        <meta name="keywords" content="" />
        <link rel="stylesheet" href="assets/css/main.css" />
       <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous"> -->
    </head>


<section id="main" class="wrapper">
                <div class="inner">
                    <div class="content">
<legend><h2>Solicitações Pendentes</h2></legend><br>

                     <table class="table">
                            <thead>
                            <tr>
                                <th>Data Solicitação</th>
                                <th>Nome</th>
                                <th>Email</th>
                                <th>Endereço</th>
                                <th>Descricao</th>
                            </tr>
                            </thead>
                            <tbody>


                            <?php foreach($result as $value): ?>
                            <tr>

                                <td><?=$value['data_solicitacao']?></td>
                                <td><?=$value['nome']?></td>
                                <td><?=$value['email']?></td>
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
                                <td><?=$value['decricao']?></td>
                                    <td>
                                        <a href="confirmar_agn.php?idstatus=<?=$value['idstatus']?>" class="btn btn-primary" id='botao'>Confirmar</a>
                                        <a href="recusar_agn.php?idstatus=<?=$value['idstatus']?>" class="btn btn-primary" id='botao'>Recusar</a>
                                    </td>
                            </tr>

                            <?php endforeach;?>
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
    </div> 
</section>

<?php include "footer.html";?>

</body>
</html>
