<?php
session_start();
	if (empty($_SESSION['adm']) || $_SESSION['adm']!=1) {
		header('location:index.php');
	}
include 'conecta.php';
$recebe_caminho_img_ova = $_FILES['caminho_img_ova'];
$recebe_link_img_ova = $_POST['link_img_ova'];
$recebe_select_ova = $_POST['select_ova'];

$destino = "imgs/ova/";
preg_match("/\.(jpg|jpeg|png|gif){1}$/i",$recebe_caminho_img_ova['name'],$extencao1);
$img_nome1 = md5(uniqid(time())).".".$extencao1[1];

try {
	$inserir=$conecta->query("INSERT INTO imagem (caminho_img, link_imagem, ova_id_ova) VALUES ('$img_nome1', '$recebe_link_img_ova', '$recebe_select_ova')");
	move_uploaded_file($recebe_caminho_img_ova['tmp_name'], $destino.$img_nome1);             
	header('location:anime_inserir_form.php');
} catch(PDOException $e) {
	echo $e->getMessage();
} ?>