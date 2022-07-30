<?php session_start();
ob_start();
		if (empty($_SESSION['adm']) || $_SESSION['adm']!=1) {
		header("location:index.php");
		}
		include 'conecta.php';	
	if (!empty($_GET['id_anime'])) {
	$id_anime = $_GET['id_anime'];
// Consulta LEFT JOIN + INNER JOIN -> anime_bd.anime + anime_bd.imagem + anime_bd.autor 
	$consulta_anime = $conecta->query("SELECT * FROM anime AS ani
    LEFT JOIN imagem AS img
    ON ani.id_anime = img.anime_id_anime
    INNER JOIN autor AS aut
    ON ani.autor_id_autor = aut.id_autor
    WHERE id_anime='$id_anime'");
	$exib_anime = $consulta_anime->fetch(PDO::FETCH_ASSOC);

	// Consulta INNER JOIN -> anime_bd.genero + anime_bd.anime -> para GENERO
    $consulta_genero = $conecta->query("SELECT * FROM anime_genero as anig
    inner join genero as g
    on anig.fk_id_genero = g.id_genero
    join anime a
    on a.id_anime = anig.fk_id_anime
    WHERE id_anime='$id_anime'");

// Consulta SELECT -> anime_bd.imagem -> para IMAGENS DA OVA
    $consulta_img_ova = $conecta->query("SELECT caminho_img, ova_id_ova FROM imagem
    where ova_id_ova != 0");
// Consulta SELECT -> anime_bd.imagem -> para IMAGENS do ESPECIAL
    $consulta_img_especial = $conecta->query("SELECT caminho_img, especial_id_especial FROM imagem
    where especial_id_especial != 0");
// Consulta SELECT -> anime_bd.imagem -> para IMAGENS da ONA
    $consulta_img_ona = $conecta->query("SELECT caminho_img, ona_id_ona FROM imagem
    where ona_id_ona != 0");
// Consulta SELECT -> anime_bd.imagem -> para IMAGENS do FILME
    $consulta_img_filme = $conecta->query("SELECT caminho_img, filme_id_filme FROM imagem
    where filme_id_filme != 0");
// Consulta SELECT FROM imagem JOIN serie -> para todas as imagens do ID SERIE atual
$consulta_img_serie = $conecta->query("SELECT * FROM imagem");
// Consulta SELECT -> anime_bd.imagem -> para TODAS as IMAGENS da tabela SERIE
$consulta_img2_serie = $conecta->query("SELECT caminho_img, serie_id_serie FROM imagem
where serie_id_serie != 0");

// Consulta SELECT -> anime_bd.serie -> JOIN tipo = TODOS os dados de TODAS as SÉRIEs deste anime
$consulta_serie = $conecta->query("SELECT * FROM serie AS ser
INNER JOIN tipo as tip
ON tip.id_tipo = ser.tipo_id_tipo
WHERE serie_id_anime='$id_anime'");
// Consulta SELECT -> anime_bd.ova ->  JOIN tipo = TODOS os dados de TODAS as OVAs deste anime
$consulta_ova = $conecta->query("SELECT * FROM ova AS ov
INNER JOIN tipo as tip
ON tip.id_tipo = ov.tipo_id_tipo
WHERE ova_id_anime='$id_anime'");
// Consulta SELECT -> anime_bd.especial ->  JOIN tipo = TODOS os dados de TODOS os ESPECIAIS deste anime
$consulta_especial = $conecta->query("SELECT * FROM especial AS esp
INNER JOIN tipo as tip
ON tip.id_tipo = esp.tipo_id_tipo
WHERE especial_id_anime='$id_anime'");
// Consulta SELECT -> anime_bd.ona ->  JOIN tipo TODOS os dados de TODOS as ONAS deste anime
$consulta_ona = $conecta->query("SELECT * FROM ona AS ona
INNER JOIN tipo as tip
ON tip.id_tipo = ona.tipo_id_tipo
where ona_id_anime='$id_anime'");
// Consulta SELECT -> anime_bd.filme ->  JOIN tipo  TODOS os dados de TODOS os FILMEs deste anime		
$consulta_filme = $conecta->query("SELECT * FROM filme AS fil 
INNER JOIN tipo as tip
ON tip.id_tipo = fil.tipo_id_tipo
where filme_id_anime='$id_anime'");
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
	<title>ALTERAR OU EXCLUIR O ANIME!!!</title>
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
			<div class="row">
				<!-- Bloco para ALTERAR os dados dos AUTORES ---------------------AUTORES---------------AUTORES------->	
				<div class="col-md-6 border border-primary">
					<h2>Alterar os Dados dos Autores</h2>
					<form name="form_alterar_autor" class="form-control" action="alterar_autor.php" method="post" onsubmit="return validaCampos()" accept-charset="UTF-8" enctype="multipart/form-data">
						<label>Nome do Diretor(s):</label>
							<input type="text" name="input_diretor" value="<?php echo nl2br($exib_anime['direcao']); ?>" class="form-control form-control-sm" size="100" placeholder="Nome do Diretor" autofocus maxlength="100">
						<hr><label for="input_producao">Produção:</label><br>
							<textarea rows="2" name="input_producao" class="form-control" placeholder="Produção"><?php echo nl2br($exib_anime['producao']); ?></textarea>
						<hr><label>Roteiro:</label>
							<input type="text" name="input_roteiro" value="<?php echo nl2br($exib_anime['roteiro']); ?>" class="form-control" size="100" placeholder="Escrito por">
						<hr><label>Musica:</label>
							<input type="text" name="input_musica" value="<?php echo nl2br($exib_anime['musica']); ?>" class="form-control" size="100" placeholder="Musicas">
						<hr><label>Estúdio:</label>
							<input type="text" name="input_estudio" value="<?php echo nl2br($exib_anime['estudio']); ?>" class="form-control" size="100" placeholder="Estúdios" required>
						<hr><label>Licenciado por:</label>
							<input type="text" name="input_licenciado" value="<?php echo nl2br($exib_anime['licenciamento']); ?>" class="form-control" size="100" placeholder="Licenciado por">
						<hr><label>Original Network:</label>
							<input type="text" name="input_original_network" value="<?php echo nl2br($exib_anime['original_network']); ?>" class="form-control" size="100" placeholder="Original Network">
						<hr><label>ID do autor(so para vizualizar):</label>
							<input type="text" name="input_id_autor" value="<?php echo nl2br($exib_anime['id_autor']); ?>" class="form-control" readonly size="50" placeholder="ID Autor">
						<div class="col-sm-6">
							<button type="submit" class="btn btn-primary">Alterar AUTOR!</button>
						</div>
					</form>
				<a href="excluir_autor.php?id_autor=<?php echo $exib_anime['id_autor']; ?>"><button type="submit" class="btn btn-danger"> Excluir </button></a>
				</div>
			<!--Bloco DIV-col-sm-6 para exibir os dados do anime a ser BLOCO ANIME	BLOCO ANIME-----BLOCO ANIME-----BLOCO ANIME------------------->
				<div class="col-md-6 border border-primary">
					<h2>Alterar os dados do ANIME</h2>
					<form name="form_alterar_anime" class="form-control" action="alterar_anime.php?id_anime=<?php echo $exib_anime['id_anime']; ?>" method="post" onsubmit="return validaCampoNome()" accept-charset="UTF-8" enctype="multipart/form-data">
					<div class="row">
						<div class="col-sm-4 text-center border div_img_thumb">
							<img class="div_img_thumb" style="max-width: 150px;" src="imgs/anime/<?php echo $exib_anime['img_mini'];?>">
							<label for="img_mini_anime">Selecione Img_MINI!</label>
							<input type="file" name="img_mini_anime" accept="imgs/anime/*" class="form-control">
						</div>
						<div class="col-sm-8">
							<label for="input_nome">Nome ATUAL do anime:</label>
							<input type="text" name="input_nome" value="<?php echo $exib_anime['nome_anime'];?>" class="form-control" required maxlength="100">
							<hr><label for="input_nome_completo">Nome completo e Sinônimos(Inglês, Hepburn, Japonês):</label><br>
							<textarea rows="3" name="input_nome_completo" class="form-control"><?php echo nl2br($exib_anime['nome_completo_anime']); ?></textarea>
						</div>
						<div class="col-sm-11">
							<hr><label for="descricao">Descrição do Anime:</label><br>
							<textarea rows="3" name="descricao" class="form-control" placeholder="Descrição do Anime"><?php echo nl2br($exib_anime['descricao_anime']); ?></textarea>
							<hr><label for="personagens">Personagens Principais do Anime:</label><br>
							<textarea rows="2" name="personagens" class="form-control" require><?php echo nl2br($exib_anime['personagens']); ?></textarea>
							<hr><label>ID do Anime(so para vizualizar):</label>
							<input type="text" name="input_id_anime" value="<?php echo nl2br($exib_anime['id_anime']); ?>" class="form-control" readonly size="100">
						</div>
						<div class="col-sm-6">
								<button type="submit" class="btn btn-primary">Alterar ANIME!</button>
						</div>
					</div>
					</form>
					<a href="excluir_anime.php?id_anime=<?php echo $exib_anime['id_anime']; ?>">
						<button type="submit" class="btn btn-danger"> Excluir </button></a>
				</div>
			<!-- Bloco para alterar os dados da SERIE do anime ---------------SERIE--------------------SERIE----------------------------->
			<?php while($exib_serie = $consulta_serie->fetch(PDO::FETCH_ASSOC)) {  ?>
				<div class="col-md-6 border border-primary">
					<h2>Alterar os dados da SERIE do anime</h2>
					<form name="form_alterar_serie" class="form-control" action="alterar_serie.php?id_serie=<?php echo $exib_serie['id_serie']; ?>" method="post" accept-charset="UTF-8" enctype="multipart/form-data">
					<div class="row">
						<div class="col-sm-4 text-center border div_img_thumb">
							<img class="div_img_thumb" style="max-width: 150px;" src="imgs/serie/<?php echo $exib_serie['img_mini'];?>">
							<label for="img_mini_serie">Selecione Img_MINI!</label>
							<input type="file" name="img_mini_serie" accept="imgs/serie/*" placeholder="Img_Mini" class="form-control">
						</div>
						<hr><label>Titulo da Série:</label>
							<input type="text" name="titulo_serie" class="form-control" value="<?php echo nl2br($exib_serie['titulo_serie']);?>" placeholder="Titulo da Série">
						<hr><label for="subtitulo_serie">Subtitulos e Sinônimos da Série:</label><br>
							<textarea rows="2" name="subtitulo_serie" class="form-control" placeholder="Subtitulo e Sinônimos"><?php echo nl2br($exib_serie['s_titulo_serie']); ?></textarea>
						<hr><label>Numero de Episódios da Série(somente numeros):</label>
							<input type="text" name="n_episodios" class="form-control" value="<?php echo nl2br($exib_serie['n_episodio_serie']);?>" placeholder="Numero de Episódios da Série">
						<hr><label>Tempo de Duração de CADA Episódio(00h:00m:00s):</label>
							<input type="text" name="duracao_serie" class="form-control" value="<?php echo nl2br($exib_serie['duracao_serie']); ?>" placeholder="Tempo de Duração de CADA Episódio">
						<hr><label>Data do início da Exibição(0000ano-00mês-00dia):</label>
							<input type="text" name="exib_inicio_serie" class="form-control" value="<?php echo nl2br($exib_serie['exib_inicio']); ?>" placeholder="Licenciado por">
						<hr><label>Data do fim da Exibição(0000ano-00mês-00dia):</label>
							<input type="text" name="exib_fim_serie" class="form-control" value="<?php echo nl2br($exib_serie['exib_fim']); ?>" placeholder="Data do fim da Exibição">
					</div>
					<div class="row">
							<div class="col-md-12 border">
						<hr><label>Descrição e ENREDO:</label>
							<textarea rows="4" name="descricao_serie" class="form-control"><?php echo nl2br($exib_serie['enredo_serie']); ?></textarea>
							</div>
					</div>
					<div class="row">
						<div class="col-md-6 border">
							<label for="tipo_serie">Selecione o Tipo da Série:</label><br>
							<input type="radio" name="tipo_serie" value="<?php echo nl2br($exib_serie['tipo_id_tipo']); ?>" checked>Atual: <?php echo nl2br($exib_serie['tipo']); ?><br>
							<input type="radio" name="tipo_serie" value="1">Anime<br>
							<input type="radio" name="tipo_serie" value="2">Animação<br>
							<input type="radio" name="tipo_serie" value="3">Animação (CGI)<br>
							<input type="radio" name="tipo_serie" value="4">Animação (Stop_Motion)<br>
							<input type="radio" name="tipo_serie" value="5">Live Action<br>
						</div>
					</div>
					<button type="submit" class="btn btn-primary">Enviar os Dados SÉRIE!</button>
					</form>
				</div>
			<?php } ?>
				<!-- Bloco para alterar os dados da OVA do anime -----------OVA---------------OVA-->
			<?php while($exib_ova = $consulta_ova->fetch(PDO::FETCH_ASSOC)) {  ?>
				<div class="col-md-6 border border-primary">
					<h2>Alterar os dados da ova do anime</h2>
					<form name="form_alterar_ova" class="form-control" action="alterar_ova.php?id_ova=<?php echo $exib_ova['id_ova']; ?>" method="post" accept-charset="UTF-8" enctype="multipart/form-data">
					<div class="row">
						<div class="col-sm-4 text-center border div_img_thumb">
							<img class="div_img_thumb" style="max-width: 150px;" src="imgs/ova/<?php echo $exib_ova['img_mini'];?>">
							<label for="img_mini_ova">Selecione Img_MINI!</label>
							<input type="file" name="img_mini_ova" accept="imgs/ova/*" placeholder="Img_Mini" class="form-control">
						</div>
						<hr><label>Titulo da Série:</label>
							<input type="text" name="titulo_ova" class="form-control" value="<?php echo nl2br($exib_ova['titulo_ova']);?>" placeholder="Titulo da Série">
						<hr><label for="subtitulo_ova">Subtitulos e Sinônimos da Série:</label><br>
							<textarea rows="2" name="subtitulo_ova" class="form-control" placeholder="Subtitulo e Sinônimos"><?php echo nl2br($exib_ova['s_titulo_ova']); ?></textarea>
						<hr><label>Numero de Episódios da Série(somente numeros):</label>
							<input type="text" name="n_episodios" class="form-control" value="<?php echo nl2br($exib_ova['n_episodio_ova']);?>" placeholder="Numero de Episódios da Série">
						<hr><label>Tempo de Duração de CADA Episódio(00h:00m:00s):</label>
							<input type="text" name="duracao_ova" class="form-control" value="<?php echo nl2br($exib_ova['duracao_ova']); ?>" placeholder="Tempo de Duração de CADA Episódio">
						<hr><label>Data do início da Exibição(0000ano-00mês-00dia):</label>
							<input type="text" name="exib_inicio_ova" class="form-control" value="<?php echo nl2br($exib_ova['exib_inicio']); ?>" placeholder="Licenciado por">
						<hr><label>Data do fim da Exibição(0000ano-00mês-00dia):</label>
							<input type="text" name="exib_fim_ova" class="form-control" value="<?php echo nl2br($exib_ova['exib_fim']); ?>" placeholder="Data do fim da Exibição">
					</div>
					<div class="row">
						<div class="col-md-12 border">
							<hr><label>Descrição e ENREDO:</label>
							<textarea rows="4" name="descricao_ova" class="form-control"><?php echo nl2br($exib_ova['enredo_ova']); ?></textarea>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6 border">
							<label for="tipo_ova">Selecione o Tipo da OVA:</label><br>
							<input type="radio" name="tipo_ova" value="<?php echo nl2br($exib_ova['tipo_id_tipo']); ?>" checked>Atual: <?php echo nl2br($exib_ova['tipo']); ?><br>
							<input type="radio" name="tipo_ova" value="1">Anime<br>
							<input type="radio" name="tipo_ova" value="2">Animação<br>
							<input type="radio" name="tipo_ova" value="3">Animação (CGI)<br>
							<input type="radio" name="tipo_ova" value="4">Animação (Stop_Motion)<br>
							<input type="radio" name="tipo_ova" value="5">Live Action<br>
						</div>
					</div>
					<button type="submit" class="btn btn-primary">ALTERAR os Dados!</button>
					</form>
				</div>
			<?php } ?>
			<!-- Bloco de detalhes das ESPECIAL do ANIME --------------ESPECIAL------------------------>
			<?php while($exib_especial = $consulta_especial->fetch(PDO::FETCH_ASSOC)) {  ?>
				<div class="col-md-6 border border-primary">
					<h2>Alterar os dados da especial do anime</h2>
					<form name="form_alterar_especial" class="form-control" action="alterar_especial.php?id_especial=<?php echo $exib_especial['id_especial']; ?>" method="post" accept-charset="UTF-8" enctype="multipart/form-data">
					<div class="row">
						<div class="col-sm-4 text-center border div_img_thumb">
							<img class="div_img_thumb" style="max-width: 150px;" src="imgs/especial/<?php echo $exib_especial['img_mini'];?>">
							<label for="img_mini_especial">Selecione Img_MINI!</label>
							<input type="file" name="img_mini_especial" accept="imgs/especial/*" placeholder="Img_Mini" class="form-control">
						</div>
						<hr><label>Titulo da Série:</label>
							<input type="text" name="titulo_especial" class="form-control" value="<?php echo nl2br($exib_especial['titulo_especial']);?>" placeholder="Titulo da Série">
						<hr><label for="subtitulo_especial">Subtitulos e Sinônimos da Série:</label><br>
							<textarea rows="2" name="subtitulo_especial" class="form-control" placeholder="Subtitulo e Sinônimos"><?php echo nl2br($exib_especial['s_titulo_especial']); ?></textarea>
						<hr><label>Numero de Episódios da Série(somente numeros):</label>
							<input type="text" name="n_episodios" class="form-control" value="<?php echo nl2br($exib_especial['n_episodio_especial']);?>" placeholder="Numero de Episódios da Série">
						<hr><label>Tempo de Duração de CADA Episódio(00h:00m:00s):</label>
							<input type="text" name="duracao_especial" class="form-control" value="<?php echo nl2br($exib_especial['duracao_especial']); ?>" placeholder="Tempo de Duração de CADA Episódio">
						<hr><label>Data do início da Exibição(0000ano-00mês-00dia):</label>
							<input type="text" name="exib_inicio_especial" class="form-control" value="<?php echo nl2br($exib_especial['exib_inicio']); ?>" placeholder="Licenciado por">
						<hr><label>Data do fim da Exibição(0000ano-00mês-00dia):</label>
							<input type="text" name="exib_fim_especial" class="form-control" value="<?php echo nl2br($exib_especial['exib_fim']); ?>" placeholder="Data do fim da Exibição">
					</div>
					<div class="row">
						<div class="col-md-12 border">
							<hr><label>Descrição e ENREDO:</label>
							<textarea rows="4" name="descricao_especial" class="form-control"><?php echo nl2br($exib_especial['enredo_especial']); ?></textarea>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6 border">
							<label for="tipo_especial">Selecione o Tipo da especial:</label><br>
							<input type="radio" name="tipo_especial" value="<?php echo nl2br($exib_especial['tipo_id_tipo']); ?>" checked>Atual: <?php echo nl2br($exib_especial['tipo']); ?><br>
							<input type="radio" name="tipo_especial" value="1">Anime<br>
							<input type="radio" name="tipo_especial" value="2">Animação<br>
							<input type="radio" name="tipo_especial" value="3">Animação (CGI)<br>
							<input type="radio" name="tipo_especial" value="4">Animação (Stop_Motion)<br>
							<input type="radio" name="tipo_especial" value="5">Live Action<br>
						</div>
					</div>
					<button type="submit" class="btn btn-primary">ALTERAR os Dados!</button>
					</form>
				</div>
			<?php } ?>
			<!-- Bloco de detalhes das ONAs do ANIME ------------ONA ------------------ONA -------------------ONA---------------->
			<?php while($exib_ona = $consulta_ona->fetch(PDO::FETCH_ASSOC)) {  ?>
				<div class="col-md-6 border border-primary">
					<h2>Alterar os dados da ona do anime</h2>
					<form name="form_alterar_ona" class="form-control" action="alterar_ona.php?id_ona=<?php echo $exib_ona['id_ona']; ?>" method="post" accept-charset="UTF-8" enctype="multipart/form-data">
					<div class="row">
						<div class="col-sm-4 text-center border div_img_thumb">
							<img class="div_img_thumb" style="max-width: 150px;" src="imgs/ona/<?php echo $exib_ona['img_mini'];?>">
							<label for="img_mini_ona">Selecione Img_MINI!</label>
							<input type="file" name="img_mini_ona" accept="imgs/ona/*" placeholder="Img_Mini" class="form-control">
						</div>
						<hr><label>Titulo da Série:</label>
							<input type="text" name="titulo_ona" class="form-control" value="<?php echo nl2br($exib_ona['titulo_ona']);?>" placeholder="Titulo da Série">
						<hr><label for="subtitulo_ona">Subtitulos e Sinônimos da Série:</label><br>
							<textarea rows="2" name="subtitulo_ona" class="form-control" placeholder="Subtitulo e Sinônimos"><?php echo nl2br($exib_ona['s_titulo_ona']); ?></textarea>
						<hr><label>Numero de Episódios da Série(somente numeros):</label>
							<input type="text" name="n_episodios" class="form-control" value="<?php echo nl2br($exib_ona['n_episodio_ona']);?>" placeholder="Numero de Episódios da Série">
						<hr><label>Tempo de Duração de CADA Episódio(00h:00m:00s):</label>
							<input type="text" name="duracao_ona" class="form-control" value="<?php echo nl2br($exib_ona['duracao_ona']); ?>" placeholder="Tempo de Duração de CADA Episódio">
						<hr><label>Data do início da Exibição(0000ano-00mês-00dia):</label>
							<input type="text" name="exib_inicio_ona" class="form-control" value="<?php echo nl2br($exib_ona['exib_inicio']); ?>" placeholder="Licenciado por">
						<hr><label>Data do fim da Exibição(0000ano-00mês-00dia):</label>
							<input type="text" name="exib_fim_ona" class="form-control" value="<?php echo nl2br($exib_ona['exib_fim']); ?>" placeholder="Data do fim da Exibição">
					</div>
					<div class="row">
						<div class="col-md-12 border">
							<hr><label>Descrição e ENREDO:</label>
							<textarea rows="4" name="descricao_ona" class="form-control"><?php echo nl2br($exib_ona['enredo_ona']); ?></textarea>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6 border">
							<label for="tipo_ona">Selecione o Tipo da ona:</label><br>
							<input type="radio" name="tipo_ona" value="<?php echo nl2br($exib_ona['tipo_id_tipo']); ?>" checked>Atual: <?php echo nl2br($exib_ona['tipo']); ?><br>
							<input type="radio" name="tipo_ona" value="1">Anime<br>
							<input type="radio" name="tipo_ona" value="2">Animação<br>
							<input type="radio" name="tipo_ona" value="3">Animação (CGI)<br>
							<input type="radio" name="tipo_ona" value="4">Animação (Stop_Motion)<br>
							<input type="radio" name="tipo_ona" value="5">Live Action<br>
						</div>
					</div>
					<button type="submit" class="btn btn-primary">ALTERAR os Dados!</button>
					</form>
				</div>
			<?php } ?>
			<!-- Bloco de detalhes dos FILMEs ANIME-----------------FILMEs ANIME--------------------FILMEs ANIME-------------- -->
			<?php while($exib_filme = $consulta_filme->fetch(PDO::FETCH_ASSOC)) {  ?>
				<div class="col-md-6 border border-primary">
					<h2>Alterar os dados da filme do anime</h2>
					<form name="form_alterar_filme" class="form-control" action="alterar_filme.php?id_filme=<?php echo $exib_filme['id_filme']; ?>" method="post" accept-charset="UTF-8" enctype="multipart/form-data">
					<div class="row">
						<div class="col-sm-4 text-center border div_img_thumb">
							<img class="div_img_thumb" style="max-width: 150px;" src="imgs/filme/<?php echo $exib_filme['img_mini'];?>">
							<label for="img_mini_filme">Selecione Img_MINI!</label>
							<input type="file" name="img_mini_filme" accept="imgs/filme/*" placeholder="Img_Mini" class="form-control">
						</div>
						<hr><label>Titulo da Série:</label>
							<input type="text" name="titulo_filme" class="form-control" value="<?php echo nl2br($exib_filme['titulo_filme']);?>" placeholder="Titulo da Série">
						<hr><label for="subtitulo_filme">Subtitulos e Sinônimos da Série:</label><br>
							<textarea rows="2" name="subtitulo_filme" class="form-control" placeholder="Subtitulo e Sinônimos"><?php echo nl2br($exib_filme['s_titulo_filme']); ?></textarea>
						<hr><label>Tempo de Duração do Filme (00h:00m:00s):</label>
							<input type="text" name="duracao_filme" class="form-control" value="<?php echo nl2br($exib_filme['duracao_filme']); ?>" placeholder="Tempo de Duração de CADA Episódio">
						<hr><label>Data da Exibição(0000ano-00mês-00dia):</label>
							<input type="text" name="exibido_filme" class="form-control" value="<?php echo nl2br($exib_filme['exibido']); ?>" placeholder="Licenciado por">
					</div>
					<div class="row">
						<div class="col-md-12 border">
							<hr><label>Descrição e ENREDO:</label>
							<textarea rows="4" name="enredo_filme" class="form-control"><?php echo nl2br($exib_filme['enredo_filme']); ?></textarea>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6 border">
							<label for="tipo_filme">Selecione o Tipo da filme:</label><br>
							<input type="radio" name="tipo_filme" value="<?php echo nl2br($exib_filme['tipo_id_tipo']); ?>" checked>Atual: <?php echo nl2br($exib_filme['tipo']); ?><br>
							<input type="radio" name="tipo_filme" value="1">Anime<br>
							<input type="radio" name="tipo_filme" value="2">Animação<br>
							<input type="radio" name="tipo_filme" value="3">Animação (CGI)<br>
							<input type="radio" name="tipo_filme" value="4">Animação (Stop_Motion)<br>
							<input type="radio" name="tipo_filme" value="5">Live Action<br>
						</div>
					</div>
					<button type="submit" class="btn btn-primary">ALTERAR os Dados!</button>
					</form>
				</div>
			<?php } ?>
			<!-- Bloco FIELDSET GENERO------------GENERO------------------GENERO------------ -->
					<div class="col-md-5 border">
						<fieldset class="">
						<legend><h4>Gêneros e Temas do Anime:</h4></legend>
							<p><?php while($exib_genero = $consulta_genero->fetch(PDO::FETCH_ASSOC)) { ?>,
								<?php echo $exib_genero['genero'];?> <?php } ?></p> 
						</fieldset>
					</div>
			<!-- Bloco para selecionar os GENEROS do anime em destaque de ALTERAÇÃO AINDA NÃO ESTA FUNCIONANDO... EM DESENVOLVIMENTO---------->
				<div class="col-sm-6 border border-primary">
						<h2>AINDA NÃO FUNCIONA!!!!!!!!</h2>
						<form name="alterar_genero" class="form-control" onsubmit="return validaFormGenero()" action="alterar_genero.php?id_anime=<?php echo $exib_anime['id_anime'];?>" method="post" accept-charset="UTF-8" enctype="multipart/form-data">
						<?php $exib_genero_anime = $consulta_genero->fetch(PDO::FETCH_ASSOC) ?>
						<hr><label for="genero_anime">MOSTRANDO os Genêros do Anime</label><br>
						<div class="col-5">
							<input type="checkbox" name="acao" value="1" checked><label for="acao">Ação</label>
							<input type="checkbox" name="animacao_3d" value="2">Animação 3D<br>
							<input type="checkbox" name="aventura" value="3">Aventura<br>
							<input type="checkbox" name="artes_marciais" value="4">Artes Marciais<br>
							<input type="checkbox" name="colegial" value="5">Colegial<br>
							<input type="checkbox" name="comedia" value="6">Comédia<br>
							<input type="checkbox" name="drama" value="7">Drama<br>
							<input type="checkbox" name="cyberpunk" value="8">CyberPunk<br>
							<input type="checkbox" name="fantasia" value="9">Fantasia<br>
							<input type="checkbox" name="ficcao" value="10">Ficção<br>
							<input type="checkbox" name="ficcao_cientifica" value="11">Ficção Científica<br>
							<input type="checkbox" name="harem" value="12">Harém<br>
						</div>
						<div class="col-5">
							<input type="checkbox" name="magia" value="13">Magia<br>
							<input type="checkbox" name="romance" value="14">Romance<br>
							<input type="checkbox" name="seinen" value="15">Seinen<br>
							<input type="checkbox" name="sobrevivencia" value="16">Sobrevivência<br>
							<input type="checkbox" name="super_heroi" value="17">Super Herói<br>
							<input type="checkbox" name="super_poderes" value="18">Super Poderes<br>
							<input type="checkbox" name="policial" value="19">Policial<br>
							<input type="checkbox" name="game" value="20">Game<br>
							<input type="checkbox" name="misterio" value="21">Mistério<br>
							<input type="checkbox" name="terror" value="22">Terror<br>
							<input type="checkbox" name="suspence" value="23">Suspence<br>
							<input type="checkbox" name="sobrenatural" value="24">Sobrenatural<br>
						</div>
						<button type="submit" class="btn btn-primary">Enviar os GENEROs do ANIME!</button>
						</form>
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