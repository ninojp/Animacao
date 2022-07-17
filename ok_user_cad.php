<?php
session_start(); //deve ser a primeira linha de codigo da pagina(DICA), antes mesmo dos comentários kkkk
//Limpar o buffer de saida
ob_start();
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
	<title>Usuário Cadastrado com sucesso!</title>
	<!-- BOOTSTRAP CSS-->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
	<!-- Favicon Imagem -->
	<link rel="icon" type="image/x-icon" sizes="128x128" href="imgs/favicon.ico">
	<!-- Meu CSS INDEX -->
	<link rel="stylesheet" type="text/css" href="css/index.css">
	<link rel="stylesheet" type="text/css" href="css/geral_style.css">
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
			<!--Bloco da DIV para inserção do conteúdo novo-->
			<div class="row">
				<div class="col-8">
					<fieldset>
					<legend>Usuário Cadastrado!</legend>
						<div class="form-group">
							<h3>Usuário Cadastrado com sucesso!</h3>
						</div>
						<div class="form-group">
							<p>Fazer o Login?</p>
							<button class="meu_btn" data-bs-target="#Modal_login" data-bs-toggle="modal">Login</button>
						</div>
					</fieldset>
					<fieldset>
					<div class="form-group">
						<button type="submit" class="meu_btn" data-bs-target="#Modal_cadastrar" data-bs-toggle="modal">
						Cadastrar Outro!</button><br><br>
						<button type="submit" class="meu_btn" data-bs-target="#Modal_recuperarSenha" data-bs-toggle="modal">
						Esqueci minha senha!</button>
					</div>
					</fieldset>
				</div>
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
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
</body>
</html>