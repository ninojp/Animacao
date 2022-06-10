<?php 
session_start();
	if (empty($_SESSION['adm']) || $_SESSION['adm']!=1) {
		header('location:login.php');
	}
//Limpar o buffer de saida
	ob_start(); 
// conecta com o banco de dados
	include_once('conecta.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Animação - Area Administrativa</title>
    <link rel="stylesheet" type="text/css" href="css/geral_style.css">
    <link rel="icon" sizes="128x128" href="imgs/favicon.ico">
</head>
<body>

<main id="main_princ"><!--GRID ITEM -->
<section id="sect_conteiner_form">
	<fieldset>
		<legend>Animes - Área administrativa</legend>
		<div class="form-group">
				<h2>Adicionar - Alterar - Excluir - Animes</h2><br>
		</div>
		<fieldset><legend>Anime</legend>
		<div class="form-group">
				<a href="anime_form.php" title="Pagina para Adicionar Anime">	
					<button type="submit" class="meu_btn">
						Adicionar novo Anime </button></a><br>
		</div>
		<div class="form-group">
				<a href="animes_listar.php" title="Pagina para Alterar ou Excluir Anime">
					<button type="submit" class="meu_btn">
					Alterar ou Excluir Anime </button></a><br>
		</div>
		</fieldset>
		<fieldset><legend>Anime Ecchi!</legend>
		<div class="form-group">
				<a href="ecchi_form.php" title="Pagina para Adicionar Anime">	
					<button type="submit" class="meu_btn">
						Adicionar novo Anime Ecchi </button></a><br>
		</div>
		<div class="form-group">
				<a href="ecchis_listar.php" title="Pagina para Alterar ou Excluir Anime">
					<button type="submit" class="meu_btn">
					Alterar ou Excluir Anime Ecchi</button></a><br>
		</div>
		</fieldset>
		<fieldset><legend>Filmes Animação</legend>
		<div class="form-group">
				<a href="filme_form.php" title="Pagina para Adicionar Filmes animação">	
					<button type="submit" class="meu_btn">
						Adicionar novo Filme Animação</button></a><br>
		</div>
		<div class="form-group">
				<a href="filmes_listar.php" title="Pagina para Alterar ou Excluir Anime">
					<button type="submit" class="meu_btn">
					Alterar ou Excluir Filme Animação</button></a><br>
		</div>
		</fieldset>
		<div class="form-group">
				<a href="ticket.php" title="Pagina para Selecionar Anime que gostei">
					<button type="submit" class="meu_btn">
					Pagina de Animes que gostei	</button></a><br>
		</div>
		<div class="form-group">
				<a href="sair.php" title="Sair da Conta Atual">
					<button type="submit" class="meu_btn">
					Fazer Log-OFF </button></a>
		</div>
	</fieldset>
</section>
</main>
<?php include 'rodape.php' ?>
</body>
</html>