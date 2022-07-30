<?php session_start();
	ob_start();
	if (empty($_SESSION['adm']) || $_SESSION['adm']!=1) {
		header('location:index.php');
	}
include 'conecta.php';

$recebe_titulo_serie = $_POST['titulo_serie'];
$recebe_subtitulo_serie = $_POST['subtitulo_serie'];
$recebe_enredo_serie = $_POST['enredo_serie'];
$recebe_n_episodios = $_POST['n_episodios'];
$recebe_duracao_serie = $_POST['duracao_serie'];
$recebe_exib_inicio_serie = $_POST['exib_inicio_serie'];
$recebe_exib_fim_serie = $_POST['exib_fim_serie'];
$recebe_select_anime2 = $_POST['select_anime2'];
$recebe_tipo_anime = $_POST['tipo_anime'];
$recebe_cat_serie = $_POST['select_cat_ser'];
$recebe_img_mini = $_FILES['img_mini'];

$destino = "imgs/serie/";
preg_match("/\.(jpg|jpeg|png|gif){1}$/i",$recebe_img_mini['name'],$extencao1);
$img_nome1 = md5(uniqid(time())).".".$extencao1[1];

try {
	$inserir=$conecta->query("INSERT INTO `serie` (`titulo_serie`, `s_titulo_serie`, `enredo_serie`, `n_episodio_serie`, `duracao_serie`, `exib_inicio`, `exib_fim`, `img_mini`, `serie_id_anime`, `tipo_id_tipo`, `categoria_id_cat`) 
	VALUES ('$recebe_titulo_serie', '$recebe_subtitulo_serie', '$recebe_enredo_serie', '$recebe_n_episodios', '$recebe_duracao_serie', '$recebe_exib_inicio_serie', '$recebe_exib_fim_serie', '$img_nome1', '$recebe_select_anime2', '$recebe_tipo_anime', '$recebe_cat_serie')");
	move_uploaded_file($recebe_img_mini['tmp_name'], $destino.$img_nome1);  
	header('location:anime_inserir_form.php');
} catch(PDOException $e) {
	echo $e->getMessage();
} ?>