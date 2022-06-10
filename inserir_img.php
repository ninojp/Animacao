<?php
session_start();
	if (empty($_SESSION['adm']) || $_SESSION['adm']!=1) {
		header('location:index.php');
	}
include 'conecta.php';
$recebe_caminho_img_anime = $_FILES['caminho_img_anime'];
$recebe_link_img = $_POST['link_img'];
$recebe_select_anime7 = $_POST['select_anime7'];

$destino = "imgs/anime/";
preg_match("/\.(jpg|jpeg|png|gif){1}$/i",$recebe_caminho_img_anime['name'],$extencao1);
$img_nome1 = md5(uniqid(time())).".".$extencao1[1];

try {
	$inserir=$conecta->query("INSERT INTO imagem (caminho_img, link_imagem, anime_id_anime) VALUES ('$img_nome1', '$recebe_link_img', '$recebe_select_anime7')");
	move_uploaded_file($recebe_caminho_img_anime['tmp_name'], $destino.$img_nome1);             
	header('location:anime_inserir_form.php');
} catch(PDOException $e) {
	echo $e->getMessage();
} ?>