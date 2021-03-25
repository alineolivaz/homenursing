<?php
session_start();

$profissional= $_SESSION["profissional"];


?>
<?php include "headerProfissional.php";?>

<section id="main" class="wrapper">
				<div class="inner">
					<div class="content">
		<p>
		<strong>Bem Vindo</strong> e <strong>obrigado</strong> por usar HomeNursing, aqui você poderá realizar o serviço de nossos usuários
		</p><br>
		
 <div>

		<button class="collapsible">Realizar Serviço</button>
					<div class="content"><br>
					  <p align="left">Procurar Serviço?</p>
						<div class="col-md-offset-3 col-md-6 col-sm-offset-2 col-sm-8">
					<a href="servicoProfissional.php"><input name="submit" type="submit" class="form-control submit" id="submit" value="Pronto"></a>
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
	</div>


</section>

<?php include "footer.html";?>