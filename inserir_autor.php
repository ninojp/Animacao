<?php
session_start();
	if (empty($_SESSION['adm']) || $_SESSION['adm']!=1) {
		header('location:index.php');
	}
include 'conecta.php';

$recebe_diretor = $_POST['input_diretor'];
$recebe_producao = $_POST['input_producao'];
$recebe_roteiro = $_POST['input_roteiro'];
$recebe_musica = $_POST['input_musica'];
$recebe_estudio = $_POST['input_estudio'];
$recebe_licenciado = $_POST['input_licenciado'];
$recebe_original = $_POST['input_original_network'];

try {
	$inserir=$conecta->query("INSERT INTO `autor` (`direcao`, `producao`, `roteiro`, `musica`, `estudio`, `licenciamento`, `original_network`) 
	VALUES ('$recebe_diretor', '$recebe_producao', '$recebe_roteiro', '$recebe_musica', '$recebe_estudio', '$recebe_licenciado', '$recebe_original')");

	header('location:anime_inserir_form.php');
} catch(PDOException $e) {
	echo $e->getMessage();
} ?>