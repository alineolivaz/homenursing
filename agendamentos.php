<!DOCTYPE html>
<?php
    session_start();

    $usuario = $_SESSION["usuario"];
    $idusuario = $usuario->idusuario;

include("conexao.php");

$connection = new mysqli("localhost", "root", "", "homenursing");
$sql = "SELECT S.data_solicitacao, s.aceita, P.nome, P.email, P.telefone, T.descricao_profissional, R.decricao FROM status S JOIN profissional P on P.idprofissional =S.profissional_idprofissional JOIN tipo_profissional T on T.idtipo_profissional = P.tipo_profissional_idtipo_profissional JOIN servico R on R.idservico = S.servico_idservico WHERE S.usuario_idusuario = $idusuario;";
$result = $connection->query($sql);

//$result = mysqli_fetch_assoc($result);
//$result = $result->fetch_array(MYSQLI_ASSOC);
$result = mysqli_fetch_all($result,MYSQLI_ASSOC);
//var_dump($troco);

// echo "<table>";
// echo  "<tr><td>Nome:</td>";
// echo "<td>".$exibe["Nome"]."</td></tr>";


    //$con = new PDO("mysql:host=localhost; dbname=homenursing;charset=utf8", "root", "");
    //$sql = $con->prepare("SELECT * FROM profissional INNER JOIN tipo_profissional ON profissional.tipo_profissional_idtipo_profissional=tipo_profissional.idtipo_profissional WHERE idprofissional = $id");
    //$sql = $con->prepare("select * from profissional.p inner join tipo_profissional t on p.tipo_profissional_idtipo_profissional = t.tipo_profissional");
    //$sql->execute();
    //$produtos = $sql->fetchAll(PDO::FETCH_CLASS);

?>

<script>
document.getElementById("demo").innerHTML = "APROVADO!";
</script>

<?php include "header_.php";?>


<body>

<section id="main" class="wrapper">
                <div class="inner">
                    <div class="content">
<h3 align="center"> Histórico de Agendamentos </h3><br>

                        <table class="table">
                            <thead>
                            <tr>
                                <th>Data</th>
                                <th>Nome</th>
                                <th>Email</th>
                                <th>Telefone</th>
                                <th>Profissional</th>
                                <th>Serviço</th>
                                <th>Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach($result as $value): ?>
                                
                            <tr>
                                <td><?=$value['data_solicitacao']?></td>
                                
                                <td><?=$value['nome']?></td>
                                <td><?=$value['email']?></td>
                                <td><?=$value['telefone']?></td>
                                <td><?=$value['descricao_profissional']?></td>
                                <td><?=$value['decricao']?></td>
                                <td><?php if($value['aceita'] == 1){echo "Aceito";}elseif($value['aceita']== 2){ echo "Recusado";}else{echo "Pendente";}?></td>
                            </tr>
                            <?php endforeach;?>
                            </tbody>
                        </table>
                        <script>
document.getElementById("demo").innerHTML = "APROVADO!";
</script>

</div>  
</div>              
</section>
</body>
                
<?php include "footer.html";?>
