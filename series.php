<?php
// session_start(); //deve ser a primeira linha de codigo da pagina(DICA), antes mesmo dos comentários kkkk
// //Limpar o buffer de saida
// ob_start();
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
	<!-- BOOTSTRAP CSS
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
	Favicon Imagem
	<link rel="icon" type="image/x-icon" sizes="128x128" href="imgs/favicon.ico">
	Inserção do CSS GERAL da maioria das paginas
	<link rel="stylesheet" type="text/css" href="css/geral_style.css"> -->
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
	?>
<!-- BOOTSTRAP JQUERRY + POPPERJS
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script> -->
<!-- meu arquivo JavaScript Custom.js para o arquivo LISTAR-SERIES -->
<script src="js/series.js"></script>
</body>
</html>