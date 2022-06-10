<?php
session_start();
	if (empty($_SESSION['adm']) || $_SESSION['adm']!=1) {
		header('location:index.php');
	}
include 'conecta.php';

$recebe_genero_anime = $_POST['genero_anime'];
$recebe_select_anime = $_POST['select_anime'];


try {
	$inserir=$conecta->query("INSERT INTO `anime_genero` (`fk_id_genero`, `fk_id_anime`) 
	VALUES ('$recebe_genero_anime', '$recebe_select_anime')");

	header('location:anime_inserir_form.php');
} catch(PDOException $e) {
	echo $e->getMessage();
} ?>