<?php include "header.php";?>
<head>
    <meta charset="utf-8">
	<title>Cadastro de Cliente</title>
	<link rel="stylesheet" type="text/css" href="cadastros/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="cadastros/css/custom.css">
	 <script src="https://code.jquery.com/jquery-3.2.1.min.js"
            integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
            crossorigin="anonymous"></script>
	 <script type="text/javascript" >

        $(document).ready(function() {

            function limpa_formulario_cep() {
                // Limpa valores do formulário de cep.
                $("#rua").val("");
                $("#bairro").val("");
                $("#cidade").val("");
                $("#uf").val("");
                $("#ibge").val("");
            }
            
            //Quando o campo cep perde o foco.
            $("#cep").blur(function() {

                //Nova variável "cep" somente com dígitos.
                var cep = $(this).val().replace(/\D/g, '');

                //Verifica se campo cep possui valor informado.
                if (cep != "") {

                    //Expressão regular para validar o CEP.
                    var validacep = /^[0-9]{8}$/;

                    //Valida o formato do CEP.
                    if(validacep.test(cep)) {

                        //Preenche os campos com "..." enquanto consulta webservice.
                        $("#rua").val("...");
                        $("#bairro").val("...");
                        $("#cidade").val("...");
                        $("#uf").val("...");
                        $("#ibge").val("...");

                        //Consulta o webservice viacep.com.br/
                        $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

                            if (!("erro" in dados)) {
                                //Atualiza os campos com os valores da consulta.
                                $("#rua").val(dados.logradouro);
                                $("#bairro").val(dados.bairro);
                                $("#cidade").val(dados.localidade);
                                $("#uf").val(dados.uf);
                                $("#ibge").val(dados.ibge);
                            } //end if.
                            else {
                                //CEP pesquisado não foi encontrado.
                                limpa_formulario_cep();
                                alert("CEP não encontrado.");
                            }
                        });
                    } //end if.
                    else {
                        //cep é inválido.
                        limpa_formulario_cep();
                        alert("Formato de CEP inválido.");
                    }
                } //end if.
                else {
                    //cep sem valor, limpa formulário.
                    limpa_formulario_cep();
                }
            });
        });

    </script>
</head>
<body>
	<div align="center" class="container center">
			<form action="action_cliente.php" method="post" id='form-contato' enctype='multipart/form-data' accept-charset="utf-8">
				<div style="height:75px;"></div>
				<h1>Cadastro Usuário</h1><br>
			
				
			    <div class="form-group">
			      <label for="nome">Nome</label>
			      <input style="width: 50%; height: 40px" type="text" class="form-control" id="nome" name="nome" required>
			      <span class='msg-erro msg-nome'></span>
			    </div>

			    <div class="form-group">
			      <label for="email">E-mail</label>
			      <input style="width: 50%; height: 40px" type="email" class="form-control" id="email" name="email" placeholder="Informe o E-mail" required>
			      <span class='msg-erro msg-email'></span>
			    </div>
				
				 <div class="form-group">
			      <label for="celular">Senha</label>
			      <input style="width: 50%; height: 40px" type="password" class="form-control" id="senha" maxlength="50" name="senha" placeholder="Informe a Senha" required>
			      <span></span>
			    </div>
				
			    <div class="form-group">
			      <label for="cpf">CPF</label>
			      <input style="width: 50%; height: 40px" type="cpf" class="form-control" id="cpf" maxlength="14" name="cpf" placeholder="Informe o CPF" required>
			      <span class='msg-erro msg-cpf'></span>
			    </div>
			    <div class="form-group">
			      <label for="data_nascimento">Data de Nascimento</label>
			      <input style="width: 50%; height: 40px" type="date" class="form-control" id="data_nascimento" maxlength="10" name="data_nascimento" required>
			      <span class='msg-erro msg-data'></span>
			    </div>
			    <div class="form-group">
			      <label for="telefone">Telefone</label>
			      <input style="width: 50%; height: 40px" type="telefone" class="form-control" id="telefone" maxlength="12" name="telefone" placeholder="Informe o Telefone" required>
			      <span class='msg-erro msg-telefone'></span>
			    </div>
			    <div class="form-group">
			      <label for="celular">Celular</label>
			      <input style="width: 50%; height: 40px" type="celular" class="form-control" id="celular" maxlength="13" name="celular" placeholder="Informe o Celular" required>
			      <span class='msg-erro msg-celular'></span>
			    </div>
				
				
				 <div class="form-group">
			      <label for="cep">CEP</label>
			      <input style="width: 50%; height: 40px" type="cep" maxlength="9" class="form-control" id="cep" maxlength="13" name="cep" placeholder="Informe o CEP" required>
				  <label>*Digite somente numeros</label>
			      
			    </div>
				 <div class="form-group">
			      <label for="rua">Rua</label>
			      <input style="width: 50%; height: 40px" type="rua" class="form-control" id="rua" maxlength="13" name="rua" placeholder="Informe o Rua" required>
				  
				</div>
				 <div class="form-group">
			      <label for="numero">Numero</label>
			      <input style="width: 50%; height: 40px" type="numero" class="form-control" id="numero" maxlength="13" name="numero" placeholder="Informe o Numero" required>
			     
			    </div> <div class="form-group">
			      <label for="bairro">Bairro</label>
			      <input style="width: 50%; height: 40px" type="bairro" class="form-control" id="bairro" maxlength="13" name="bairro" placeholder="Informe o Bairro" required>
			      
			    </div> <div class="form-group">
			      <label for="cidade">Cidade</label>
			      <input style="width: 50%; height: 40px" type="cidade" class="form-control" id="cidade" maxlength="13" name="cidade" placeholder="Informe o Cidade" required>
			      
			    </div>
				
			    <input type="hidden" name="acao" value="incluir">
					<button style="width: 25%; height: 40px" type="submit" class="btn btn-success" id='botao'>Cadastrar</button>
					<a style="width: 25%; height: 40px" href='index.php' class="btn btn-danger">Cancelar</a>
			</form>
		</fieldset>
	</div>
	<script type="text/javascript" src="cadastros/js/custom.js"></script>
</body>


<?php include "footer.html";?>
