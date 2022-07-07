<?php session_start(); //inicio da sessão de usuário
//Limpar o buffer de saida
ob_start();
include_once('consulta_count.php');
?>
<!doctype html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="keywords" content="animação, anime, animação 3d, filmes anime, ecchi, desenhos animados">
	<title>OVAs</title>
	<!-- BOOTSTRAP CSS-->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
	<!-- ICONs google Fonts  -->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<!-- Favicon Imagem -->
	<link rel="icon" type="image/x-icon" sizes="128x128" href="imgs/favicon.ico">
	<!-- Meu CSS INDEX -->
	<link rel="stylesheet" type="text/css" href="css/index.css">
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
				<!-- Exibir MENSAGENs nesta parte -  msgAlertSerie  -->
				<div class="row text-center">
					<span id="msgAlertovas"></span>
				</div>
				<!-- Tentativa de listar os FILMES aqui - listar_filmes -->
				<div class="row text-center">
					<span class="listar_ovas"></span>
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
<!-- BOOTSTRAP JQUERRY + POPPERJS-->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
<script src="js/ovas.js"></script>
</body>
</html>