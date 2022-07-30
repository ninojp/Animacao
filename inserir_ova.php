<?php
session_start();
	if (empty($_SESSION['adm']) || $_SESSION['adm']!=1) {
		header('location:index.php');
	}
include 'conecta.php';

$recebe_titulo_ova = $_POST['titulo_ova'];
$recebe_subtitulo_ova = $_POST['subtitulo_ova'];
$recebe_enredo_ova = $_POST['enredo_ova'];
$recebe_n_episodios_ova = $_POST['n_episodios_ova'];
$recebe_duracao_ova = $_POST['duracao_ova'];
$recebe_exib_inicio_ova = $_POST['exib_inicio_ova'];
$recebe_exib_fim_ova = $_POST['exib_fim_ova'];
$recebe_select_anime3 = $_POST['select_anime3'];
$recebe_tipo_anime1 = $_POST['tipo_anime1'];
$recebe_cat_ova = $_POST['select_cat_ova'];
$recebe_img_mini = $_FILES['img_mini_ova'];

$destino = "imgs/ova/";
preg_match("/\.(jpg|jpeg|png|gif){1}$/i",$recebe_img_mini['name'],$extencao1);
$img_nome1 = md5(uniqid(time())).".".$extencao1[1];

try {
	$inserir=$conecta->query("INSERT INTO `ova` (`titulo_ova`, `s_titulo_ova`, `enredo_ova`, `n_episodio_ova`, `duracao_ova`, `exib_inicio`, `exib_fim`, `img_mini`, `ova_id_anime`, `tipo_id_tipo`, `categoria_id_cat`) 
	VALUES ('$recebe_titulo_ova', '$recebe_subtitulo_ova', '$recebe_enredo_ova', '$recebe_n_episodios_ova', '$recebe_duracao_ova', '$recebe_exib_inicio_ova', '$recebe_exib_fim_ova', '$img_nome1', '$recebe_select_anime3', '$recebe_tipo_anime1', '$recebe_cat_ova')");
	move_uploaded_file($recebe_img_mini['tmp_name'], $destino.$img_nome1); 
	header('location:anime_inserir_form.php');
} catch(PDOException $e) {
	echo $e->getMessage();
} ?>