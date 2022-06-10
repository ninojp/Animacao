<?php session_start();
  	  include_once ('conecta.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="keywords" content="animação, anime, animação 3d, filmes anime, ecchi, desenhos animados">
    <title>DTUDO - Usuário Cadastrado com sucesso!</title>
	<!-- BOOTSTRAP CSS-->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
	<!-- BOOTSTRAP JQUERRY -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
	<!-- ICONs google Fonts  -->
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<!-- Favicon Imagem -->
<link rel="icon" type="image/x-icon" sizes="128x128" href="imgs/favicon.ico">
<!-- Meu CSS INDEX -->
<link rel="stylesheet" type="text/css" href="css/geral_style.css">
</head>
<body>
<?php 
   include('navbar_top.php');/* GRID ITEM, pagina externa navbarra.php */
?> 
<!-- GRID ITEM cabecalho -->
<main id="main_princ"><!-- GRID ITEM main -->
<section id="sect_conteiner_form">
	<fieldset>
		<legend>Usuário Cadastrado</legend>
		<div class="form-group">
			<h2>Usuário Cadastrado com sucesso!!</h2>
		</div>
		<div class="form-group">
			<a href="login.php">
				<button type="button" class="meu_btn">
					Fazer o Login</button></a>
		</div>
	</fieldset>
</section>
</main>
<?php include_once 'rodape.php' ?>
</body>
</html>