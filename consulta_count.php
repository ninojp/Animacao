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
?>