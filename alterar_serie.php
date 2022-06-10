<?php
session_start();
	if (empty($_SESSION['adm']) || $_SESSION['adm']!=1) {
		header('location:index.php');
	}
include 'conecta.php';
$id_serie = $_GET['id_serie'];
$consulta = $conecta->query("SELECT * FROM serie WHERE id_serie='$id_serie'");
$exibe = $consulta->fetch(PDO::FETCH_ASSOC);

$recebe_titulo_serie = $_POST['titulo_serie'];
$recebe_subtitulo_serie = $_POST['subtitulo_serie'];
$recebe_n_episodios = $_POST['n_episodios'];
$recebe_duracao_serie = $_POST['duracao_serie'];
$recebe_exib_inicio_serie = $_POST['exib_inicio_serie'];
$recebe_exib_fim_serie = $_POST['exib_fim_serie'];
$recebe_enredo_serie = $_POST['descricao_serie'];
$recebe_fotomini = $_FILES['img_mini_serie'];
$recebe_tipo_serie = $_POST['tipo_serie'];

$destino = "imgs/serie/";

if (!empty($recebe_fotomini['name'])) {
	preg_match("/\.(jpg|jpeg|png|gif){1}$/i",$recebe_fotomini['name'],$extencao1);
	$img_nome1 = md5(uniqid(time())).".".$extencao1[1];
	$upload_fotomini=1;
} else {
	$img_nome1=$exibe['img_mini'];
	$upload_fotomini=0;
}

try {
	$inserir=$conecta->query("UPDATE `serie` SET 
	titulo_serie='$recebe_titulo_serie',
	s_titulo_serie='$recebe_subtitulo_serie',
	n_episodio_serie='$recebe_n_episodios',
	duracao_serie='$recebe_duracao_serie',
	exib_inicio='$recebe_exib_inicio_serie',
	exib_fim='$recebe_exib_fim_serie',
	enredo_serie='$recebe_enredo_serie',
	img_mini = '$img_nome1',
	tipo_id_tipo = '$recebe_tipo_serie' WHERE id_serie='$id_serie'");

	if ($upload_fotomini==1) {
	move_uploaded_file($recebe_fotomini['tmp_name'], $destino.$img_nome1);             
	}
	
	header('location:anime_alterar_form.php');
} catch(PDOException $e) {
	echo $e->getMessage();
} ?>