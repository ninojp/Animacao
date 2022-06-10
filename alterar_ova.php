<?php
session_start();
	if (empty($_SESSION['adm']) || $_SESSION['adm']!=1) {
		header('location:index.php');
	}
include 'conecta.php';
$id_ova = $_GET['id_ova'];
$consulta = $conecta->query("SELECT * FROM ova WHERE id_ova='$id_ova'");
$exibe = $consulta->fetch(PDO::FETCH_ASSOC);

$recebe_titulo_ova = $_POST['titulo_ova'];
$recebe_subtitulo_ova = $_POST['subtitulo_ova'];
$recebe_n_episodios = $_POST['n_episodios'];
$recebe_duracao_ova = $_POST['duracao_ova'];
$recebe_exib_inicio_ova = $_POST['exib_inicio_ova'];
$recebe_exib_fim_ova = $_POST['exib_fim_ova'];
$recebe_enredo_ova = $_POST['descricao_ova'];
$recebe_tipo_ova = $_POST['tipo_ova'];
$recebe_fotomini = $_FILES['img_mini_ova'];

$destino = "imgs/ova/";

if (!empty($recebe_fotomini['name'])) {
	preg_match("/\.(jpg|jpeg|png|gif){1}$/i",$recebe_fotomini['name'],$extencao1);
	$img_nome1 = md5(uniqid(time())).".".$extencao1[1];
	$upload_fotomini=1;
} else {
	$img_nome1=$exibe['img_mini'];
	$upload_fotomini=0;
}

try {
	$inserir=$conecta->query("UPDATE `ova` SET 
	titulo_ova='$recebe_titulo_ova',
	s_titulo_ova='$recebe_subtitulo_ova',
	n_episodio_ova='$recebe_n_episodios',
	duracao_ova='$recebe_duracao_ova',
	exib_inicio='$recebe_exib_inicio_ova',
	exib_fim='$recebe_exib_fim_ova',
	enredo_ova='$recebe_enredo_ova',
	tipo_id_tipo = '$recebe_tipo_ova',
	img_mini = '$img_nome1' WHERE id_ova='$id_ova'");

	if ($upload_fotomini==1) {
	move_uploaded_file($recebe_fotomini['tmp_name'], $destino.$img_nome1);             
	}
	
	header('location:anime_alterar_form.php');
} catch(PDOException $e) {
	echo $e->getMessage();
} ?>