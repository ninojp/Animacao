<?php
session_start();
	if (empty($_SESSION['adm']) || $_SESSION['adm']!=1) {
		header('location:index.php');
	}
include 'conecta.php';
$recebe_caminho_img_serie = $_FILES['caminho_img_serie'];
$recebe_link_img_serie = $_POST['link_img_serie'];
$recebe_select_serie = $_POST['select_serie'];

$destino = "imgs/serie/";
preg_match("/\.(jpg|jpeg|png|gif){1}$/i",$recebe_caminho_img_serie['name'],$extencao1);
$img_nome1 = md5(uniqid(time())).".".$extencao1[1];

try {
	$inserir=$conecta->query("INSERT INTO imagem (caminho_img, link_imagem, serie_id_serie) VALUES ('$img_nome1', '$recebe_link_img_serie', '$recebe_select_serie')");
	move_uploaded_file($recebe_caminho_img_serie['tmp_name'], $destino.$img_nome1);             
	header('location:anime_inserir_form.php');
} catch(PDOException $e) {
	echo $e->getMessage();
} ?>