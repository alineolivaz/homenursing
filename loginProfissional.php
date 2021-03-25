<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Homenursing</title>
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="http://netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/flexslider.css" type="text/css">
    <link href="css/styles.css?v=1.6" rel="stylesheet">
    <link href="css/queries.css?v=1.6" rel="stylesheet">
    <link href="css/jquery.fancybox.css" rel="stylesheet">
    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'>
    </head>
    <body>
      
      <section class="hero" id="hero">
        <div class="container center">
          <div class="row">
            <div class="col-md-12 text-right">
              <a href="index.html"><i class="fa fa-navicon fa-2x nav_slide_button"></i></a>
            </div>
          </div>
        <div class="row" align="center">
            <div class="col-md-8 col-lg-8 col-md-offset-2 text-center">
              <h1 class="animated bounceInDown">Login Funcionário</h1><br><br><br>
            </div>
		<div class="row" align="center">
        <form action="autenticacaoProfissional.php" method="post">
			<div class="col-md-6 col-sm-6">
                <input name="email" type="text" class="form-control" placeholder="Email" required>
            </div>
			<div class="col-md-6 col-sm-6">
                <input name="senha" type="password" class="form-control" placeholder="Senha" required>
            </div>
			<div class="col-md-12 text-center">
				<button type="submit" class="try-btn">Entrar</button>
				<br><br><br><br><br><br><br>
			</div>
						
		</form>
        </div>
		</div>
      </section>
</body>



