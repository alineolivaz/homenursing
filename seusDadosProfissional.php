<?php
session_start();

$profissional= $_SESSION["profissional"];

?>
<?php include "headerProfissional.php";?>

<body>
<section id="main" class="wrapper">
				<div class="inner">
					<div class="content">
		<fieldset>
			<legend><h2>Editar Seus Dados</h2></legend>
			
			<?php if(empty($profissional)):?>
				<h3 class="text-center text-danger">Cliente não encontrado!</h3>
			<?php else: ?>
				<form action="editar_col.php" method="post" id='form-contato' enctype='multipart/form-data'>
					

				    <div class="form-group">
				      <label for="nome">Nome</label>
				      <input type="text" class="form-control" id="nome" name="nome" value="<?=$profissional->nome?>" placeholder="Infome o Nome">
				      <span class='msg-erro msg-nome'></span>
				    </div>

				    <div class="form-group">
				      <label for="email">E-mail</label>
				      <input type="email" class="form-control" id="email" name="email" value="<?=$profissional->email?>" placeholder="Informe o E-mail">
				      <span class='msg-erro msg-email'></span>
				    </div>
					<div class="form-group">
				      <label for="senha">Senha</label>
				      <input type="text" class="form-control" id="senha" name="senha" value="<?=$profissional->senha?>" placeholder="Informe o E-mail">
				      <span class='msg-erro msg-email'></span>
				    </div>
				    <div class="form-group">
				      <label for="cpf">CPF</label>
				      <input type="text" class="form-control" id="cpf" maxlength="14" name="cpf" value="<?=$profissional->cpf?>" placeholder="Informe o CPF">
				      <span class='msg-erro msg-cpf'></span>
				    </div>
				    <div class="form-group">
				      <label for="telefone">Telefone</label>
				      <input type="text" class="form-control" id="telefone" maxlength="12" name="telefone" value="<?=$profissional->telefone?>" placeholder="Informe o Telefone">
				      <span class='msg-erro msg-telefone'></span>
				    </div>
				    
				    <input type="hidden" name="acao" value="editar"><br>
				    <button type="submit" class="btn btn-primary" id='botao'> 
				      Gravar
				    </button>
				    
				</form>
			<?php endif; ?>
		</fieldset>

	</div>
	<script type="text/javascript" src="js/custom.js"></script>
	<br><br><br>
</section>


<?php include "footer.html";?>