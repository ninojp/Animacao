<?php
session_start();
	if (empty($_SESSION['adm']) || $_SESSION['adm']!=1) {
		header('location:index.php');
	}
include 'conecta.php';
$recebe_caminho_img_ona = $_FILES['caminho_img_ona'];
$recebe_link_img_ona = $_POST['link_img_ona'];
$recebe_select_ona = $_POST['select_ona'];

$destino = "imgs/ona/";
preg_match("/\.(jpg|jpeg|png|gif){1}$/i",$recebe_caminho_img_ona['name'],$extencao1);
$img_nome1 = md5(uniqid(time())).".".$extencao1[1];

try {
	$inserir=$conecta->query("INSERT INTO imagem (caminho_img, link_imagem, ona_id_ona) VALUES ('$img_nome1', '$recebe_link_img_ona', '$recebe_select_ona')");
	move_uploaded_file($recebe_caminho_img_ona['tmp_name'], $destino.$img_nome1);             
	header('location:anime_inserir_form.php');
} catch(PDOException $e) {
	echo $e->getMessage();
} ?>