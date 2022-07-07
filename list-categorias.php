<?php
include_once('conecta.php');
$pagina = filter_input(INPUT_GET, "pagina", FILTER_SANITIZE_NUMBER_INT);

if(!empty($pagina)){
    // Calcular o inicio da visualização
    $qnt_result_pg = 3; //Quantidade de registro por pagina
    $inicio = ($pagina * $qnt_result_pg) - $qnt_result_pg;

    $query_cat_anime =  "SELECT id, nome_cat FROM categoria_animacao LIMIT $inicio, $qnt_result_pg";
    $result_cat_anime = $conecta->prepare($query_cat_anime);
    $result_cat_anime->execute();

    if(($result_cat_anime) and ($result_cat_anime->rowCount() !=0 )){

        $dados = "<table class='table'>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Ações</th>
                        </tr>
                    </thead><tbody>";
        
        while($row_cat_anime = $result_cat_anime->fetch(PDO::FETCH_ASSOC)){
            extract($row_cat_anime);
            $dados .= "<tr>
                            <td>$id</th>
                            <td>$nome_cat</th>
                            <td><button class='btn btn-outline-primary btn-sm' onclick='listarAnimacao(1, $id)'>Animações</th>
                       </tr>";
        }            
        $dados .= "</tbody></table>";

        // Paginação - Somar a quantidade de CATEGORIAS de ANIMAÇÃO
        $query_pg  = "SELECT COUNT(id) AS num_result FROM categoria_animacao";
        $result_pg = $conecta->prepare($query_pg);
        $result_pg->execute();
        $row_pg = $result_pg->fetch(PDO::FETCH_ASSOC);

        //Quantidade de pagina
        $quantidade_pg = ceil($row_pg['num_result'] / $qnt_result_pg);

        //Maximo de links anteriores e posteriores
        $max_links = 2;
        
        $dados .= "<div class='col-2'><nav aria-label='Page navigation'><ul class='pagination pagination-sm justify-content-center'>";

        $dados .= "<li class='page-item'><a class='page-link' href='#' onclick='listarCatAnimacao(1)'>Primeira</a></li>";

        for($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++) {
            if($pag_ant >= 1){
                $dados .= "<li class='page-item'><a class='page-link' href='#' onclick='listarCatAnimacao($pag_ant)'>$pag_ant</a></li>";
            }
        }
        $dados .= "<li class='page-item active'><a class='page-link' href='#'>$pagina</a></li>";

        for($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++){
            if($pag_dep <= $quantidade_pg){
                $dados .= "<li class='page-item'><a class='page-link' href='#' onclick='listarCatAnimacao($pag_dep)'>$pag_dep</a></li>";
            }
            
        }
        
        $dados .= "<li class='page-item'><a class='page-link' href='#'  onclick='listarCatAnimacao($quantidade_pg)'>Ultima</a></li>";
        $dados .= "</ul></nav></div>";


        $retorna = ['erro' => false, 'dados' => $dados];
    }else{
        $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Nenhuma categoria de Animação encontrada!</div>"];
    }
}else{
    $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Nenhuma categoria de Animação encontrada!</div>"];
}
echo json_encode($retorna);
?>