<?php session_start();
	include 'conexao.php';
$data = date('Y-m-d');
$ticket = uniqid();
$id_user = $_SESSION['id'];

foreach ($_SESSION['carrinho'] as $id => $qnt)  {
    $consulta = $conexao->query("SELECT * FROM animes WHERE id='$id'");
    $exibe = $consulta->fetch(PDO::FETCH_ASSOC);
    $nota = $exibe['nota'];
	
	$inserir = $conexao->query("INSERT INTO notas (ticket, id_usuario, id_anime, quantidade, data, nota) VALUES
	('$ticket','$id_user','$id','$qnt','$data','$nota')");
}
include 'fim.php';
?>