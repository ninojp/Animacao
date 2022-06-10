<?php
$host = "localhost";	
$user = "root";
$pass = "";
$dbname = "anime_bd2";
//$port = 3306;

try {
	//conexão com uso da PORTA
	//$conecta = new PDO("mysql:host=$host;port=$port;dbname=" . $dbname, $user, $pass);
	
	//conexão sem o uso da PORTA
	$conecta = new PDO("mysql:host=$host;dbname=" . $dbname, $user, $pass);
	
//	echo "Conexão com o Banco de Dados realizada com sucesso!";
}	catch(PDOException $err) {
	//echo "Erro: Conexão com o Banco de dados FALHOU!. Erro grado" . $err->getMessage();
	}
	
?>