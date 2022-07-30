<?php
session_start();
	if (empty($_SESSION['adm']) || $_SESSION['adm']!=1) {
		header('location:index.php');
	}
include 'conecta.php';

$recebe_titulo_filme = $_POST['titulo_filme'];
$recebe_subtitulo_filme = $_POST['subtitulo_filme'];
$recebe_enredo_filme = $_POST['enredo_filme'];
$recebe_duracao_filme = $_POST['duracao_filme'];
$recebe_exibido = $_POST['exibido'];
$recebe_select_anime6 = $_POST['select_anime6'];
$recebe_tipo_anime5 = $_POST['tipo_anime5'];
$recebe_cat_filme = $_POST['select_cat_filme'];
$recebe_img_mini = $_FILES['img_mini_filme'];

$destino = "imgs/filme/";
preg_match("/\.(jpg|jpeg|png|gif){1}$/i",$recebe_img_mini['name'],$extencao1);
$img_nome1 = md5(uniqid(time())).".".$extencao1[1];

try {
	$inserir=$conecta->query("INSERT INTO `filme` (`titulo_filme`, `s_titulo_filme`, `enredo_filme`, `duracao_filme`, `exibido`, `img_mini`, `filme_id_anime`, `tipo_id_tipo`, `categoria_id_cat`) 
	VALUES ('$recebe_titulo_filme', '$recebe_subtitulo_filme', '$recebe_enredo_filme', '$recebe_duracao_filme', '$recebe_exibido', '$img_nome1', '$recebe_select_anime6', '$recebe_tipo_anime5', '$recebe_cat_filme')");
	move_uploaded_file($recebe_img_mini['tmp_name'], $destino.$img_nome1); 
	header('location:anime_inserir_form.php');
} catch(PDOException $e) {
	echo $e->getMessage();
} ?>