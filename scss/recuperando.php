
<?php


try {
		$dns = "mysql:dbname=infotec;host=localhost";
		$user = "root";
		$pass = "vertrigo";
		$pdo = new PDO($dns, $user, $pass);
	}catch (PDOException $e){
		echo "Falha: ". $e->getMessage();
	}
$cpf=$_POST['cpf'];
$nome=$_POST['nome'];

$s = $pdo->query("SELECT * FROM cliente WHERE cpf_cliente= '$cpf' AND nome_cliente= '$nome'");

if($s->rowCount() > 0){
    foreach ($s as $key) {
        echo "<script>alert('Sua senha é: ".$key['senha_cliente']."');location.href='logincliente.php'</script>";
    }
}else{
    echo "<script>alert('Dados incorretos!!!');location.href='logincliente.php'</script>";
}


?>
