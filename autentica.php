<?php
try {
		$dns = "mysql:dbname=infotec;host=localhost";
		$user = "root";
		$pass = "vertrigo";
		$pdo = new PDO($dns, $user, $pass);
	}catch (PDOException $e){
		echo "Falha: ". $e->getMessage();
	}
$t = $pdo->query("SELECT * FROM cliente");

$nome = $_POST['name'];
$senha = $_POST['senha'];

$sql = $pdo->query("SELECT * FROM cliente WHERE nome_cliente='$nome' and senha_cliente= '$senha'");

if($sql->rowCount() > 0){
	echo "<script>alert('logado com sucesso!!!');location.href='areacliente.php';</script>";
    session_start();
    $_SESSION['nome_cliente'] = $nome;
    $_SESSION['cliente'] = true;
    $sql = "SELECT * FROM cliente WHERE nome_cliente= '$nome'";

	
}else{
	echo "<script>alert('Usuário ou senha invalidos!!');location.href='logincliente.php'</script>";
}











?>