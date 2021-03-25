<!DOCTYPE html>

<?php
	session_start();

	$usuario = $_SESSION["usuario"];
	
    $id = $_GET["id_usu"];

    $con = new PDO("mysql:host=localhost; dbname=homenursing;charset=utf8", "root", "");
    $sql = $con->prepare("SELECT * FROM profissional WHERE idprofissional = $id");
    $sql = $con->prepare("SELECT * FROM profissional INNER JOIN tipo_profissional ON profissional.tipo_profissional_idtipo_profissional=tipo_profissional.idtipo_profissional WHERE idprofissional = $id");
    //$sql = $con->prepare("select * from profissional.p inner join tipo_profissional t on p.tipo_profissional_idtipo_profissional = t.tipo_profissional");
    $sql->execute();
    $produtos = $sql->fetchAll(PDO::FETCH_CLASS);



?>
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<script src="./assets/js/jquery.mask.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<?php include "header_.php";?>

<script>
    $(function () {
        $("#datsah").mask("000/00");
    });

</script>
<style type="text/css">
	.modal-backdrop {
		display: none !important;
		z-index:10 !important;
	} 
</style>

</head>
<body>
	

<section id="main" class="wrapper col-md-12">
		<div class="inner">
				
			<div class="content">
					<legend><h2>Dados do Colaborador</h2></legend>
					
				<?php

					foreach ($produtos as $row){
						echo "
						<div class='content col-md-6'>";
						echo "<h3>" . $row->nome ."</h3>";
						echo "<blockquote><p>". $row->descricao_profissional ."</p>";
						echo "<p>CRM: ". $row->registro_profissao ."</p>";
						echo "<p>E-mail: ". $row->email ."</p>";
						echo "<p>Telefone: ". $row->telefone ."</p>";
						echo "</blockquote>
						</div>";
						}
				?>
				<div class='content col-md-6'>
					<form action="criar_agendamento.php">
						<h3>Agende o dia que gostaria de receber o atendimento:<h3>
							<blockquote>


                                <input id="datsah" type="datetime-local" name="agendamento">
								


							<input name="id_colaborador" value="<?php echo $id ?>" hidden/>
							<input name="id_servico" value="<?php echo $id_serv ?>" hidden/>
							<br><br><button type="submit" class="btn  btn-default"  data-toggle="modal" data-target="#myModal">
							  Enviar
							</button>
							<br><br><br>
							</blockquote> 
							<div id="myModal" class="modal fade" role="dialog">
								<div class="modal-dialog">
									<div class="modal-content">
									  <div class="modal-header">
										<button type="button" class="close" data-dismiss="modal">x</button>
										<h4 class="modal-title">Aviso</h4>
									  </div>
									  <div class="modal-body">
										<p>Tem certeza que vc quer agendar este serviço?</p>
									  </div>
									  <div class="modal-footer">
										<button type="submit" class="btn btn-default" >Confirmar</button>
									  </div>
									</div>
								</div>
							</div>
							
					</form>							                     
				</div>
			</div>
		</div>
</section>
</body>
</html>
<?php include "footer.html";?>