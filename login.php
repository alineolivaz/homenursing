<?php include "header.php";?>

<head>
    <meta charset="utf-8">
	<title>Login de Cliente</title>
	<!-- <link rel="stylesheet" type="text/css" href="cadastros/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="cadastros/css/custom.css"> -->
</head>

<body>
		<div align="center" class="container center">
			<form action="autenticacao.php" method="post">
				<div style="height:75px;"></div>
				<h1>Login Usuário</h1><br>
				<div>
					<input style="width: 25%; height: 40px" name="email" type="text" class="form-control" placeholder="Email" required>
                    <br>
					<input style="width: 25%; height: 40px" name="senha" type="password" class="form-control" placeholder="Senha" required>
					<br />
					<button type="submit" class="try-btn">Entrar</button>
				</div>	
				<div style="height:75px;"></div>
			</form>
		</div>
</body>

<?php include "footer.html";?>