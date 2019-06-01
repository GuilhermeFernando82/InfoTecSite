<?php
	try {
		$dns = "mysql:dbname=infotec;host=localhost";
		$user = "root";
		$pass = "vertrigo";
		$pdo = new PDO($dns, $user, $pass);
	}catch (PDOException $e){
		echo "Falha: ". $e->getMessage();
	}

$nome = htmlspecialchars(addslashes($_POST['name']));
$cpf = htmlspecialchars(addslashes($_POST['cpf']));
$senha = htmlspecialchars(addslashes($_POST['senha']));
$nivel = $_POST['nivel'];
$sql1 = $pdo->query("SELECT * FROM funcionario WHERE cpf_func= '$cpf'");

if (empty($nome) && empty($cpf) && empty($senha)){
	echo "<script>alert('Preenca todos os  campos!!!');location.href='cadastrofuncionario.php'</script>";

}elseif($sql1->rowCount() > 0){
	echo "<script>alert('Já existe um funcionário com esse cpf!');location.href='cadastrofuncionario.php'</script>";
}elseif ($nivel=='2') {
	$pdo->query("INSERT INTO funcionario SET cpf_func= '$cpf', nome_func= '$nome', senha_func= '$senha', id_tipo= 2");
	echo "<script>alert('Cadastrado com Sucesso!!!');location.href='login.php'</script>";
		
}elseif ($nivel=='1') {
		$pdo->query("INSERT INTO funcionario SET cpf_func= '$cpf', nome_func= '$nome', senha_func= '$senha', id_tipo= 1");
	echo "<script>alert('Cadastrado com Sucesso!!!');location.href='login.php'</script>";
}








?>