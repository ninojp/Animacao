<?php 
	session_start(); //deve ser a primeira linha de codigo da pagina(DICA), antes mesmo dos comentários kkkk
//Limpar o buffer de saida
	ob_start(); 
// conecta com o banco de dados
	include_once('conecta.php');
//CONSULTA na tabela ANIME JOIN IMAGEM ordenado por nome_anime
	$consulta_anime = $conecta->query("SELECT * FROM anime AS a LEFT JOIN imagem AS img ON a.id_anime = img.anime_id_anime ORDER BY nome_anime ASC");
?>
<!doctype html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="keywords" content="animação, anime, animação 3d, filmes anime, ecchi, desenhos animados">
<title>MODELO INDEX</title>
	<!-- BOOTSTRAP CSS-->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
	<!-- BOOTSTRAP JQUERRY -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
	<!-- ICONs google Fonts  -->
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<!-- Favicon Imagem -->
<link rel="icon" type="image/x-icon" sizes="128x128" href="imgs/favicon.ico">
<!-- Meu CSS INDEX -->
<link rel="stylesheet" type="text/css" href="css/index.css">
<link rel="stylesheet" type="text/css" href="css/geral_style.css">
</head>
<body>
<!--	DIV VIDEO video_dragao (loop) FOI RETIRADO pois estava consumindo muita MEMÓRIAW -->
<div class="video_dragao">
	<video playsinline autoplay  muted>
		<source src="video/dragon_black_proto.webm" type="video/webm">
	</video>
</div>
<?php
	include_once 'navbar_top.php';
	include_once 'header.php';
?>
<!-- MAIN -> DIV classe CONTAINER-FLUID - CAMPO de BUSCA -->
<main class="container">
<div class="row border text-center">
<!-- coluna do campo Busca por letras -->
	<div class="col-10 container border border-dark">
		<div class="col-12 border border-dark">
			<h5><a href="">A</a> - <a href="#lebtra_B">B</a> - C - D - E - F - G - H - I - J - K - L - M - N - O - P - Q - R - S - T - U - V - X - W - Y - Z</h5><hr>
		</div>
	<!--Bloco da DIV para inserção do conteúdo novo-->
	<section id="sect_conteiner_form">
	<fieldset>
		<legend>Erro no Login</legend>
		<div class="form-group">
			<h2>Usuário ou senha incorreto!!</h2>
		</div>
		<div class="form-group">
			<a href="Login.php">
				<button type="button" class="meu_btn">
					Tentar Novamente
				</button></a>
		</div>
		<div class="form-group">
			<a href="formUsuario.php">
				<button type="button" class="meu_btn">
					Ainda não sou cadastrado
				</button></a>
		</div>
	</fieldset>
	</section>
	<!--DIV de fechamento do bloco principal	-->
	</div>
<!-- MAIN -> DIV -> SIDEBAR col-2 - CAMPO de selecionar por genero -->
	<div class="col-2 border text-center">
	<div class="row">
		<div class="col">
		<h5>Generos ou temas:<br>
			<a href="form_busca.php?input_busca=animação 3d">Animação 3D</a><br>
			<a href="form_busca.php?input_busca=Ação">Ação</a><br>
			<a href="form_busca.php?input_busca=Artes marciais">Artes Marciais </a><br>
			<a href="form_busca.php?input_busca=aventura">Aventura</a><br>
			<a href="form_busca.php?input_busca=Comédia">Comédia</a><br>
			<a href="form_busca.php?input_busca=colegial">Colegial </a><br>
			<a href="form_busca.php?input_busca=CyberPunk">CyberPunk </a><br>
			<a href="form_busca.php?input_busca=Drama">Drama </a><br>
			<a href="form_busca.php?input_busca=Ecchi">Ecchi </a><br>
			<a href="form_busca.php?input_busca=Fantasia">Fantasia </a><br>
			<a href="form_busca.php?input_busca=Ficção">Ficção </a><br>
			<a href="form_busca.php?input_busca=Ficção Científica">Ficção Científica </a><br>
			<a href="form_busca.php?input_busca=game">Game </a><br>
			<a href="form_busca.php?input_busca=Harém">Harém </a><br>
			<a href="form_busca.php?input_busca=Magia">Magia </a><br>
			<a href="form_busca.php?input_busca=Mistério">Mistério </a><br>
			<a href="form_busca.php?input_busca=Romance">Romance </a><br>
			<a href="form_busca.php?input_busca=Seinen">Seinen </a><br>
			<a href="form_busca.php?input_busca=Sobrenatural">Sobrenatural </a><br>
			<a href="form_busca.php?input_busca=Sobrevivência">Sobrevivência </a><br>
			<a href="form_busca.php?input_busca=suspense">Suspense </a><br>
			<a href="form_busca.php?input_busca=Super Poderes">Super Poderes </a><br>
			<a href="form_busca.php?input_busca=Super heróis">Super heróis </a><br>
			<a href="form_busca.php?input_busca=policial">Policial </a><br>
			<hr>
			Tipo:<br>
			<a href="form_busca.php?input_busca=filme">Filme(Anime)</a><br>
			<a href="form_busca.php?input_busca=ecchi">Ecchi(+16)</a><br>
			<hr>
			<a href="anime_inserir_form.php">Inserir ANIME </a><br>
		</h5>
		</div>
	</div>
	</div>
</div>
</main>
<footer>
</footer>
</body>
</html>