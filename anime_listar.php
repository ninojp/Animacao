<?php session_start();
ob_start();
include_once('conecta.php');//CONSULTA na tabela ANIME JOIN IMAGEM ordenado por nome_anime
$consulta_anime = $conecta->query("SELECT * FROM anime AS a LEFT JOIN imagem AS img ON a.id_anime = img.anime_id_anime ORDER BY id_anime DESC");
?>
<!doctype html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="keywords" content="animação, anime, animação 3d, filmes anime, ecchi, desenhos animados">
	<title>LISTA dos animes para ALTERAR</title>
	<!-- Favicon Imagem -->
	<link rel="icon" type="image/x-icon" sizes="128x128" href="imgs/favicon.ico">
</head>
<body>
<?php
	include_once 'navbar_top.php';
	include_once 'header.php';
?>
	<!-- MAIN -> DIV classe CONTAINER-FLUID -->
	<main class="container">
		<div class="row text-center fundo_black_80"><!-- ROW da parte CENTRAL  -->
			<div class="col-xxl-10 col-xl-10 col-lg-10 container"><!-- COLUNA CENTRAL  -->
				<!-- MAIN -> DIV classe ROW - CAMPO para exibir os Thumps por ordem alfabetica -->
				<div class="row text-center">
					<!--Bloco da DIV para inserção do conteúdo novo-->
					<div class="col-xxl-12 m-4">
						<h1>LISTA dos animes para ALTERAR</h1>
					</div>
					<div class="row text-center">
						<?php while ($exibir = $consulta_anime->fetch(PDO::FETCH_ASSOC)) { ?>
						<div class="thumb_div ms-3 mt-3">
							<a class="link_sem_" href="anime_alterar_form.php?id_anime=<?php echo $exibir['id_anime']; ?>" title="Detalhes do Anime" target="_blank">
								<img class="thumb_img" src="imgs/anime/<?php echo $exibir['img_mini']; ?>" class="img-responsive">
								<div class="col-xxl-12"><span class="span_nome"><?php echo $exibir['nome_anime'];?></span>
								</div></a>
						</div>
						<?php } ?>
					</div>
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
</body>
</html>