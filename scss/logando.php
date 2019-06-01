<?php
try {
		$dns = "mysql:dbname=infotec;host=localhost";
		$user = "root";
		$pass = "vertrigo";
		$pdo = new PDO($dns, $user, $pass);
	}catch (PDOException $e){
		echo "Falha: ". $e->getMessage();
	}

$nome = $_POST['name'];
$senha = $_POST['senha'];

$sql = $pdo->query("SELECT * FROM funcionario WHERE nome_func='$nome' and senha_func= '$senha'");

if($sql->rowCount() > 0){
	echo "<script>alert('logado com sucesso!!!');location.href='areaadm.php';</script>";
	session_start();
	$_SESSION['usuario'] = true;

	
}else{
	echo "<script>alert('Usuário ou senha invalidos!!');location.href='login.php'";
}











?>