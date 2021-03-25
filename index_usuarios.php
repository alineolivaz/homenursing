<?php
session_start();

$usuario= $_SESSION["usuario"];

?>

<?php include "header_.php";?>


<section id="main" class="wrapper">
	<div class="inner">
		<div class="content">
			<strong>Bem Vindo</strong> e <strong>obrigado</strong> por usar HomeNursing, aqui você poderá marcar suas consultas de uma forma muito simples, intuitiva e inteligente.
		</p><br>
		
			<div>
				<button class="collapsible">Consultas e Exames</button>
					<div class="content"><br>
					  <p align="left">Se quer ser atendido, receber algum conselho, diagnóstico ou opinião, ou receitar ou efetuar tratamento médico.</p>
						<div class="col-md-offset-3 col-md-6 col-sm-offset-2 col-sm-8">
							<a href="busca.php"><input name="submit" type="submit" class="form-control submit" id="submit" value="Pronto"></a>
						</div>
					  <br><br>
					</div>
					
					<button class="collapsible">Visitas</button>
					
					<div class="content"><br>
					  <p>Se quer a ida de um profissional ao seu domicílio para cuidados especiais.</p><br>
						<div class="col-md-offset-3 col-md-6 col-sm-offset-2 col-sm-8">
							<a href="busca.php"><input name="submit" type="submit" class="form-control submit" id="submit" value="Pronto"></a>
						</div>
					  <br><br>
					</div>
		
					<script>
						var coll = document.getElementsByClassName("collapsible");
						var i;

						for (i = 0; i < coll.length; i++) {
							coll[i].addEventListener("click", function() {
								this.classList.toggle("active");
								var content = this.nextElementSibling;
								if (content.style.display === "block") {
									content.style.display = "none";
								} else {
									content.style.display = "block";
								}
							});
						}
					</script>
			</div>
		</div> 
	</div>
</section>

<?php include "footer.html";?>