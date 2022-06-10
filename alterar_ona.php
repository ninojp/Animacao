<?php
session_start();
	if (empty($_SESSION['adm']) || $_SESSION['adm']!=1) {
		header('location:index.php');
	}
include 'conecta.php';
$id_ona = $_GET['id_ona'];
$consulta = $conecta->query("SELECT * FROM ona WHERE id_ona='$id_ona'");
$exibe = $consulta->fetch(PDO::FETCH_ASSOC);

$recebe_titulo_ona = $_POST['titulo_ona'];
$recebe_subtitulo_ona = $_POST['subtitulo_ona'];
$recebe_n_episodios = $_POST['n_episodios'];
$recebe_duracao_ona = $_POST['duracao_ona'];
$recebe_exib_inicio_ona = $_POST['exib_inicio_ona'];
$recebe_exib_fim_ona = $_POST['exib_fim_ona'];
$recebe_enredo_ona = $_POST['descricao_ona'];
$recebe_tipo_ona = $_POST['tipo_ona'];
$recebe_fotomini = $_FILES['img_mini_ona'];

$destino = "imgs/ona/";

if (!empty($recebe_fotomini['name'])) {
	preg_match("/\.(jpg|jpeg|png|gif){1}$/i",$recebe_fotomini['name'],$extencao1);
	$img_nome1 = md5(uniqid(time())).".".$extencao1[1];
	$upload_fotomini=1;
} else {
	$img_nome1=$exibe['img_mini'];
	$upload_fotomini=0;
}

try {
	$inserir=$conecta->query("UPDATE `ona` SET 
	titulo_ona='$recebe_titulo_ona',
	s_titulo_ona='$recebe_subtitulo_ona',
	n_episodio_ona='$recebe_n_episodios',
	duracao_ona='$recebe_duracao_ona',
	exib_inicio='$recebe_exib_inicio_ona',
	exib_fim='$recebe_exib_fim_ona',
	enredo_ona='$recebe_enredo_ona',
	tipo_id_tipo = '$recebe_tipo_ona',
	img_mini = '$img_nome1' WHERE id_ona='$id_ona'");

	if ($upload_fotomini==1) {
	move_uploaded_file($recebe_fotomini['tmp_name'], $destino.$img_nome1);             
	}
	
	header('location:anime_alterar_form.php');
} catch(PDOException $e) {
	echo $e->getMessage();
} ?>