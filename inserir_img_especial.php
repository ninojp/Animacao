<?php
session_start();
	if (empty($_SESSION['adm']) || $_SESSION['adm']!=1) {
		header('location:index.php');
	}
include 'conecta.php';
$recebe_caminho_img_especial = $_FILES['caminho_img_especial'];
$recebe_link_img_especial = $_POST['link_img_especial'];
$recebe_select_especial = $_POST['select_especial'];

$destino = "imgs/especial/";
preg_match("/\.(jpg|jpeg|png|gif){1}$/i",$recebe_caminho_img_especial['name'],$extencao1);
$img_nome1 = md5(uniqid(time())).".".$extencao1[1];

try {
	$inserir=$conecta->query("INSERT INTO imagem (caminho_img, link_imagem, especial_id_especial) VALUES ('$img_nome1', '$recebe_link_img_especial', '$recebe_select_especial')");
	move_uploaded_file($recebe_caminho_img_especial['tmp_name'], $destino.$img_nome1);             
	header('location:anime_inserir_form.php');
} catch(PDOException $e) {
	echo $e->getMessage();
} ?>