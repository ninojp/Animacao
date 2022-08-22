<?php
// conecta com o banco de dados
include_once('conecta.php');
?>
<head>
<!-- BOOTSTRAP CSS-->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<!-- Inserção do CSS GERAL da maioria das paginas -->
<link rel="stylesheet" type="text/css" href="css/geral_style.css">
</head>
<!-- NAV: classe NAVBAR onde vão ficar o todos os elementos -->
<nav class="navbar navbar-expand-lg fundo_black_80 navbar-dark fixed-top navbar_meu">
	<div class="container d-flex">
   		<!--DIV do brand - DA IMAGEM DE LOGO-->
       	<div class="">
            <a class="navbar-brand me-0" href="index.php">
                <img src="imgs/Logo-Dtudo_102x40.png" style="max-height: 45px;"></a>
       	</div>
        <!----- Bloco PHP + HTML para o fazer a o LOGIN.PHP ------------>
		<?php  if (empty($_SESSION['id'])) { ?>
        <div class="dropdown">
                <a class="dropdown-toggle nav-link" role="button" data-bs-toggle="dropdown" alt="Link para Login" title="Link para Login">
        <div class="d-inline"><img class="ms-2" src="imgs/login.png">
        </div>
        <div class="d-inline fonte_small"><span>Login</span></div></a>
                <ul class="dropdown-menu dropdown-menu-dark fundo_black_80 fonte_small" aria-labelledby="dropdownMenuButton2">
                    <li><a class="dropdown-item nav-link" href="" data-bs-toggle="modal" data-bs-target="#Modal_login">Fazer Login</a></li>
                    <li><a class="dropdown-item nav-link" href="" data-bs-toggle="modal" data-bs-target="#Modal_cadastrar">Cadastrar</a></li>
                    <li><a class="dropdown-item nav-link" href="" data-bs-toggle="modal" data-bs-target="#Modal_recuperarSenha">Recuperar Senha</a></li>
                </ul>
        </div>
        <!-- SE USUARIO ESTIVER LOGADO como usuário comum --------->
        <?php } else {
            if($_SESSION['adm']==0) {
            $consulta_user=$conecta->query("SELECT nome FROM usuario WHERE id_usuario='$_SESSION[id]'");
            $exibe_user=$consulta_user->fetch(PDO::FETCH_ASSOC); ?>
            <div class="nav-item dropdown float-start fonte_small ms-2">
                <a class="dropdown-toggle nav-link" role="button" data-bs-toggle="dropdown"><?php echo $exibe_user['nome'];?></a>
                <ul class="dropdown-menu dropdown-menu-dark fundo_black_80 fonte_small">
                    <li><a class="dropdown-item nav-link" href="sair.php"><img class="" src="imgs/logout.png">Logout</a></li>
                </ul>
            </div>
            <!-- SE ESTIVER LOGADO COMO ADMINISTRADOR-->
            <?php } else { ?>
            <div class="dropdown fonte_small ms-2">
                <a class="dropdown-toggle nav-link" role="button" data-bs-toggle="dropdown">NinoJP</a>
                <ul class="dropdown-menu dropdown-menu-dark fundo_black_80 fonte_small" aria-labelledby="dropdownMenuButton2">
                    <li><a class="dropdown-item nav-link" href="anime_inserir_form.php" target="_blank">Inserir</a></li>
                    <li><a class="dropdown-item nav-link" href="anime_listar.php" target="_blank">Alterar</a></li>
                    <li><a class="dropdown-item nav-link" href="sair.php"><img class="" src="imgs/logout.png">Logout</a></li>
                </ul>
            </div>
            <?php } } ?>
            <!--BLOCO BOTÃO TOGGLER -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar_top" aria-controls="navbar_top" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
        	<!--------------- DIV - PRINCIPAL DO BLOCO DE MENU collapse ------------->
        	<div class="collapse navbar-collapse" id="navbar_top">
                    <!--BLOCO PARA ACESSO RAPIDO DE INSERÇÃO E EXCLUSÃO-->
                    <div class="nav-item ps-5">
                        <a class="nav-link" href="index.php">Animes</a>
                    </div>
                    <div class="nav-item">
                        <a class="nav-link" href="series.php">Séries</a>
                    </div>
                    <div class="nav-item">
                        <a class="nav-link" href="filmes.php">Filmes</a>
                    </div>
                    <div class="nav-item">
                        <a class="nav-link" href="ovas.php">Ovas</a>
                    </div>
                    <div class="nav-item">
                        <a class="nav-link" href="onas.php">Onas</a>
                    </div>
                    <div class="nav-item">
                        <a class="nav-link" href="especiais.php">Especiais</a>
                    </div>
                    <!-- Menu do botão dropdown ANIMES - Filmes - Ecchi BOTÃO DROPDOWN ----- -->
                    <div class="nav-item dropdown justify-content-end">
                        <a class="dropdown-toggle nav-link pe-5" role="button" data-bs-toggle="dropdown">Tipo</a>
                        <ul class="dropdown-menu dropdown-menu-dark fundo_black_80">
                            <li><a class="dropdown-item nav-link" href="#" target="_blank">Animação</a></li>
                            <li><a class="dropdown-item nav-link" href="#" target="_blank">Animação CGI</a></li>
                            <li><a class="dropdown-item nav-link" href="#" target="_blank">Animação Stop Motion</a></li>
                            <li><a class="dropdown-item nav-link" href="#" target="_blank">Live Action</a></li>
                        </ul>
          			</div>
            </div>
         <!-- Bloco do FORM de BUSCA -->
        <div class="col-sm-3 col-md-3 col-lg-3 col-xl-3 col-xxl-3">
            <form class="form-control d-flex fundo_black_40" method="POST" action="form_busca.php" name="form_busca" id="form_busca">
				<?php
					$pesquisar = "";
					if(isset($recebe_busca['input_busca'])){
					$pesquisar = $recebe_busca['input_busca'];
					}
				?>
               <input class="form-control form-sm me-3" type="text" name="input_busca" placeholder="Pesquise por PALAVRAS" value="<?php echo $pesquisar; ?>">
               <button class="btn btn-primary btn-sm" type="submit" name="input_submit"><img src="imgs/pesquisar-26_mini.png"></button>
            </form>
        </div>
	</div><!-- fechamento da DIV container -->


</nav><!-- fecha a /NAV -->
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
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
