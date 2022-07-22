<?php
	session_start();
	ob_start(); 
	include_once 'conecta.php';	
	if (empty($_GET['input_busca'])) {
		echo "<html><script>location.href='index.php'</script></hmtl>";
	}
	$recebe_busca = $_GET['input_busca'];
	// $consulta = $conecta->query("SELECT * FROM anime WHERE nome_anime LIKE CONCAT ('%','$recebe_busca','%') OR nome_completo_anime LIKE CONCAT ('%','$recebe_busca','%')");
	// não funcionou bem
	// $consulta = $conecta->query("SELECT * FROM categoria_animacao AS cat_ani LEFT JOIN anime AS ani ON cat_ani.id = ani.categoria_id_cat LEFT JOIN filme AS fil ON cat_ani.id = fil.categoria_id_cat LEFT JOIN serie AS ser ON cat_ani.id = ser.categoria_id_cat LEFT JOIN ova AS ova ON cat_ani.id = ova.categoria_id_cat LEFT JOIN ona AS ona ON cat_ani.id = ona.categoria_id_cat LEFT JOIN especial AS esp ON cat_ani.id = esp.categoria_id_cat WHERE ani.nome_anime OR fil.titulo_filme LIKE CONCAT ('%','$recebe_busca','%') OR nome_completo_anime LIKE CONCAT ('%','$recebe_busca','%') OR fil.titulo_filme LIKE CONCAT ('%','$recebe_busca','%')");
	
	// Novos testes 21-07-22
	$consulta = $conecta->query("SELECT ani.id_anime, ani.nome_anime, ani.nome_completo_anime, ani.img_mini as ani_img, fil.id_filme, fil.titulo_filme, fil.img_mini as fil_img, ser.id_serie, ser.titulo_serie, ser.img_mini as ser_img, ova.id_ova, ova.titulo_ova, ona.id_ona, ona.titulo_ona, esp.id_especial, esp.titulo_especial FROM categoria_animacao AS cat_ani LEFT JOIN anime AS ani ON cat_ani.id = ani.categoria_id_cat LEFT JOIN filme AS fil ON cat_ani.id = fil.categoria_id_cat LEFT JOIN serie AS ser ON cat_ani.id = ser.categoria_id_cat LEFT JOIN ova AS ova ON cat_ani.id = ova.categoria_id_cat LEFT JOIN ona AS ona ON cat_ani.id = ona.categoria_id_cat LEFT JOIN especial AS esp ON cat_ani.id = esp.categoria_id_cat WHERE id_anime LIKE CONCAT ('%','$recebe_busca','%') OR nome_completo_anime LIKE CONCAT ('%','$recebe_busca','%') OR titulo_filme LIKE CONCAT ('%','$recebe_busca','%') OR titulo_serie LIKE CONCAT ('%','$recebe_busca','%')");
	if ($consulta->rowCount()==0) {
		echo "<html><script>location.href='erro2.php'</script></hmtl>";	
	} ?>
<!doctype html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="keywords" content="animação, anime, animação 3d, filmes anime, ecchi, desenhos animados">
<title>FORM BUSCA</title>
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
	<div class="col-sm-12 text-center"><h2>Resultado da busca</h2>
		<h4>Pesquise por NOME ou GENERO para encotrar as animações, Animação 3D e Animes (series e filmes).</h4>
		<p>Lembrando que atualmente o Banco de dados só tem ANIMES, que são pesquisados apenas no campos NOME DO ANIME e GENERO.</p>
	</div>
	<?php $id_anime_exib = $consulta->fetch(PDO::FETCH_ASSOC);?>
	<div class="form-group">
		<a href="anime_detalhes.php?id_anime=<?php echo $id_anime_exib['id_anime']; ?>">
			<button type="button" class="meu_btn">Detalhes</button></a>
	</div>
	<div class="row" id="div_animes_conteiner"> 
	<?php while ($exibir = $consulta->fetch(PDO::FETCH_ASSOC)) { ?>
		
		<?php if ($exibir['id_anime']!="") { ?>
		<div id="div_animes">
			<div id="div_anime_nome">
				<h1><?php echo $exibir['nome_anime']; ?></h1>
			</div>
			<a href="anime_detalhes.php?id_anime=<?php echo $exibir['id_anime']; ?>" title="Detalhes do Anime" target="_blank">
			<figure id="figure_foto">
				<img src="imgs/anime/<?php echo $exibir['ani_img']; ?>" class="img-responsive">
				<figcaption id="figcap_foto">
					<p>Click para DETALHES ANIME</p>
				</figcaption>
			</figure></a>
			<div class="form-group">
			<a href="anime_detalhes.php?id_anime=<?php echo $exibir['id_anime']; ?>">
				<button type="button" class="meu_btn">
				Detalhes </button></a>
			</div> 
			<a href="anime_alterar.php?id_anime=<?php echo $exibir['id_anime']; ?>">Alterar</a>
		</div>
		<?php } ?>
		<?php if ($exibir['id_filme']!="") { ?>
			<div id="div_animes">
			<div id="div_anime_nome">
				<h1><?php echo $exibir['titulo_filme']; ?></h1>
			</div>
			<figure id="figure_foto">
				<img src="imgs/filme/<?php echo $exibir['fil_img']; ?>" class="img-responsive">
			</figure>
			<div class="form-group">
		<?php } ?>
		<?php if ($exibir['id_serie']!="") { ?>
			<div id="div_animes">
			<div id="div_anime_nome">
				<h1><?php echo $exibir['titulo_serie']; ?></h1>
			</div>
			<figure id="figure_foto">
				<img src="imgs/serie/<?php echo $exibir['ser_img']; ?>" class="img-responsive">
			</figure>
			<div class="form-group">
		<?php } ?>	
	<?php } ?>
	</div>
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