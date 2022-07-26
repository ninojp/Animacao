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
	$consulta_categoria = $conecta->query('SELECT * FROM categoria_animacao ORDER BY id DESC');
	$consulta_categoria2 = $conecta->query('SELECT * FROM categoria_animacao ORDER BY id DESC');
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
		<h1 class="mt-5 justify-content-center fundo_black_80 rounded-4">Página para inserção de Novos animes</h1>
		</div>
	</div>
</header>
<!-- MODAL PARA ABRIR OS MODALs DE INSERÇÃO -->
<div class="container fundo_black_80 buttons_inserir rounded-4">
	<div class="row"><div class="col-10">
		<div class="row my-4"><button type="button" class="btn btn-primary" data-bs-target="#modal_autor" data-bs-toggle="modal">
			Inserir Autor</button></div>
		<div class="row my-4"><button type="button" class="btn btn-primary" data-bs-target="#modal_genero" data-bs-toggle="modal">
			Escolher Generos</button></div>
		<div class="row my-4"><button type="button" class="btn btn-primary" data-bs-target="#modal_anime" data-bs-toggle="modal">
			Inserir Anime</button></div>
		<div class="row my-4"><button type="button" class="btn btn-primary" data-bs-target="#modal_filme" data-bs-toggle="modal">
			Inserir Filme</button></div>
		<div class="row my-4"><button type="button" class="meu_btn" data-bs-target="#modal_serie" data-bs-toggle="modal">Inserir Série</button></div>
		<div class="row my-4"><button type="button" class="meu_btn" data-bs-target="#modal_autor" data-bs-toggle="modal">Inserir OVA</button></div>
		<div class="row my-4"><button type="button" class="meu_btn" data-bs-target="#modal_autor" data-bs-toggle="modal">Inserir ONA</button></div>
		<div class="row my-4"><button type="button" class="meu_btn" data-bs-target="#modal_autor" data-bs-toggle="modal">Inserir Especial</button></div>
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
										<textarea rows="1" name="input_producao" class="form-control" placeholder="Produção"></textarea>
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
									<div class="col-3 fundo_black_20">
									<input type="radio" name="genero_anime" value="1" checked>Ação<br>
									<input type="radio" name="genero_anime" value="3">Aventura<br>
									<input type="radio" name="genero_anime" value="4">Artes Marciais<br>
									<input type="radio" name="genero_anime" value="6">Comédia<br>
									<input type="radio" name="genero_anime" value="8">CyberPunk<br>
									<input type="radio" name="genero_anime" value="7">Drama<br>
									<input type="radio" name="genero_anime" value="36">Ecchi<br>
									<input type="radio" name="genero_anime" value="5">Escolar<br>
									<input type="radio" name="genero_anime" value="9">Fantasia<br>
									<input type="radio" name="genero_anime" value="10">Ficção<br>
									<input type="radio" name="genero_anime" value="11">Ficção Científica<br>
									<input type="radio" name="genero_anime" value="20">Game<br>
									</div>
								<div class="col-3 fundo_black_20">
									<input type="radio" name="genero_anime" value="43">Gore<br>
									<input type="radio" name="genero_anime" value="12">Harém<br>
									<input type="radio" name="genero_anime" value="45">Histórico<br>
									<input type="radio" name="genero_anime" value="34">Horror<br>
									<input type="radio" name="genero_anime" value="38">Infantil<br>
									<input type="radio" name="genero_anime" value="42">Isekai<br>
									<input type="radio" name="genero_anime" value="13">Magia<br>
									<input type="radio" name="genero_anime" value="37">Mecha<br>
									<input type="radio" name="genero_anime" value="19">Militar<br>
									<input type="radio" name="genero_anime" value="21">Mistério<br>
									<input type="radio" name="genero_anime" value="46">Mitológico<br>
									<input type="radio" name="genero_anime" value="14">Romance<br>
									<input type="radio" name="genero_anime" value="15">Seinen<br>
								</div>
								<div class="col-3 fundo_black_20">
									<input type="radio" name="genero_anime" value="39">Slice of Life<br>
									<input type="radio" name="genero_anime" value="40">Shounen<br>
									<input type="radio" name="genero_anime" value="16">Sobrevivência<br>
									<input type="radio" name="genero_anime" value="24">Sobrenatural<br>
									<input type="radio" name="genero_anime" value="41">Steampunk<br>
									<input type="radio" name="genero_anime" value="17">Super Herói<br>
									<input type="radio" name="genero_anime" value="18">Super Poderes<br>
									<input type="radio" name="genero_anime" value="23">Suspence<br>
									<input type="radio" name="genero_anime" value="25">Paródia<br>
									<input type="radio" name="genero_anime" value="26">Pós Apocalíptico<br>
									<input type="radio" name="genero_anime" value="44">Psicológico<br>
									<input type="radio" name="genero_anime" value="22">Terror<br>
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
								<label for="img_mini_anime">Selecione a Imagem MINI!</label>
									<input type="file" name="img_mini_anime" accept="imgs/anime/*" class="form-control form-control-sm">
								</div>
								<div class="col-xxl-7 m-3">
								<label for="personagens">Personagens Principais do Anime:</label>
									<textarea rows="4" name="personagens" class="form-control" placeholder="Personagens Principais" require></textarea>
								</div>
								<div class="col-xxl-4 mt-5">
									<label for="select_categoria">Selecione a Categoria</label><br>
									<select name="select_categoria">
									<?php while($exibe_cat=$consulta_categoria->fetch(PDO::FETCH_ASSOC)) { ?>
										<option value="<?php echo $exibe_cat['id'];?>"><?php echo $exibe_cat['nome_cat'];?></option>
									<?php }	?>
									</select>
								</div>
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
							<div class="col-lg-12 col-xl-12 col-xxl-12 fundo_black_20">
							<form name="form_inserir_filme" class="card-body form-control fundo_dark" action="inserir_filme.php" method="post" accept-charset="UTF-8" enctype="multipart/form-data">
								<div class="row">
									<div class="col-xxl-6">
										<label for="img_mini_filme">Selecione a Imagem MINI!</label>
										<input type="file" name="img_mini_filme" accept="imgs/filme/*" class="form-control">
									</div>
									<div class="col-xxl-6">
										<label for="titulo_filme">Titulo do FILME:</label>
										<input type="text" name="titulo_filme" class="form-control" size="100" placeholder="Titulo do FILME">
									</div>
									<div class="col-xxl-6">
										<label for="subtitulo_filme">Subtitulos e Sinônimos do FILME:</label><br>
										<textarea rows="2" name="subtitulo_filme" class="form-control" placeholder="Subtitulo e Sinônimos do FILME"></textarea>
									</div>
									<div class="col-xxl-6">
										<label>Breve descrição e Enredo do FILME:</label>
										<textarea rows="2" name="enredo_filme" class="form-control" placeholder="Uma breve Descição e o Enredo do FILME"></textarea><br>
									</div>
									<div class="col-xxl-4 border">
										<label>Duração do FILME:</label>
										<input type="text" name="duracao_filme" class="form-control" size="100" placeholder="00h:00m:00s">
									</div>
									<div class="col-xxl-4 border">
										<label>Data de Exibição:</label>
										<input type="text" name="exibido" class="form-control" size="100" placeholder="0000ano-00mês-00dia">
									</div>
									<div class="col-xxl-4 border">
										<label for="tipo_anime5"  require>FILME - Tipo:</label><br>
										<input type="radio" name="tipo_anime5" value="1" checked>Anime<br>
										<input type="radio" name="tipo_anime5" value="2">Animação<br>
										<input type="radio" name="tipo_anime5" value="3">Animação (CGI)<br>
										<input type="radio" name="tipo_anime5" value="4">Animação (Stop_Motion)<br>
										<input type="radio" name="tipo_anime5" value="5">Live Action<br>
									</div>
									<div class="col-xxl-6">
										<label for="select_anime6">Selecione o NOME do Anime para cadastrar o FILME</label>
										<select name="select_anime6">
											<?php while($exibe6=$consulta6->fetch(PDO::FETCH_ASSOC)) { ?>
											<option value="<?php echo $exibe6['id_anime'];?>"><?php echo $exibe6['nome_anime'];?></option>
											<?php }	?>
										</select>
									</div>
									<div class="col-xxl-6"><hr>
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


<!-- Bloco para inserir os dados da SERIE do anime ----------- --BLOCO SERIE-------------BLOCO SERIE --->
		<div class="card col-md-6 fundo_transp">
			<div class="card-header">
				<a class="collapsed btn btn-primary" data-bs-toggle="collapse" href="#collapseserie">Inserir os dados da SERIE do anime</a>
			</div>
		<div id="collapseserie" class="collapse" data-bs-parent="#accordion">
		<form name="form_inserir_serie" class="card-body form-control form-control-sm fundo_dark" action="inserir_serie.php" method="post" accept-charset="UTF-8" enctype="multipart/form-data">
		<div class="row">
			<div class="col-xxl-12">
				<label for="img_mini">Selecione a Imagem MINI!</label>
				<input type="file" name="img_mini" accept="imgs/serie/*" class="form-control">
			</div>
			<div class="col-xxl-6">
				<label>Titulo da Série:</label>
				<input type="text" name="titulo_serie" class="form-control" size="100" placeholder="Titulo da Série">
			</div>
			<div class="col-xxl-6">
				<label for="subtitulo_serie">Subtitulos e Sinônimos:</label>
				<textarea rows="2" name="subtitulo_serie" class="form-control" placeholder="Subtitulo e Sinônimos"></textarea>
			</div>
			<div class="col-xxl-6">
				<label>Descrição e Enredo:</label>
				<textarea row="3" name="enredo_serie" class="form-control" placeholder="Uma breve Descição e o Enredo da Série"></textarea><br>
			</div>
			<div class="col-xxl-6 mt-3">
			<label for="select_anime2">Selecione o NOME do Anime para cadastrar a SÉRIE</label>
				<select name="select_anime2">
				<?php while($exibe2=$consulta2->fetch(PDO::FETCH_ASSOC)) { ?>
					<option value="<?php echo $exibe2['id_anime'];?>"><?php echo $exibe2['nome_anime'];?></option>
				<?php }	?>
				</select>
			</div>
			<div class="col-xxl-4 border">
				<label>Numero de Episódios:</label>
				<input type="text" name="n_episodios" class="form-control" size="100" placeholder="Somente numeros">
			</div>
			<div class="col-xxl-4 border">
				<label>Duração do Episódio:</label>
				<input type="text" name="duracao_serie" class="form-control" size="100" placeholder="00h:00m:00s">
			</div>
			<div class="col-xxl-4 border">
				<label>Início da Exibição:</label>
				<input type="text" name="exib_inicio_serie" class="form-control" size="100" placeholder="000ano-00mês-00dia">
			</div>
			<div class="col-xxl-4 border">
				<label>Fim da Exibição:</label>
				<input type="text" name="exib_fim_serie" class="form-control" size="100" placeholder="000ano-00mês-00dia">
			</div>
			<div class="col-xxl-4 border">
				<label for="tipo_anime">Série - Tipo</label><br>
				<input type="radio" name="tipo_anime" value="1" checked>Anime<br>
				<input type="radio" name="tipo_anime" value="2">Animação<br>
				<input type="radio" name="tipo_anime" value="3">Animação (CGI)<br>
				<input type="radio" name="tipo_anime" value="4">Animação (Stop_Motion)<br>
				<input type="radio" name="tipo_anime" value="5">Live Action<br>
			</div>
			<div class="col-xxl-4 mt-4 border">
				<label for="select_cat_ser">Categoria da Série</label>
				<select name="select_cat_ser">
				<?php while($exibe_cat_ser=$consulta_categoria2->fetch(PDO::FETCH_ASSOC)) { ?>
					<option value="<?php echo $exibe_cat_ser['id'];?>"><?php echo $exibe_cat_ser['nome_cat'];?></option>
				<?php }	?>
				</select>
			</div>
			<div class="col-xxl-12"><br>
				<button type="submit" class="btn btn-success">Enviar os Dados SÉRIE!</button>
			</div>
		</div>
		</form>

<!-- Bloco para inserir as IMAGENS ANIME anime,  por enquanto selecionar uma imagens por vez -->
<form name="form_img_anime" class="card-body form-control fundo_dark" onsubmit="return validaInputIMG()" action="inserir_img.php" method="post" accept-charset="UTF-8" enctype="multipart/form-data">
			<div class="col-xxl-12">
				<label>Selecione uma Imagem para o Anime(ImgFundo)</label><br>
				<input type="file" accept="imgs/anime/*" class="form-control form-control-sm" name="caminho_img_anime" require>
			</div>
			<div class="col-xxl-12">
			<label>Link Imagem(um nome para identificação da imagem):</label>
				<input type="text" name="link_img" class="form-control form-control-sm" size="100" placeholder="Nome de Identificação da IMG">
			</div>
			<div class="row">
				<div class="col-xxl-6">
					<label for="select_anime7">Selecione o NOME do Anime para cadastrar a IMAGEM</label>
						<select name="select_anime7">
						<?php while($exibe7=$consulta7->fetch(PDO::FETCH_ASSOC)) { ?>
						<option value="<?php echo $exibe7['id_anime'];?>"><?php echo $exibe7['nome_anime'];?></option>
						<?php }	?>
					</select>
				</div>
				<div class="col-xxl-5"><hr>
					<button type="submit" class="btn btn-success">Enviar Imagem!</button>
				</div>
			</div>
		</form>
		
<!-- Bloco para inserir as IMAGENS do FILME,  por enquanto selecionar uma imagens por vez -->
<form name="form_img_filme" class="card-body form-control fundo_dark" onsubmit="return validaInputImgFilme()" action="inserir_img_filme.php" method="post" accept-charset="UTF-8" enctype="multipart/form-data">
			<div class="row">
				<div class="col-xxl-12">
					<label>Selecione uma Imagem para o FILME!</label><br>
					<input type="file" name="caminho_img_filme" accept="imgs/filme/*" class="form-control" require>
				</div>
				<div class="col-xxl-12">
					<label>Link Imagem(um nome para identificação da imagem):</label>
					<input type="text" name="link_img_filme" class="form-control" size="100" placeholder="Nome de Identificação da IMG">
				</div>
				<div class="col-xxl-6">
					<label for="select_filme">Selecione o NOME do FILME para cadastrar a IMAGEM</label>
					<select name="select_filme">
						<?php while($exibe_filme=$consulta_filme->fetch(PDO::FETCH_ASSOC)) { ?>
						<option value="<?php echo $exibe_filme['id_filme'];?>"><?php echo $exibe_filme['titulo_filme'];?></option>
						<?php }	?>
					</select>
				</div>
				<div class="col-xxl-6"><hr>
					<button type="submit" class="btn btn-success">Enviar Imagem!</button>
				</div>
			</div>
		</form>

<!-- Bloco para inserir as IMAGENS da SÉRIE,  por enquanto selecionar uma imagens por vez -->
		<form name="form_img_serie" class="card-body form-control fundo_dark" onsubmit="return validaInputImgSerie()" action="inserir_img_serie.php" method="post" accept-charset="UTF-8" enctype="multipart/form-data">
			<div class="row">
				<div class="col-xxl-12">
					<label for="caminho_img_serie">Selecione uma Imagem para a SÉRIE!</label>
					<input type="file" name="caminho_img_serie" accept="imgs/serie/*" class="form-control" require>
				</div>
				<div class="col-xxl-12">
					<label>Link Imagem(um nome para identificação da imagem):</label>
					<input type="text" name="link_img_serie" class="form-control" size="100" placeholder="Nome de Identificação da IMG">
				</div>
				<div class="col-xxl-6">
					<label for="select_serie">Selecione a SÉRIE para cadastrar a IMAGEM</label>
					<select name="select_serie">
					<?php while($exibe_serie=$consulta_serie->fetch(PDO::FETCH_ASSOC)) { ?>
					<option value="<?php echo $exibe_serie['id_serie'];?>"><?php echo $exibe_serie['titulo_serie'];?></option>
					<?php }	?>
					</select>
				</div>
				<div class="col-xxl-6"><hr>
					<button type="submit" class="btn btn-success">Enviar Imagem!</button>
				</div>
			</div>
		</form>
		</div>
	</div>

<!-- Bloco para inserir os dados da OVA do anime------BLOCO OVA----------BLOCO OVA----BLOCO OVA--->
	<div class="card col-md-6 fundo_transp">
		<div class="card-header">
			<a class="collapsed btn btn-primary" data-bs-toggle="collapse" href="#collapseova">Inserir os dados da OVA do anime</a>
		</div>
		<div id="collapseova" class="collapse" data-bs-parent="#accordion">
		<form name="form_inserir_ova" class="card-body form-control fundo_dark" action="inserir_ova.php" method="post" accept-charset="UTF-8" enctype="multipart/form-data">
			<div class="row">
				<div class="col-xxl-6">
					<label for="img_mini_ova">Selecione a Imagem MINI!</label>
					<input type="file" name="img_mini_ova" accept="imgs/serie/*" class="form-control">
				</div>
				<div class="col-xxl-6">
					<label for="titulo_ova">Titulo da OVA:</label>
					<input type="text" name="titulo_ova" class="form-control" size="100" placeholder="Titulo da OVA" autofocus>
				</div>
				<div class="col-xxl-6">
					<label for="subtitulo_ova">Subtitulos e Sinônimos da OVA:</label><br>
					<textarea rows="2" name="subtitulo_ova" class="form-control" placeholder="Subtitulo e Sinônimos"></textarea>
				</div>
				<div class="col-xxl-6">
					<label>Descrição e Enredo da OVA:</label>
					<textarea rows="2" name="enredo_ova" class="form-control" placeholder="Uma breve Descição e o Enredo da OVA"></textarea><br>
				</div>
				<div class="col-xxl-4 border">
					<label>Numero de Episódios:</label>
					<input type="text" name="n_episodios_ova" class="form-control" size="100" placeholder="Episódios da OVA">
				</div>
				<div class="col-xxl-4 border">
					<label>Duração do Episódio:</label>
					<input type="text" name="duracao_ova" class="form-control" size="100" placeholder="Duração (00h:00m:00s)">
				</div>
				<div class="col-xxl-4 border">
					<label>Início da Exibição:</label>
					<input type="text" name="exib_inicio_ova" class="form-control" size="100" placeholder="INICIO (0000ano-00mês-00dia)">
				</div>
				<div class="col-xxl-4 border">
					<label>Fim da Exibição:</label>
					<input type="text" name="exib_fim_ova" class="form-control" size="100">
				</div>
				<div class="col-xxl-4 border">
					<label for="tipo_anime1">OVA - Tipo:</label><br>
					<input type="radio" name="tipo_anime1" value="1" checked>Anime<br>
					<input type="radio" name="tipo_anime1" value="2">Animação<br>
					<input type="radio" name="tipo_anime1" value="3">Animação (CGI)<br>
					<input type="radio" name="tipo_anime1" value="4">Animação (Stop_Motion)<br>
					<input type="radio" name="tipo_anime1" value="5">Live Action<br>
				</div>
				<div class="col-xxl-4 border">
					<label for="select_anime3">Selecione o Anime para cadastrar!</label>
					<select name="select_anime3">
						<?php while($exibe3=$consulta3->fetch(PDO::FETCH_ASSOC)) { ?>
						<option value="<?php echo $exibe3['id_anime'];?>"><?php echo $exibe3['nome_anime'];?></option>
						<?php }	?>
					</select>
				</div>
				<div class="col-xxl-12"><hr>
					<button type="submit" class="btn btn-success">Enviar os Dados OVA!</button>
				</div>
		</div>
		</form>
<!-- Bloco para inserir as IMAGENS da OVA,  por enquanto selecionar uma imagens por vez  IMAGENS da OVA-->
		<form name="form_img_ova" class="card-body form-control fundo_dark" onsubmit="return validaInputImgOva()" action="inserir_img_ova.php" method="post" accept-charset="UTF-8" enctype="multipart/form-data">
		<div class="row">
			<div class="col-xxl-12">
				<label>Selecione uma Imagem para a OVA!</label><br>
				<input type="file" name="caminho_img_ova" accept="imgs/ova/*" class="form-control" require>
			</div>
			<div class="col-xxl-12">
				<label>Link Imagem(um nome para identificação da imagem):</label>
				<input type="text" name="link_img_ova" class="form-control" size="100" placeholder="Nome de Identificação da IMG">
			</div>
			<div class="col-xxl-6">
				<label for="select_ova">Selecione a OVA para cadastrar a IMAGEM</label>
				<select name="select_ova">
				<?php while($exibe_ova=$consulta_ova->fetch(PDO::FETCH_ASSOC)) { ?>
					<option value="<?php echo $exibe_ova['id_ova'];?>"><?php echo $exibe_ova['titulo_ova'];?></option>
				<?php }	?>
				</select>
			</div>
			<div class="col-xxl-6"><hr>
				<button type="submit" class="btn btn-success">Enviar Imagem!</button>
			</div>
		</div>
		</form>
		</div>
	</div>
<!-- Bloco para inserir os dados do ESPECIAL do anime BLOCO ESPECIAL------BLOCO ESPECIAL---BLOCO ESPECIAL-->
	<div class="card col-md-6 fundo_transp">
		<div class="card-header">
			<a class="collapsed btn btn-primary" data-bs-toggle="collapse" href="#collapseespecial">Inserir os dados do ESPECIAL do anime</a>
		</div>
		<div id="collapseespecial" class="collapse" data-bs-parent="#accordion">
		<form name="form_inserir_especial" class="card-body form-control fundo_dark" action="inserir_especial.php" method="post" accept-charset="UTF-8" enctype="multipart/form-data">
			<div class="row">
				<div class="col-xxl-6">
					<label for="img_mini_esp">Selecione a Imagem MINI!</label><br>
					<input type="file" name="img_mini_esp" accept="imgs/especial/*" class="form-control">
				</div>
				<div class="col-xxl-6">
					<label for="titulo_especial">Titulo do ESPECIAL:</label>
					<input type="text" name="titulo_especial" class="form-control" size="100" placeholder="Titulo do Especial">
				</div>
				<div class="col-xxl-6">
					<label for="subtitulo_especial">Subtitulos e Sinônimos do ESPECIAL:</label>
					<textarea rows="2" name="subtitulo_especial" class="form-control" placeholder="Subtitulo e Sinônimos"></textarea>
				</div>
				<div class="col-xxl-6">
					<label>Breve descrição e Enredo do ESPECIAL:</label>
					<textarea name="enredo_especial" class="form-control" placeholder="Uma breve Descição e o Enredo do ESPECIAL"></textarea><br>
				</div>
				<div class="col-xxl-4 border">
					<label>Numero de Episódios:</label>
					<input type="text" name="n_episodios_especial" class="form-control" placeholder="SOMENTE Numeros ">
				</div>
				<div class="col-xxl-4 border">
					<label>Duração do Episódio:</label>
					<input type="text" name="duracao_especial" class="form-control" size="100" placeholder="00h:00m:00s">
				</div>
				<div class="col-xxl-4 border">
					<label>Início da Exibição:</label>
					<input type="text" name="exib_inicio_especial" class="form-control" size="100" placeholder="0000ano-00mês-00dia">
				</div>
				<div class="col-xxl-4 border">
					<label>Fim da Exibição:</label>
					<input type="text" name="exib_fim_especial" class="form-control" placeholder="Data do fim (0000ano-00mês-00dia)">
				</div>
				<div class="col-xxl-4 border">
					<label for="tipo_anime3">ESPECIAL - Tipo:</label><br>
					<input type="radio" name="tipo_anime3" value="1" checked>Anime<br>
					<input type="radio" name="tipo_anime3" value="2">Animação<br>
					<input type="radio" name="tipo_anime3" value="3">Animação (CGI)<br>
					<input type="radio" name="tipo_anime3" value="4">Animação (Stop_Motion)<br>
					<input type="radio" name="tipo_anime3" value="5">Live Action<br>
				</div>
				<div class="col-xxl-4  border">
					<label for="select_anime4">Selecione o Anime para cadastrar:</label>
					<select name="select_anime4">
					<?php while($exibe4=$consulta4->fetch(PDO::FETCH_ASSOC)) { ?>
					<option value="<?php echo $exibe4['id_anime'];?>"><?php echo $exibe4['nome_anime'];?></option>
					<?php }	?>
					</select>
				</div>
				<div class="col-xxl-12"><hr>
					<button type="submit" class="btn btn-success">Enviar Dados do ESPECIAL!</button>
				</div>			
			</div>
		</form>
<!-- Bloco para inserir as IMAGENS do ESPECIAL,  por enquanto selecionar uma imagens por vez -->
		<form name="form_img_especial" class="card-body form-control fundo_dark" onsubmit="return validaInputImgEspecial()" action="inserir_img_especial.php" method="post" accept-charset="UTF-8" enctype="multipart/form-data">
			<div class="row">
				<div class="col-xxl-12">
					<label>Selecione uma Imagem para o ESPECIAL!</label><br>
					<input type="file" name="caminho_img_especial" accept="imgs/especial/*" class="form-control" require>
				</div>
				<div class="col-xxl-12">
					<label>Link Imagem(um nome para identificação da imagem):</label>
					<input type="text" name="link_img_especial" class="form-control" size="100" placeholder="Nome de Identificação da IMG">
				</div>
				<div class="col-xxl-6">
					<label for="select_especial">Selecione o ESPECIAL para cadastrar a IMAGEM</label>
					<select name="select_especial">
					<?php while($exibe_especial=$consulta_especial->fetch(PDO::FETCH_ASSOC)) { ?>
						<option value="<?php echo $exibe_especial['id_especial'];?>"><?php echo $exibe_especial['titulo_especial'];?></option>
					<?php }	?>
					</select>
				</div>
				<div class="col-xxl-6"><hr>
					<button type="submit" class="btn btn-success">Enviar IMAGEM!</button>
				</div>
			</div>
		</form>
		</div>
	</div>
<!-- Bloco para inserir os dados da ONA do anime---BLOCO ONA-------BLOCO ONA-------BLOCO ONA -->
	<div class="card col-md-6 fundo_transp">
		<div class="card-header">
			<a class="collapsed btn btn-primary" data-bs-toggle="collapse" href="#collapseona">Inserir os dados da ONA do anime</a>
		</div>
		<div id="collapseona" class="collapse" data-bs-parent="#accordion">
		<form name="form_inserir_ona" class="card-body form-control fundo_dark" action="inserir_ona.php" method="post" accept-charset="UTF-8" enctype="multipart/form-data">
			<div class="row">
				<div class="col-xxl-6">
					<label for="img_mini_ona">Selecione a Imagem MINI!</label><br>
					<input type="file" name="img_mini_ona" accept="imgs/ona/*" class="form-control">
				</div>
				<div class="col-xxl-6">
					<label for="titulo_ona">Titulo da ONA:</label>
					<input type="text" name="titulo_ona" class="form-control" size="100" placeholder="Titulo da ONA">
				</div>
				<div class="col-xxl-6">
					<label for="subtitulo_ona">Subtitulos e Sinônimos da ONA:</label>
					<textarea rows="2" name="subtitulo_ona" class="form-control" placeholder="Subtitulo e Sinônimos da ONA"></textarea>
				</div>
				<div class="col-xxl-6">
					<label>Breve descrição e Enredo da ONA:</label>
					<textarea rows="2" name="enredo_ona" class="form-control" placeholder="Uma breve Descição e o Enredo da ONA"></textarea>
				</div>
				<div class="col-xxl-4 border">
					<label>Numero de Episódios:</label>
					<input type="text" name="n_episodios_ona" class="form-control" size="100" placeholder="Numero de Episódios da ONA">
				</div>
				<div class="col-xxl-4 border">	
					<label>Duração do Episódio:</label>
					<input type="text" name="duracao_ona" class="form-control" size="100" placeholder="00h:00m:00s">
				</div>
				<div class="col-xxl-4 border">
					<label>Início da Exibição:</label>
					<input type="text" name="exib_inicio_ona" class="form-control" size="100" placeholder="0000ano-00mês-00dia">
				</div>
				<div class="col-xxl-4 border">	
					<label>Fim da Exibição:</label>
					<input type="text" name="exib_fim_ona" class="form-control" size="100" placeholder="0000ano-00mês-00dia">
				</div>
				<div class="col-xxl-4 border">
					<label for="tipo_anime4">ONA - Tipo:</label><br>
					<input type="radio" name="tipo_anime4" value="1" checked>Anime<br>
					<input type="radio" name="tipo_anime4" value="2">Animação<br>
					<input type="radio" name="tipo_anime4" value="3">Animação (CGI)<br>
					<input type="radio" name="tipo_anime4" value="4">Animação (Stop_Motion)<br>
					<input type="radio" name="tipo_anime4" value="5">Live Action<br>
				</div>
				<div class="col-xxl-4 border">
					<label for="select_anime5">Selecione o Anime para cadastrar a ONA</label>
					<select name="select_anime5">
						<?php while($exibe5=$consulta5->fetch(PDO::FETCH_ASSOC)) { ?>
						<option value="<?php echo $exibe5['id_anime'];?>"><?php echo $exibe5['nome_anime'];?></option>
						<?php }	?>
					</select>
				</div>
				<div class="col-xxl-12"><hr>
					<button type="submit" class="btn btn-success">Enviar Dados da ONA!</button>
				</div>
			</div>
		</form>
<!-- Bloco para inserir as IMAGENS da ONA,  por enquanto selecionar uma imagens por vez BLOCO ONA-->
		<form name="form_img_ona" class="card-body form-control fundo_dark" onsubmit="return validaInputImgOna()" action="inserir_img_ona.php" method="post" accept-charset="UTF-8" enctype="multipart/form-data">
			<div class="row">
				<div class="col-xxl-12">
					<label>Selecione uma Imagem para a ONA!</label><br>
					<input type="file" name="caminho_img_ona" accept="imgs/ona/*" class="form-control" require>
				</div>
				<div class="col-xxl-12">
					<label>Link Imagem(um nome para identificação da imagem):</label>
					<input type="text" name="link_img_ona" class="form-control" size="100" placeholder="Nome de Identificação da IMG">
				</div>
				<div class="col-xxl-6">
					<label for="select_ona">Selecione o ONA para cadastrar a IMAGEM</label>
					<select name="select_ona">
						<?php while($exibe_ona=$consulta_ona->fetch(PDO::FETCH_ASSOC)) { ?>
						<option value="<?php echo $exibe_ona['id_ona'];?>"><?php echo $exibe_ona['titulo_ona'];?></option>
						<?php }	?>
					</select>
				</div>
				<div class="col-xxl-6"><hr>
					<button type="submit" class="btn btn-success">Enviar Imagem!</button>
				</div>
			</div>
		</form>
		</div>
	</div>
</div><!-- Fecho a ROW do inicio -->
</main>
</body>
</html>