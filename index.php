<?php
session_start(); //deve ser a primeira linha de codigo da pagina(DICA), antes mesmo dos comentários kkkk
//Limpar o buffer de saida
ob_start();
// conecta com o banco de dados
include_once('conecta.php');
// include_once('consulta_count.php');
//CONSULTA na tabela ANIME JOIN IMAGEM ordenado por nome_anime
// $consulta_anime = $conecta->query("SELECT * FROM anime AS a LEFT JOIN imagem AS img ON a.id_anime = img.anime_id_anime ORDER BY nome_anime ASC");
?>
<!doctype html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="keywords" content="animação, anime, animação 3d, filmes anime, ecchi, desenhos animados">
	<title>Animação</title>
	<!-- BOOTSTRAP CSS-->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
	<!-- Favicon Imagem -->
	<link rel="icon" type="image/x-icon" sizes="128x128" href="imgs/favicon.ico">
	<!-- Meu CSS INDEX -->
	<link rel="stylesheet" type="text/css" href="css/index.css">
	<link rel="stylesheet" type="text/css" href="css/geral_style.css">
</head>
<body>
	<!--	DIV VIDEO video_dragao (loop) FOI RETIRADO pois estava consumindo muita MEMÓRIA 
<div class="video_dragao">
	<video playsinline autoplay  muted>
		<source src="video/dragon_black_proto.webm" type="video/webm">
	</video>
</div> -->
<?php
	include_once 'navbar_top.php';
	include_once 'header.php';
?>
	<!-- MAIN -> DIV classe CONTAINER-FLUID - CAMPO de BUSCA -->
	<main class="container">
		<div class="row text-center fundo_black_80"><!-- ROW da parte CENTRAL  -->
			<div class="col-xxl-10 col-xl-10 col-lg-10 container"><!-- COLUNA CENTRAL  -->
				<!-- coluna do campo Busca por letras -->
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
				<!-- Bloco de codigo de inserção do LISTAR.PHP -->
				<div class="row text-center">
					<span id="msgAlerta"></span>
				</div>
				<div class="row text-center">
					<span class="listar-animes"></span>
				</div>
				<!-- Inicio do bloco da janela MODAL para fazer LOGIN -->
				<div class="modal fade fundo_black_40" id="Modal_login" tabindex="-1" aria-labelledby="Modal_loginLabel" aria-hidden="true">
				<div class="modal-dialog">
				<div class="modal-content fundo_black_80">
				<div class="row position-relative">
					<div class="col-1 position-absolute top-0 end-0">
					<button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal" aria-label="Close">X</button>
					</div>
				</div>
				<div class="modal-body">
					<!--Bloco da DIV para o conteudo do Modal fazer Login -->
					<div class="container">
						<div class="row justify-content-center">
						<div class="col-lg-12 col-xl-12 col-xxl-12 fundo_black_40">
							<fieldset>
								<legend>Fazer Login</legend>
								<form class="" method="post" action="validaUsuario.php" name="logon">
									<div class="input-group input-group-sm mb-3">
										<span class="input-group-text" id="inputGroup-sizing-sm"> Email: </span>
										<input name="email" type="email" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required id="email">
									</div>
									<div class="input-group input-group-sm mb-3">
										<span class="input-group-text" id="inputGroup-sizing-sm"> Senha: </span>
										<input name="senha" type="password" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required id="senha">
									</div>			
								<button type="submit" class="meu_btn">Entrar</button>
								</form>
							</fieldset>
							<div class="modal-footer">
								<fieldset>
									<legend>Ainda não sou cadastrado!</legend>
									<div class="form-group">
									<!-- <a href="form_usuario.php"> -->
										<button type="submit" class="meu_btn" data-bs-target="#Modal_cadastrar" data-bs-toggle="modal">Cadastrar Novo Usuário</button>
									<!-- </a> -->
									</div>
								</fieldset>
								<fieldset>
									<legend>Recuperar Senha!</legend>
									<div class="form-group">
										<!-- <a href="esqueci_senha.php"> -->
										<button type="submit" class="meu_btn" data-bs-target="#Modal_recuperarSenha" data-bs-toggle="modal">Esqueci minha senha!</button>
									<!-- </a> -->
									</div>
								</fieldset>
							</div>
						</div>
						</div>
					</div>
				</div>
				</div>
				</div>
				</div>
				<!-- Modal para CADASTRAR no usuário -->
				<div class="modal fade fundo_black_40" id="Modal_cadastrar" aria-hidden="true" aria-labelledby="Modal_cadastrarLabel" tabindex="-1">
					<div class="modal-dialog modal-dialog-centered">
						<div class="modal-content fundo_black_80">
						<div class="row position-relative">
							<div class="col-1 position-absolute top-0 end-0">
								<button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal" aria-label="Close">X</button>
							</div>
						</div>
						<div class="modal-body">
							<fieldset>
							<legend>Cadastrar um Novo Usuário</legend>
								<form method="post" action="inserirUsuario.php" name="logon">
									<div class="form-group">
											<label for="nome">Nome</label>
											<input name="nome" type="text" class="form-control" required id="nome">
									</div>
									<div class="form-group">
											<label for="apelido">Apelido</label>
											<input name="apelido" type="text" class="form-control" required id="apelido">
									</div>
									<div class="form-group">
											<label for="email">E-mail</label>
											<input name="email" type="email" class="form-control" required id="email">
									</div>
									<div class="form-group">
											<label for="senha">Senha</label>
											<input name="senha" type="password" class="form-control" required id="senha">
									</div>
									<div class="form-group">
											<label for="endereco">Endereço</label>
											<textarea name="endereco" rows="2" class="form-control" id="endereco"></textarea>
									</div>
									<div class="form-group">
											<label for="telefone">Telefone</label>
											<input name="telefone" type="text" class="form-control" id="telefone">
									</div>
									<button type="submit" class="meu_btn">
										<span class="glyphicon glyphicon-pencil"> Cadastrar</span>
									</button>
								</form>
							</fieldset>
						</div>
						<div class="modal-footer">
							<button class="btn btn-primary" data-bs-target="#Modal_recuperarSenha" data-bs-toggle="modal">RECUPERAR A SENHA</button>
						</div>
						</div>
					</div>
					</div>
					<div class="modal fade" id="Modal_recuperarSenha" aria-hidden="true" aria-labelledby="Modal_recuperarSenhaLabel2" tabindex="-1">
					<div class="modal-dialog modal-dialog-centered">
						<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="Modal_recuperarSenhaLabel2">RECUPERAR A SENHA</h5>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">
							AQUI VAI O FORM PARA RECUPERAR A SENHA
						</div>
						<div class="modal-footer">
							<button class="btn btn-primary" data-bs-target="#Modal_login" data-bs-toggle="modal">Login</button>
						</div>
						</div>
					</div>
					</div>
					<a class="btn btn-primary" data-bs-toggle="modal" href="#Modal_login" role="button">Login</a>

		</div><!-- Fechamento da COLUNA CENTRAL  -->
	<?php
	include_once('side_bar.php');
	?>
		</div><!-- Fechamento da ROW da parte CENTRAL  -->
	</main>
	<?php
	include_once('rodape.php');
	?>
<!-- BOOTSTRAP JQUERRY + POPPERJS-->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
<!-- meu arquivo JavaScript Custom.js para o arquivo listar-animes -->
<script src="js/custom.js"></script>
<!-- <script src="js/categorias.js"></script> -->
</body>
</html>