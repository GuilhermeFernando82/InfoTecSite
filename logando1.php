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
$tipo_de_func = 2;

$sql = $pdo->query("SELECT * FROM funcionario WHERE nome_func= '$nome' and senha_func= '$senha' and id_tipo= '$tipo_de_func'");

if($sql->rowCount() > 0){
	echo "<script>alert('logado com sucesso!!!');location.href='cadastrofuncionario.php';</script>";
	session_start();
	$_SESSION['usuario_adm'] = true;

	
}else{
	echo "<script>alert('Usuário ou senha invalidos!!');location.href='func_adm.php'</script>";
}











?>