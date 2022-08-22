<?php 
	include_once('conecta.php');
// RECEBER A PAGINA
$pagina = filter_input(INPUT_GET, "pagina", FILTER_SANITIZE_NUMBER_INT);

if (!empty($pagina)) {
	// CALCULAR O INICIO DA VISUALIZAÇÃO
	$qnt_result_pg = 40; // Quantidade de registro por pagina
	$inicio = ($pagina * $qnt_result_pg) - $qnt_result_pg;//2 * 10 = 20 - 10 = 10
	
//CONSULTA QUERY na tabela ANIME JOIN IMAGEM ordenado por nome_anime
// testar erro  where id_anime = 1000
	$query_anime = "SELECT id_anime, nome_anime, img_mini FROM `anime` 
					ORDER BY nome_anime ASC LIMIT $inicio, $qnt_result_pg";
	$result_anime = $conecta->prepare($query_anime);
	$result_anime->execute();

if (($result_anime) and ($result_anime->rowCount() != 0)){
	$dados = "<div class='row text-center'>";
	
	while($row_anime = $result_anime->fetch(PDO::FETCH_ASSOC)){
		extract($row_anime);
		$nome_anime2 = nl2br(mb_strimwidth($nome_anime,0,36,'...'));
		$dados .= "<div class='thumb_div col-xxl-3 col-xl-3 col-lg-3 col-md-4'>";
		$dados .= "<a class='link_sem_' href='anime_detalhes.php?id_anime=$id_anime' title='Detalhes do Anime' target='_blank'>";
		$dados .= "<img class='thumb_img' src='imgs/anime/$img_mini'>";
		$dados .= "<div class='col-xxl-12'><span class='span_nome'>$nome_anime2</span>";
		$dados .= "</div></a></div>";
	}
	$dados .= "</div>";
	
	//Paginação - somar a quantidade de registro que ha no BD
	$query_pg = "SELECT COUNT(id_anime) AS num_result FROM anime";
	$result_pg = $conecta->prepare($query_pg);
	$result_pg->execute();
	$row_pg = $result_pg->fetch(PDO::FETCH_ASSOC);
	
	// Quantidade de paginas
	$quantidade_pg = ceil($row_pg['num_result']/$qnt_result_pg);// foi usado o CEIL para o arendondamento do numero
	$max_links = 5; 
	
	$dados .= "<br><nav class='menu_pag' aria-label='Barra de navegação'><ul class='menu_pag pagination pagination-sm justify-content-center'>";
	
	// pagina anterior
	$dados .= "<li class='menu_pag page-item'><a class='page-link' href='#' onclick='listarAnimes(1)'>Primeira</a></li>";
	for($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++) {
		if($pag_ant >= 1){
			$dados .= "<li class='menu_pag page-item'><a class='page-link' href='#' onclick='listarAnimes($pag_ant)'>$pag_ant</a></li>";
		}
	}
	// pagina ATIVA
	$dados .= "<li class='menu_pag page-item active' aria-current='page'>";
    $dados .= "<a class='page-link' href='#'>$pagina</a></li>";
		
	for($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++){
		if($pag_dep <= $quantidade_pg){
			$dados .= "<li class='menu_pag page-item'><a class='page-link' href='#' onclick='listarAnimes($pag_dep)'>$pag_dep</a></li>";
		}
	}
	// ir para ultima pagina
	$dados .= "<li class='menu_pag page-item'><a class='page-link' href='#' onclick='listarAnimes($quantidade_pg)'>Ultima</a></li></ul></nav>";
	// retorna os dados da função JS
	$retorna = ['status' => true, 'dados' => $dados, 'inicio' => $inicio];
} else {
	$retorna = ['status' => false, 'msg' => "<p style='color: #f00;'>Erro: Nenhun Anime Encontrado!</p>"];
}
}else {
	$retorna = ['status' => false, 'msg' => "<p style='color: #f00;'>Erro: Nenhun Anime Encontrado2!</p>"];
}
echo json_encode($retorna);
?>