<?php session_start();
ob_start();
// conecta com o banco de dados
include_once('conecta.php');
?>
<!doctype html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="keywords" content="animação, anime, animação 3d, filmes anime, ecchi, desenhos animados">
	<title>Series</title>
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
				<!-- Bloco do campo de LISTAR por LETRA -->
				<?php
					include_once ('listar_letras.php');
				?>
                <!-- Exibir MENSAGENs nesta parte -  msgAlertSerie  -->
				<div class="row text-center">
					<span id="msgAlertSerie"></span>
				</div>
				<!-- Tentativa de listar as SERIES aqui - listar_series -->
				<div class="row text-center">
					<span class="listar_series"></span>
				</div>
                    
				
		</div><!-- Fechamento da COLUNA CENTRAL  -->
	<?php
	include_once('side_bar.php');
	?>
		</div><!-- Fechamento da ROW da parte CENTRAL  -->
	</main>
	<?php
	include_once('rodape.php');
	include_once('banner_girls.php');
	?>
<!-- meu arquivo JavaScript Custom.js para o arquivo LISTAR-SERIES -->
<script src="js/series.js"></script>
</body>
</html>