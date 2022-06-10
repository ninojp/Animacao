<?php
include 'conecta.php';
session_start();
	if (empty($_SESSION['adm']) || $_SESSION['adm']!=1) {
		header('location:index.php');
	}
$id_autor = $_GET['id_autor'];
$consulta = $conecta->query("SELECT * FROM autor WHERE id_autor='$id_autor'");
$exibe = $consulta->fetch(PDO::FETCH_ASSOC);
$excluir = $conecta->query("DELETE FROM autor WHERE id_autor='$id_autor'");

header('location:anime_listar.php');
?>