<?php session_start();
ob_start();
		if (empty($_SESSION['adm']) || $_SESSION['adm']!=1) {
		header('location:index.php');
	}
	include_once('conecta.php');
	$consulta = $conecta->query('SELECT * FROM autor ORDER BY id_autor DESC');
	$consulta1 = $conecta->query('SELECT * FROM anime  ORDER BY id_anime DESC');
	$consulta2 = $conecta->query('SELECT * FROM anime ORDER BY id_anime DESC');
	$consulta3 = $conecta->query('SELECT * FROM anime ORDER BY id_anime DESC');
	$consulta4 = $conecta->query('SELECT * FROM anime ORDER BY id_anime DESC');
	$consulta5 = $conecta->query('SELECT * FROM anime ORDER BY id_anime DESC');
	$consulta6 = $conecta->query('SELECT * FROM anime ORDER BY id_anime DESC');
	$consulta7 = $conecta->query('SELECT * FROM anime ORDER BY id_anime DESC');
	$consulta_serie = $conecta->query('SELECT * FROM serie ORDER BY id_serie DESC');
	$consulta_ova = $conecta->query('SELECT * FROM ova ORDER BY id_ova DESC');
	$consulta_especial = $conecta->query('SELECT * FROM especial ORDER BY id_especial DESC');
	$consulta_ona = $conecta->query('SELECT * FROM ona ORDER BY id_ona DESC');
	$consulta_filme = $conecta->query('SELECT * FROM filme ORDER BY id_filme DESC');
?>
<!doctype html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="keywords" content="animação, anime, animação 3d, filmes anime, ecchi, desenhos animados">
<title>Inserir Anime</title>
<!-- Imagen Favcon -->
<link rel="icon" sizes="128x128" href="imgs/favicon.ico">
<!-- inserção das FUNÇÕEs JS - CampoVazio  -->
<script type="text/javascript" src="js/functionCampoVazio.js"></script>
</head>
<body>
<?php 
	  include_once('navbar_top.php');
?>
<!-- HEADER classe CONTAINER - Banner da pagina -->
<header class="container mt-5">
	<div class="row text-center my-5">
		<div class="col-7">
		<h1 class="justify-content-center fundo_black_80 mt-5 pb-2 rounded-4">Página para inserção de Novos animes</h1>
		</div>
	</div>
</header>
<!-- BOTÕES PARA ABRIR OS MODALs DE INSERÇÃO -->
<div class="container fundo_black_80 buttons_inserir rounded-4">
	<div class="row"><div class="col-10">
		<div class="row my-4"><button type="button" class="btn btn-primary" data-bs-target="#modal_autor" data-bs-toggle="modal">
			Inserir Autor</button></div>
		<div class="row my-4"><button type="button" class="btn btn-primary" data-bs-target="#modal_anime" data-bs-toggle="modal">
			Inserir Anime</button></div>
		<div class="row my-4"><button type="button" class="btn btn-primary" data-bs-target="#modal_genero" data-bs-toggle="modal">
			Escolher Generos</button></div>
		<div class="row my-4"><button type="button" class="btn btn-primary" data-bs-target="#modal_filme" data-bs-toggle="modal">
			Inserir Filme</button></div>
		<div class="row my-4"><button type="button" class="btn btn-primary" data-bs-target="#modal_serie" data-bs-toggle="modal">
			Inserir Série</button></div>
		<div class="row my-4"><button type="button" class="btn btn-primary" data-bs-target="#modal_ova" data-bs-toggle="modal">
			Inserir OVA</button></div>
		<div class="row my-4"><button type="button" class="btn btn-primary" data-bs-target="#modal_especial" data-bs-toggle="modal">
			Inserir Especial</button></div>
		<div class="row my-4"><button type="button" class="btn btn-primary" data-bs-target="#modal_ona" data-bs-toggle="modal">
			Inserir ONA</button></div>
	</div></div>
</div>
<!-- BOTÕES PARA ABRIR OS MODALs DE INSERÇÃO DE IMGs -->
<div class="container fundo_black_80 buttons_inserir_imgs rounded-4">
	<div class="row"><div class="col-10">
		<div class="row my-4"><button type="button" class="btn btn-outline-primary" data-bs-target="#modal_img_anime" data-bs-toggle="modal">
			Inserir IMG Anime</button></div>
		<div class="row my-4"><button type="button" class="btn btn-outline-primary" data-bs-target="#modal_img_filme" data-bs-toggle="modal">
			Inserir IMG Filme</button></div>
		<div class="row my-4"><button type="button" class="btn btn-outline-primary" data-bs-target="#modal_img_serie" data-bs-toggle="modal">
			Inserir IMG Série</button></div>
		<div class="row my-4"><button type="button" class="btn btn-outline-primary" data-bs-target="#modal_img_ova" data-bs-toggle="modal">
			Inserir IMG OVA</button></div>
		<div class="row my-4"><button type="button" class="btn btn-outline-primary" data-bs-target="#modal_img_especial" data-bs-toggle="modal">
			Inserir IMG Especial</button></div>
		<div class="row my-4"><button type="button" class="btn btn-outline-primary" data-bs-target="#modal_img_ona" data-bs-toggle="modal">
			Inserir IMG ONA</button></div>
	</div></div>
</div>
<main class="container text-center">
<div class="row">
	<!-- AUTOR ------ MODAL para INSERIR OS DADOS DO AUTOR --------   AUTOR  -->
	<div class="modal fade fundo_black_40" id="modal_autor" tabindex="-1" aria-labelledby="modal_autorLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-lg">
			<div class="modal-content fundo_black_60">
				<div class="d-flex flex-row col-12">
					<h2 class="modal-title" id="modal_autorLabel">Inserir o Autor</h2>
					<button type="button" class="meu_btn px-2 py-0 me-2 mt-2" data-bs-dismiss="modal" aria-label="Close"><span class="bt_fechar">X</span></button>
				</div>
				<div class="modal-body">
					<div class="container">
						<div class="row justify-content-center">
							<div class="col-lg-12 col-xl-12 col-xxl-12 fundo_black_20">
							<form name="form_inserir_autor" class="form-control fundo_dark" action="inserir_autor.php" method="post" onsubmit="return validaCampos()" accept-charset="UTF-8" enctype="multipart/form-data">
								<div class="row">	
									<div class="col-xxl-12 my-2">
										<label>Nome do Diretor(s):</label>
										<input type="text" name="input_diretor" class="form-control" size="100" placeholder="Nome do Diretor" autofocus maxlength="100">
									</div>
									<div class="col-xxl-12 my-2">
										<label for="input_producao">Produção:</label>
										<textarea rows="2" name="input_producao" class="form-control" placeholder="Produção"></textarea>
									</div>
									<div class="col-xxl-6 my-2">
									<label>Roteiro:</label>
										<input type="text" name="input_roteiro" class="form-control" size="100" placeholder="Escrito por">
									</div>
									<div class="col-xxl-6 my-2">
									<label>Musica:</label>
										<input type="text" name="input_musica" class="form-control" size="100" placeholder="Musicas">
									</div>
									<div class="col-xxl-6 my-2">
										<label>Estúdio:</label>
										<input type="text" name="input_estudio" class="form-control" size="100" placeholder="Estúdios" require>
									</div>
									<div class="col-xxl-6 my-2">
										<label>Licenciado por:</label>
										<input type="text" name="input_licenciado" class="form-control" size="100" placeholder="Licenciado por">
									</div>
									<div class="col-xxl-6 my-2">
										<label>Original Network:</label>
										<input type="text" name="input_original_network" class="form-control" size="100" placeholder="Original Network">
									</div>
									<div class="col-xxl-10 my-2">
									<button type="submit" class="btn btn-success">Enviar os Dados AUTOR!</button>
									</div>
								</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Inicio do MODAL para SELECIONAR OS GENEROS ----------  GENEROS -->
	<div class="modal fade fundo_black_40" id="modal_genero" tabindex="-1" aria-labelledby="modal_generoLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-lg">
			<div class="modal-content fundo_black_60">
				<div class="d-flex flex-row col-12">
						<h2 class="modal-title" id="modal_generoLabel">Selecione os Generos do Anime</h2>
						<button type="button" class="meu_btn px-2 py-0 me-2 mt-2" data-bs-dismiss="modal" aria-label="Close"><span class="bt_fechar">X</span></button>
				</div>
				<div class="modal-body">
					<div class="container">
						<div class="row justify-content-center">
							<div class="col-lg-12 col-xl-12 col-xxl-12 fundo_black_20">
							<form name="inserir_genero" class="form-control fundo_dark" onsubmit="return validaFormGenero()" action="inserir_genero.php" method="post" accept-charset="UTF-8" enctype="multipart/form-data">
								<label class="mt-3" for="select_anime">Selecione o Anime para cadastrar o GENÊRO (UM GENERO POR VEZ)</label>
								<select class="my-3" name="select_anime">
								<?php while($exibe1=$consulta1->fetch(PDO::FETCH_ASSOC)) { ?>
									<option value="<?php echo $exibe1['id_anime'];?>"><?php echo $exibe1['nome_anime'];?></option>
								<?php }	?>
								</select>
								<div class="row">
								<div class="col-3 fundo_black_20 rounded-3">
									<label for="genero_1">Ação</label>
									<input type="radio" id="genero_1" name="genero_anime" value="1" checked><br>
									<label for="genero_3">Aventura</label>
									<input type="radio" id="genero_3" name="genero_anime" value="3"><br>
									<label for="genero_4">Artes Marciais</label>
									<input type="radio" id="genero_4" name="genero_anime" value="4"><br>
									<label for="genero_6">Comédia</label>
									<input type="radio" id="genero_6" name="genero_anime" value="6"><br>
									<label for="genero_8">CyberPunk</label>
									<input type="radio" id="genero_8" name="genero_anime" value="8"><br>
									<label for="genero_7">Drama</label>
									<input type="radio" id="genero_7" name="genero_anime" value="7"><br>
									<label for="genero_36">Ecchi</label>
									<input type="radio" id="genero_36" name="genero_anime" value="36"><br>
									<label for="genero_5">Escolar</label>
									<input type="radio" id="genero_5" name="genero_anime" value="5"><br>
									<label for="genero_47">Esporte</label>
									<input type="radio" id="genero_47" name="genero_anime" value="47"><br>
									<label for="genero_9">Fantasia</label>
									<input type="radio" id="genero_9" name="genero_anime" value="9"><br>
									<label for="genero_10">Ficção</label>
									<input type="radio" id="genero_10" name="genero_anime" value="10"><br>
									<label for="genero_11">Ficção Científica</label>
									<input type="radio" id="genero_11" name="genero_anime" value="11"><br>
									<label for="genero_20">Game</label>
									<input type="radio" id="genero_20" name="genero_anime" value="20"><br>
									</div>
								<div class="col-3 fundo_black_20 rounded-4">
									<label for="genero_43">Gore</label>
									<input type="radio" id="genero_43" name="genero_anime" value="43"><br>
									<label for="genero_12">Harém</label>
									<input type="radio" id="genero_12" name="genero_anime" value="12"><br>
									<label for="genero_45">Histórico</label>
									<input type="radio" id="genero_45" name="genero_anime" value="45"><br>
									<label for="genero_34">Horror</label>
									<input type="radio" id="genero_34" name="genero_anime" value="34"><br>
									<label for="genero_38">Infantil</label>
									<input type="radio" id="genero_38" name="genero_anime" value="38"><br>
									<label for="genero_42">Isekai</label>
									<input type="radio" id="genero_42" name="genero_anime" value="42"><br>
									<label for="genero_13">Magia</label>
									<input type="radio" id="genero_13" name="genero_anime" value="13"><br>
									<label for="genero_37">Mecha</label>
									<input type="radio" id="genero_37" name="genero_anime" value="37"><br>
									<label for="genero_19">Militar</label>
									<input type="radio" id="genero_19" name="genero_anime" value="19"><br>
									<label for="genero_21">Mistério</label>
									<input type="radio" id="genero_21" name="genero_anime" value="21"><br>
									<label for="genero_46">Mitológico</label>
									<input type="radio" id="genero_46" name="genero_anime" value="46"><br>
									<label for="genero_2">Musical</label>
									<input type="radio" id="genero_2" name="genero_anime" value="2"><br>
									<label for="genero_14">Romance</label>
									<input type="radio" id="genero_14" name="genero_anime" value="14"><br>
								</div>
								<div class="col-3 fundo_black_20 rounded-4">
									<label for="genero_15">Seinen</label>
									<input type="radio" id="genero_15" name="genero_anime" value="15"><br>
									<label for="genero_39">Slice of Life</label>
									<input type="radio" id="genero_39" name="genero_anime" value="39"><br>
									<label for="genero_40">Shounen</label>
									<input type="radio" id="genero_40" name="genero_anime" value="40"><br>
									<label for="genero_16">Sobrevivência</label>
									<input type="radio" id="genero_16" name="genero_anime" value="16"><br>
									<label for="genero_24">Sobrenatural</label>
									<input type="radio" id="genero_24" name="genero_anime" value="24"><br>
									<label for="genero_41">Steampunk</label>
									<input type="radio" id="genero_41" name="genero_anime" value="41"><br>
									<label for="genero_17">Super Herói</label>
									<input type="radio" id="genero_17" name="genero_anime" value="17"><br>
									<label for="genero_18">Super Poderes</label>
									<input type="radio" id="genero_18" name="genero_anime" value="18"><br>
									<label for="genero_23">Suspence</label>
									<input type="radio" id="genero_23" name="genero_anime" value="23"><br>
									<label for="genero_25">Paródia</label>
									<input type="radio" id="genero_25" name="genero_anime" value="25"><br>
									<label for="genero_26">Pós Apocalíptico</label>
									<input type="radio" id="genero_26" name="genero_anime" value="26"><br>
									<label for="genero_44">Psicológico</label>
									<input type="radio" id="genero_44" name="genero_anime" value="44"><br>
									<label for="genero_22">Terror</label>
									<input type="radio" id="genero_22" name="genero_anime" value="22"><br>
								</div>
								</div>
								<button type="submit" class="btn btn-success m-4">Enviar GENERO do ANIME!</button>
							</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- ANIME ------- do MODAL para INSERIR UM NOVO ANIME -------- ANIME -->
	<div class="modal fade fundo_black_40" id="modal_anime" tabindex="-1" aria-labelledby="modal_animeLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-lg">
			<div class="modal-content fundo_black_60">
				<div class="d-flex flex-row col-12">
					<h2 class="modal-title" id="modal_animeLabel">Inserir o Novo ANIME</h2>
					<button type="button" class="meu_btn px-2 py-0 me-2 mt-2" data-bs-dismiss="modal" aria-label="Close"><span class="bt_fechar">X</span></button>
				</div>
				<div class="modal-body">
					<div class="container">
						<div class="row justify-content-center">
							<div class="col-lg-12 col-xl-12 col-xxl-12 fundo_black_20">
							<form name="form_inserir_anime" class="card-body form-control fundo_dark" action="inserir_anime.php" method="post" onsubmit="return validaCampoNome()" accept-charset="UTF-8" enctype="multipart/form-data">
								<div class="row">
								<div class="col-xxl-11 m-3">
									<label for="select_autor">Selecione o AUTOR do Anime</label>
									<select name="select_autor">
									<?php while($exibe=$consulta->fetch(PDO::FETCH_ASSOC)) { ?>
										<option value="<?php echo $exibe['id_autor'];?>"><?php echo $exibe['direcao'];?></option>
									<?php }	?>
									</select>
								</div>
								<div class="col-xxl-11 m-3">
								<label for="img_mini_anime">Selecione a Imagem MINI!</label>
									<input type="file" name="img_mini_anime" accept="imgs/anime/*" class="form-control form-control-sm">
								</div>
								<div class="col-xxl-11 m-3">
									<label> Insira o Nome do anime:</label>
									<input type="text" name="input_nome" class="form-control" placeholder="Nome do anime" required maxlength="100">
								</div>
								<div class="col-xxl-11 m-3">
									<label for="input_nome_completo">Nome completo ou Sinônimos:</label>
									<textarea rows="2" name="input_nome_completo" class="form-control" placeholder="Nome Completo"></textarea>
								</div>
								<div class="col-xxl-11 m-3">
								<label for="descricao">Descrição do Anime:</label>
									<textarea rows="3" name="descricao" class="form-control" placeholder="Descrição do Anime"></textarea>
								</div>
								<div class="col-xxl-11 m-3">
								<label for="personagens">Personagens Principais do Anime:</label>
									<textarea rows="4" name="personagens" class="form-control" placeholder="Personagens Principais" require></textarea>
								</div>
								<!-- INPUT de inserção da CATEGORIA do anime -->
								<input type="hidden" value="1" name="select_categoria">
								
								<div class="col-xxl-11 m-3">
								<button type="submit" class="btn btn-success">Enviar os Dados do ANIME!</button>
								</div>
								</div>
							</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- FILME ------- MODAL para INSERIR UMA NOVO FILME -------- FILME -->
	<div class="modal fade fundo_black_40" id="modal_filme" tabindex="-1" aria-labelledby="modal_filmeLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-lg">
			<div class="modal-content fundo_black_60">
				<div class="d-flex flex-row col-12">
					<h2 class="modal-title" id="modal_filmeLabel">Inserir um Novo FILME</h2>
					<button type="button" class="meu_btn px-2 py-0 me-2 mt-2" data-bs-dismiss="modal" aria-label="Close"><span class="bt_fechar">X</span></button>
				</div>
				<div class="modal-body">
					<div class="container">
						<div class="row justify-content-center">
							<div class="col-lg-12 col-xl-12 col-xxl-12 fundo_black_20 text-center">
							<form name="form_inserir_filme" class="card-body form-control fundo_dark justify-content-center" action="inserir_filme.php" method="post" accept-charset="UTF-8" enctype="multipart/form-data">
								<div class="row justify-content-center text-center">
									<div class="col-xxl-11 mt-3">
										<label for="img_mini_filme">Selecione a Imagem MINI!</label>
										<input type="file" name="img_mini_filme" accept="imgs/filme/*" class="form-control">
									</div>
									<div class="col-xxl-11 mt-3">
										<label for="titulo_filme">Titulo do FILME:</label>
										<input type="text" name="titulo_filme" class="form-control" size="100" placeholder="Titulo do FILME">
									</div>
									<div class="col-xxl-11 mt-3">
										<label for="subtitulo_filme">Subtitulos e Sinônimos do FILME:</label><br>
										<textarea rows="2" name="subtitulo_filme" class="form-control" placeholder="Subtitulo e Sinônimos do FILME"></textarea>
									</div>
									<div class="col-xxl-11 mt-3">
										<label>Breve descrição e Enredo do FILME:</label>
										<textarea rows="3" name="enredo_filme" class="form-control" placeholder="Uma breve Descição e o Enredo do FILME"></textarea><br>
									</div>
									<div class="col-xxl-3 fundo_black_20 rounded-3 mt-1">
										<label>Duração do FILME:</label>
										<input type="text" name="duracao_filme" class="form-control" size="100" placeholder="00h:00m:00s">
									</div>
									<div class="col-xxl-4 fundo_black_20 rounded-3 mt-1">
										<label>Data de Exibição:</label>
										<input type="text" name="exibido" class="form-control" size="100" placeholder="0000ano-00mês-00dia">
									</div>
									<div class="col-xxl-4 fundo_black_20 rounded-3 mt-1">
										<label for="tipo_anime5"  require>FILME - Tipo:</label><br>
										<input type="radio" name="tipo_anime5" value="1" checked>Anime<br>
										<input type="radio" name="tipo_anime5" value="2">Animação<br>
										<input type="radio" name="tipo_anime5" value="3">Animação (CGI)<br>
										<input type="radio" name="tipo_anime5" value="4">Animação (Stop_Motion)<br>
										<input type="radio" name="tipo_anime5" value="5">Live Action<br>
									</div>
									<!-- INPUT de inserção da CATEGORIA do FILME -->
									<input type="hidden" value="2" name="select_cat_filme">
									
									<div class="col-xxl-7 mt-4">
										<label for="select_anime6">Selecione o NOME do Anime para cadastrar o FILME</label><br>
										<select name="select_anime6">
											<?php while($exibe6=$consulta6->fetch(PDO::FETCH_ASSOC)) { ?>
											<option value="<?php echo $exibe6['id_anime'];?>"><?php echo $exibe6['nome_anime'];?></option>
											<?php }	?>
										</select>
									</div>
									<div class="col-xxl-10 m-3">
										<button type="submit" class="btn btn-success">Enviar Dados do FILME!</button>
									</div>
								</div>
							</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- SERIE ------- MODAL para INSERIR UMA NOVA SERIE -------- SERIE -->
	<div class="modal fade fundo_black_40" id="modal_serie" tabindex="-1" aria-labelledby="modal_serieLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-lg">
			<div class="modal-content fundo_black_60">
				<div class="d-flex flex-row col-12">
					<h2 class="modal-title" id="modal_serieLabel">Inserir uma Nova SÉRIE</h2>
					<button type="button" class="meu_btn px-2 py-0 me-2 mt-2" data-bs-dismiss="modal" aria-label="Close"><span class="bt_fechar">X</span></button>
				</div>
				<div class="modal-body">
					<div class="container">
						<div class="row justify-content-center">
							<div class="col-lg-12 col-xl-12 col-xxl-12 fundo_black_20 text-center">
							<form name="form_inserir_serie" class="form-control form-control-sm fundo_dark" action="inserir_serie.php" method="post" accept-charset="UTF-8" enctype="multipart/form-data">
							<div class="row">
								<div class="col-xxl-11 my-2">
									<label for="img_mini">Selecione a Imagem MINI!</label>
									<input type="file" name="img_mini" accept="imgs/serie/*" class="form-control">
								</div>
								<div class="col-xxl-11 my-2">
									<label>Titulo da Série:</label>
									<input type="text" name="titulo_serie" class="form-control" size="100" placeholder="Titulo da Série">
								</div>
								<div class="col-xxl-11 my-2">
									<label for="subtitulo_serie">Subtitulos e Sinônimos:</label>
									<textarea rows="2" name="subtitulo_serie" class="form-control" placeholder="Subtitulo e Sinônimos"></textarea>
								</div>
								<div class="col-xxl-11 my-2">
									<label>Descrição e Enredo:</label>
									<textarea row="3" name="enredo_serie" class="form-control" placeholder="Uma breve Descição e o Enredo da Série"></textarea><br>
								</div>
								<div class="col-xxl-3 my-2">
									<label>Numero de Episódios:</label>
									<input type="text" name="n_episodios" class="form-control" size="100" placeholder="Somente numeros">
								</div>
								<div class="col-xxl-4 my-2">
									<label>Início da Exibição:</label>
									<input type="text" name="exib_inicio_serie" class="form-control" size="100" placeholder="000ano-00mês-00dia">
								</div>
								<div class="col-xxl-4 my-2">
									<label>Fim da Exibição:</label>
									<input type="text" name="exib_fim_serie" class="form-control" size="100" placeholder="000ano-00mês-00dia">
								</div>
								<div class="col-xxl-4 my-4">
									<label>Duração do Episódio:</label>
									<input type="text" name="duracao_serie" class="form-control" size="100" placeholder="00h:00m:00s">
								</div>
								<div class="col-xxl-5 fundo_black_20 rounded-3 my-2">
									<label for="tipo_anime">Série - Tipo</label><br>
									<input type="radio" name="tipo_anime" value="1" checked>Anime<br>
									<input type="radio" name="tipo_anime" value="2">Animação<br>
									<input type="radio" name="tipo_anime" value="3">Animação (CGI)<br>
									<input type="radio" name="tipo_anime" value="4">Animação (Stop_Motion)<br>
									<input type="radio" name="tipo_anime" value="5">Live Action<br>
								</div>
								<!-- INPUT de inserção da CATEGORIA da SÉRIE -->
								<input type="hidden" value="3" name="select_cat_ser">
								
								<div class="col-xxl-11 my-2">
								<label for="select_anime2">Selecione o NOME do Anime para cadastrar a SÉRIE</label><br>
									<select name="select_anime2">
									<?php while($exibe2=$consulta2->fetch(PDO::FETCH_ASSOC)) { ?>
										<option value="<?php echo $exibe2['id_anime'];?>"><?php echo $exibe2['nome_anime'];?></option>
									<?php }	?>
									</select>
								</div>
								<div class="col-xxl-12 my-3">
									<button type="submit" class="btn btn-success">Enviar os Dados SÉRIE!</button>
								</div>
							</div>
							</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- OVA ------- MODAL para INSERIR UMA NOVA OVA -------- OVA -->
	<div class="modal fade fundo_black_40" id="modal_ova" tabindex="-1" aria-labelledby="modal_ovaLabel" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered modal-lg">
				<div class="modal-content fundo_black_60">
					<div class="d-flex flex-row col-12">
						<h2 class="modal-title" id="modal_ovaLabel">Inserir uma Nova OVA</h2>
						<button type="button" class="meu_btn px-2 py-0 me-2 mt-2" data-bs-dismiss="modal" aria-label="Close"><span class="bt_fechar">X</span></button>
					</div>
					<div class="modal-body">
						<div class="container">
							<div class="row justify-content-center">
								<div class="col-lg-12 col-xl-12 col-xxl-12 fundo_black_20 text-center">
								<form name="form_inserir_ova" class="card-body form-control fundo_dark" action="inserir_ova.php" method="post" accept-charset="UTF-8" enctype="multipart/form-data">
								<div class="row">
									<div class="col-xxl-11 my-2">
										<label for="img_mini_ova">Selecione a Imagem MINI!</label>
										<input type="file" name="img_mini_ova" accept="imgs/serie/*" class="form-control">
									</div>
									<div class="col-xxl-11 my-2">
										<label for="titulo_ova">Titulo da OVA:</label>
										<input type="text" name="titulo_ova" class="form-control" size="100" placeholder="Titulo da OVA" autofocus>
									</div>
									<div class="col-xxl-11 my-2">
										<label for="subtitulo_ova">Subtitulos e Sinônimos da OVA:</label><br>
										<textarea rows="2" name="subtitulo_ova" class="form-control" placeholder="Subtitulo e Sinônimos"></textarea>
									</div>
									<div class="col-xxl-11 my-2">
										<label>Descrição e Enredo da OVA:</label>
										<textarea rows="3" name="enredo_ova" class="form-control" placeholder="Uma breve Descição e o Enredo da OVA"></textarea><br>
									</div>
									<div class="col-xxl-3 my-2">
										<label>Numero de Episódios:</label>
										<input type="text" name="n_episodios_ova" class="form-control" size="100" placeholder="Episódios da OVA">
									</div>
									<div class="col-xxl-4 my-2">
										<label>Início da Exibição:</label>
										<input type="text" name="exib_inicio_ova" class="form-control" size="100" placeholder="INICIO (0000ano-00mês-00dia)">
									</div>
									<div class="col-xxl-4 my-2">
										<label>Fim da Exibição:</label>
										<input type="text" name="exib_fim_ova" class="form-control" size="100">
									</div>
									<div class="col-xxl-3 my-2">
										<label>Duração do Episódio:</label>
										<input type="text" name="duracao_ova" class="form-control" size="100" placeholder="Duração (00h:00m:00s)">
									</div>
									<div class="col-xxl-4 fundo_black_20 rounded-3 my-2">
										<label for="tipo_anime1">OVA - Tipo:</label><br>
										<input type="radio" name="tipo_anime1" value="1" checked>Anime<br>
										<input type="radio" name="tipo_anime1" value="2">Animação<br>
										<input type="radio" name="tipo_anime1" value="3">Animação (CGI)<br>
										<input type="radio" name="tipo_anime1" value="4">Animação (Stop_Motion)<br>
										<input type="radio" name="tipo_anime1" value="5">Live Action<br>
									</div>
									<!-- INPUT de inserção da CATEGORIA do OVA -->
									<input type="hidden" value="4" name="select_cat_ova">

									<div class="col-xxl-10 my-3">
										<label for="select_anime3">Selecione o Anime para cadastrar!</label><br>
										<select name="select_anime3">
											<?php while($exibe3=$consulta3->fetch(PDO::FETCH_ASSOC)) { ?>
											<option value="<?php echo $exibe3['id_anime'];?>"><?php echo $exibe3['nome_anime'];?></option>
											<?php }	?>
										</select>
									</div>
									<div class="col-xxl-11 m-3">
										<button type="submit" class="btn btn-success">Enviar os Dados OVA!</button>
									</div>
								</div>
								</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	<!-- ESPECIAL ------- MODAL para INSERIR UM NOVO ESPECIAL -------- ESPECIAL -->
	<div class="modal fade fundo_black_40" id="modal_especial" tabindex="-1" aria-labelledby="modal_especialLabel" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered modal-lg">
				<div class="modal-content fundo_black_60">
					<div class="d-flex flex-row col-12">
						<h2 class="modal-title" id="modal_especialLabel">Inserir um Novo Especial</h2>
						<button type="button" class="meu_btn px-2 py-0 me-2 mt-2" data-bs-dismiss="modal" aria-label="Close"><span class="bt_fechar">X</span></button>
					</div>
					<div class="modal-body">
						<div class="container">
							<div class="row justify-content-center">
								<div class="col-lg-12 col-xl-12 col-xxl-12 fundo_black_20 text-center">
								<form name="form_inserir_especial" class="card-body form-control fundo_dark" action="inserir_especial.php" method="post" accept-charset="UTF-8" enctype="multipart/form-data">
								<div class="row">
									<div class="col-xxl-11 my-2">
										<label for="img_mini_esp">Selecione a Imagem MINI!</label><br>
										<input type="file" name="img_mini_esp" accept="imgs/especial/*" class="form-control">
									</div>
									<div class="col-xxl-11 my-2">
										<label for="titulo_especial">Titulo do ESPECIAL:</label>
										<input type="text" name="titulo_especial" class="form-control" size="100" placeholder="Titulo do Especial">
									</div>
									<div class="col-xxl-11 my-2">
										<label for="subtitulo_especial">Subtitulos e Sinônimos do ESPECIAL:</label>
										<textarea rows="2" name="subtitulo_especial" class="form-control" placeholder="Subtitulo e Sinônimos"></textarea>
									</div>
									<div class="col-xxl-11 my-2">
										<label>Breve descrição e Enredo do ESPECIAL:</label>
										<textarea rows="2" name="enredo_especial" class="form-control" placeholder="Uma breve Descição e o Enredo do ESPECIAL"></textarea>
									</div>
									<div class="col-xxl-3 my-2">
										<label>Numero de Episódios:</label>
										<input type="text" name="n_episodios_especial" class="form-control" placeholder="SOMENTE Numeros ">
									</div>
									<div class="col-xxl-4 my-2">
										<label>Início da Exibição:</label>
										<input type="text" name="exib_inicio_especial" class="form-control" size="100" placeholder="0000ano-00mês-00dia">
									</div>
									<div class="col-xxl-4 my-2">
										<label>Fim da Exibição:</label>
										<input type="text" name="exib_fim_especial" class="form-control" placeholder="Data do fim (0000ano-00mês-00dia)">
									</div>
									<div class="col-xxl-4 my-4">
										<label>Duração do Episódio:</label>
										<input type="text" name="duracao_especial" class="form-control" size="100" placeholder="00h:00m:00s">
									</div>
									<div class="col-xxl-5 fundo_black_20 rounded-3 my-2">
										<label for="tipo_anime3">ESPECIAL - Tipo:</label><br>
										<input type="radio" name="tipo_anime3" value="1" checked>Anime<br>
										<input type="radio" name="tipo_anime3" value="2">Animação<br>
										<input type="radio" name="tipo_anime3" value="3">Animação (CGI)<br>
										<input type="radio" name="tipo_anime3" value="4">Animação (Stop_Motion)<br>
										<input type="radio" name="tipo_anime3" value="5">Live Action<br>
									</div>
									<!-- INPUT de inserção da CATEGORIA do ESPECIAL -->
									<input type="hidden" value="6" name="select_cat_especial">

									<div class="col-xxl-11 my-2">
										<label for="select_anime4">Selecione o Anime para cadastrar:</label><br>
										<select name="select_anime4">
										<?php while($exibe4=$consulta4->fetch(PDO::FETCH_ASSOC)) { ?>
										<option value="<?php echo $exibe4['id_anime'];?>"><?php echo $exibe4['nome_anime'];?></option>
										<?php }	?>
										</select>
									</div>
									<div class="col-xxl-12 my-3">
										<button type="submit" class="btn btn-success">Enviar Dados do ESPECIAL!</button>
									</div>			
								</div>
								</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	<!-- ONA ------- MODAL para INSERIR UMA NOVA ONA -------- ONA -->
	<div class="modal fade fundo_black_40" id="modal_ona" tabindex="-1" aria-labelledby="modal_onaLabel" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered modal-lg">
				<div class="modal-content fundo_black_60">
					<div class="d-flex flex-row col-12">
						<h2 class="modal-title" id="modal_onaLabel">Inserir uma Nova ONA</h2>
						<button type="button" class="meu_btn px-2 py-0 me-2 mt-2" data-bs-dismiss="modal" aria-label="Close"><span class="bt_fechar">X</span></button>
					</div>
					<div class="modal-body">
						<div class="container">
							<div class="row justify-content-center">
								<div class="col-lg-12 col-xl-12 col-xxl-12 fundo_black_20 text-center">
								<form name="form_inserir_ona" class="card-body form-control fundo_dark" action="inserir_ona.php" method="post" accept-charset="UTF-8" enctype="multipart/form-data">
								<div class="row">
									<div class="col-xxl-11 my-2">
										<label for="img_mini_ona">Selecione a Imagem MINI!</label><br>
										<input type="file" name="img_mini_ona" accept="imgs/ona/*" class="form-control">
									</div>
									<div class="col-xxl-11 my-2">
										<label for="titulo_ona">Titulo da ONA:</label>
										<input type="text" name="titulo_ona" class="form-control" size="100" placeholder="Titulo da ONA">
									</div>
									<div class="col-xxl-11 my-2">
										<label for="subtitulo_ona">Subtitulos e Sinônimos da ONA:</label>
										<textarea rows="2" name="subtitulo_ona" class="form-control" placeholder="Subtitulo e Sinônimos da ONA"></textarea>
									</div>
									<div class="col-xxl-11 my-2">
										<label>Breve descrição e Enredo da ONA:</label>
										<textarea rows="3" name="enredo_ona" class="form-control" placeholder="Uma breve Descição e o Enredo da ONA"></textarea>
									</div>
									<div class="col-xxl-3 my-2">
										<label>Numero de Episódios:</label>
										<input type="text" name="n_episodios_ona" class="form-control" size="100" placeholder="Numero de Episódios da ONA">
									</div>
									<div class="col-xxl-4 my-2">
										<label>Início da Exibição:</label>
										<input type="text" name="exib_inicio_ona" class="form-control" size="100" placeholder="0000ano-00mês-00dia">
									</div>
									<div class="col-xxl-4 my-2">	
										<label>Fim da Exibição:</label>
										<input type="text" name="exib_fim_ona" class="form-control" size="100" placeholder="0000ano-00mês-00dia">
									</div>
									<div class="col-xxl-3 my-2">	
										<label>Duração do Episódio:</label>
										<input type="text" name="duracao_ona" class="form-control" size="100" placeholder="00h:00m:00s">
									</div>
									<div class="col-xxl-4 fundo_black_20 rounded-3 my-2">
										<label for="tipo_anime4">ONA - Tipo:</label><br>
										<input type="radio" name="tipo_anime4" value="1" checked>Anime<br>
										<input type="radio" name="tipo_anime4" value="2">Animação<br>
										<input type="radio" name="tipo_anime4" value="3">Animação (CGI)<br>
										<input type="radio" name="tipo_anime4" value="4">Animação (Stop_Motion)<br>
										<input type="radio" name="tipo_anime4" value="5">Live Action<br>
									</div>
									<!-- INPUT de inserção da CATEGORIA do ONA -->
									<input type="hidden" value="5" name="select_cat_ona">

									<div class="col-xxl-11 my-2">
										<label for="select_anime5">Selecione o Anime para cadastrar a ONA</label><br>
										<select name="select_anime5">
											<?php while($exibe5=$consulta5->fetch(PDO::FETCH_ASSOC)) { ?>
											<option value="<?php echo $exibe5['id_anime'];?>"><?php echo $exibe5['nome_anime'];?></option>
											<?php }	?>
										</select>
									</div>
									<div class="col-xxl-11 my-3">
										<button type="submit" class="btn btn-success">Enviar Dados da ONA!</button>
									</div>
								</div>
								</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- ANIME ------- MODAL para INSERIR NOVA IMG para o ANIME -------- IMGs ANIME -->
		<div class="modal fade fundo_black_40" id="modal_img_anime" tabindex="-1" aria-labelledby="modal_img_animeLabel" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered modal-lg">
				<div class="modal-content fundo_black_60">
					<div class="d-flex flex-row col-12">
						<h2 class="modal-title" id="modal_img_animeLabel">Inserir uma Nova IMG para o ANIME</h2>
						<button type="button" class="meu_btn px-2 py-0 me-2 mt-2" data-bs-dismiss="modal" aria-label="Close"><span class="bt_fechar">X</span></button>
					</div>
					<div class="modal-body">
						<div class="container">
							<div class="row justify-content-center">
								<div class="col-lg-12 col-xl-12 col-xxl-12 fundo_black_20 text-center">
								<form name="form_img_anime" class="card-body form-control fundo_dark" onsubmit="return validaInputIMG()" action="inserir_img.php" method="post" accept-charset="UTF-8" enctype="multipart/form-data">
								<div class="col-xxl-11 my-3">
									<label>Selecione uma Imagem para o Anime(ImgFundo)</label><br>
									<input type="file" accept="imgs/anime/*" class="form-control form-control-sm" name="caminho_img_anime" require>
								</div>
								<div class="col-xxl-11 my-3">
								<label>Link Imagem(um nome para identificação da imagem):</label>
									<input type="text" name="link_img" class="form-control form-control-sm" size="100" placeholder="Nome de Identificação da IMG">
								</div>
								<div class="row">
									<div class="col-xxl-11 my-3">
										<label for="select_anime7">Selecione o NOME do Anime para cadastrar a IMAGEM</label><br>
											<select name="select_anime7">
											<?php while($exibe7=$consulta7->fetch(PDO::FETCH_ASSOC)) { ?>
											<option value="<?php echo $exibe7['id_anime'];?>"><?php echo $exibe7['nome_anime'];?></option>
											<?php }	?>
										</select>
									</div>
									<div class="col-xxl-11 my-4">
										<button type="submit" class="btn btn-success">Enviar Imagem!</button>
									</div>
								</div>
								</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- FILME ------- MODAL para INSERIR NOVA IMG para o FILME -------- IMGs  FILME -->
		<div class="modal fade fundo_black_40" id="modal_img_filme" tabindex="-1" aria-labelledby="modal_img_filmeLabel" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered modal-lg">
				<div class="modal-content fundo_black_60">
					<div class="d-flex flex-row col-12">
						<h2 class="modal-title" id="modal_img_filmeLabel">Inserir uma Nova IMG para o FILME</h2>
						<button type="button" class="meu_btn px-2 py-0 me-2 mt-2" data-bs-dismiss="modal" aria-label="Close"><span class="bt_fechar">X</span></button>
					</div>
					<div class="modal-body">
						<div class="container">
							<div class="row justify-content-center">
								<div class="col-lg-12 col-xl-12 col-xxl-12 fundo_black_20 text-center">
								<form name="form_img_filme" class="card-body form-control fundo_dark" onsubmit="return validaInputImgFilme()" action="inserir_img_filme.php" method="post" accept-charset="UTF-8" enctype="multipart/form-data">
								<div class="row">
									<div class="col-xxl-11 my-3">
										<label>Selecione uma Imagem para o FILME!</label><br>
										<input type="file" name="caminho_img_filme" accept="imgs/filme/*" class="form-control" require>
									</div>
									<div class="col-xxl-11 my-3">
										<label>Link Imagem(um nome para identificação da imagem):</label>
										<input type="text" name="link_img_filme" class="form-control" size="100" placeholder="Nome de Identificação da IMG">
									</div>
									<div class="col-xxl-11 my-3">
										<label for="select_filme">Selecione o NOME do FILME para cadastrar a IMAGEM</label><br>
										<select name="select_filme">
											<?php while($exibe_filme=$consulta_filme->fetch(PDO::FETCH_ASSOC)) { ?>
											<option value="<?php echo $exibe_filme['id_filme'];?>"><?php echo $exibe_filme['titulo_filme'];?></option>
											<?php }	?>
										</select>
									</div>
									<div class="col-xxl-11 my-4">
										<button type="submit" class="btn btn-success">Enviar Imagem!</button>
									</div>
								</div>
								</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- SÉRIE ------- MODAL para INSERIR NOVA IMG para a SÉRIE --------  IMGs SÉRIE -->
		<div class="modal fade fundo_black_40" id="modal_img_serie" tabindex="-1" aria-labelledby="modal_img_serieLabel" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered modal-lg">
				<div class="modal-content fundo_black_60">
					<div class="d-flex flex-row col-12">
						<h2 class="modal-title" id="modal_img_serieLabel">Inserir uma Nova IMG para a SÉRIE</h2>
						<button type="button" class="meu_btn px-2 py-0 me-2 mt-2" data-bs-dismiss="modal" aria-label="Close"><span class="bt_fechar">X</span></button>
					</div>
					<div class="modal-body">
						<div class="container">
							<div class="row justify-content-center">
								<div class="col-lg-12 col-xl-12 col-xxl-12 fundo_black_20 text-center">
								<form name="form_img_serie" class="card-body form-control fundo_dark" onsubmit="return validaInputImgSerie()" action="inserir_img_serie.php" method="post" accept-charset="UTF-8" enctype="multipart/form-data">
								<div class="row">
									<div class="col-xxl-11 my-3">
										<label for="caminho_img_serie">Selecione uma Imagem para a SÉRIE!</label>
										<input type="file" name="caminho_img_serie" accept="imgs/serie/*" class="form-control" require>
									</div>
									<div class="col-xxl-11 my-3">
										<label>Link Imagem(um nome para identificação da imagem):</label>
										<input type="text" name="link_img_serie" class="form-control" size="100" placeholder="Nome de Identificação da IMG">
									</div>
									<div class="col-xxl-11 my-3">
										<label for="select_serie">Selecione a SÉRIE para cadastrar a IMAGEM</label><br>
										<select name="select_serie">
										<?php while($exibe_serie=$consulta_serie->fetch(PDO::FETCH_ASSOC)) { ?>
										<option value="<?php echo $exibe_serie['id_serie'];?>"><?php echo $exibe_serie['titulo_serie'];?></option>
										<?php }	?>
										</select>
									</div>
									<div class="col-xxl-11 my-4">
										<button type="submit" class="btn btn-success">Enviar Imagem!</button>
									</div>
								</div>
								</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- OVA ------- MODAL para INSERIR NOVA IMG para o OVA --------  IMGs OVA -->
		<div class="modal fade fundo_black_40" id="modal_img_ova" tabindex="-1" aria-labelledby="modal_img_ovaLabel" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered modal-lg">
				<div class="modal-content fundo_black_60">
					<div class="d-flex flex-row col-12">
						<h2 class="modal-title" id="modal_img_ovaLabel">Inserir uma Nova IMG para o OVA</h2>
						<button type="button" class="meu_btn px-2 py-0 me-2 mt-2" data-bs-dismiss="modal" aria-label="Close"><span class="bt_fechar">X</span></button>
					</div>
					<div class="modal-body">
						<div class="container">
							<div class="row justify-content-center">
								<div class="col-lg-12 col-xl-12 col-xxl-12 fundo_black_20 text-center">
								<form name="form_img_ova" class="card-body form-control fundo_dark" onsubmit="return validaInputImgOva()" action="inserir_img_ova.php" method="post" accept-charset="UTF-8" enctype="multipart/form-data">
								<div class="row">
									<div class="col-xxl-11 my-3">
										<label>Selecione uma Imagem para a OVA!</label><br>
										<input type="file" name="caminho_img_ova" accept="imgs/ova/*" class="form-control" require>
									</div>
									<div class="col-xxl-11 my-3">
										<label>Link Imagem(um nome para identificação da imagem):</label>
										<input type="text" name="link_img_ova" class="form-control" size="100" placeholder="Nome de Identificação da IMG">
									</div>
									<div class="col-xxl-12 my-3">
										<label for="select_ova">Selecione a OVA para cadastrar a IMAGEM</label><br>
										<select name="select_ova">
										<?php while($exibe_ova=$consulta_ova->fetch(PDO::FETCH_ASSOC)) { ?>
											<option value="<?php echo $exibe_ova['id_ova'];?>"><?php echo $exibe_ova['titulo_ova'];?></option>
										<?php }	?>
										</select>
									</div>
									<div class="col-xxl-11 my-4">
										<button type="submit" class="btn btn-success">Enviar Imagem!</button>
									</div>
								</div>
								</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- ESPECIAL ------- MODAL para INSERIR NOVA IMG para o ESPECIAL --------  IMGs ESPECIAL -->
		<div class="modal fade fundo_black_40" id="modal_img_especial" tabindex="-1" aria-labelledby="modal_img_especialLabel" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered modal-lg">
				<div class="modal-content fundo_black_60">
					<div class="d-flex flex-row col-12">
						<h2 class="modal-title" id="modal_img_especialLabel">Inserir uma Nova IMG para o ESPECIAL</h2>
						<button type="button" class="meu_btn px-2 py-0 me-2 mt-2" data-bs-dismiss="modal" aria-label="Close"><span class="bt_fechar">X</span></button>
					</div>
					<div class="modal-body">
						<div class="container">
							<div class="row justify-content-center">
								<div class="col-lg-12 col-xl-12 col-xxl-12 fundo_black_20 text-center">
								<form name="form_img_especial" class="card-body form-control fundo_dark" onsubmit="return validaInputImgEspecial()" action="inserir_img_especial.php" method="post" accept-charset="UTF-8" enctype="multipart/form-data">
								<div class="row">
									<div class="col-xxl-11 my-3">
										<label>Selecione uma Imagem para o ESPECIAL!</label><br>
										<input type="file" name="caminho_img_especial" accept="imgs/especial/*" class="form-control" require>
									</div>
									<div class="col-xxl-11 my-3">
										<label>Link Imagem(um nome para identificação da imagem):</label>
										<input type="text" name="link_img_especial" class="form-control" size="100" placeholder="Nome de Identificação da IMG">
									</div>
									<div class="col-xxl-11 my-3">
										<label for="select_especial">Selecione o ESPECIAL para cadastrar a IMAGEM</label><br>
										<select name="select_especial">
										<?php while($exibe_especial=$consulta_especial->fetch(PDO::FETCH_ASSOC)) { ?>
											<option value="<?php echo $exibe_especial['id_especial'];?>"><?php echo $exibe_especial['titulo_especial'];?></option>
										<?php }	?>
										</select>
									</div>
									<div class="col-xxl-11 my-4">
										<button type="submit" class="btn btn-success">Enviar IMAGEM!</button>
									</div>
								</div>
								</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- ONA ------- MODAL para INSERIR NOVA IMG para o ONA --------  IMGs ONA -->
		<div class="modal fade fundo_black_40" id="modal_img_ona" tabindex="-1" aria-labelledby="modal_img_onaLabel" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered modal-lg">
				<div class="modal-content fundo_black_60">
					<div class="d-flex flex-row col-12">
						<h2 class="modal-title" id="modal_img_onaLabel">Inserir uma Nova IMG para o ONA</h2>
						<button type="button" class="meu_btn px-2 py-0 me-2 mt-2" data-bs-dismiss="modal" aria-label="Close"><span class="bt_fechar">X</span></button>
					</div>
					<div class="modal-body">
						<div class="container">
							<div class="row justify-content-center">
								<div class="col-lg-12 col-xl-12 col-xxl-12 fundo_black_20 text-center">
								<form name="form_img_ona" class="card-body form-control fundo_dark" onsubmit="return validaInputImgOna()" action="inserir_img_ona.php" method="post" accept-charset="UTF-8" enctype="multipart/form-data">
								<div class="row">
									<div class="col-xxl-11 my-3">
										<label>Selecione uma Imagem para a ONA!</label><br>
										<input type="file" name="caminho_img_ona" accept="imgs/ona/*" class="form-control" require>
									</div>
									<div class="col-xxl-11 my-3">
										<label>Link Imagem(um nome para identificação da imagem):</label>
										<input type="text" name="link_img_ona" class="form-control" size="100" placeholder="Nome de Identificação da IMG">
									</div>
									<div class="col-xxl-11 my-3">
										<label for="select_ona">Selecione o ONA para cadastrar a IMAGEM</label><br>
										<select name="select_ona">
											<?php while($exibe_ona=$consulta_ona->fetch(PDO::FETCH_ASSOC)) { ?>
											<option value="<?php echo $exibe_ona['id_ona'];?>"><?php echo $exibe_ona['titulo_ona'];?></option>
											<?php }	?>
										</select>
									</div>
									<div class="col-xxl-11 my-4">
										<button type="submit" class="btn btn-success">Enviar Imagem!</button>
									</div>
								</div>
								</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>										
</div><!-- Fecho a ROW do inicio -->
</main>
</body>
</html>