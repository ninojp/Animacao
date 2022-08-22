<?php 
	include_once('conecta.php');
// RECEBER A especial
$especial = filter_input(INPUT_GET, "especial", FILTER_SANITIZE_NUMBER_INT);
if (!empty($especial)) {
	// CALCULAR O INICIO DA VISUALIZAÇÃO
	$qnt_result_pg = 40; // Quantidade de registro por pagina de especial
	$inicio = ($especial * $qnt_result_pg) - $qnt_result_pg;//2 * 10 = 20 - 10 = 10
    //CONSULTA QUERY na tabela especial JOIN ANIME ordenado por nome_especial
	$query_especial = "SELECT esp.id_especial, esp.titulo_especial, esp.img_mini, ani.id_anime FROM especial AS esp LEFT JOIN anime AS ani ON ani.id_anime = esp.especial_id_anime ORDER BY titulo_especial ASC LIMIT $inicio, $qnt_result_pg";
	$result_especial = $conecta->prepare($query_especial);
	$result_especial->execute();
    if (($result_especial) and ($result_especial->rowCount() != 0)){
        $dadoespecial = "<div class='row text-center'>";
	while($row_especial = $result_especial->fetch(PDO::FETCH_ASSOC)){
		extract($row_especial);
		$titulo_especial2 = nl2br(mb_strimwidth($titulo_especial,0,50,'...'));
		$dadoespecial .= "<div class='thumb_div col-xxl-3 col-xl-3 col-lg-3 col-md-4'>";
		$dadoespecial .= "<a class='link_sem_' href='anime_detalhes.php?id_anime=$id_anime' title='Detalhes do especial' target='_blank'>";
		$dadoespecial .= "<img class='thumb_img' src='imgs/especial/$img_mini'>";
		$dadoespecial .= "<div class='span_nome'>$titulo_especial2</div></a></div>";
	}
	$dadoespecial .= "</div>";
	//Paginação - somar a quantidade de registro que ha no BD
	$query_pg = "SELECT COUNT(id_especial) AS num_result FROM especial";
	$result_pg = $conecta->prepare($query_pg);
	$result_pg->execute();
	$row_pg = $result_pg->fetch(PDO::FETCH_ASSOC);
	// Quantidade de paginas
	$quantidade_pg = ceil($row_pg['num_result']/$qnt_result_pg);// foi usado o CEIL para o arendondamento do numero
	$max_links = 3; 
	$dadoespecial .= "<br><nav class='menu_pag' aria-label='Barra de navegação'><ul class='menu_pag pagination pagination-sm justify-content-center'>";
	// pagina anterior
	$dadoespecial .= "<li class='menu_pag page-item'><a class='page-link' href='#' onclick='listarespecial(1)'>Primeira</a></li>";
	for($pag_ant = $especial - $max_links; $pag_ant <= $especial - 1; $pag_ant++) {
		if($pag_ant >= 1){
			$dadoespecial .= "<li class='menu_pag page-item'><a class='page-link' href='#' onclick='listarespecial($pag_ant)'>$pag_ant</a></li>";
		}
	}
	// especial ATIVA
	$dadoespecial .= "<li class='menu_pag page-item active' aria-current='page'>";
    $dadoespecial .= "<a class='page-link' href='#'>$especial</a></li>";
	for($pag_dep = $especial + 1; $pag_dep <= $especial + $max_links; $pag_dep++){
		if($pag_dep <= $quantidade_pg){
			$dadoespecial .= "<li class='menu_pag page-item'><a class='page-link' href='#' onclick='listarespecial($pag_dep)'>$pag_dep</a></li>";
		}
	}
	// ir para ultima pagina da especial
	$dadoespecial .= "<li class='menu_pag page-item'><a class='page-link' href='#' onclick='listarespecial($quantidade_pg)'>Ultima</a></li></ul></nav>";
	// retorna os dados da função JS
	$retornaespecial = ['statuespecial' => true, 'dadoespecial' => $dadoespecial, 'inicio' => $inicio];
} else {
	$retornaespecial = ['statuespecial' => false, 'msgespecial' => "<div class='alert alert-danger' role='alert'>Erro: Nenhuma Série Encontrada!</div>"];
}
}else {
	$retornaespecial = ['statuespecial' => false, 'msgespecial' => "<div class='alert alert-danger' role='alert'>Erro: Nenhuma Série Encontrada!</div>"];
}
echo json_encode($retornaespecial);
?>