<?php
include_once('consulta_count.php');
?>
<!-- MAIN -> DIV -> SIDEBAR - CAMPO de selecionar por genero ----------------->
<div class="col-xxl-2 col-xl-2 col-lg-2 text-center">
	<div class="row">
	<div class="col-xx-12" style="margin-top: 3rem;">
			<h5><a href="index.php" alt="Página da Lista dos Animes">Animes</a> (<?php echo $exibe_count_anime['qnt_anime'];?>)</h5>
		</div>
		<div class="col-xx-12" style="margin-top: 1rem;">
			<h5><a href="series.php" alt="Página da Lista das Séries">Séries</a> (<?php echo $exibe_count_serie['qnt_serie'];?>)</h5>
		</div>
		<div class="col-xx-12" style="margin-top: 1rem;">
			<h5><a href="filmes.php" alt="Página da Lista dos Filmes">Filmes</a> (<?php echo $exibe_count_filme['qnt_filme'];?>)</h5>
		</div>
		<div class="col-xx-12" style="margin-top: 1rem;">
			<h5><a href="ovas.php" alt="Página da Lista dos OVAs">OVAs</a> (<?php echo $exibe_count_ova['qnt_ova'];?>)</h5>
		</div>
		<div class="col-xx-12" style="margin-top: 1rem;">
			<h5><a href="onas.php" alt="Página da Lista dos ONAs">ONAs</a> (<?php echo $exibe_count_ona['qnt_ona'];?>)</h5>
		</div>
		<div class="col-xx-12" style="margin-top: 1rem;">
			<h5><a href="especiais.php" alt="Página da Lista dos especiais">Especiais</a> (<?php echo $exibe_count_especial['qnt_especial'];?>)</h5>
		</div>
		<div class="col-xxl-12" style="margin-top: 1rem;">
			<a href="https://pt.wikipedia.org/wiki/Wikip%C3%A9dia:P%C3%A1gina_principal" target="_blank">
			<img src="imgs/wikipedia_mini.png"><img src="imgs/wikipedia-logo-text-logo-branco_mini.png" width="80%"></a>
		</div>
		<div class="col-xxl-12" style="margin-top: 1rem;">
			<a href="https://myanimelist.net/" target="_blank"><img src="imgs/myanimelist-Logo_mini.png" width="80%"></a>
		</div>
		<div class="col-xxl-12">
			<a href="https://anidb.net/" target="_blank"><img src="imgs/Anidb-plain.png" width="70%"></a>
		</div>
		<div class="col-xxl-12">
			<a href="https://www.animenewsnetwork.com/" target="_blank"><img src="imgs/Anime_News_Network_logo_mini.png" width="80%"></a>
		</div>
		<div class="col-xxl-12" style="margin-top: 1rem;">
			<a href="https://www.imdb.com/" target="_blank"><img src="imgs/imdb-logo.png" width="50%"></a>
		</div>
		<div class="col-xxl-12" style="margin-top: 1rem;">
			<a href="https://filmow.com/" target="_blank"><img src="imgs/filmow-logo.png" width="60%"></a>
		</div>
		<div class="col-xxl-12" style="margin-top: 2rem;">
		<h4>Generos e temas</h4>
			<h6><a href="form_busca.php?input_busca=Ação">Ação</a> (<?php echo $exibe_count_acao['qnt_acao'];?>)<br>
			<a href="form_busca.php?input_busca=aventura">Aventura</a> (<?php echo $exibe_count_aventura['qnt_aventura'];?>)<br>
			<a href="form_busca.php?input_busca=Artes marciais">Artes Marciais</a> (<?php echo $exibe_count_artes['qnt_artes'];?>)<br>
			<a href="form_busca.php?input_busca=Comédia">Comédia</a> (<?php echo $exibe_count_comedia['qnt_comedia'];?>)<br>
			<a href="form_busca.php?input_busca=CyberPunk">CyberPunk</a> (<?php echo $exibe_count_cyberpunk['qnt_cyberpunk'];?>)<br>
			<a href="form_busca.php?input_busca=Drama">Drama</a> (<?php echo $exibe_count_drama['qnt_drama'];?>)<br>
			<a href="form_busca.php?input_busca=Ecchi">Ecchi</a> (<?php echo $exibe_count_ecchi['qnt_ecchi'];?>)<br>
			<a href="form_busca.php?input_busca=colegial">Escolar</a> (<?php echo $exibe_count_escolar['qnt_escolar'];?>)<br>
			<a href="form_busca.php?input_busca=Fantasia">Fantasia</a> (<?php echo $exibe_count_fantasia['qnt_fantasia'];?>)<br>
			<a href="form_busca.php?input_busca=Ficção">Ficção</a> (<?php echo $exibe_count_ficcao['qnt_ficcao'];?>)<br>
			<a href="form_busca.php?input_busca=Ficção Científica">Ficção Científica</a> (<?php echo $exibe_count_scifi['qnt_scifi'];?>)<br>
			<a href="form_busca.php?input_busca=game">Game</a> (<?php echo $exibe_count_game['qnt_game'];?>)<br>
			<a href="form_busca.php?input_busca=game">Gore</a> (<?php echo $exibe_count_gore['qnt_gore'];?>)<br>
			<a href="form_busca.php?input_busca=Harém">Harém</a> (<?php echo $exibe_count_harem['qnt_harem'];?>)<br>
			<a href="form_busca.php?input_busca=Harém">Histórico</a> (<?php echo $exibe_count_historico['qnt_historico'];?>)<br>
			<a href="form_busca.php?input_busca=Harém">Horror</a> (<?php echo $exibe_count_horror['qnt_horror'];?>)<br>
			<a href="form_busca.php?input_busca=Harém">Infantil</a> (<?php echo $exibe_count_infantil['qnt_infantil'];?>)<br>
			<a href="form_busca.php?input_busca=Harém">Isekai</a> (<?php echo $exibe_count_isekai['qnt_isekai'];?>)<br>
			<a href="form_busca.php?input_busca=Magia">Magia</a> (<?php echo $exibe_count_magia['qnt_magia'];?>)<br>
			<a href="form_busca.php?input_busca=Mecha">Mecha</a> (<?php echo $exibe_count_mecha['qnt_mecha'];?>)<br>
			<a href="form_busca.php?input_busca=Magia">Militar</a> (<?php echo $exibe_count_militar['qnt_militar'];?>)<br>
			<a href="form_busca.php?input_busca=Mistério">Mistério</a> (<?php echo $exibe_count_misterio['qnt_misterio'];?>)<br>
			<a href="form_busca.php?input_busca=Mistério">Mitológico</a> (<?php echo $exibe_count_mitologico['qnt_mitologico'];?>)<br>
			<a href="form_busca.php?input_busca=Mistério">Paródia</a> (<?php echo $exibe_count_parodia['qnt_parodia'];?>)<br>
			<a href="form_busca.php?input_busca=Mistério">Pós Apocalíptico</a> (<?php echo $exibe_count_apocaliptico['qnt_apocaliptico'];?>)<br>
			<a href="form_busca.php?input_busca=Mistério">Psicológico</a> (<?php echo $exibe_count_psicologico['qnt_psicologico'];?>)<br>
			<a href="form_busca.php?input_busca=Romance">Romance</a> (<?php echo $exibe_count_romance['qnt_romance'];?>)<br>
			<a href="form_busca.php?input_busca=Seinen">Seinen</a> (<?php echo $exibe_count_seinen['qnt_seinen'];?>)<br>
			<a href="form_busca.php?input_busca=Slice of Life">Slice of Life</a> (<?php echo $exibe_count_slice['qnt_slice'];?>)<br>
			<a href="form_busca.php?input_busca=Slice of Life">Shounen</a> (<?php echo $exibe_count_shounen['qnt_shounen'];?>)<br>
			<a href="form_busca.php?input_busca=Sobrenatural">Sobrenatural</a> (<?php echo $exibe_count_sobre['qnt_sobre'];?>)<br>
			<a href="form_busca.php?input_busca=Sobrevivência">Sobrevivência</a> (<?php echo $exibe_count_sobrev['qnt_sobrev'];?>)<br>
			<a href="form_busca.php?input_busca=suspense">Suspense</a> (<?php echo $exibe_count_suspence['qnt_suspence'];?>)<br>
			<a href="form_busca.php?input_busca=Super Poderes">Super Poderes</a> (<?php echo $exibe_count_super['qnt_super'];?>)<br>
			<a href="form_busca.php?input_busca=Super heróis">Super heróis</a> (<?php echo $exibe_count_superh['qnt_superh'];?>)<br>
			<a href="form_busca.php?input_busca=Super heróis">Steampunk</a> (<?php echo $exibe_count_steampunk['qnt_steampunk'];?>)<br>
			<a href="form_busca.php?input_busca=terror">Terror</a> (<?php echo $exibe_count_terror['qnt_terror'];?>)<br>
			</h6><hr>
			<h4>Tipo:</h4><h6>
			<a href="form_busca.php?input_busca=Anime">Anime</a><br>
			<a href="form_busca.php?input_busca=animação">Animação</a><br>
			<a href="form_busca.php?input_busca=animação_cgi">Animação (CGI)</a><br>
			<a href="form_busca.php?input_busca=Stop_Motion">Animação (Stop Motion)</a><br>
			<a href="form_busca.php?input_busca=filme">Live Action</a><br>
			<hr>
			<a href="anime_inserir_form.php">Inserir ANIME </a><br>
		</h6>
		</div>
	</div>
	</div>
	<script src="js/custom.js"></script>