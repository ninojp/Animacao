<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dtudo - E-Mail enviado com sucesso!</title>
    <link rel="stylesheet" type="text/css" href="css/geralStyle.css">
    <link rel="icon" sizes="128x128" href="imgs/favicon.ico">
</head>
<body>
<?php session_start();
      include('conexao.php');
      include('navbarra.php');/* GRID ITEM, pagina externa navbarra.php */
      include('header.php');  ?> 
<main id="main_princ"><!--GRID ITEM -->
<section id="sect_conteiner_form">
	<fieldset>
		<legend>E-Mail enviado</legend>
			<div class="form-group">
				<h2>E-Mail enviado com sucesso!!!</h2>
				<a href="login.php">
					<button type="button" class="meu_btn">Entrar no Site</button></a>
			</div>
	</fieldset>
</section>
</main>
	<?php include 'rodape.php' ?>
</body>
</html>