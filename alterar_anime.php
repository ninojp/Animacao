<?php
include 'conecta.php';
session_start();
	if (empty($_SESSION['adm']) || $_SESSION['adm']!=1) {
		header('location:index.php');
	}
$id_anime = $_GET['id_anime'];
$consulta = $conecta->query("SELECT * FROM anime WHERE id_anime='$id_anime'");
$exibe = $consulta->fetch(PDO::FETCH_ASSOC);

$recebe_fotomini = $_FILES['img_mini_anime'];
$recebe_nome = $_POST['input_nome'];
$recebe_nome_completo = $_POST['input_nome_completo'];
$recebe_descricao = $_POST['descricao'];
$recebe_personagens = $_POST['personagens'];


$destino = "imgs/anime/";

if (!empty($recebe_fotomini['name'])) {
	preg_match("/\.(jpg|jpeg|png|gif){1}$/i",$recebe_fotomini['name'],$extencao1);
	$img_nome1 = md5(uniqid(time())).".".$extencao1[1];
	$upload_fotomini=1;
} else {
	$img_nome1=$exibe['img_mini'];
	$upload_fotomini=0;
}

try {
	$alterar = $conecta->query("UPDATE anime SET
	descricao_anime = '$recebe_descricao',
	img_mini = '$img_nome1',
	nome_anime = '$recebe_nome',
	nome_completo_anime = '$recebe_nome_completo',
	personagens = '$recebe_personagens' WHERE id_anime = '$id_anime'");
	
	if ($upload_fotomini==1) {
		move_uploaded_file($recebe_fotomini['tmp_name'], $destino.$img_nome1);             
	}

	header('location:anime_listar.php');
} catch(PDOException $e) {
	echo $e->getMessage();
} ?>