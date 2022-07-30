<?php
session_start();
	if (empty($_SESSION['adm']) || $_SESSION['adm']!=1) {
		header('location:index.php');
	}
include 'conecta.php';

$recebe_titulo_ona = $_POST['titulo_ona'];
$recebe_subtitulo_ona = $_POST['subtitulo_ona'];
$recebe_enredo_ona = $_POST['enredo_ona'];
$recebe_n_episodios_ona = $_POST['n_episodios_ona'];
$recebe_duracao_ona = $_POST['duracao_ona'];
$recebe_exib_inicio_ona = $_POST['exib_inicio_ona'];
$recebe_exib_fim_ona = $_POST['exib_fim_ona'];
$recebe_select_anime5 = $_POST['select_anime5'];
$recebe_tipo_anime4 = $_POST['tipo_anime4'];
$recebe_cat_ona = $_POST['select_cat_ona'];
$recebe_img_mini = $_FILES['img_mini_ona'];

$destino = "imgs/ona/";
preg_match("/\.(jpg|jpeg|png|gif){1}$/i",$recebe_img_mini['name'],$extencao1);
$img_nome1 = md5(uniqid(time())).".".$extencao1[1];

try {
	$inserir=$conecta->query("INSERT INTO `ona` (`titulo_ona`, `s_titulo_ona`, `enredo_ona`, `n_episodio_ona`, `duracao_ona`, `exib_inicio`, `exib_fim`, `img_mini`, `ona_id_anime`, `tipo_id_tipo`, `categoria_id_cat`) 
	VALUES ('$recebe_titulo_ona', '$recebe_subtitulo_ona', '$recebe_enredo_ona', '$recebe_n_episodios_ona', '$recebe_duracao_ona', '$recebe_exib_inicio_ona', '$recebe_exib_fim_ona', '$img_nome1', '$recebe_select_anime5', '$recebe_tipo_anime4', '$recebe_cat_ona')");
	move_uploaded_file($recebe_img_mini['tmp_name'], $destino.$img_nome1);
	header('location:anime_inserir_form.php');
} catch(PDOException $e) {
	echo $e->getMessage();
} ?>