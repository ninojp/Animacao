<?php 
	include_once('conecta.php');
// RECEBER A ova
$ova = filter_input(INPUT_GET, "ova", FILTER_SANITIZE_NUMBER_INT);
if (!empty($ova)) {
	// CALCULAR O INICIO DA VISUALIZAÇÃO
	$qnt_result_pg = 40; // Quantidade de registro por pagina de ova
	$inicio = ($ova * $qnt_result_pg) - $qnt_result_pg;//2 * 10 = 20 - 10 = 10
    //CONSULTA QUERY na tabela OVA JOIN ANIME ordenado por nome_ova
	$query_ova = "SELECT ova.id_ova, ova.titulo_ova, ova.img_mini, ani.id_anime FROM ova AS ova LEFT JOIN anime AS ani ON ani.id_anime = ova.ova_id_anime ORDER BY titulo_ova ASC LIMIT $inicio, $qnt_result_pg";
	$result_ova = $conecta->prepare($query_ova);
	$result_ova->execute();
    if (($result_ova) and ($result_ova->rowCount() != 0)){
        $dadoova = "<div class='row text-center'>";
	while($row_ova = $result_ova->fetch(PDO::FETCH_ASSOC)){
		extract($row_ova);
		$titulo_ova2 = nl2br(mb_strimwidth($titulo_ova,0,50,'...'));
		$dadoova .= "<div class='thumb_div col-xxl-3 col-xl-3 col-lg-3 col-md-4'>";
		$dadoova .= "<a class='link_sem_' href='anime_detalhes.php?id_anime=$id_anime' title='Detalhes do ova' target='_blank'>";
		$dadoova .= "<img class='thumb_img' src='imgs/ova/$img_mini'>";
		$dadoova .= "<div class='span_nome'>$titulo_ova2</div></a></div>";
	}
	$dadoova .= "</div>";
	//Paginação - somar a quantidade de registro que ha no BD
	$query_pg = "SELECT COUNT(id_ova) AS num_result FROM ova";
	$result_pg = $conecta->prepare($query_pg);
	$result_pg->execute();
	$row_pg = $result_pg->fetch(PDO::FETCH_ASSOC);
	// Quantidade de paginas
	$quantidade_pg = ceil($row_pg['num_result']/$qnt_result_pg);// foi usado o CEIL para o arendondamento do numero
	$max_links = 3; 
	$dadoova .= "<br><nav class='menu_pag' aria-label='Barra de navegação'><ul class='menu_pag pagination pagination-sm justify-content-center'>";
	// pagina anterior
	$dadoova .= "<li class='menu_pag page-item'><a class='page-link' href='#' onclick='listarova(1)'>Primeira</a></li>";
	for($pag_ant = $ova - $max_links; $pag_ant <= $ova - 1; $pag_ant++) {
		if($pag_ant >= 1){
			$dadoova .= "<li class='menu_pag page-item'><a class='page-link' href='#' onclick='listarova($pag_ant)'>$pag_ant</a></li>";
		}
	}
	// ova ATIVA
	$dadoova .= "<li class='menu_pag page-item active' aria-current='page'>";
    $dadoova .= "<a class='page-link' href='#'>$ova</a></li>";
	for($pag_dep = $ova + 1; $pag_dep <= $ova + $max_links; $pag_dep++){
		if($pag_dep <= $quantidade_pg){
			$dadoova .= "<li class='menu_pag page-item'><a class='page-link' href='#' onclick='listarova($pag_dep)'>$pag_dep</a></li>";
		}
	}
	// ir para ultima pagina da ova
	$dadoova .= "<li class='menu_pag page-item'><a class='page-link' href='#' onclick='listarova($quantidade_pg)'>Ultima</a></li></ul></nav>";
	// retorna os dados da função JS
	$retornaova = ['statuova' => true, 'dadoova' => $dadoova, 'inicio' => $inicio];
} else {
	$retornaova = ['statuova' => false, 'msgova' => "<div class='alert alert-danger' role='alert'>Erro: Nenhuma Série Encontrada!</div>"];
}
}else {
	$retornaova = ['statuova' => false, 'msgova' => "<div class='alert alert-danger' role='alert'>Erro: Nenhuma Série Encontrada!</div>"];
}
echo json_encode($retornaova);
?>