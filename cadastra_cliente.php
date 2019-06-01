<?php
	try {
		$dns = "mysql:dbname=infotec;host=localhost";
		$user = "root";
		$pass = "vertrigo";
		$pdo = new PDO($dns, $user, $pass);
	}catch (PDOException $e){
		echo "Falha: ". $e->getMessage();
	}




?>

<?php

function validaCPF($cpf = null) {

	// Verifica se um número foi informado
	if(empty($cpf)) {
		return false;
	}

	// Elimina possivel mascara
	$cpf = preg_replace("/[^0-9]/", "", $cpf);
	$cpf = str_pad($cpf, 11, '0', STR_PAD_LEFT);
	
	// Verifica se o numero de digitos informados é igual a 11 
	if (strlen($cpf) != 11) {
		return false;
	}
	// Verifica se nenhuma das sequências invalidas abaixo 
	// foi digitada. Caso afirmativo, retorna falso
	else if ($cpf == '00000000000' || 
		$cpf == '11111111111' || 
		$cpf == '22222222222' || 
		$cpf == '33333333333' || 
		$cpf == '44444444444' || 
		$cpf == '55555555555' || 
		$cpf == '66666666666' || 
		$cpf == '77777777777' || 
		$cpf == '88888888888' || 
		$cpf == '99999999999') {
		return false;
	 // Calcula os digitos verificadores para verificar se o
	 // CPF é válido
	 } else {   
		
		for ($t = 9; $t < 11; $t++) {
			
			for ($d = 0, $c = 0; $c < $t; $c++) {
				$d += $cpf{$c} * (($t + 1) - $c);
			}
			$d = ((10 * $d) % 11) % 10;
			if ($cpf{$c} != $d) {
				return false;
			}
		}

		return true;
	}
}

$telefone = htmlspecialchars(addslashes($_POST['telefone']));
$nome = htmlspecialchars(addslashes($_POST['name']));
$cpf = htmlspecialchars(addslashes($_POST['cpf']));
$senha = htmlspecialchars(addslashes($_POST['senha']));

$sql = $pdo->query("SELECT * FROM cliente WHERE cpf_cliente= '$cpf' OR nome_cliente= '$nome'");
if ($sql->rowCount() > 0) {
	echo "<script>alert('Já existe um usuário com esse nome ou cpf');location.href='cadastro_de_cliente.php'</script>";
}elseif(empty($telefone) or empty($nome) or empty($cpf) or empty($senha)){
	echo "<script>alert('Preencha todos os campos');location.href='cadastro_de_cliente.php'</script>";
}elseif(validaCPF($cpf) == 0){
    echo "<script>alert('Informe um cpf valido');location.href='cadastro_de_cliente.php'</script>";
}else{
    $pdo->query("INSERT INTO cliente SET cpf_cliente= '$cpf', nome_cliente= '$nome', tel_cliente= '$telefone', senha_cliente= '$senha'");
    echo "<script>alert('Cadastro efetuado com Sucesso');location.href='logincliente.php'</script>";
}



?>