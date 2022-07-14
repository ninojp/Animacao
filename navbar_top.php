<!-- NAV: classe NAVBAR onde vão ficar o todos os elementos -->
<nav class="navbar navbar-expand-lg fundo_black_80 navbar-dark fixed-top navbar-text">
	<div class="container d-flex">
   		<!--DIV do brand - DA IMAGEM DE LOGO-->
       	<div class="">
            <a class="navbar-brand" href="index.php">
                <img src="imgs/Logo-Dtudo_102x40.png" style="max-height: 40px;"></a>
       	</div>
        <!----- Bloco PHP + HTML para o fazer a o LOGIN.PHP ------------>
		<?php  if (empty($_SESSION['id'])) { ?>
        <a class="" href="login.php" alt="Link para Login" title="Link Log">
        <div class="d-inline col-sm-1 col-md-1 col-lg-1 col-xl-1 col-xxl-1">
        <img class="" src="imgs/login.png">
        </div>
        <div class="d-inline col-sm-2 col-md-2 col-lg-2 col-xl-2 col-xxl-2"><span>Login</span></div></a>
        <!-- SE USUARIO ESTIVER LOGADO como usuário comum --------->
        <?php } else {
            if($_SESSION['adm']==0) {
            $consulta_user=$conecta->query("SELECT nome FROM usuario WHERE id_usuario='$_SESSION[id]'");
            $exibe_user=$consulta_user->fetch(PDO::FETCH_ASSOC); ?>
            <div class="nav-item dropdown justify-content-end">
                <a class="dropdown-toggle nav-link" role="button" data-bs-toggle="dropdown"><?php echo $exibe_user['nome'];?></a>
                <ul class="dropdown-menu bg-dark">
                    <li><a class="dropdown-item nav-link" href="sair.php"><img class="" src="imgs/logout.png">Logout</a></li>
                </ul>
            </div>
            <!-- SE ESTIVER LOGADO COMO ADMINISTRADOR-->
                    <?php } else { ?>
                    <div class="nav-item dropdown justify-content-end">
                        <a class="dropdown-toggle nav-link" role="button" data-bs-toggle="dropdown">NinoJP</a>
                        <ul class="dropdown-menu bg-dark">
                            <li><a class="dropdown-item nav-link" href="anime_inserir_form.php">Inserir</a></li>
                            <li><a class="dropdown-item nav-link" href="anime_listar.php">Alterar</a></li>
                            <li><a class="dropdown-item nav-link" href="sair.php"><img class="" src="imgs/logout.png">Logout</a></li>
                        </ul>
          			</div>
                    <?php } } ?>
            <!--BLOCO BOTÃO TOGGLER -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar_top" aria-controls="navbar_top" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
        	<!--------------- DIV - PRINCIPAL DO BLOCO DE MENU collapse ------------->
        	<div class="col-sm-2 col-md-3 col-lg-3 col-xl-3 col-xxl-3 collapse navbar-collapse" id="navbar_top">
                    <!--BLOCO PARA ACESSO RAPIDO DE INSERÇÃO E EXCLUSÃO-->
                    <div class="nav-item col-sm-2 col-md-2 col-lg-2 col-xl-2 col-xxl-2">
                        <a class="nav-link" href="anime_inserir_form.php">Inserir</a>
                    </div>
                    <div class="nav-item col-sm-2 col-md-2 col-lg-2 col-xl-2 col-xxl-2">
                        <a class="nav-link" href="anime_listar.php">Alterar</a>
                    </div>
                    <!-- Menu do botão dropdown ANIMES - Filmes - Ecchi BOTÃO DROPDOWN ----- -->
                    <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2 col-xxl-2 dropdown justify-content-end">
                        <a class="dropdown-toggle" role="button" data-bs-toggle="dropdown">Animes</a>
                        <ul class="dropdown-menu bg-dark">
                            <li><a class="dropdown-item text-white" href="#">Filmes</a></li>
                            <li><a class="dropdown-item text-white" href="animes_ecchi.php">Ecchi(+16)</a></li>
                        </ul>
          			</div>
            </div>
         <!-- Bloco do FORM de BUSCA -->
        <div class="col-sm-4 col-md-4 col-lg-3 col-xl-4 col-xxl-4 justify-content-end">
            <form class="form-control d-flex bg-dark" method="get" action="form_busca.php" name="form_busca" id="form_busca" role="search" style="max-height: 35px;">
               <input class="form-control form-sm me-3" type="text" name="input_busca" placeholder="Pesquisar por nome" style="max-height: 35px;">
               <button class="btn btn-primary btn-sm" type="submit" name="input_submit" style="max-height: 35px;"><span class="material-symbols-outlined">search</span></button>
            </form>
        </div>
	</div><!-- fechamento da DIV container -->
</nav><!-- fecha a /NAV -->