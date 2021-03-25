<?php
session_start();

$usuario = $_SESSION["usuario"];
$con = new PDO("mysql:host=localhost; dbname=homenursing;charset=utf8", "root", "");
$sql = $con->prepare("SELECT * FROM profissional");
$sql = $con->prepare("SELECT * FROM profissional INNER JOIN tipo_profissional ON profissional.tipo_profissional_idtipo_profissional=tipo_profissional.idtipo_profissional");
$sql->execute();
$produtos = $sql->fetchAll(PDO::FETCH_CLASS);

?>
<?php include "header_.php";?>
    <script src="https://ajax.googleapis.ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
        function myFunction() {
            var input, filter, ul, li, a, i;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            ul = document.getElementById("myUL");
            li = ul.getElementsByTagName("a");
            for (i = 0; i < li.length; i++) {
                a = li[i].getElementsByTagName("a")[0];
                if (a.innerHTML.toUpperCase().indexOf(filter) > -1) {
                    li[i].style.display = "";
                } else {
                    li[i].style.display = "none";

                }
            }
        }
    </script>
	
<section>
	<div class="container">
		<div class="main">
			<div align="center">
				<div align="right">
					<form name="seachform" method="post" action="btn_pesquisar.php">
						<br />
						<input style="width: 300px;" type="text" placeholder="Pesquisar..."  name="buscar" />
						<button style="width: 60px;" type="submit" >Ir</button>
					</form>
				</div>

				<ul id="myUL">
				    <div class='testimonials'>
					
                        <?php
                            foreach($produtos as $row){
                                echo "
								<section>
								<div class='content' align='center'> ";
                                echo "<form action='pag_profissional.php' method='get'><h3>" . $row->nome ."</h3>";
                                echo "<p class='title'>". $row->descricao_profissional ."</p>";
                                echo "<p>". $row->registro_profissao ."</p>";
                                echo "<button type='submit' name='id_usu' class='btn btn-info' value='". $row->idprofissional ."'>Ver Dados</button>";
                                echo "</form></div></section>";
                            }
                        ?>
					</div>
			</div>
		</div>
	</div> 
</section>

</body>
</html>

<?php include "footer.html";?>