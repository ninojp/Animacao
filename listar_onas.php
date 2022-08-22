<?php 
	include_once('conecta.php');
// RECEBER A ona
$ona = filter_input(INPUT_GET, "ona", FILTER_SANITIZE_NUMBER_INT);
if (!empty($ona)) {
	// CALCULAR O INICIO DA VISUALIZAÇÃO
	$qnt_result_pg = 40; // Quantidade de registro por pagina de ona
	$inicio = ($ona * $qnt_result_pg) - $qnt_result_pg;//2 * 10 = 20 - 10 = 10
    //CONSULTA QUERY na tabela ona JOIN ANIME ordenado por nome_ona
	$query_ona = "SELECT ona.id_ona, ona.titulo_ona, ona.img_mini, ani.id_anime FROM ona AS ona LEFT JOIN anime AS ani ON ani.id_anime = ona.ona_id_anime ORDER BY titulo_ona ASC LIMIT $inicio, $qnt_result_pg";
	$result_ona = $conecta->prepare($query_ona);
	$result_ona->execute();
    if (($result_ona) and ($result_ona->rowCount() != 0)){
        $dadoona = "<div class='row text-center'>";
	while($row_ona = $result_ona->fetch(PDO::FETCH_ASSOC)){
		extract($row_ona);
		$titulo_ona2 = nl2br(mb_strimwidth($titulo_ona,0,50,'...'));
		$dadoona .= "<div class='thumb_div col-xxl-3 col-xl-3 col-lg-3 col-md-4'>";
		$dadoona .= "<a class='link_sem_' href='anime_detalhes.php?id_anime=$id_anime' title='Detalhes do ona' target='_blank'>";
		$dadoona .= "<img class='thumb_img' src='imgs/ona/$img_mini'>";
		$dadoona .= "<div class='span_nome'>$titulo_ona2</div></a></div>";
	}
	$dadoona .= "</div>";
	//Paginação - somar a quantidade de registro que ha no BD
	$query_pg = "SELECT COUNT(id_ona) AS num_result FROM ona";
	$result_pg = $conecta->prepare($query_pg);
	$result_pg->execute();
	$row_pg = $result_pg->fetch(PDO::FETCH_ASSOC);
	// Quantidade de paginas
	$quantidade_pg = ceil($row_pg['num_result']/$qnt_result_pg);// foi usado o CEIL para o arendondamento do numero
	$max_links = 3; 
	$dadoona .= "<br><nav class='menu_pag' aria-label='Barra de navegação'><ul class='menu_pag pagination pagination-sm justify-content-center'>";
	// pagina anterior
	$dadoona .= "<li class='menu_pag page-item'><a class='page-link' href='#' onclick='listarona(1)'>Primeira</a></li>";
	for($pag_ant = $ona - $max_links; $pag_ant <= $ona - 1; $pag_ant++) {
		if($pag_ant >= 1){
			$dadoona .= "<li class='menu_pag page-item'><a class='page-link' href='#' onclick='listarona($pag_ant)'>$pag_ant</a></li>";
		}
	}
	// ona ATIVA
	$dadoona .= "<li class='menu_pag page-item active' aria-current='page'>";
    $dadoona .= "<a class='page-link' href='#'>$ona</a></li>";
	for($pag_dep = $ona + 1; $pag_dep <= $ona + $max_links; $pag_dep++){
		if($pag_dep <= $quantidade_pg){
			$dadoona .= "<li class='menu_pag page-item'><a class='page-link' href='#' onclick='listarona($pag_dep)'>$pag_dep</a></li>";
		}
	}
	// ir para ultima pagina da ona
	$dadoona .= "<li class='menu_pag page-item'><a class='page-link' href='#' onclick='listarona($quantidade_pg)'>Ultima</a></li></ul></nav>";
	// retorna os dados da função JS
	$retornaona = ['statuona' => true, 'dadoona' => $dadoona, 'inicio' => $inicio];
} else {
	$retornaona = ['statuona' => false, 'msgona' => "<div class='alert alert-danger' role='alert'>Erro: Nenhuma Série Encontrada!</div>"];
}
}else {
	$retornaona = ['statuona' => false, 'msgona' => "<div class='alert alert-danger' role='alert'>Erro: Nenhuma Série Encontrada!</div>"];
}
echo json_encode($retornaona);
?>