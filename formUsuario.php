<?php 
session_start();
include('conecta.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="keywords" content="animação, anime, animação 3d, filmes anime, ecchi, desenhos animados">
<title>Dtudo - Cadastrar um Novo Usuário</title>
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
<script>
$(document).ready(function(){
  //$("#cep").mask("00 000-000");
    $("#telefone").mask("(00) 00000-0000");
});
</script>
</head>
<body>
<?php 
   include('navbar_top.php');/* GRID ITEM, pagina externa navbarra.php */
?> 
<!-- GRID ITEM cabecalho -->
<main id="main_princ"><!--GRID ITEM -->
<section id="sect_conteiner_form">
	<fieldset>
		<legend>Cadastrar um Novo Usuário</legend>
			<form method="post" action="inserirUsuario.php" name="logon">
				<div class="form-group">
						<label for="nome">Nome</label>
						<input name="nome" type="text" class="form-control" required id="nome">
				</div>
				<div class="form-group">
						<label for="apelido">Apelido</label>
						<input name="apelido" type="text" class="form-control" required id="apelido">
				</div>
				<div class="form-group">
						<label for="email">E-mail</label>
						<input name="email" type="email" class="form-control" required id="email">
				</div>
				<div class="form-group">
						<label for="senha">Senha</label>
						<input name="senha" type="password" class="form-control" required id="senha">
				</div>
				<div class="form-group">
						<label for="endereco">Endereço</label>
						<textarea name="endereco" rows="2" class="form-control" id="endereco"></textarea>
				</div>
				<div class="form-group">
						<label for="telefone">Telefone</label>
						<input name="telefone" type="text" class="form-control" id="telefone">
				</div>
				<button type="submit" class="meu_btn">
					<span class="glyphicon glyphicon-pencil"> Cadastrar</span>
				</button>
			</form>
	</fieldset>
</section>
</main>
<?php include 'rodape.php' ?>
</body>
</html>