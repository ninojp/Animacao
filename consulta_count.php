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
?>