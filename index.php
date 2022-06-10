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
<title>Animação</title>
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
<!--
<div class="video_dragao">
	<video playsinline autoplay  muted>
		<source src="video/dragon_black_proto.webm" type="video/webm">
	</video>
</div>
-->
<?php
	include_once 'navbar_top.php';
	include_once 'header.php';
?>
<!-- MAIN -> DIV classe CONTAINER-FLUID - CAMPO de BUSCA -->
<main class="container">
<div class="row text-center fundo_black_80">
<!-- coluna do campo Busca por letras -->
	<div class="col-xxl-10 container">
		<div class="col-xxl-12">
			<div class="row  mt-2">
				<div class="col-xxl-12 nav nav-tabs">
					<div class="nav-item px-1"><a class="nav-link active px-3" href="" >#</a ></div>
					<div class="nav-item px-1"><a class="nav-link px-2" href="form_busca.php?input_busca=a">A</a></div> 
					<div class="nav-item px-1"><a class="nav-link px-2" href="">B</a></div>
					<div class="nav-item px-1"><a class="nav-link px-2" href="">C</a></div>
					<div class="nav-item px-1"><a class="nav-link px-2" href="">D</a></div>
					<div class="nav-item px-1"><a class="nav-link px-2" href="">E</a></div>
					<div class="nav-item px-1"><a class="nav-link px-2" href="">F</a></div>
					<div class="nav-item px-1"><a class="nav-link px-2" href="">G</a></div>
					<div class="nav-item px-1"><a class="nav-link px-2" href="">H</a></div>
					<div class="nav-item px-1"><a class="nav-link px-2" href="">I</a></div>
					<div class="nav-item px-1"><a class="nav-link px-2" href="">J</a></div>
					<div class="nav-item px-1"><a class="nav-link px-2" href="">K</a></div>
					<div class="nav-item px-1"><a class="nav-link px-2" href="">L</a></div>
					<div class="nav-item px-1"><a class="nav-link px-2" href="">M</a></div>
					<div class="nav-item px-1"><a class="nav-link px-2" href="">N</a></div>
					<div class="nav-item px-1"><a class="nav-link px-2" href="">O</a></div>
					<div class="nav-item px-1"><a class="nav-link px-2" href="">P</a></div>
					<div class="nav-item px-1"><a class="nav-link px-2" href="">Q</a></div>
					<div class="nav-item px-1"><a class="nav-link px-2" href="">R</a></div>
					<div class="nav-item px-1"><a class="nav-link px-2" href="">S</a></div>
					<div class="nav-item px-1"><a class="nav-link px-2" href="">T</a></div>
					<div class="nav-item px-1"><a class="nav-link px-2" href="">U</a></div>
					<div class="nav-item px-1"><a class="nav-link px-2" href="">V</a></div>
					<div class="nav-item px-1"><a class="nav-link px-2" href="">X</a></div>
					<div class="nav-item px-1"><a class="nav-link px-2" href="">Y</a></div>
					<div class="nav-item px-1"><a class="nav-link px-2" href="">W</a></div>
					<div class="nav-item px-1"><a class="nav-link px-2" href="">Z</a></div>
				</div>
			</div>
		</div>
		<!-- MAIN -> DIV classe ROW - CAMPO para exibir os Thumps por ordem alfabetica -->
		<div class="row text-center">
			<span id="msgAlerta"></span>
			<span class="listar-animes"></span>
		</div>
	</div>
<!-- MAIN -> DIV -> SIDEBAR - CAMPO de selecionar por genero ----------------->
	<div class="col-xxl-2 text-center">
	<div class="row">
		<div class="col-xxl-12" style="margin-top: 1rem;">
			<a href="https://anidb.net/" target="_blank">
			<img src="imgs/banner/Anidb-plain.webp" width="80%">
			</a>
		</div>
		<div class="col-xxl-12">
			<a href="https://myanimelist.net/" target="_blank">
			<img src="imgs/banner/myanimelist-Logo_mini.png">
			</a>
		</div>
		<div class="col-xxl-12" style="margin-top: 2rem;">
			<a href="https://www.animenewsnetwork.com/" target="_blank">
			<img src="imgs/banner/Anime_News_Network_logo_mini.png">
			</a>
		</div>
		<div class="col-xxl-12" style="margin-top: 2rem;">
			<a href="https://pt.wikipedia.org/wiki/Wikip%C3%A9dia:P%C3%A1gina_principal" target="_blank">
				<img src="imgs/banner/wikipedia_mini.png"><img src="imgs/banner/wikipedia-logo-text-logo-branco_mini.png"></a>
		</div>
		<div class="col-xxl-12" style="margin-top: 2rem;">
		<h4>Generos e temas</h4>
			<h6><a href="form_busca.php?input_busca=Ação">Ação</a><br>
			<a href="form_busca.php?input_busca=animação 3d">Animação (CGI)</a><br>
			<a href="form_busca.php?input_busca=aventura">Aventura</a><br>
			<a href="form_busca.php?input_busca=Artes marciais">Artes Marciais </a><br>
			<a href="form_busca.php?input_busca=colegial">Colegial </a><br>
			<a href="form_busca.php?input_busca=Comédia">Comédia</a><br>
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
			<a href="form_busca.php?input_busca=terror">Terror </a><br>
			<a href="form_busca.php?input_busca=policial">Policial </a><br>
			</h6><hr>
			<h4>Tipo:</h4><h6>
			<a href="form_busca.php?input_busca=filme">Filme(Anime)</a><br>
			<a href="form_busca.php?input_busca=ecchi">Ecchi(+16)</a><br>
			<hr>
			<a href="anime_inserir_form.php">Inserir ANIME </a><br>
		</h6>
		</div>
	</div>
	</div>
	
</div>
</main>
<?php
	include_once('rodape.php')
?>
<script src="js/custom.js"></script>
</body>
</html>


