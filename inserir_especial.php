<?php
session_start();
	if (empty($_SESSION['adm']) || $_SESSION['adm']!=1) {
		header('location:index.php');
	}
include 'conecta.php';

$recebe_titulo_especial = $_POST['titulo_especial'];
$recebe_subtitulo_especial = $_POST['subtitulo_especial'];
$recebe_enredo_especial = $_POST['enredo_especial'];
$recebe_n_episodios_especial = $_POST['n_episodios_especial'];
$recebe_duracao_especial = $_POST['duracao_especial'];
$recebe_exib_inicio_especial = $_POST['exib_inicio_especial'];
$recebe_exib_fim_especial = $_POST['exib_fim_especial'];
$recebe_select_anime4 = $_POST['select_anime4'];
$recebe_tipo_anime3 = $_POST['tipo_anime3'];
$recebe_cat_especial = $_POST['select_cat_especial'];
$recebe_img_mini = $_FILES['img_mini_esp'];

$destino = "imgs/especial/";
preg_match("/\.(jpg|jpeg|png|gif){1}$/i",$recebe_img_mini['name'],$extencao1);
$img_nome1 = md5(uniqid(time())).".".$extencao1[1];

try {
	$inserir=$conecta->query("INSERT INTO `especial` (`titulo_especial`, `s_titulo_especial`, `enredo_especial`, `n_episodio_especial`, `duracao_especial`, `exib_inicio`, `exib_fim`, `img_mini`, `especial_id_anime`, `tipo_id_tipo`, `categoria_id_cat`) 
	VALUES ('$recebe_titulo_especial', '$recebe_subtitulo_especial', '$recebe_enredo_especial', '$recebe_n_episodios_especial', '$recebe_duracao_especial', '$recebe_exib_inicio_especial', '$recebe_exib_fim_especial', '$img_nome1', '$recebe_select_anime4', '$recebe_tipo_anime3', '$recebe_cat_especial')");
	move_uploaded_file($recebe_img_mini['tmp_name'], $destino.$img_nome1);
	header('location:anime_inserir_form.php');
} catch(PDOException $e) {
	echo $e->getMessage();
} ?>