<?php
include 'conexao.php';
session_start();
	if (empty($_SESSION['adm']) || $_SESSION['adm']!=1) {
		header('location:index.php');
	}
$id_anime = $_GET['id'];
$pasta = "imgs/animes/";
$consulta = $conexao->query("SELECT * FROM animes WHERE id='$id_anime'");
$exibe = $consulta->fetch(PDO::FETCH_ASSOC);
$excluir = $conexao->query("DELETE FROM animes WHERE id='$id_anime'");
$fotomini=$exibe['fotomini'];
$foto1=$exibe['foto1'];
$foto2=$exibe['foto2'];
$foto3=$exibe['foto3'];
$foto4=$exibe['foto4'];
$foto5=$exibe['foto5'];
if ($fotomini!="") {
	unlink($pasta.$fotomini);
}
if ($foto1!="") {
	unlink($pasta.$foto1);
}
if ($foto2!="") {
	unlink($pasta.$foto2);
}
if ($foto3!="") {
	unlink($pasta.$foto3);
}
if ($foto4!="") {
	unlink($pasta.$foto4);
}
if ($foto5!="") {
	unlink($pasta.$foto5);
}
header('location:animes_listar.php')
?>