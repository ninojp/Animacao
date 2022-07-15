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
        <a class="nav-link" href="login.php" alt="Link para Login" title="Link Log">
        <div class="d-inline"><img class="" src="imgs/login.png">
        </div>
        <div class="d-inline"><span>Login</span></div></a>
        <!-- SE USUARIO ESTIVER LOGADO como usuário comum --------->
        <?php } else {
            if($_SESSION['adm']==0) {
            $consulta_user=$conecta->query("SELECT nome FROM usuario WHERE id_usuario='$_SESSION[id]'");
            $exibe_user=$consulta_user->fetch(PDO::FETCH_ASSOC); ?>
            <div class="nav-item dropdown float-start">
                <a class="dropdown-toggle nav-link" role="button" data-bs-toggle="dropdown"><?php echo $exibe_user['nome'];?></a>
                <ul class="dropdown-menu bg-dark">
                    <li><a class="dropdown-item nav-link" href="sair.php"><img class="" src="imgs/logout.png">Logout</a></li>
                </ul>
            </div>
            <!-- SE ESTIVER LOGADO COMO ADMINISTRADOR-->
            <?php } else { ?>
            <div class="dropdown">
                <a class="dropdown-toggle nav-link" role="button" data-bs-toggle="dropdown">NinoJP</a>
                <ul class="dropdown-menu dropdown-menu-dark fundo_black_80" aria-labelledby="dropdownMenuButton2">
                    <li><a class="dropdown-item nav-link fundo_black_80" href="anime_inserir_form.php" target="_blank">Inserir</a></li>
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
                        <a class="dropdown-toggle nav-link" role="button" data-bs-toggle="dropdown">Tipo</a>
                        <ul class="dropdown-menu dropdown-menu-dark fundo_black_80">
                            <li><a class="dropdown-item nav-link" href="#" target="_blank">Animação</a></li>
                            <li><a class="dropdown-item nav-link" href="#" target="_blank">Animação CGI</a></li>
                            <li><a class="dropdown-item nav-link" href="#" target="_blank">Animação Stop Motion</a></li>
                            <li><a class="dropdown-item nav-link" href="#" target="_blank">Live Action</a></li>
                        </ul>
          			</div>
            </div>
         <!-- Bloco do FORM de BUSCA -->
        <div class="col-sm-4 col-md-4 col-lg-3 col-xl-4 col-xxl-4 justify-content-end">
            <form class="form-control d-flex bg-dark" method="get" action="form_busca.php" name="form_busca" id="form_busca" role="search">
               <input class="form-control form-sm me-3" type="text" name="input_busca" placeholder="Pesquisar por nome">
               <button class="btn btn-primary btn-sm" type="submit" name="input_submit"><img src="imgs/pesquisar-26_mini.png"></button>
            </form>
        </div>
	</div><!-- fechamento da DIV container -->
</nav><!-- fecha a /NAV -->