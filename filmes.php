<?php 
include_once('consulta_count.php');
?>
<!doctype html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="keywords" content="animação, anime, animação 3d, filmes anime, ecchi, desenhos animados">
	<title>Filmes</title>
	<!-- Favicon Imagem -->
	<link rel="icon" type="image/x-icon" sizes="128x128" href="imgs/favicon.ico">
	<!-- Meu CSS INDEX -->
	<link rel="stylesheet" type="text/css" href="css/geral_style.css">
</head>
<body>
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
							<div class="nav-item px-1"><a class="nav-link active px-3" href="">#</a></div>
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
				<!-- Exibir MENSAGENs nesta parte -  msgAlertFilmes  -->
				<div class="row text-center">
					<span id="msgAlertFilmes"></span>
				</div>
				<!-- Tentativa de listar os FILMES aqui - listar_filmes -->
				<div class="row text-center">
					<span class="listar_filmes"></span>
				</div>
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
<script src="js/filmes.js"></script>
</body>
</html>