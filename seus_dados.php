<?php
session_start();

$usuario= $_SESSION["usuario"];

?>
<?php include "header_.php";?>

<body>
<section id="main" class="wrapper">
				<div class="inner">
					<div class="content">
		<fieldset>
			<legend><h2>Editar Seus Dados</h2></legend>
			
			<?php if(empty($usuario)):?>
				<h3 class="text-center text-danger">Cliente não encontrado!</h3>
			<?php else: ?>
				<form action="editar_cliente.php" method="post" id='form-contato' enctype='multipart/form-data'>
					

				    <div class="form-group">
				      <label for="nome">Nome</label>
				      <input type="text" class="form-control" id="nome" name="nome" value="<?=$usuario->nome?>" placeholder="Infome o Nome">
				      <span class='msg-erro msg-nome'></span>
				    </div>

				    <div class="form-group">
				      <label for="email">E-mail</label>
				      <input type="email" class="form-control" id="email" name="email" value="<?=$usuario->email?>" placeholder="Informe o E-mail">
				      <span class='msg-erro msg-email'></span>
				    </div>
					<div class="form-group">
				      <label for="senha">Senha</label>
				      <input type="text" class="form-control" id="senha" name="senha" value="<?=$usuario->senha?>" placeholder="Informe o E-mail">
				      <span class='msg-erro msg-email'></span>
				    </div>
				    <div class="form-group">
				      <label for="cpf">CPF</label>
				      <input type="text" class="form-control" id="cpf" maxlength="14" name="cpf" value="<?=$usuario->cpf?>" placeholder="Informe o CPF">
				      <span class='msg-erro msg-cpf'></span>
				    </div>
				    <div class="form-group">
				      <label for="telefone">Telefone</label>
				      <input type="text" class="form-control" id="telefone" maxlength="12" name="telefone" value="<?=$usuario->telefone?>" placeholder="Informe o Telefone">
				      <span class='msg-erro msg-telefone'></span>
				    </div>
				    <div class="form-group">
				      <label for="celular">Celular</label>
				      <input type="text" class="form-control" id="celular" maxlength="13" name="celular" value="<?=$usuario->celular?>" placeholder="Informe o Celular">
				      <span class='msg-erro msg-celular'></span>
				    </div>
					<div class="form-group">
				      <label for="rua">Rua</label>
				      <input type="text" class="form-control" id="rua" maxlength="50" name="rua" value="<?=$usuario->rua?>" placeholder="Informe o Celular">
				      <span class='msg-erro msg-celular'></span>
				    </div>
					<div class="form-group">
				      <label for="bairro">Bairro</label>
				      <input type="text" class="form-control" id="bairro" maxlength="50" name="bairro" value="<?=$usuario->bairro?>" placeholder="Informe o Celular">
				      <span class='msg-erro msg-celular'></span>
				    </div>
					<div class="form-group">
				      <label for="cidade">Cidade</label>
				      <input type="text" class="form-control" id="cidade" maxlength="50" name="cidade" value="<?=$usuario->cidade?>" placeholder="Informe o Celular">
				      <span class='msg-erro msg-celular'></span>
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
	
</section>


<?php include "footer.html";?>