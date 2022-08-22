<?php 
	include_once('conecta.php');
// RECEBER A serie
$serie = filter_input(INPUT_GET, "serie", FILTER_SANITIZE_NUMBER_INT);
if (!empty($serie)) {
	// CALCULAR O INICIO DA VISUALIZAÇÃO
	$qnt_result_pg = 40; // Quantidade de registro por pagina de SERIE
	$inicio = ($serie * $qnt_result_pg) - $qnt_result_pg;//2 * 10 = 20 - 10 = 10
    //CONSULTA QUERY na tabela ANIME JOIN IMAGEM ordenado por nome_anime
	$query_serie = "SELECT seri.id_serie, seri.titulo_serie, seri.img_mini, ani.id_anime FROM serie AS seri LEFT JOIN anime AS ani ON ani.id_anime = seri.serie_id_anime ORDER BY titulo_serie ASC LIMIT $inicio, $qnt_result_pg";
	$result_serie = $conecta->prepare($query_serie);
	$result_serie->execute();
    if (($result_serie) and ($result_serie->rowCount() != 0)){
        $dadoserie = "<div class='row text-center'>";
	while($row_serie = $result_serie->fetch(PDO::FETCH_ASSOC)){
		extract($row_serie);
		$titulo_serie2 = nl2br(mb_strimwidth($titulo_serie,0,50,'...'));
		$dadoserie .= "<div class='thumb_div col-xxl-3 col-xl-3 col-lg-3 col-md-4'>";
		$dadoserie .= "<a class='link_sem_' href='anime_detalhes.php?id_anime=$id_anime' title='Detalhes do serie' target='_blank'>";
		$dadoserie .= "<img class='thumb_img' src='imgs/serie/$img_mini'>";
		$dadoserie .= "<div class='span_nome'>$titulo_serie2</div></a></div>";
	}
	$dadoserie .= "</div>";
	//Paginação - somar a quantidade de registro que ha no BD
	$query_pg = "SELECT COUNT(id_serie) AS num_result FROM serie";
	$result_pg = $conecta->prepare($query_pg);
	$result_pg->execute();
	$row_pg = $result_pg->fetch(PDO::FETCH_ASSOC);
	// Quantidade de paginas
	$quantidade_pg = ceil($row_pg['num_result']/$qnt_result_pg);// foi usado o CEIL para o arendondamento do numero
	$max_links = 3; 
	$dadoserie .= "<br><nav class='menu_pag' aria-label='Barra de navegação'><ul class='menu_pag pagination pagination-sm justify-content-center'>";
	// pagina anterior
	$dadoserie .= "<li class='menu_pag page-item'><a class='page-link' href='#' onclick='listarSerie(1)'>Primeira</a></li>";
	for($pag_ant = $serie - $max_links; $pag_ant <= $serie - 1; $pag_ant++) {
		if($pag_ant >= 1){
			$dadoserie .= "<li class='menu_pag page-item'><a class='page-link' href='#' onclick='listarSerie($pag_ant)'>$pag_ant</a></li>";
		}
	}
	// serie ATIVA
	$dadoserie .= "<li class='menu_pag page-item active' aria-current='page'>";
    $dadoserie .= "<a class='page-link' href='#'>$serie</a></li>";
	for($pag_dep = $serie + 1; $pag_dep <= $serie + $max_links; $pag_dep++){
		if($pag_dep <= $quantidade_pg){
			$dadoserie .= "<li class='menu_pag page-item'><a class='page-link' href='#' onclick='listarSerie($pag_dep)'>$pag_dep</a></li>";
		}
	}
	// ir para ultima pagina da serie
	$dadoserie .= "<li class='menu_pag page-item'><a class='page-link' href='#' onclick='listarSerie($quantidade_pg)'>Ultima</a></li></ul></nav>";
	// retorna os dados da função JS
	$retornaserie = ['statuserie' => true, 'dadoserie' => $dadoserie, 'inicio' => $inicio];
} else {
	$retornaserie = ['statuserie' => false, 'msgserie' => "<div class='alert alert-danger' role='alert'>Erro: Nenhuma Série Encontrada!</div>"];
}
}else {
	$retornaserie = ['statuserie' => false, 'msgserie' => "<div class='alert alert-danger' role='alert'>Erro: Nenhuma Série Encontrada!</div>"];
}
echo json_encode($retornaserie);
?>