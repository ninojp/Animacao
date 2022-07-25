<?php
session_start(); //deve ser a primeira linha de codigo da pagina(DICA), antes mesmo dos comentários kkkk
//Limpar o buffer de saida
ob_start();
// conecta com o banco de dados
include_once('conecta.php');
// include_once('consulta_count.php');
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
	<!-- Favicon Imagem -->
	<link rel="icon" type="image/x-icon" sizes="128x128" href="imgs/favicon.ico">
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
	<!-- MAIN -> DIV classe CONTAINER-FLUID -->
	<main class="container">
		<div class="row text-center fundo_black_80"><!-- ROW da parte CENTRAL  -->
			<div class="col-xxl-10 col-xl-10 col-lg-10 container"><!-- COLUNA CENTRAL  -->
				<!-- Bloco do campo de LISTAR por LETRA -->
				<?php
					include_once ('listar_letras.php');
				?>
				<!-- Bloco de codigo de inserção do LISTAR.PHP -->
				<div class="row text-center">
					<span id="msgAlerta"></span>
				</div>
				<div class="row text-center">
					<span class="listar-animes"></span>
				</div>
				
		</div><!-- Fechamento da COLUNA CENTRAL  -->
	<?php
	include_once('side_bar.php');
	?>
		</div><!-- Fechamento da ROW da parte CENTRAL  -->
	</main>
	<?php
	include_once('rodape.php');
	?>
<!-- BOOTSTRAP JQUERRY + POPPERJS-->

<!-- meu arquivo JavaScript Custom.js para o arquivo listar-animes -->
<script src="js/custom.js"></script>
<!-- <script src="js/categorias.js"></script> -->
</body>
</html>