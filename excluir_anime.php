<?php
include 'conecta.php';
session_start();
	if (empty($_SESSION['adm']) || $_SESSION['adm']!=1) {
		header('location:index.php');
	}

$id_anime = $_GET['id_anime'];
$pasta = "imgs/anime/";
$consulta = $conecta->query("SELECT * FROM anime WHERE id_anime='$id_anime'");
$exibe = $consulta->fetch(PDO::FETCH_ASSOC);
$excluir = $conecta->query("DELETE FROM anime WHERE id_anime='$id_anime'");
$img_mini=$exibe['img_mini'];

if ($img_mini!="") {
	unlink($pasta.$img_mini);
}

header('location:anime_listar.php');
?>