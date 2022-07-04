<?php
include_once('consulta_count.php');
?>
<!-- MAIN -> DIV -> SIDEBAR - CAMPO de selecionar por genero ----------------->
<div class="col-xxl-2 col-xl-2 col-lg-2 text-center">
	<div class="row">
	<div class="col-xx-12" style="margin-top: 3rem;">
			<h5>Animes (<?php echo $exibe_count_anime['qnt_anime'];?>)</h5>
		</div>
		<div class="col-xx-12" style="margin-top: 1rem;">
			<h5>Séries (<?php echo $exibe_count_serie['qnt_serie'];?>)</h5>
		</div>
		<div class="col-xx-12" style="margin-top: 1rem;">
			<h5>Filmes (<?php echo $exibe_count_filme['qnt_filme'];?>)</h5>
		</div>
		<div class="col-xx-12" style="margin-top: 1rem;">
			<h5>OVAs (<?php echo $exibe_count_ova['qnt_ova'];?>)</h5>
		</div>
		<div class="col-xx-12" style="margin-top: 1rem;">
			<h5>ONAs (<?php echo $exibe_count_ona['qnt_ona'];?>)</h5>
		</div>
		<div class="col-xx-12" style="margin-top: 1rem;">
			<h5>Especiais (<?php echo $exibe_count_especial['qnt_especial'];?>)</h5>
		</div>
		<div class="col-xxl-12" style="margin-top: 1rem;">
			<a href="https://anidb.net/" target="_blank">
			<img src="imgs/Anidb-plain.webp" width="80%">
			</a>
		</div>
		<div class="col-xxl-12">
			<a href="https://myanimelist.net/" target="_blank">
			<img src="imgs/myanimelist-Logo_mini.png">
			</a>
		</div>
		<div class="col-xxl-12" style="margin-top: 2rem;">
			<a href="https://www.animenewsnetwork.com/" target="_blank">
			<img src="imgs/Anime_News_Network_logo_mini.png">
			</a>
		</div>
		<div class="col-xxl-12" style="margin-top: 2rem;">
			<a href="https://pt.wikipedia.org/wiki/Wikip%C3%A9dia:P%C3%A1gina_principal" target="_blank">
				<img src="imgs/wikipedia_mini.png"><img src="imgs/wikipedia-logo-text-logo-branco_mini.png"></a>
		</div>
		<div class="col-xxl-12" style="margin-top: 2rem;">
			<a href="https://www.imdb.com/" target="_blank">
			<img src="imgs/imdb-logo.png">
			</a>
		</div>
		<div class="col-xxl-12" style="margin-top: 2rem;">
			<a href="https://filmow.com/" target="_blank">
			<img src="imgs/filmow-logo.png">
			</a>
		</div>
		<div class="col-xxl-12" style="margin-top: 2rem;">
		<h4>Generos e temas</h4>
			<h6><a href="form_busca.php?input_busca=Ação">Ação</a><br>
			<a href="form_busca.php?input_busca=animação 3d">Animação (CGI)</a><br>
			<a href="form_busca.php?input_busca=aventura">Aventura</a><br>
			<a href="form_busca.php?input_busca=Artes marciais">Artes Marciais </a><br>
			<a href="form_busca.php?input_busca=colegial">Colegial </a><br>
			<a href="form_busca.php?input_busca=Comédia">Comédia</a><br>
			<a href="form_busca.php?input_busca=CyberPunk">CyberPunk </a><br>
			<a href="form_busca.php?input_busca=Drama">Drama </a><br>
			<a href="form_busca.php?input_busca=Ecchi">Ecchi </a><br>
			<a href="form_busca.php?input_busca=Fantasia">Fantasia </a><br>
			<a href="form_busca.php?input_busca=Ficção">Ficção </a><br>
			<a href="form_busca.php?input_busca=Ficção Científica">Ficção Científica </a><br>
			<a href="form_busca.php?input_busca=game">Game </a><br>
			<a href="form_busca.php?input_busca=Harém">Harém </a><br>
			<a href="form_busca.php?input_busca=Magia">Magia </a><br>
			<a href="form_busca.php?input_busca=Mistério">Mistério </a><br>
			<a href="form_busca.php?input_busca=Romance">Romance </a><br>
			<a href="form_busca.php?input_busca=Seinen">Seinen </a><br>
			<a href="form_busca.php?input_busca=Sobrenatural">Sobrenatural </a><br>
			<a href="form_busca.php?input_busca=Sobrevivência">Sobrevivência </a><br>
			<a href="form_busca.php?input_busca=suspense">Suspense </a><br>
			<a href="form_busca.php?input_busca=Super Poderes">Super Poderes </a><br>
			<a href="form_busca.php?input_busca=Super heróis">Super heróis </a><br>
			<a href="form_busca.php?input_busca=terror">Terror </a><br>
			<a href="form_busca.php?input_busca=policial">Militar </a><br>
			<a href="form_busca.php?input_busca=policial">Slice of Life</a><br>
			<a href="form_busca.php?input_busca=policial">Infantil</a><br>
			<a href="form_busca.php?input_busca=policial">Mecha</a><br>
			<a href="form_busca.php?input_busca=policial">Horror</a><br>
			</h6><hr>
			<h4>Tipo:</h4><h6>
			<a href="form_busca.php?input_busca=filme">Filme(Anime)</a><br>
			<a href="form_busca.php?input_busca=ecchi">Ecchi(+16)</a><br>
			<hr>
			<a href="anime_inserir_form.php">Inserir ANIME </a><br>
		</h6>
		</div>
	</div>
	</div>