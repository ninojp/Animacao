<?php
session_start();
	if (empty($_SESSION['adm']) || $_SESSION['adm']!=1) {
		header('location:index.php');
	}
include 'conecta.php';
$id_filme = $_GET['id_filme'];
$consulta = $conecta->query("SELECT * FROM filme WHERE id_filme='$id_filme'");
$exibe = $consulta->fetch(PDO::FETCH_ASSOC);


$recebe_titulo_filme = $_POST['titulo_filme'];
$recebe_subtitulo_filme = $_POST['subtitulo_filme'];
$recebe_duracao_filme = $_POST['duracao_filme'];
$recebe_exibido_filme = $_POST['exibido_filme'];
$recebe_enredo_filme = $_POST['enredo_filme'];
$recebe_tipo_filme = $_POST['tipo_filme'];
$recebe_fotomini = $_FILES['img_mini_filme'];

$destino = "imgs/filme/";

if (!empty($recebe_fotomini['name'])) {
	preg_match("/\.(jpg|jpeg|png|gif){1}$/i",$recebe_fotomini['name'],$extencao1);
	$img_nome1 = md5(uniqid(time())).".".$extencao1[1];
	$upload_fotomini=1;
} else {
	$img_nome1=$exibe['img_mini'];
	$upload_fotomini=0;
}

try {
	$inserir=$conecta->query("UPDATE `filme` SET 
	titulo_filme='$recebe_titulo_filme',
	s_titulo_filme='$recebe_subtitulo_filme',
	duracao_filme='$recebe_duracao_filme',
	exibido='$recebe_exibido_filme',
	enredo_filme='$recebe_enredo_filme',
	tipo_id_tipo = '$recebe_tipo_filme',
	img_mini = '$img_nome1' WHERE id_filme='$id_filme'");

	if ($upload_fotomini==1) {
	move_uploaded_file($recebe_fotomini['tmp_name'], $destino.$img_nome1);             
	}
	
	header('location:anime_alterar_form.php');
} catch(PDOException $e) {
	echo $e->getMessage();
} ?>