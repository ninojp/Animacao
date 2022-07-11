<?php
// conecta com o banco de dados
	include_once('conecta.php');

//consulta para minha contagem de ANIMES
	$consulta_anime = "SELECT COUNT(id_anime) AS qnt_anime FROM anime";
	$result_anime = $conecta->prepare($consulta_anime);
	$result_anime->execute();
	$exibe_count_anime = $result_anime->fetch(PDO::FETCH_ASSOC);

//consulta para minha contagem de SÉRIES
	$consulta_serie = "SELECT COUNT(id_serie) AS qnt_serie FROM serie";
	$result_serie = $conecta->prepare($consulta_serie);
	$result_serie->execute();
	$exibe_count_serie = $result_serie->fetch(PDO::FETCH_ASSOC);

//consulta para minha contagem de FILMES
	$consulta_filme = "SELECT COUNT(id_filme) AS qnt_filme FROM filme";
	$result_filme = $conecta->prepare($consulta_filme);
	$result_filme->execute();
	$exibe_count_filme = $result_filme->fetch(PDO::FETCH_ASSOC);

//consulta para minha contagem de OVAS
	$consulta_ova = "SELECT COUNT(id_ova) AS qnt_ova FROM ova";
	$result_ova = $conecta->prepare($consulta_ova);
	$result_ova->execute();
	$exibe_count_ova = $result_ova->fetch(PDO::FETCH_ASSOC);

//consulta para minha contagem de ONAS
	$consulta_ona = "SELECT COUNT(id_ona) AS qnt_ona FROM ona";
	$result_ona = $conecta->prepare($consulta_ona);
	$result_ona->execute();
	$exibe_count_ona = $result_ona->fetch(PDO::FETCH_ASSOC);

//consulta para minha contagem de ESPECIAIS
	$consulta_especial = "SELECT COUNT(id_especial) AS qnt_especial FROM especial";
	$result_especial = $conecta->prepare($consulta_especial);
	$result_especial->execute();
	$exibe_count_especial = $result_especial->fetch(PDO::FETCH_ASSOC);

//Contagem do numero de ANIMES do GENERO AÇÃO
	$consulta_acao =  "SELECT COUNT(fk_id_genero) AS qnt_acao FROM anime_genero WHERE fk_id_genero=1";
	$result_acao = $conecta->prepare($consulta_acao);
	$result_acao->execute();
	$exibe_count_acao = $result_acao->fetch(PDO::FETCH_ASSOC); 

//Contagem do numero de ANIMES do GENERO Aventura
	$consulta_aventura =  "SELECT COUNT(fk_id_genero) AS qnt_aventura FROM anime_genero WHERE fk_id_genero=3";
	$result_aventura = $conecta->prepare($consulta_aventura);
	$result_aventura->execute();
	$exibe_count_aventura = $result_aventura->fetch(PDO::FETCH_ASSOC); 

//Contagem do numero de ANIMES do GENERO Artes Marciais
	$consulta_artes =  "SELECT COUNT(fk_id_genero) AS qnt_artes FROM anime_genero WHERE fk_id_genero=4";
	$result_artes = $conecta->prepare($consulta_artes);
	$result_artes->execute();
	$exibe_count_artes = $result_artes->fetch(PDO::FETCH_ASSOC);

//Contagem do numero de ANIMES do GENERO Comédia
$consulta_comedia =  "SELECT COUNT(fk_id_genero) AS qnt_comedia FROM anime_genero WHERE fk_id_genero=6";
$result_comedia = $conecta->prepare($consulta_comedia);
$result_comedia->execute();
$exibe_count_comedia = $result_comedia->fetch(PDO::FETCH_ASSOC); 

//Contagem do numero de ANIMES do GENERO CyberPunk
$consulta_cyberpunk =  "SELECT COUNT(fk_id_genero) AS qnt_cyberpunk FROM anime_genero WHERE fk_id_genero=8";
$result_cyberpunk = $conecta->prepare($consulta_cyberpunk);
$result_cyberpunk->execute();
$exibe_count_cyberpunk = $result_cyberpunk->fetch(PDO::FETCH_ASSOC);

//Contagem do numero de ANIMES do GENERO Drama
$consulta_drama =  "SELECT COUNT(fk_id_genero) AS qnt_drama FROM anime_genero WHERE fk_id_genero=7";
$result_drama = $conecta->prepare($consulta_drama);
$result_drama->execute();
$exibe_count_drama = $result_drama->fetch(PDO::FETCH_ASSOC);

//Contagem do numero de ANIMES do GENERO Ecchi
$consulta_ecchi =  "SELECT COUNT(fk_id_genero) AS qnt_ecchi FROM anime_genero WHERE fk_id_genero=36";
$result_ecchi = $conecta->prepare($consulta_ecchi);
$result_ecchi->execute();
$exibe_count_ecchi = $result_ecchi->fetch(PDO::FETCH_ASSOC);

//Contagem do numero de ANIMES do GENERO Escolar
$consulta_escolar =  "SELECT COUNT(fk_id_genero) AS qnt_escolar FROM anime_genero WHERE fk_id_genero=5";
$result_escolar = $conecta->prepare($consulta_escolar);
$result_escolar->execute();
$exibe_count_escolar = $result_escolar->fetch(PDO::FETCH_ASSOC);

//Contagem do numero de ANIMES do GENERO Fantasia
$consulta_fantasia =  "SELECT COUNT(fk_id_genero) AS qnt_fantasia FROM anime_genero WHERE fk_id_genero=9";
$result_fantasia = $conecta->prepare($consulta_fantasia);
$result_fantasia->execute();
$exibe_count_fantasia = $result_fantasia->fetch(PDO::FETCH_ASSOC);

//Contagem do numero de ANIMES do GENERO Ficção
$consulta_ficcao =  "SELECT COUNT(fk_id_genero) AS qnt_ficcao FROM anime_genero WHERE fk_id_genero=10";
$result_ficcao = $conecta->prepare($consulta_ficcao);
$result_ficcao->execute();
$exibe_count_ficcao = $result_ficcao->fetch(PDO::FETCH_ASSOC);

//Contagem do numero de ANIMES do GENERO Ficção Científica
$consulta_scifi =  "SELECT COUNT(fk_id_genero) AS qnt_scifi FROM anime_genero WHERE fk_id_genero=11";
$result_scifi = $conecta->prepare($consulta_scifi);
$result_scifi->execute();
$exibe_count_scifi = $result_scifi->fetch(PDO::FETCH_ASSOC);

//Contagem do numero de ANIMES do GENERO Game
$consulta_game =  "SELECT COUNT(fk_id_genero) AS qnt_game FROM anime_genero WHERE fk_id_genero=20";
$result_game = $conecta->prepare($consulta_game);
$result_game->execute();
$exibe_count_game = $result_game->fetch(PDO::FETCH_ASSOC);

//Contagem do numero de ANIMES do GENERO Gore
$consulta_gore =  "SELECT COUNT(fk_id_genero) AS qnt_gore FROM anime_genero WHERE fk_id_genero=43";
$result_gore = $conecta->prepare($consulta_gore);
$result_gore->execute();
$exibe_count_gore = $result_gore->fetch(PDO::FETCH_ASSOC);

//Contagem do numero de ANIMES do GENERO Harém
$consulta_harem =  "SELECT COUNT(fk_id_genero) AS qnt_harem FROM anime_genero WHERE fk_id_genero=12";
$result_harem = $conecta->prepare($consulta_harem);
$result_harem->execute();
$exibe_count_harem = $result_harem->fetch(PDO::FETCH_ASSOC);

//Contagem do numero de ANIMES do GENERO Histórico
$consulta_historico =  "SELECT COUNT(fk_id_genero) AS qnt_historico FROM anime_genero WHERE fk_id_genero=45";
$result_historico = $conecta->prepare($consulta_historico);
$result_historico->execute();
$exibe_count_historico = $result_historico->fetch(PDO::FETCH_ASSOC);

//Contagem do numero de ANIMES do GENERO Horror
$consulta_horror =  "SELECT COUNT(fk_id_genero) AS qnt_horror FROM anime_genero WHERE fk_id_genero=34";
$result_horror = $conecta->prepare($consulta_horror);
$result_horror->execute();
$exibe_count_horror = $result_horror->fetch(PDO::FETCH_ASSOC);

//Contagem do numero de ANIMES do GENERO Infantil
$consulta_infantil =  "SELECT COUNT(fk_id_genero) AS qnt_infantil FROM anime_genero WHERE fk_id_genero=38";
$result_infantil = $conecta->prepare($consulta_infantil);
$result_infantil->execute();
$exibe_count_infantil = $result_infantil->fetch(PDO::FETCH_ASSOC);

//Contagem do numero de ANIMES do GENERO Isekai
$consulta_isekai =  "SELECT COUNT(fk_id_genero) AS qnt_isekai FROM anime_genero WHERE fk_id_genero=42";
$result_isekai = $conecta->prepare($consulta_isekai);
$result_isekai->execute();
$exibe_count_isekai = $result_isekai->fetch(PDO::FETCH_ASSOC);

//Contagem do numero de ANIMES do GENERO Magia
$consulta_magia =  "SELECT COUNT(fk_id_genero) AS qnt_magia FROM anime_genero WHERE fk_id_genero=13";
$result_magia = $conecta->prepare($consulta_magia);
$result_magia->execute();
$exibe_count_magia = $result_magia->fetch(PDO::FETCH_ASSOC);

//Contagem do numero de ANIMES do GENERO Mecha
$consulta_mecha =  "SELECT COUNT(fk_id_genero) AS qnt_mecha FROM anime_genero WHERE fk_id_genero=37";
$result_mecha = $conecta->prepare($consulta_mecha);
$result_mecha->execute();
$exibe_count_mecha = $result_mecha->fetch(PDO::FETCH_ASSOC);

//Contagem do numero de ANIMES do GENERO Militar
$consulta_militar =  "SELECT COUNT(fk_id_genero) AS qnt_militar FROM anime_genero WHERE fk_id_genero=19";
$result_militar = $conecta->prepare($consulta_militar);
$result_militar->execute();
$exibe_count_militar = $result_militar->fetch(PDO::FETCH_ASSOC);

//Contagem do numero de ANIMES do GENERO Mistério
$consulta_misterio =  "SELECT COUNT(fk_id_genero) AS qnt_misterio FROM anime_genero WHERE fk_id_genero=21";
$result_misterio = $conecta->prepare($consulta_misterio);
$result_misterio->execute();
$exibe_count_misterio = $result_misterio->fetch(PDO::FETCH_ASSOC);

//Contagem do numero de ANIMES do GENERO Mitológico
$consulta_mitologico =  "SELECT COUNT(fk_id_genero) AS qnt_mitologico FROM anime_genero WHERE fk_id_genero=46";
$result_mitologico = $conecta->prepare($consulta_mitologico);
$result_mitologico->execute();
$exibe_count_mitologico = $result_mitologico->fetch(PDO::FETCH_ASSOC);

//Contagem do numero de ANIMES do GENERO Paródia
$consulta_parodia =  "SELECT COUNT(fk_id_genero) AS qnt_parodia FROM anime_genero WHERE fk_id_genero=25";
$result_parodia = $conecta->prepare($consulta_parodia);
$result_parodia->execute();
$exibe_count_parodia = $result_parodia->fetch(PDO::FETCH_ASSOC);

//Contagem do numero de ANIMES do GENERO Pós Apocalíptico
$consulta_apocaliptico =  "SELECT COUNT(fk_id_genero) AS qnt_apocaliptico FROM anime_genero WHERE fk_id_genero=26";
$result_apocaliptico = $conecta->prepare($consulta_apocaliptico);
$result_apocaliptico->execute();
$exibe_count_apocaliptico = $result_apocaliptico->fetch(PDO::FETCH_ASSOC);

//Contagem do numero de ANIMES do GENERO Psicológico
$consulta_psicologico =  "SELECT COUNT(fk_id_genero) AS qnt_psicologico FROM anime_genero WHERE fk_id_genero=44";
$result_psicologico = $conecta->prepare($consulta_psicologico);
$result_psicologico->execute();
$exibe_count_psicologico = $result_psicologico->fetch(PDO::FETCH_ASSOC);

//Contagem do numero de ANIMES do GENERO Romance
$consulta_romance =  "SELECT COUNT(fk_id_genero) AS qnt_romance FROM anime_genero WHERE fk_id_genero=14";
$result_romance = $conecta->prepare($consulta_romance);
$result_romance->execute();
$exibe_count_romance = $result_romance->fetch(PDO::FETCH_ASSOC);

//Contagem do numero de ANIMES do GENERO Seinen
$consulta_seinen =  "SELECT COUNT(fk_id_genero) AS qnt_seinen FROM anime_genero WHERE fk_id_genero=15";
$result_seinen = $conecta->prepare($consulta_seinen);
$result_seinen->execute();
$exibe_count_seinen = $result_seinen->fetch(PDO::FETCH_ASSOC);

//Contagem do numero de ANIMES do GENERO Slice of Life
$consulta_slice =  "SELECT COUNT(fk_id_genero) AS qnt_slice FROM anime_genero WHERE fk_id_genero=39";
$result_slice = $conecta->prepare($consulta_slice);
$result_slice->execute();
$exibe_count_slice = $result_slice->fetch(PDO::FETCH_ASSOC);

//Contagem do numero de ANIMES do GENERO Shounen
$consulta_shounen =  "SELECT COUNT(fk_id_genero) AS qnt_shounen FROM anime_genero WHERE fk_id_genero=40";
$result_shounen = $conecta->prepare($consulta_shounen);
$result_shounen->execute();
$exibe_count_shounen = $result_shounen->fetch(PDO::FETCH_ASSOC);

//Contagem do numero de ANIMES do GENERO Sobrenatural
$consulta_sobre =  "SELECT COUNT(fk_id_genero) AS qnt_sobre FROM anime_genero WHERE fk_id_genero=24";
$result_sobre = $conecta->prepare($consulta_sobre);
$result_sobre->execute();
$exibe_count_sobre = $result_sobre->fetch(PDO::FETCH_ASSOC);

//Contagem do numero de ANIMES do GENERO Sobrevivência
$consulta_sobrev =  "SELECT COUNT(fk_id_genero) AS qnt_sobrev FROM anime_genero WHERE fk_id_genero=16";
$result_sobrev = $conecta->prepare($consulta_sobrev);
$result_sobrev->execute();
$exibe_count_sobrev = $result_sobrev->fetch(PDO::FETCH_ASSOC);

//Contagem do numero de ANIMES do GENERO Suspense
$consulta_suspence =  "SELECT COUNT(fk_id_genero) AS qnt_suspence FROM anime_genero WHERE fk_id_genero=23";
$result_suspence = $conecta->prepare($consulta_suspence);
$result_suspence->execute();
$exibe_count_suspence = $result_suspence->fetch(PDO::FETCH_ASSOC);

//Contagem do numero de ANIMES do GENERO Super Poderes
$consulta_super =  "SELECT COUNT(fk_id_genero) AS qnt_super FROM anime_genero WHERE fk_id_genero=18";
$result_super = $conecta->prepare($consulta_super);
$result_super->execute();
$exibe_count_super = $result_super->fetch(PDO::FETCH_ASSOC);

//Contagem do numero de ANIMES do GENERO Super heróis
$consulta_superh =  "SELECT COUNT(fk_id_genero) AS qnt_superh FROM anime_genero WHERE fk_id_genero=17";
$result_superh = $conecta->prepare($consulta_superh);
$result_superh->execute();
$exibe_count_superh = $result_superh->fetch(PDO::FETCH_ASSOC);

//Contagem do numero de ANIMES do GENERO Steampunk
$consulta_steampunk =  "SELECT COUNT(fk_id_genero) AS qnt_steampunk FROM anime_genero WHERE fk_id_genero=41";
$result_steampunk = $conecta->prepare($consulta_steampunk);
$result_steampunk->execute();
$exibe_count_steampunk = $result_steampunk->fetch(PDO::FETCH_ASSOC);

//Contagem do numero de ANIMES do GENERO Terror
$consulta_terror =  "SELECT COUNT(fk_id_genero) AS qnt_terror FROM anime_genero WHERE fk_id_genero=22";
$result_terror = $conecta->prepare($consulta_terror);
$result_terror->execute();
$exibe_count_terror = $result_terror->fetch(PDO::FETCH_ASSOC);
?>