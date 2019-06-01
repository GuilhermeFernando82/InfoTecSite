<?php
try {
		$dns = "mysql:dbname=infotec;host=localhost";
		$user = "root";
		$pass = "vertrigo";
		$pdo = new PDO($dns, $user, $pass);
	}catch (PDOException $e){
		echo "Falha: ". $e->getMessage();
	}

$tipo = $_POST['tipos'];
$cpf = $_POST['cpf'];
echo $tipo;
$pdo->query("DELETE FROM servicos where tipo= '$tipo' and cpf_cliente= '$cpf'");
echo "<script>location.href='areacliente.php'</script>";


?>