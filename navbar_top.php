<!-- NAV: classe NAVBAR onde vão ficar o todos os elementos -->
<nav class="navbar navbar-expand-lg fundo_black_80 navbar-dark fixed-top navbar-text">
	<div class="container">
<!--		<div class="col-xxl-12 d-flex">-->
    		<!--BLOCO DA IMAGEM DE LOGO-->
        	<div class="col-sm-2 col-md-2 col-lg-2 col-xl-2 col-xxl-2">
            <a class="navbar-brand" href="index.php">
                <img src="imgs/Logo-Dtudo_102x40.png" style="max-height: 35px;"></a>
        	</div>
            <!--BLOCO BOTÃO TOGGLER -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar_top" aria-controls="navbar_top" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
        	<!--------------- DIV -> LOGIN  + o MENU ANIME ------------->
        	<div class="col-sm-4 col-md-4 col-lg-4 col-xl-6 col-xxl-6 collapse navbar-collapse" id="navbar_top">
			<div class="row text-center">
				<div class="col-xxl-12">
					<div class="nav-item col-xxl-12 d-flex">
                        <!----- Bloco PHP + HTML para o -> LOGIN.PHP ---------------------->
                        <?php  if (empty($_SESSION['id'])) { ?>
                        <a class="nav-link" href="login.php" alt="Link para Login" title="Link Log">
                        <span class="material-symbols-outlined" style="text-decoration-color: #0d6efd;">login</span><span>Login</span>
						</a>
                     </div>
                    <!-- SE USUARIO SE ESTIVER LOGADO SEM ADMINISTRADOR-->
                    <?php } else {
                            if($_SESSION['adm']==0) {
                            $consulta_user=$conecta->query("SELECT nome FROM usuario WHERE id_usuario='$_SESSION[id]'");
                            $exibe_user=$consulta_user->fetch(PDO::FETCH_ASSOC); ?>
                    <a class="nav-link" href="sair.php">
                    <div class="nav-item col-sm-3 col-md-3 col-lg-3 col-xl-3 col-xxl-4"><?php echo $exibe_user['nome'];?></div>
                    <div class="nav-item col-sm-1 col-md-1 col-lg-1 col-xl-1 col-xxl-1"><span class="material-symbols-outlined">logout</span></div></a>
                    <!-- SE ESTIVER LOGADO COMO ADMINISTRADOR-->
                    <?php } else { ?>
                    <div class="nav-item col-sm-3 col-md-3 col-lg-3 col-xl-6 col-xxl-3">
                        <a class="nav-link" href="anime_listar.php"> NinoJP</a>
                    </div>
                    <div class="nav-item col-sm-3 col-md-3 col-lg-3 col-xl-3 col-xxl-1">
                        <a class="nav-link" href="sair.php"><span class="material-symbols-outlined">logout</span></a>
                    </div>
                    <!--BLOCO PARA ACESSO RAPIDO DE INSERÇÃO E EXCLUSÃO-->
                    <div class="nav-item col-sm-3 col-md-3 col-lg-3 col-xl-3 col-xxl-4">
                        <a class="nav-link" href="anime_inserir_form.php">Inserir</a>
                    </div>
                    <div class="nav-item col-sm-3 col-md-3 col-lg-3 col-xl-4 col-xxl-4">
                        <a class="nav-link" href="anime_listar.php">Alterar</a>
                    </div>
                    <?php } } ?>
                    <!-- Menu do botão dropdown ANIMES - Filmes - Ecchi BOTÃO DROPDOWN ----- -->
                    <div class="col-sm-3 col-md-3 col-lg-3 col-xl-2 col-xxl-4 dropdown justify-content-end">
                        <a class="dropdown-toggle" role="button" data-bs-toggle="dropdown">Animes</a>
                        <ul class="dropdown-menu bg-dark">
                            <li><a class="dropdown-item text-white" href="#">Filmes</a></li>
                            <li><a class="dropdown-item text-white" href="animes_ecchi.php">Ecchi(+16)</a></li>
                        </ul>
          			</div>
				</div>
			</div>
        </div>
         <!-- Bloco do FORM de BUSCA -->
        <div class="col-sm-4 col-md-4 col-lg-3 col-xl-4 col-xxl-4 justify-content-end">
            <form class="form-control d-flex bg-dark" method="get" action="form_busca.php" name="form_busca" id="form_busca" role="search" style="max-height: 35px;">
               <input class="form-control form-sm me-3" type="text" name="input_busca" placeholder="Pesquisar por nome" style="max-height: 35px;">
               <button class="btn btn-primary btn-sm" type="submit" name="input_submit" style="max-height: 35px;"><span class="material-icons">search</span></button>
            </form>
        </div>
<!--		</div>-->
	</div><!-- fechamento da DIV ROW-->
</nav><!-- fecha a /NAV class CONTAINER -->