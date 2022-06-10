<?php
session_start();
	if (empty($_SESSION['adm']) || $_SESSION['adm']!=1) {
		header('location:index.php');
	}
include 'conexao.php';
/* include ('resize-class.php'); */
$recebe_nome = $_POST['nome'];
$recebe_nome_completo = $_POST['nome_completo'];
$recebe_genero = $_POST['genero'];
$recebe_descricao = $_POST['descricao'];
$recebe_temporadas = $_POST['temporadas'];
$recebe_direcao = $_POST['direcao'];
$recebe_elenco = $_POST['elenco'];
$recebe_nota = $_POST['nota'];
/* $remover1='.';
$recebe_preco = str_replace($remover1, '', $recebe_preco);
$remover2=',';
$recebe_preco = str_replace($remover2, '.', $recebe_preco); */
$recebe_fotomini = $_FILES['fotomini'];
$recebe_foto1 = $_FILES['foto1'];
$recebe_foto2 = $_FILES['foto2'];
$recebe_foto3 = $_FILES['foto3'];
$recebe_foto4 = $_FILES['foto4'];
$recebe_foto5 = $_FILES['foto5'];

$destino = "imgs/animes/";
preg_match("/\.(jpg|jpeg|png|gif){1}$/i",$recebe_fotomini['name'],$extencao1);
$img_nome1 = md5(uniqid(time())).".".$extencao1[1];
preg_match("/\.(jpg|jpeg|png|gif){1}$/i",$recebe_foto1['name'],$extencao2);
$img_nome2 = md5(uniqid(time())).".".$extencao2[1];
preg_match("/\.(jpg|jpeg|png|gif){1}$/i",$recebe_foto2['name'],$extencao3);
$img_nome3 = md5(uniqid(time())).".".$extencao3[1];
preg_match("/\.(jpg|jpeg|png|gif){1}$/i",$recebe_foto3['name'],$extencao4);
$img_nome4 = md5(uniqid(time())).".".$extencao4[1];
preg_match("/\.(jpg|jpeg|png|gif){1}$/i",$recebe_foto4['name'],$extencao5);
$img_nome5 = md5(uniqid(time())).".".$extencao5[1];
preg_match("/\.(jpg|jpeg|png|gif){1}$/i",$recebe_foto5['name'],$extencao6);
$img_nome6 = md5(uniqid(time())).".".$extencao6[1];

try {
	$inserir=$conexao->query("INSERT INTO animes (nome, nome_completo, genero, descricao, temporadas, direcao, elenco, nota, fotomini, foto1, foto2, foto3, foto4, foto5) 
	VALUES ('$recebe_nome', '$recebe_nome_completo', '$recebe_genero', '$recebe_descricao', '$recebe_temporadas', '$recebe_direcao', '$recebe_elenco', '$recebe_nota', '$img_nome1', '$img_nome2', '$img_nome3', '$img_nome4', '$img_nome5', '$img_nome6')");
	move_uploaded_file($recebe_fotomini['tmp_name'], $destino.$img_nome1);             
	/*  $resizeObj = new resize($destino.$img_nome1);
		$resizeObj -> resizeImage(900, 640, 'crop');
		$resizeObj -> saveImage($destino.$img_nome1, 100); */
	move_uploaded_file($recebe_foto1['tmp_name'], $destino.$img_nome2); 
	move_uploaded_file($recebe_foto2['tmp_name'], $destino.$img_nome3); 
	move_uploaded_file($recebe_foto3['tmp_name'], $destino.$img_nome4); 
	move_uploaded_file($recebe_foto4['tmp_name'], $destino.$img_nome5); 
	move_uploaded_file($recebe_foto5['tmp_name'], $destino.$img_nome6);
	header('location:adm.php');
} catch(PDOException $e) {
	echo $e->getMessage();
} ?>