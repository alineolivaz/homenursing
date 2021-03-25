<?php include "header.php";?>
<head>
    <meta charset="utf-8">
	<title>Cadastro</title>
	<link rel="stylesheet" type="text/css" href="cadastros/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="cadastros/css/custom.css">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script type='text/javascript' src='//igorescobar.github.io/jQuery-Mask-Plugin/js/jquery.mask.min.js'></script>
    <style type="text/css" media="all">
		
</style>
    <script>
        $().mask();
    </script>
	
</head>
<body>
	<div align="center" class="container center">
			<form action="action_equipe.php" method="post" id='form-contato' enctype='multipart/form-data'>
				<div style="height:75px;"></div>
				<h1>Cadastro Colaborador</h1><br>

			
				
			    <div class="form-group">
			      <label for="nome">Nome</label>
                    <input style="width: 50%; height: 40px" name="nome" type="text" class="form-control" placeholder="Nome" required>
                </div>
				
                <div class="form-group">
			      <label for="nome">Telefone</label>
                    <input style="width: 50%; height: 40px" type="telefone" class="form-control" id="telefone" maxlength="12" name="telefone" required>
                </div>
				
                <div class="form-group">
			      <label for="nome">Email</label>
                    <input style="width: 50%; height: 40px" name="email" type="text" class="form-control" placeholder="Email" required>
                </div>
				
				<div class="form-group">
			    <label for="nome">CPF</label>
                    <input style="width: 50%; height: 40px" type="cpf" class="form-control" id="cpf" maxlength="14" name="cpf" placeholder="Informe o CPF" required>
					<span class='msg-erro msg-cpf'></span>
                </div>
				
				<div class="form-group">
			      <label for="data_nascimento">Data de Nascimento</label>
                    <input style="width: 50%; height: 40px" name="data_nascimento" id="data_nascimento" type="date" class="form-control" placeholder="Data Nascimento" required>
                </div>
				
					<label name="tipo_profissional_idtipo_profissional" for="tipo_profissional_idtipo_profissional">Tipo de Especialista</label><br>
					<div style="width: 50%; height: 40px">
					<?php

					$con = mysqli_connect('localhost', 'root', '', 'homenursing');

					$sql = "SELECT descricao_profissional, idtipo_profissional FROM tipo_profissional";
					$result = mysqli_query($con, $sql);					
					
					echo "<select name='tipo_profissional_idtipo_profissional' for='tipo_profissional_idtipo_profissional' id='tipo_profissional_idtipo_profissional'>";
					while ($row = mysqli_fetch_array($result)) {
						echo "<option value='" .$row['idtipo_profissional']. "'>" . $row['descricao_profissional'] . "</option>";
					}
					echo "</select>";

					?><br>
					</div>
					
                <div class="form-group">
			      <label for="registro_profissao">Registro Profissional</label>
                    <input style="width: 50%; height: 40px" name="registro_profissao" type="text" class="form-control" placeholder="Registro Profissional (se tiver)">
                </div>
				
                <div class="form-group">
			      <label for="nome">Senha</label>
                    <input style="width: 50%; height: 40px" name="senha" type="password" class="form-control" placeholder="Senha" required>
                </div>
				
			    <input type="hidden" name="acao" value="incluir">
					<button style="width: 25%; height: 40px" type="submit" class="btn btn-success" id='botao'>Cadastrar</button>
					<a style="width: 25%; height: 40px" href='index.php' class="btn btn-danger">Cancelar</a>
            </form>
			
		</fieldset>
	</div>
	<div class="col-md-3"></div>
	</div>
	<script type="text/javascript" src="cadastros/js/custom.js"></script>
</body>
<?php include "footer.html";?>