<?php
session_start();
include('conecta.php');
$recebe_email = $_POST['email'];
$recebe_senha = $_POST['senha']; 
$consulta = $conecta->query("SELECT id_usuario, email, senha, adm FROM usuario WHERE email='$recebe_email' AND senha='$recebe_senha'");
if ($consulta->rowCount()==1) {
	$exibeUser=$consulta->fetch(PDO::FETCH_ASSOC);
	if ($exibeUser['adm']==0) {
		$_SESSION['id']=$exibeUser['id_usuario'];
		$_SESSION['adm']=0;
		header('location:index.php');
	} else {
		$_SESSION['id']=$exibeUser['id_usuario'];
		$_SESSION['adm']=1;
		header('location:index.php');
		}
} else {
	header('location:erro_login.php'); 
} ?>