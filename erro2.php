<?php session_start();
ob_start();
include_once('conecta.php');
?>
<!doctype html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="keywords" content="animação, anime, animação 3d, filmes anime, ecchi, desenhos animados">
	<title>BUSCA! Nenhum Resultado Encontrado</title>
	<!-- Favicon Imagem -->
	<link rel="icon" type="image/x-icon" sizes="128x128" href="imgs/favicon.ico">
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
	<!-- MAIN -> DIV classe CONTAINER-FLUID -->
	<main class="container">
		<div class="row text-center fundo_black_40"><!-- ROW da parte CENTRAL  -->
			<div class="col-xxl-10 col-xl-10 col-lg-10 container"><!-- COLUNA CENTRAL  -->
				<fieldset>
					<legend>Nenhum Resultado ENCONTRADO!</legend>
					<div class="form-group">
						<h2>O termo procurado não foi encontrado!!!</h2>
					</div>
					<div class="form-group">
						<p>Lembrando que a busca obtem melhores resultas por PALAVRAS do que por frases, caso não encontre o titulo completo do ANIME, busque por uma ou duas palavras do Titulo, Subtitulo em Inglês, Português ou Hepburn.</p>
					</div>
					<div class="form-group">
						<a href="index.php" target="_parent">
							<button type="button" class="meu_btn">
								Voltar para pagina inicial</button></a>
					</div>
				</fieldset>

			</div><!-- Fechamento da COLUNA CENTRAL  -->
	<?php
	include_once('side_bar.php');
	?>
		</div><!-- Fechamento da ROW da parte CENTRAL  -->
	</main>
	<?php
	include_once('rodape.php');
	?>
</body>
</html>