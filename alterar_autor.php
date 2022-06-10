<?php
session_start();
	if (empty($_SESSION['adm']) || $_SESSION['adm']!=1) {
		header('location:index.php');
	}
include 'conecta.php';
$id_autor = $_POST['input_id_autor'];

$recebe_diretor = $_POST['input_diretor'];
$recebe_producao = $_POST['input_producao'];
$recebe_roteiro = $_POST['input_roteiro'];
$recebe_musica = $_POST['input_musica'];
$recebe_estudio = $_POST['input_estudio'];
$recebe_licenciado = $_POST['input_licenciado'];
$recebe_original = $_POST['input_original_network'];

try {
	$inserir=$conecta->query("UPDATE `autor` SET 
	direcao='$recebe_diretor',
	producao='$recebe_producao',
	roteiro='$recebe_roteiro',
	musica='$recebe_musica',
	estudio='$recebe_estudio',
	licenciamento='$recebe_licenciado',
	original_network='$recebe_original' WHERE id_autor='$id_autor'");

	header('location:anime_inserir_form.php');
} catch(PDOException $e) {
	echo $e->getMessage();
} ?>