<?php session_start();
ob_start();

	if (empty($_SESSION['adm']) || $_SESSION['adm']!=1) {
		header('location:index.php');
	}
include 'conecta.php';

$recebe_nome = $_POST['input_nome'];
$recebe_nome_completo = $_POST['input_nome_completo'];
$recebe_descricao = $_POST['descricao'];
$recebe_personagens = $_POST['personagens'];
$recebe_id_autor = $_POST['select_autor'];
$recebe_cat = $_POST['select_categoria'];
$recebe_img_mini = $_FILES['img_mini_anime'];

$destino = "imgs/anime/";
preg_match("/\.(jpg|jpeg|png|gif){1}$/i",$recebe_img_mini['name'],$extencao1);
$img_nome1 = md5(uniqid(time())).".".$extencao1[1];

try {
	$inserir=$conecta->query("INSERT INTO `anime` (`nome_anime`, `nome_completo_anime`, `descricao_anime`, `personagens`, `img_mini`, `autor_id_autor`, `categoria_id_cat`) 
	VALUES ('$recebe_nome', '$recebe_nome_completo', '$recebe_descricao', '$recebe_personagens', '$img_nome1', '$recebe_id_autor', '$recebe_cat')");
	move_uploaded_file($recebe_img_mini['tmp_name'], $destino.$img_nome1);
	header('location:anime_inserir_form.php');
} catch(PDOException $e) {
	echo $e->getMessage();
} ?>