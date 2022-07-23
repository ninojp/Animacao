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
	<!-- MAIN -> DIV classe CONTAINER-FLUID -->
	<main class="container">
		<div class="row text-center fundo_black_80"><!-- ROW da parte CENTRAL  -->
			<div class="col-xxl-10 col-xl-10 col-lg-10 container"><!-- COLUNA CENTRAL  -->
				<!-- Bloco do campo de LISTAR por LETRA -->
				<?php
					include_once ('listar_letras.php');
				?>
				<!-- Bloco de codigo de inserção do LISTAR.PHP -->
				<div class="row text-center">
					<span id="msgAlerta"></span>
				</div>
				<div class="row text-center">
					<span class="listar-animes"></span>
				</div>
				<!-- Inicio do bloco da janela MODAL para fazer LOGIN -->
				<div class="modal fade fundo_black_40" id="Modal_login" tabindex="-1" aria-labelledby="Modal_loginLabel" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content fundo_black_80">
				<div class="row position-relative">
					<div class="col-1 position-absolute top-0 end-0">
					<button type="button" class="meu_btn" data-bs-dismiss="modal" aria-label="Close">X</button>
					</div>
				</div>
				<div class="modal-body">
					<div class="container">
						<div class="row justify-content-center">
						<div class="col-lg-12 col-xl-12 col-xxl-12 fundo_black_40"><br>
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
							</fieldset><br>
								<legend class="legend2">Ainda não sou cadastrado!</legend>
								<div class="form-group">
									<button type="submit" class="meu_btn" data-bs-target="#Modal_cadastrar" data-bs-toggle="modal">Cadastrar Novo Usuário</button>
								</div><br>
								<legend class="legend2">Recuperar Senha!</legend>
								<div class="form-group">
									<button type="submit" class="meu_btn" data-bs-target="#Modal_recuperarSenha" data-bs-toggle="modal">Esqueci minha senha!</button>
								</div>
							</div>
						</div>
					</div>
				</div>
				</div>
				</div>
				</div>
				<!-- Modal para CADASTRAR NOVO usuário -->
				<div class="modal fade fundo_black_40" id="Modal_cadastrar" aria-hidden="true" aria-labelledby="Modal_cadastrarLabel" tabindex="-1">
					<div class="modal-dialog modal-dialog-centered">
						<div class="modal-content fundo_black_80">
						<div class="row position-relative">
							<div class="col-1 position-absolute top-0 end-0">
								<button type="button" class="meu_btn" data-bs-dismiss="modal" aria-label="Close">X</button>
							</div>
						</div>
						<div class="modal-body"><br>
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
									<button type="submit" class="meu_btn mt-4">Cadastrar</button>
								</form>
							</fieldset>
						</div>
						<div class="modal-footer">
							<button type="submit" class="meu_btn" data-bs-target="#Modal_recuperarSenha" data-bs-toggle="modal">
										Recuperar Senha</button><br>
							<button class="meu_btn" data-bs-target="#Modal_login" data-bs-toggle="modal">Login</button>
						</div>
						</div>
					</div>
					</div>
					<!-- Modal para RECUPERAR A SENHA -->
					<div class="modal fade fundo_black_40" id="Modal_recuperarSenha" aria-hidden="true" aria-labelledby="Modal_recuperarSenhaLabel2" tabindex="-1">
					<div class="modal-dialog modal-dialog-centered">
						<div class="modal-content fundo_black_80">
						<div class="row position-relative">
							<div class="col-1 position-absolute top-0 end-0">
								<button type="button" class="meu_btn" data-bs-dismiss="modal" aria-label="Close">X</button>
							</div>
						</div><br>
						<div class="modal-body">
						<fieldset>
							<legend>Para Recuperar sua senha:</legend>
								<div class="form-group">
									<div class="form-group">
										<p>Basta digite o e-mail cadastrado no campo abaixo</p>
									</div>
									<div class="form-group">
									<form method="post" action="enviarEmail.php" name="logon">
										<div class="form-group">
											<input name="email" type="email" class="form-control" required id="email">
										</div>
										<div class="form-group">
										<p>Sua senha será enviada para o seu e-mail</p>
										<button type="submit" class="meu_btn">Enviar</button>
										</div>
									</form>
									</div>
								</div>
						</fieldset>
						</div>
						<div class="modal-footer">
							<button type="submit" class="meu_btn" data-bs-target="#Modal_cadastrar" data-bs-toggle="modal">
										Novo cadastro</button><br>
							<button class="meu_btn" data-bs-target="#Modal_login" data-bs-toggle="modal">Login</button>
						</div>
						</div>
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
<!-- BOOTSTRAP JQUERRY + POPPERJS-->

<!-- meu arquivo JavaScript Custom.js para o arquivo listar-animes -->
<script src="js/custom.js"></script>
<!-- <script src="js/categorias.js"></script> -->
</body>
</html>