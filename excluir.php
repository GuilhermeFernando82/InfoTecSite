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
$pdo->query("UPDATE servicos SET situacao= 2 where tipo= '$tipo' AND cpf_cliente= '$cpf'");
echo "<script>location.href='areaadm.php'</script>";



?>