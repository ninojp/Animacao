<?php
include_once('conecta.php');
$pagina = filter_input(INPUT_GET, "pagina", FILTER_SANITIZE_NUMBER_INT);
$id_cat = filter_input(INPUT_GET, "id_cat", FILTER_SANITIZE_NUMBER_INT);
if (!empty($pagina) and (!empty($id_cat))) {
    // Calcular o inicio da visualização
    $qnt_result_pg = 15; //Quantidade de registro por pagina
    $inicio = ($pagina * $qnt_result_pg) - $qnt_result_pg;


    $query_animes =  "SELECT cat_ani.id, cat_ani.nome_cat, ani.id_anime, ani.nome_anime, ani.categoria_id_cat, fil.id_filme, fil.titulo_filme, fil.categoria_id_cat FROM categoria_animacao AS cat_ani LEFT JOIN anime AS ani ON cat_ani.id = ani.categoria_id_cat LEFT JOIN filme AS fil ON cat_ani.id = fil.categoria_id_cat WHERE cat_ani.id=ani.categoria_id_cat LIMIT $inicio, $qnt_result_pg";
    // $query_animes =  "SELECT id_anime, nome_anime FROM anime WHERE categoria_id_cat=:categoria_id_cat LIMIT $inicio, $qnt_result_pg";
    $result_animes = $conecta->prepare($query_animes);
    // $result_animes->bindParam('categoria_id_cat', $id_cat, PDO::PARAM_INT);
    $result_animes->execute();

    if(($result_animes) and ($result_animes->rowCount() !=0 )){
        $dados = "<table class='table'><thead><tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Ações</th>
                            </tr></thead><tbody>";
        while($row_animes = $result_animes->fetch(PDO::FETCH_ASSOC)){
            extract($row_animes);
            $dados .= "<tr><td>$id_cat</th>
                            <td>$nome_anime</th>
                            <td>Ações</th></tr>";
        }            
        $dados .= "</tbody></table>";

        // Paginação - Somar a quantidade de CATEGORIAS de ANIMAÇÃO
        $query_pg  = "SELECT COUNT(id_anime) AS num_result FROM anime WHERE categoria_id_cat=:categoria_id_cat";
        $result_pg = $conecta->prepare($query_pg);
        $result_pg->bindParam('categoria_id_cat', $id_cat, PDO::PARAM_INT);
        $result_pg->execute();
        $row_pg = $result_pg->fetch(PDO::FETCH_ASSOC);
        //Quantidade de pagina
        $quantidade_pg = ceil($row_pg['num_result'] / $qnt_result_pg);
        //Maximo de links anteriores e posteriores
        $max_links = 4;
        $dados .= "<div class='col-2'><nav aria-label='Page navigation'><ul class='pagination pagination-sm justify-content-center'>";
        $dados .= "<li class='page-item'><a class='page-link' href='#' onclick='listarAnimacaoPag(1, $id_cat)'>Primeira</a></li>";
        for($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++) {
            if($pag_ant >= 1){
                $dados .= "<li class='page-item'><a class='page-link' href='#' onclick='listarAnimacaoPag($pag_ant, $id_cat)'>$pag_ant</a></li>";
            }
        }
        $dados .= "<li class='page-item active'><a class='page-link' href='#'>$pagina</a></li>";
        for($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++){
            if($pag_dep <= $quantidade_pg){
                $dados .= "<li class='page-item'><a class='page-link' href='#' onclick='listarAnimacaoPag($pag_dep, $id_cat)'>$pag_dep</a></li>";
            }
        }
        $dados .= "<li class='page-item'><a class='page-link' href='#'  onclick='listarAnimacaoPag($quantidade_pg, $id_cat)'>Ultima</a></li>";
        $dados .= "</ul></nav></div>";

        $retorna = ['erro' => false, 'dados' => $dados];
    }else{
        $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Nenhuma Animação encontrada!</div>"];
    }
} else {
    $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Nenhuma Animação encontrada!</div>"];
}
echo json_encode($retorna);
