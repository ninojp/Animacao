<?php
session_start();
	if (empty($_SESSION['adm']) || $_SESSION['adm']!=1) {
		header('location:index.php');
	}
include 'conecta.php';
$id_especial = $_GET['id_especial'];
$consulta = $conecta->query("SELECT * FROM especial WHERE id_especial='$id_especial'");
$exibe = $consulta->fetch(PDO::FETCH_ASSOC);

$recebe_id_especial = $_GET['id_especial'];
$recebe_titulo_especial = $_POST['titulo_especial'];
$recebe_subtitulo_especial = $_POST['subtitulo_especial'];
$recebe_n_episodios = $_POST['n_episodios'];
$recebe_duracao_especial = $_POST['duracao_especial'];
$recebe_exib_inicio_especial = $_POST['exib_inicio_especial'];
$recebe_exib_fim_especial = $_POST['exib_fim_especial'];
$recebe_enredo_especial = $_POST['descricao_especial'];
$recebe_tipo_especial = $_POST['tipo_especial'];
$recebe_fotomini = $_FILES['img_mini_especial'];

$destino = "imgs/especial/";

if (!empty($recebe_fotomini['name'])) {
	preg_match("/\.(jpg|jpeg|png|gif){1}$/i",$recebe_fotomini['name'],$extencao1);
	$img_nome1 = md5(uniqid(time())).".".$extencao1[1];
	$upload_fotomini=1;
} else {
	$img_nome1=$exibe['img_mini'];
	$upload_fotomini=0;
}

try {
	$inserir=$conecta->query("UPDATE `especial` SET 
	titulo_especial='$recebe_titulo_especial',
	s_titulo_especial='$recebe_subtitulo_especial',
	n_episodio_especial='$recebe_n_episodios',
	duracao_especial='$recebe_duracao_especial',
	exib_inicio='$recebe_exib_inicio_especial',
	exib_fim='$recebe_exib_fim_especial',
	enredo_especial='$recebe_enredo_especial',
	tipo_id_tipo='$recebe_tipo_especial',
	img_mini='$img_nome1' WHERE id_especial='$recebe_id_especial'");

	if ($upload_fotomini==1) {
	move_uploaded_file($recebe_fotomini['tmp_name'], $destino.$img_nome1);             
	}
	
	header('location:anime_alterar_form.php');
} catch(PDOException $e) {
	echo $e->getMessage();
} ?>