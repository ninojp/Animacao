<?php session_start();
ob_start();
	include_once 'conecta.php';
    if (empty($_GET['busca2'])) {
		echo "<html><script>location.href='index.php'</script></hmtl>";
	}	
	// if (empty($_POST['busca2'])) {
	// 	echo "<html><script>location.href='index.php'</script></hmtl>";
	// }
    $recebe_busca = $_GET['busca2'];
	// $busca2 = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    //Primeira CONSULTA TESTADA
	// $consulta = $conecta->query("SELECT * FROM anime WHERE nome_anime LIKE CONCAT ('%','$recebe_busca','%') OR nome_completo_anime LIKE CONCAT ('%','$recebe_busca','%')");

    // Novos testes 21-07-22 - estava retornando BEM mas não consegui linkar para os DETALHES do anime(foi ai q descobri meu erro no PESQ_AUTO2)
	$consulta = $conecta->query("SELECT ani.id_anime, ani.nome_anime, ani.nome_completo_anime, ani.img_mini as ani_img, fil.id_filme, fil.filme_id_anime, fil.titulo_filme, fil.s_titulo_filme, fil.img_mini as fil_img, ser.id_serie, ser.serie_id_anime, ser.titulo_serie, ser.s_titulo_serie, ser.img_mini as ser_img, ova.id_ova, ova.ova_id_anime, ova.titulo_ova, ova.img_mini as ova_img, ona.id_ona, ona.ona_id_anime, ona.titulo_ona, ona.s_titulo_ona, ona.img_mini as ona_img, esp.id_especial, esp.especial_id_anime, esp.titulo_especial, esp.s_titulo_especial, esp.img_mini as esp_img FROM categoria_animacao AS cat_ani LEFT JOIN anime AS ani ON cat_ani.id = ani.categoria_id_cat LEFT JOIN filme AS fil ON cat_ani.id = fil.categoria_id_cat LEFT JOIN serie AS ser ON cat_ani.id = ser.categoria_id_cat LEFT JOIN ova AS ova ON cat_ani.id = ova.categoria_id_cat LEFT JOIN ona AS ona ON cat_ani.id = ona.categoria_id_cat LEFT JOIN especial AS esp ON cat_ani.id = esp.categoria_id_cat WHERE nome_anime LIKE CONCAT ('%','$recebe_busca','%') OR nome_completo_anime LIKE CONCAT ('%','$recebe_busca','%') OR titulo_filme LIKE CONCAT ('%','$recebe_busca','%') OR s_titulo_filme LIKE CONCAT ('%','$recebe_busca','%') OR titulo_serie LIKE CONCAT ('%','$recebe_busca','%') OR s_titulo_serie LIKE CONCAT ('%','$recebe_busca','%') OR titulo_ova LIKE CONCAT ('%','$recebe_busca','%') OR s_titulo_ova LIKE CONCAT ('%','$recebe_busca','%') OR titulo_especial LIKE CONCAT ('%','$recebe_busca','%') OR s_titulo_especial LIKE CONCAT ('%','$recebe_busca','%') OR titulo_ona LIKE CONCAT ('%','$recebe_busca','%') OR s_titulo_ona LIKE CONCAT ('%','$recebe_busca','%')");
	// NOVO TESTE 20-08-22 - teste com o MATCH ainda em desenvolvimnto
	//$consulta_query = ("SELECT ani.id_anime, ani.nome_anime, ani.nome_completo_anime, ani.img_mini as ani_img, fil.id_filme, fil.filme_id_anime, fil.titulo_filme, fil.s_titulo_filme, fil.img_mini as fil_img, ser.id_serie, ser.serie_id_anime, ser.titulo_serie, ser.s_titulo_serie, ser.img_mini as ser_img, ova.id_ova, ova.ova_id_anime, ova.titulo_ova, ova.img_mini as ova_img, ona.id_ona, ona.ona_id_anime, ona.titulo_ona, ona.s_titulo_ona, ona.img_mini as ona_img, esp.id_especial, esp.especial_id_anime, esp.titulo_especial, esp.s_titulo_especial, esp.img_mini as esp_img FROM  categoria_animacao AS cat_ani LEFT JOIN anime AS ani ON cat_ani.id = ani.categoria_id_cat LEFT JOIN filme AS fil ON cat_ani.id = fil.categoria_id_cat LEFT JOIN serie AS ser ON cat_ani.id = ser.categoria_id_cat LEFT JOIN ova AS ova ON cat_ani.id = ova.categoria_id_cat LEFT JOIN ona AS ona ON cat_ani.id = ona.categoria_id_cat LEFT JOIN especial AS esp ON cat_ani.id = esp.categoria_id_cat WHERE MATCH(nome_anime) AGAINST (:buscar) OR MATCH(nome_completo_anime) AGAINST (:buscar) OR MATCH(titulo_filme) AGAINST (:buscar) OR MATCH(s_titulo_filme) AGAINST (:buscar) OR MATCH(titulo_serie) AGAINST (:buscar) OR MATCH(s_titulo_serie) AGAINST (:buscar) OR MATCH(titulo_ova) AGAINST (:buscar) OR MATCH(s_titulo_ova) AGAINST (:buscar) OR MATCH(titulo_ona) AGAINST (:buscar) OR MATCH(s_titulo_ona) AGAINST (:buscar) OR MATCH(titulo_especial) AGAINST (:buscar) OR MATCH(s_titulo_especial) AGAINST (:buscar) LIMIT 50");
	// $consulta = $conecta->prepare($consulta_query);
	// $consulta->bindParam(':buscar', $busca2['busca2'], PDO::PARAM_STR);
	// $consulta->execute();
	if ($consulta->rowCount()==0) {
		echo "<html><script>location.href='erro_busca.php'</script></hmtl>";	
	} ?>
<!doctype html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="keywords" content="animação, anime, animação 3d, filmes anime, ecchi, desenhos animados">
	<title>Resultado da BUSCA por TERMO Completo</title>
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
						<h2 class="branco">Resultado da busca</h2>
                        <p class="destaque">O método de pesquisa usado foi por PALAVRAS(Full-Text), cada palavra digitada gera um resultado.<br><br>
							CLICK na IMAGEM e vc terá acesso a todas os detalhes do mesmo; Filmes, Series, Ovas, Onas e Especiais.</p>
                    </div>
				</div>
				<div class="row justify-content-center text-center">
				<!-- WHILE para exibir o resulta da BUSCA -->
                <?php while ($exibir = $consulta->fetch(PDO::FETCH_ASSOC)) { ?>
					<!-- Exibir o resultado da BUSCA por ANIME -->
                    <?php if ($exibir['id_anime']!="") { ?>
                        <div class="thumb_div col-xxl-3 col-xl-3 col-lg-3 col-md-4">
                            <a class="link_sem_" href="anime_detalhes.php?id_anime=<?php echo $exibir['id_anime']; ?>" title="Click para Detalhes do Anime" target="_blank">
                            <div class='col-xxl-12'>
                            	<img class='thumb_img' src="imgs/anime/<?php echo $exibir['ani_img']; ?>" class="img-responsive">
								<span class="span_nome"><?php echo $exibir['nome_anime']; ?></span>
							</div></a>
						</div>
					<?php } ?>

						<!-- Exibir o resultado da BUSCA por FILMEs -->
                        <?php if ($exibir['id_filme']!="") { ?>
						<div class="thumb_div col-xxl-3 col-xl-3 col-lg-3 col-md-4">
							<a class="link_sem_" href="anime_detalhes.php?id_anime=<?php echo $exibir['filme_id_anime'];?>" title="Click para Detalhes do Anime" target="_blank">
                            <div class='col-xxl-12'>
								<img class='thumb_img' src="imgs/filme/<?php echo $exibir['fil_img']; ?>" class="img-responsive">
								<span class="span_nome"><?php echo $exibir['titulo_filme']; ?></span>
							</div></a>
						</div>
						<?php } ?>

						<!-- Exibir o resultado da BUSCA por SERIEs -->	
						<?php if ($exibir['id_serie']!="") { ?>
						<div class="thumb_div col-xxl-3 col-xl-3 col-lg-3 col-md-4">
							<a class="link_sem_" href="anime_detalhes.php?id_anime=<?php echo $exibir['serie_id_anime'];?>" title="Click para Detalhes do Anime" target="_blank">
							<div class='col-xxl-12'>
                            	<img class='thumb_img' src="imgs/serie/<?php echo $exibir['ser_img']; ?>" class="img-responsive">
								<span class='span_nome'><?php echo $exibir['titulo_serie']; ?></span>
							</div></a>
						</div>
						<?php } ?>
					
					<!-- Exibir o resultado da BUSCA por OVA -->
                    <?php if ($exibir['id_ova']!="") { ?>
                        <div class="thumb_div col-xxl-3 col-xl-3 col-lg-3 col-md-4">
                            <a class="link_sem_" href="anime_detalhes.php?id_anime=<?php echo $exibir['ova_id_anime']; ?>" title="Click para Detalhes do Anime" target="_blank">
                            <div class='col-xxl-12'>
                            	<img class='thumb_img' src="imgs/ova/<?php echo $exibir['ova_img']; ?>" class="img-responsive">
								<span class="span_nome"><?php echo $exibir['titulo_ova']; ?></span>
							</div></a>
						</div>
					<?php } ?>

					<!-- Exibir o resultado da BUSCA por ESPECIAL -->
                    <?php if ($exibir['id_especial']!="") { ?>
                        <div class="thumb_div col-xxl-3 col-xl-3 col-lg-3 col-md-4">
                            <a class="link_sem_" href="anime_detalhes.php?id_anime=<?php echo $exibir['especial_id_anime']; ?>" title="Click para Detalhes do Anime" target="_blank">
                            <div class='col-xxl-12'>
                            	<img class='thumb_img' src="imgs/especial/<?php echo $exibir['esp_img']; ?>" class="img-responsive">
								<span class="span_nome"><?php echo $exibir['titulo_especial']; ?></span>
							</div></a>
						</div>
					<?php } ?>

					<!-- Exibir o resultado da BUSCA por ONA -->
                    <?php if ($exibir['id_ona']!="") { ?>
                        <div class="thumb_div col-xxl-3 col-xl-3 col-lg-3 col-md-4">
                            <a class="link_sem_" href="anime_detalhes.php?id_anime=<?php echo $exibir['ona_id_anime']; ?>" title="Click para Detalhes do Anime" target="_blank">
                            <div class='col-xxl-12'>
                            	<img class='thumb_img' src="imgs/ona/<?php echo $exibir['ona_img']; ?>" class="img-responsive">
								<span class="span_nome"><?php echo $exibir['titulo_ona']; ?></span>
							</div></a>
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