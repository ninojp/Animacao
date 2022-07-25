<?php
	include_once 'conecta.php';	
	if (empty($_GET['input_busca'])) {
		echo "<html><script>location.href='index.php'</script></hmtl>";
	}
	$recebe_busca = $_GET['input_busca'];
    //Primeira CONSULTA TESTADA
	// $consulta = $conecta->query("SELECT * FROM anime WHERE nome_anime LIKE CONCAT ('%','$recebe_busca','%') OR nome_completo_anime LIKE CONCAT ('%','$recebe_busca','%')");

	// não funcionou bem
	// $consulta = $conecta->query("SELECT * FROM categoria_animacao AS cat_ani LEFT JOIN anime AS ani ON cat_ani.id = ani.categoria_id_cat LEFT JOIN filme AS fil ON cat_ani.id = fil.categoria_id_cat LEFT JOIN serie AS ser ON cat_ani.id = ser.categoria_id_cat LEFT JOIN ova AS ova ON cat_ani.id = ova.categoria_id_cat LEFT JOIN ona AS ona ON cat_ani.id = ona.categoria_id_cat LEFT JOIN especial AS esp ON cat_ani.id = esp.categoria_id_cat WHERE ani.nome_anime OR fil.titulo_filme LIKE CONCAT ('%','$recebe_busca','%') OR nome_completo_anime LIKE CONCAT ('%','$recebe_busca','%') OR fil.titulo_filme LIKE CONCAT ('%','$recebe_busca','%')");
	
	// Novos testes 21-07-22 - estava retornando BEM mas não consegui linkar para os DETALHES do anime(foi ai q descobri meu erro no PESQ_AUTO2)
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
	<title>Resultado de sua BUSCA</title>
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
				<!-- Aqui começa o row para EXIBIÇÃO dos resultados da BUSCA -->
                <div class="row justify-content-center">
                    <div class="col-sm-12 text-center">
						<h2>Resultado da busca</h2>
                        <p>Atualmente o resultado tem LINKs apenas para os animes, dentro da pagina ANIMES DETALHES vc terá acesso a todas os detalhes do anime; Filmes, Series, Ovas, Onas, Especiais do mesmo.</p>
                    </div>
					<!-- WHILE para exibir o resulta da BUSCA -->
                    <?php while ($exibir = $consulta->fetch(PDO::FETCH_ASSOC)) { ?>
					<!-- Exibir o resultado da BUSCA por ANIME -->
                    <?php if ($exibir['id_anime']!="") { ?>
                        <div class="thumb_div col-xxl-3 col-xl-3 col-lg-3 col-md-4" >
                            <a href="anime_detalhes.php?id_anime=<?php echo $exibir['id_anime']; ?>" title="Detalhes do Anime" target="_blank">
                            <div class='col-xxl-10 border'>
                            	<span class="span_nome"><?php echo $exibir['nome_anime']; ?></span>
                                	<img class='thumb_img' src="imgs/anime/<?php echo $exibir['ani_img']; ?>" class="img-responsive">
							</div>
                            </a>
						    <div class="form-group">
                            	<a href="anime_detalhes.php?id_anime=<?php echo $exibir['id_anime']; ?>">
                                	<button type="button" class="meu_btn">
                                	Detalhes </button></a>
                            </div>
						</div>
					<?php } ?>

						<!-- Exibir o resultado da BUSCA por FILMEs -->
                        <?php if ($exibir['id_filme']!="") { ?>
						<div class="thumb_div col-xxl-3 col-xl-3 col-lg-3 col-md-4">
							<span class="span_nome"><?php echo $exibir['titulo_filme']; ?></span>
							<figure id="figure_foto">
								<img class='thumb_img' src="imgs/filme/<?php echo $exibir['fil_img']; ?>" class="img-responsive">
							</figure>
						</div><br>
						<?php } ?>

						<!-- Exibir o resultado da BUSCA por SERIEs -->	
						<?php if ($exibir['id_serie']!="") { ?>
						<div class="thumb_div col-xxl-3 col-xl-3 col-lg-3 col-md-4">
							<span class='span_nome'><?php echo $exibir['titulo_serie']; ?></span>
							<figure id="figure_foto">
								<img class='thumb_img' src="imgs/serie/<?php echo $exibir['ser_img']; ?>" class="img-responsive">
							</figure>
						</div>
						<?php } ?>
					<?php } ?>
				</div><!-- FECHAMENTO do ROW de exibição do resulta da BUSCA -->

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