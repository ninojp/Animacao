<?php
session_start();
	if (empty($_SESSION['adm']) || $_SESSION['adm']!=1) {
		header('location:index.php');
	}
include 'conecta.php';
$recebe_caminho_img_filme = $_FILES['caminho_img_filme'];
$recebe_link_img_filme = $_POST['link_img_filme'];
$recebe_select_filme = $_POST['select_filme'];

$destino = "imgs/filme/";
preg_match("/\.(jpg|jpeg|png|gif){1}$/i",$recebe_caminho_img_filme['name'],$extencao1);
$img_nome1 = md5(uniqid(time())).".".$extencao1[1];

try {
	$inserir=$conecta->query("INSERT INTO imagem (caminho_img, link_imagem, filme_id_filme) VALUES ('$img_nome1', '$recebe_link_img_filme', '$recebe_select_filme')");
	move_uploaded_file($recebe_caminho_img_filme['tmp_name'], $destino.$img_nome1);             
	header('location:anime_inserir_form.php');
} catch(PDOException $e) {
	echo $e->getMessage();
} ?>