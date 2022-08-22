<?php 
	include_once('conecta.php');
// RECEBER A filme
$filme = filter_input(INPUT_GET, "filme", FILTER_SANITIZE_NUMBER_INT);
if (!empty($filme)) {
	// CALCULAR O INICIO DA VISUALIZAÇÃO
	$qnt_result_pg = 40; // Quantidade de registro por pagina de filme
	$inicio = ($filme * $qnt_result_pg) - $qnt_result_pg;//2 * 10 = 20 - 10 = 10
    //CONSULTA QUERY na tabela FILME JOIN ANIME ordenado por nome_filme
	$query_filme = "SELECT film.id_filme, film.titulo_filme, film.img_mini, ani.id_anime FROM filme AS film LEFT JOIN anime AS ani ON ani.id_anime = film.filme_id_anime ORDER BY titulo_filme ASC LIMIT $inicio, $qnt_result_pg";
	$result_filme = $conecta->prepare($query_filme);
	$result_filme->execute();
    if (($result_filme) and ($result_filme->rowCount() != 0)){
        $dadofilme = "<div class='row text-center'>";
	while($row_filme = $result_filme->fetch(PDO::FETCH_ASSOC)){
		extract($row_filme);
		$titulo_filme2 = nl2br(mb_strimwidth($titulo_filme,0,50,'...'));
		$dadofilme .= "<div class='thumb_div col-xxl-3 col-xl-3 col-lg-3 col-md-4'>";
		$dadofilme .= "<a class='link_sem_' href='anime_detalhes.php?id_anime=$id_anime' title='Detalhes do filme' target='_blank'>";
		$dadofilme .= "<img class='thumb_img' src='imgs/filme/$img_mini'>";
		$dadofilme .= "<div class='span_nome'>$titulo_filme2</div></a></div>";
	}
	$dadofilme .= "</div>";
	//Paginação - somar a quantidade de registro que ha no BD
	$query_pg = "SELECT COUNT(id_filme) AS num_result FROM filme";
	$result_pg = $conecta->prepare($query_pg);
	$result_pg->execute();
	$row_pg = $result_pg->fetch(PDO::FETCH_ASSOC);
	// Quantidade de paginas
	$quantidade_pg = ceil($row_pg['num_result']/$qnt_result_pg);// foi usado o CEIL para o arendondamento do numero
	$max_links = 3; 
	$dadofilme .= "<br><nav class='menu_pag' aria-label='Barra de navegação'><ul class='menu_pag pagination pagination-sm justify-content-center'>";
	// pagina anterior
	$dadofilme .= "<li class='menu_pag page-item'><a class='page-link' href='#' onclick='listarfilme(1)'>Primeira</a></li>";
	for($pag_ant = $filme - $max_links; $pag_ant <= $filme - 1; $pag_ant++) {
		if($pag_ant >= 1){
			$dadofilme .= "<li class='menu_pag page-item'><a class='page-link' href='#' onclick='listarfilme($pag_ant)'>$pag_ant</a></li>";
		}
	}
	// filme ATIVA
	$dadofilme .= "<li class='menu_pag page-item active' aria-current='page'>";
    $dadofilme .= "<a class='page-link' href='#'>$filme</a></li>";
	for($pag_dep = $filme + 1; $pag_dep <= $filme + $max_links; $pag_dep++){
		if($pag_dep <= $quantidade_pg){
			$dadofilme .= "<li class='menu_pag page-item'><a class='page-link' href='#' onclick='listarfilme($pag_dep)'>$pag_dep</a></li>";
		}
	}
	// ir para ultima pagina da filme
	$dadofilme .= "<li class='menu_pag page-item'><a class='page-link' href='#' onclick='listarfilme($quantidade_pg)'>Ultima</a></li></ul></nav>";
	// retorna os dados da função JS
	$retornafilme = ['statufilme' => true, 'dadofilme' => $dadofilme, 'inicio' => $inicio];
} else {
	$retornafilme = ['statufilme' => false, 'msgfilme' => "<div class='alert alert-danger' role='alert'>Erro: Nenhuma Série Encontrada!</div>"];
}
}else {
	$retornafilme = ['statufilme' => false, 'msgfilme' => "<div class='alert alert-danger' role='alert'>Erro: Nenhuma Série Encontrada!</div>"];
}
echo json_encode($retornafilme);
?>