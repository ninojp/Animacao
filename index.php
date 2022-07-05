<?php 
	session_start(); //deve ser a primeira linha de codigo da pagina(DICA), antes mesmo dos comentários kkkk
//Limpar o buffer de saida
	ob_start(); 
// conecta com o banco de dados
	include_once('conecta.php');
	include_once('consulta_count.php');
//CONSULTA na tabela ANIME JOIN IMAGEM ordenado por nome_anime
	// $consulta_anime = $conecta->query("SELECT * FROM anime AS a LEFT JOIN imagem AS img ON a.id_anime = img.anime_id_anime ORDER BY nome_anime ASC");
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
	<!-- ICONs google Fonts  -->
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<!-- Favicon Imagem -->
<link rel="icon" type="image/x-icon" sizes="128x128" href="imgs/favicon.ico">
<!-- Meu CSS INDEX -->
<link rel="stylesheet" type="text/css" href="css/index.css">
<link rel="stylesheet" type="text/css" href="css/geral_style.css">
</head>
<body>
<!--	DIV VIDEO video_dragao (loop) FOI RETIRADO pois estava consumindo muita MEMÓRIA 
<div class="video_dragao">
	<video playsinline autoplay  muted>
		<source src="video/dragon_black_proto.webm" type="video/webm">
	</video>
</div> -->
<?php
	include_once 'navbar_top.php';
	include_once 'header.php';
?>
<!-- MAIN -> DIV classe CONTAINER-FLUID - CAMPO de BUSCA -->
<main class="container">
<div class="row text-center fundo_black_80">
<!-- coluna do campo Busca por letras -->
	<div class="col-xxl-10 col-xl-10 col-lg-10 container">
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
			<div class="row">
				<div class="col-xxl-12 col-xl-12 col-lg-12">
					<h1>Lista de categorias</h1>
					<span id="msgAlertaCat"></span>
				</div>
			</div>
			<div class="row">
				<div class="col-xxl-12 col-xl-12 col-lg-12">
					<span class="listar-cat-animacao"></span>
				</div>
			</div>
		</div>
		<span class="listar-animes"></span>
	</div>
<?php
include_once('side_bar.php');
?>
	
</div>
</main>
<?php
	include_once('rodape.php');
	include_once('banner_girls.php');
?>
<!-- BOOTSTRAP JQUERRY -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
	<!-- meu arquivo JavaScript Custom.js para o arquivo listar-animes -->
<script src="js/custom.js"></script>
<script src="js/categorias.js"></script>
</body>
</html>


