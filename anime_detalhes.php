<?php	session_start();
        ob_start(); 
		include 'conecta.php';
	if (!empty($_GET['id_anime'])) {
	$id_anime = $_GET['id_anime'];
// Consulta LEFT JOIN + INNER JOIN -> BD.anime + BD.imagem + BD.autor 
	$consulta_anime = $conecta->query("SELECT id_anime, nome_anime, nome_completo_anime, descricao_anime, personagens, img_mini, link_imagem, id_autor, direcao, producao, roteiro, musica, estudio, licenciamento, original_network 
    FROM anime AS a
    left join imagem as img
    on a.id_anime = img.anime_id_anime
    inner join autor as aut
    on a.autor_id_autor = aut.id_autor
    WHERE id_anime='$id_anime'");
	$exib_anime = $consulta_anime->fetch(PDO::FETCH_ASSOC);
// Consulta INNER JOIN -> BD.genero + BD.anime -> para GENERO
    $consulta_genero = $conecta->query("SELECT * FROM anime_genero as anig
    inner join genero as g
    on anig.fk_id_genero = g.id_genero
    join anime a
    on a.id_anime = anig.fk_id_anime
    WHERE id_anime='$id_anime'");
//	$exib_genero = $consulta_genero->fetch(PDO::FETCH_ASSOC);
// Consulta SELECT -> BD.imagem -> para IMAGENS DA OVA
    $consulta_img_ova = $conecta->query("SELECT caminho_img, ova_id_ova FROM imagem
    where ova_id_ova != 0");
// Consulta SELECT -> BD.imagem -> para IMAGENS do ESPECIAL
    $consulta_img_especial = $conecta->query("SELECT caminho_img, especial_id_especial FROM imagem
    where especial_id_especial != 0");
// Consulta SELECT -> BD.imagem -> para IMAGENS da ONA
    $consulta_img_ona = $conecta->query("SELECT caminho_img, ona_id_ona FROM imagem
    where ona_id_ona != 0");
// Consulta SELECT -> BD.imagem -> para IMAGENS do FILME
    $consulta_img_filme = $conecta->query("SELECT caminho_img, filme_id_filme FROM imagem
    where filme_id_filme != 0");
// Consulta SELECT FROM imagem JOIN serie -> para todas as imagens do ID SERIE atual
$consulta_img_serie = $conecta->query("SELECT * FROM imagem");
// Consulta SELECT -> BD.imagem -> para TODAS as IMAGENS da tabela SERIE
$consulta_img2_serie = $conecta->query("SELECT caminho_img, serie_id_serie FROM imagem
where serie_id_serie != 0");
// Consulta SELECT -> BD.serie -> TODOS os dados de TODAS as SÉRIEs deste anime
$consulta_serie = $conecta->query("SELECT * FROM serie where serie_id_anime='$id_anime'");
// Consulta SELECT -> BD.ova -> TODOS os dados de TODAS as OVAs deste anime
$consulta_ova = $conecta->query("SELECT * FROM ova where ova_id_anime='$id_anime'");
// Consulta SELECT -> BD.especial -> TODOS os dados de TODOS os ESPECIAIS deste anime
$consulta_especial = $conecta->query("SELECT * FROM especial where especial_id_anime='$id_anime'");
// Consulta SELECT -> BD.ona -> TODOS os dados de TODOS as ONAS deste anime
$consulta_ona = $conecta->query("SELECT * FROM ona where ona_id_anime='$id_anime'");
// Consulta SELECT -> BD.filme -> TODOS os dados de TODOS os FILMEs deste anime		
$consulta_filme = $conecta->query("SELECT * FROM filme where filme_id_anime='$id_anime'");
		
	} else {
		header('location:index.php');
} ?>
<!doctype html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="keywords" content="animação, anime, animação 3d, filmes anime, ecchi, desenhos animados">
<title>Detalhes do ANIME</title>
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
<?php
	include_once 'navbar_top.php';
?>
<!-- HEADER classe CONTAINER - NOME COMPLETO + IMG_MINI + GENEROS do anime  -->
<header id="id_para_topo" class="container justify-content-center text-center fundo_black_40">
	<div class="row text-center">
        <!-- Bloco FIELDSET NOME e NOME COMPLETO -->
        <div class="col-xxl-5">
	        <fieldset class="">	 
		        <legend><h1 class=""><?php echo $exib_anime['nome_anime'];?></h1></legend>
		        <p><?php echo nl2br($exib_anime['nome_completo_anime']); ?></p>
	        </fieldset>
        </div>
        <!-- IMAGENS do ANIME (img_mini) -->
        <div class="col-xxl-2 text-center">
            <img class="div_img_thumb" src="imgs/anime/<?php echo $exib_anime['img_mini'];?>">
		</div>
        <!-- Bloco FIELDSET GENERO -->
        <div class="col-xxl-5">
            <fieldset class="">
	        <legend><h4>Gêneros e Temas do Anime:</h4></legend>
	            <p><?php while($exib_genero = $consulta_genero->fetch(PDO::FETCH_ASSOC)) { ?>  <span>  <?php echo $exib_genero['genero'];?>  <?php } ?>  </span>  </p> 
            </fieldset>
        </div>
    </div>
</header>
<!-- MAIN -> DIV classe CONTAINER-FLUID ---------------->
<main class="container fundo_black_60">
<div class="row text-center">
<!-- Bloco do container colxxl-10 ---------- -->
	<div class="col-xxl-10 container">
		<div class="row">
		<!-- Bloco DIV Descrição do ANIME ---collapse--------collapse-->
			<div class="col-xxl-12 text-start">
	  			<button class="btn btn-sm btn-outline-primary" data-bs-toggle="collapse" data-bs-target="#demo">Descrição: <?php echo $exib_anime['nome_anime'];?></button> Click no Botão para vizualizar a Descrição!
				<p id="demo" class="collapse fundo_black_80"><?php echo nl2br($exib_anime['descricao_anime']); ?></p>
    		</div>
			<!-- Bloco para exibição dos detalhes da SÉRIE deste ANIME -->
			<?php while($exib_serie = $consulta_serie->fetch(PDO::FETCH_ASSOC)) {  ?>
			<?php if ($exib_serie['titulo_serie']!="") { ?>
   			 <div class="col-md-6 fundo_black_40">
    			<h4 class="tex-center">SÉRIE: <?php echo nl2br($exib_serie['titulo_serie']); ?></h4>
			<!-- Bloco IMAGENS MINI da SÉRIE  -->
			<div class="row">
        		<div class="col-md-5">
            		<img class="div_img_thumb" style="max-height:300px" src="imgs/serie/<?php echo $exib_serie['img_mini'];?>">
        		</div>
        		<div class="col-md-7 fundo_black_80">
        			<?php if ($exib_serie['s_titulo_serie']!="") { ?>
           			<div class="">
				    	<p>Sinônimos ou Subtitulos:<?php echo nl2br($exib_serie['s_titulo_serie']); ?></p>
                	</div><?php } ?><hr>
                	<?php if ($exib_serie['n_episodio_serie']!="") { ?>
                	<div class="">
				    	<p>Numero de Episódios:<br><?php echo nl2br($exib_serie['n_episodio_serie']); ?></p>
                	</div><?php } ?><hr>
                	<?php if ($exib_serie['duracao_serie']!="") { ?>
                	<div class="">
				    	<p>Tempo de Duração dos Episódios:  <?php echo nl2br($exib_serie['duracao_serie']); ?></p>
                	</div><?php } ?><hr>
                	<?php if ($exib_serie['exib_inicio']!="") { ?>
                	<div class="">
				    	<p>Data de lançamento:<br><?php echo nl2br($exib_serie['exib_inicio']); ?></p>
                	</div><?php } ?><hr>
                	<?php if ($exib_serie['exib_fim']!="") { ?>
                	<div class="">
				    	<p>Data do Ultimo Episódio:<br><?php echo nl2br($exib_serie['exib_fim']); ?></p>
                	</div> <?php } ?>
        		</div>
			</div>
			<div class="row">
        		<?php if ($exib_serie['enredo_serie']!="") { ?>
            	<div class="col-md-12 p-2">
					<button class="btn btn-sm btn-outline-primary" data-bs-toggle="collapse" data-bs-target="#serie<?php echo $exib_serie['id_serie']; ?>">Enredo:</button> Click no Botão para vizualizar o Enredo!
				    	<p id="serie<?php echo $exib_serie['id_serie']; ?>" class="collapse text-start"><?php echo nl2br($exib_serie['enredo_serie']); ?></p>
            	</div><?php } ?>
			</div>
    		</div>
			<?php } ?>
			<?php } ?>
			<!-- Bloco de detalhes dos FILMEs ANIME -->
			<?php while($exib_filme = $consulta_filme->fetch(PDO::FETCH_ASSOC)) {  ?>
			<?php if ($exib_filme['titulo_filme']!="") { ?>
    		<div class="col-md-6 fundo_black_40">
    			<h4 class="tex-center">filme: <?php echo nl2br($exib_filme['titulo_filme']); ?></h4>
			<!-- Bloco IMAGENS MINI do FILME  -->
			<div class="row">
        		<div class="col-md-5">
            		<img class="div_img_thumb" style="max-height:300px" src="imgs/filme/<?php echo $exib_filme['img_mini'];?>">
        		</div>
        		<div class="col-md-7 fundo_black_80">
        			<?php if ($exib_filme['s_titulo_filme']!="") { ?>
           			<div class="">
				    	<p>Sinônimos ou Subtitulos:<?php echo nl2br($exib_filme['s_titulo_filme']); ?></p>
                	</div><?php } ?><hr>
                	<?php if ($exib_filme['duracao_filme']!="") { ?>
                	<div class="">
				    	<p>Tempo de Duração dos Episódios:  <?php echo nl2br($exib_filme['duracao_filme']); ?></p>
                	</div><?php } ?><hr>
                	<?php if ($exib_filme['exibido']!="") { ?>
                	<div class="">
				    	<p>Data de lançamento:<br><?php echo nl2br($exib_filme['exibido']); ?></p>
                	</div><?php } ?>
        		</div>
			</div>
			<div class="row">
        		<?php if ($exib_filme['enredo_filme']!="") { ?>
            	<div class="col-md-12">
				<button class="btn btn-sm btn-outline-primary" data-bs-toggle="collapse" data-bs-target="#filme<?php echo $exib_filme['id_filme'];?>">Enredo:</button> Click no Botão para vizualizar o Enredo!
				    <p id="filme<?php echo $exib_filme['id_filme'];?>" class="collapse text-start"><?php echo nl2br($exib_filme['enredo_filme']); ?></p>
            	</div><?php } ?>
			</div>
    		</div>
			<?php } ?>
			<?php } ?>	
			<!-- Bloco de detalhes das OVAs do ANIME -->
			<?php while($exib_ova = $consulta_ova->fetch(PDO::FETCH_ASSOC)) {  ?>
			<?php if ($exib_ova['titulo_ova']!="") { ?>
    		<div class="col-md-6 fundo_black_40">
    			<h4 class="tex-center">OVA: <?php echo nl2br($exib_ova['titulo_ova']); ?></h4>
			<!-- Bloco IMAGENS MINI da OVA  -->
			<div class="row">
        		<div class="col-md-5">
           	 		<img class="div_img_thumb" style="max-height:300px" src="imgs/ova/<?php echo $exib_ova['img_mini'];?>">
        		</div>
        		<div class="col-md-7 fundo_black_80">
        			<?php if ($exib_ova['s_titulo_ova']!="") { ?>
           			<div class="">
				    	<p>Sinônimos ou Subtitulos:<?php echo nl2br($exib_ova['s_titulo_ova']); ?></p>
                	</div><?php } ?><hr>
                	<?php if ($exib_ova['n_episodio_ova']!="") { ?>
                	<div class="">
				    	<p>Numero de Episódios:<br><?php echo nl2br($exib_ova['n_episodio_ova']); ?></p>
                	</div><?php } ?><hr>
                	<?php if ($exib_ova['duracao_ova']!="") { ?>
                	<div class="">
				    	<p>Tempo de Duração dos Episódios:  <?php echo nl2br($exib_ova['duracao_ova']); ?></p>
                	</div><?php } ?><hr>
                	<?php if ($exib_ova['exib_inicio']!="") { ?>
                	<div class="">
				    	<p>Data de lançamento:<br><?php echo nl2br($exib_ova['exib_inicio']); ?></p>
                	</div><?php } ?><hr>
                	<?php if ($exib_ova['exib_fim']!="") { ?>
                	<div class="">
				    	<p>Data do Ultimo Episódio:<br><?php echo nl2br($exib_ova['exib_fim']); ?></p>
                	</div> <?php } ?>
        		</div>
			</div>
			<div class="row">
        	<?php if ($exib_ova['enredo_ova']!="") { ?>
            	<div class="col-md-12">
					<button class="btn btn-primary" data-bs-toggle="collapse" data-bs-target="#ova<?php echo $exib_ova['id_ova']; ?>">Enredo:</button> Click no Botão para vizualizar o Enredo!
				    	<p id="ova<?php echo $exib_ova['id_ova']; ?>" class="collapse text-start"><?php echo nl2br($exib_ova['enredo_ova']); ?></p>
            	</div><?php } ?>
			</div>
    		</div>
			<?php } ?>
			<?php } ?>
			<!-- Bloco de detalhes das ESPECIAL do ANIME -->
			<?php while($exib_especial = $consulta_especial->fetch(PDO::FETCH_ASSOC)) {  ?>
			<?php if ($exib_especial['titulo_especial']!="") { ?>
    		<div class="col-md-6 fundo_black_40">
   	 			<h4 class="tex-center">Especial: <?php echo nl2br($exib_especial['titulo_especial']); ?></h4>
			<!-- Bloco IMAGENS MINI da ESPECIAL  -->
			<div class="row">
        		<div class="col-md-5">
            		<img class="div_img_thumb" style="max-height:300px" src="imgs/especial/<?php echo $exib_especial['img_mini'];?>">
        		</div>
        		<div class="col-md-7 fundo_black_80">
        			<?php if ($exib_especial['s_titulo_especial']!="") { ?>
           			<div class="">
				    	<p>Sinônimos ou Subtitulos:<?php echo nl2br($exib_especial['s_titulo_especial']); ?></p>
                	</div><?php } ?><hr>
               		<?php if ($exib_especial['n_episodio_especial']!="") { ?>
                	<div class="">
				    	<p>Numero de Episódios:<br><?php echo nl2br($exib_especial['n_episodio_especial']); ?></p>
                	</div><?php } ?><hr>
                	<?php if ($exib_especial['duracao_especial']!="") { ?>
                	<div class="">
				    	<p>Tempo de Duração dos Episódios:  <?php echo nl2br($exib_especial['duracao_especial']); ?></p>
                	</div><?php } ?><hr>
                	<?php if ($exib_especial['exib_inicio']!="") { ?>
                	<div class="">
				    	<p>Data de lançamento:<br><?php echo nl2br($exib_especial['exib_inicio']); ?></p>
                	</div><?php } ?><hr>
                	<?php if ($exib_especial['exib_fim']!="") { ?>
                	<div class="">
				    	<p>Data do Ultimo Episódio:<br><?php echo nl2br($exib_especial['exib_fim']); ?></p>
                	</div> <?php } ?>
        		</div>
			</div>
			<div class="row">
        	<?php if ($exib_especial['enredo_especial']!="") { ?>
            	<div class="col-md-12">
					<button class="btn btn-sm btn-outline-primary" data-bs-toggle="collapse" data-bs-target="#especial<?php echo $exib_especial['id_especial'];?>">Enredo:</button> Click no Botão para vizualizar o Enredo!
				    <p id="especial<?php echo $exib_especial['id_especial'];?>" class="collapse text-start"><?php echo nl2br($exib_especial['enredo_especial']); ?></p>
            	</div>
			<?php } ?>
			</div>
    		</div>
			<?php } ?>
			<?php } ?>
			<!-- Bloco de detalhes das ONAs do ANIME -->
			<?php while($exib_ona = $consulta_ona->fetch(PDO::FETCH_ASSOC)) {  ?>
			<?php if ($exib_ona['titulo_ona']!="") { ?>
    		<div class="col-md-6 fundo_black_40">
    			<h4 class="tex-center">ONA: <?php echo nl2br($exib_ona['titulo_ona']); ?></h4>
			<!-- Bloco IMAGENS MINI da ONA  -->
			<div class="row">
        		<div class="col-md-5">
            		<img class="div_img_thumb" style="max-height:300px" src="imgs/ona/<?php echo $exib_ona['img_mini'];?>">
        		</div>
        		<div class="col-md-7 fundo_black_80">
        			<?php if ($exib_ona['s_titulo_ona']!="") { ?>
           			<div class="">
				   	 	<p>Sinônimos ou Subtitulos:<?php echo nl2br($exib_ona['s_titulo_ona']); ?></p>
                	</div><?php } ?><hr>
                	<?php if ($exib_ona['n_episodio_ona']!="") { ?>
                	<div class="">
				    	<p>Numero de Episódios:<br><?php echo nl2br($exib_ona['n_episodio_ona']); ?></p>
               	 	</div><?php } ?><hr>
                	<?php if ($exib_ona['duracao_ona']!="") { ?>
                	<div class="">
				    	<p>Tempo de Duração dos Episódios:  <?php echo nl2br($exib_ona['duracao_ona']); ?></p>
                	</div><?php } ?><hr>
                	<?php if ($exib_ona['exib_inicio']!="") { ?>
                	<div class="">
				    	<p>Data de lançamento:<br><?php echo nl2br($exib_ona['exib_inicio']); ?></p>
                	</div><?php } ?><hr>
                	<?php if ($exib_ona['exib_fim']!="") { ?>
                	<div class="">
				    	<p>Data do Ultimo Episódio:<br><?php echo nl2br($exib_ona['exib_fim']); ?></p>
                	</div> <?php } ?>
        		</div>
			</div>
			<div class="row">
        	<?php if ($exib_ona['enredo_ona']!="") { ?>
            	<div class="col-md-12">
					<button class="btn btn-sm btn-outline-primary" data-bs-toggle="collapse" data-bs-target="#ona<?php echo $exib_ona['id_ona'];?>">Enredo:</button> Click no Botão para vizualizar o Enredo!
				    	<p id="ona<?php echo $exib_ona['id_ona'];?>" class="collapse text-start"><?php echo nl2br($exib_ona['enredo_ona']); ?></p>
           	 	</div><?php } ?>
			</div>
    		</div>
			<?php } ?>
			<?php } ?>
			<!-- Bloco FIELDSET PERSONAGENS PRINCIPAIS -->
    		<div class="col-md-6 text-start">
        	<?php if ($exib_anime['personagens']!="") { ?>
					<fieldset class="" id="fieldset">
						<legend>
						Persomagens do Anime:
						</legend>
				  		<p><?php echo nl2br($exib_anime['personagens']); ?></p>
					</fieldset>
        	<?php } ?>
    		</div>
			<!-- Bloco FIELDSET dados dos AUTORES------------------------------------>
    		<div class="col-md-6 text-start">   
        		<?php if ($exib_anime['estudio']!="") { ?>
            	<fieldset class="">
			    	<legend><h4>Dados dos AUTORES:</h4></legend>
                	<?php if ($exib_anime['direcao']!="") { ?>
                	<div class="">
				    	<p>Direção: <?php echo nl2br($exib_anime['direcao']); ?></p>
               		</div><?php } ?><hr>
               		<?php if ($exib_anime['producao']!="") { ?>
               	 	<div class="">
				    	<p>Produção: <?php echo nl2br($exib_anime['producao']); ?></p>
                	</div><?php } ?><hr>
                	<?php if ($exib_anime['roteiro']!="") { ?>
                	<div class="">
				    	<p>Roteiro: <?php echo nl2br($exib_anime['roteiro']); ?></p>
               	 	</div><?php } ?><hr>
                	<?php if ($exib_anime['musica']!="") { ?>
                	<div class="">
				    	<p>Musica: <?php echo nl2br($exib_anime['musica']); ?></p>
                	</div><?php } ?><hr>
                	<?php if ($exib_anime['estudio']!="") { ?>
                	<div class="">
				   	 	<p>Estúdio: <?php echo nl2br($exib_anime['estudio']); ?></p>
                	</div><?php } ?><hr>
                	<?php if ($exib_anime['licenciamento']!="") { ?>
                	<div class="">
				    	<p>Licenciado: <?php echo nl2br($exib_anime['licenciamento']); ?></p>
                	</div><?php } ?><hr>
                	<?php if ($exib_anime['original_network']!="") { ?>
                	<div class="">
				    	<p>Original Network: <?php echo nl2br($exib_anime['original_network']); ?></p>
                	</div> <?php } ?>
            	</fieldset>
    			<?php } ?>
    		</div>	
			<!-- Link para ALTERAÇÂO do anime em exibição LEGADO do site anterior: TESTE -->
			<a href="anime_alterar_form.php?id_anime=<?php echo $exib_anime['id_anime']; ?>">Alterar</a>
		<!--DIV de fechamento do bloco principal col-xxl-10	e ROW -->
		</div>
		</div>
	<!-- MAIN -> DIV -> SIDEBAR col-2 - CAMPO de selecionar por genero -->
<?php
	include_once('side_bar.php');
?>
</div>
</main>
<?php include 'rodape.php'; ?>
<!-- jQuery library -->
<script src="js/lightbox.js"></script>
</body>
</html>