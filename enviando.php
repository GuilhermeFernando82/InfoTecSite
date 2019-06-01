<?php
	try {
		$dns = "mysql:dbname=infotec;host=localhost";
		$user = "root";
		$pass = "vertrigo";
		$pdo = new PDO($dns, $user, $pass);
	}catch (PDOException $e){
		echo "Falha: ". $e->getMessage();
	}

session_start();
if($_SESSION['cliente'] != 1){
	echo "<script>alert('Você precisa estar logado para ter acesso a essa pagina!');location.href='index.php'</script>";

}else{

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
$servico = htmlspecialchars(addslashes($_POST['service']));
$cpf_func = "08427728980";
$s = $pdo->query("SELECT * FROM servicos WHERE tipo= '$servico' AND cpf_cliente= '$cpf'");
$logado =  $_SESSION['nome_cliente'];
//$sqll = $pdo->query("SELECT * FROM cliente WHERE nome_cliente= '$nome1'");
$sql = $pdo->query("SELECT * FROM cliente WHERE cpf_cliente= '$cpf' AND nome_cliente= '$logado'");

if($sql->rowCount() == 0){
	echo "<script>alert('CPF deve ser o mesmo que usou para cadastrar.');location.href='form.php'</script>";
}elseif($nome != $logado){
	echo "<script>alert('O nome deve ser o mesmo que você usou para cadastrar!');location.href='form.php'</script>";
}elseif(empty($telefone) or empty($nome) or empty($cpf) or $servico=='Simples'){
	echo "<script>alert('Preencha todos os campos');location.href='form.php'</script>";
}elseif(validaCPF($cpf) == 0){
	echo "<script>alert('Informe um cpf valido');location.href='form.php'</script>";
}elseif($s->rowCount() > 0){
	echo "<script>alert('Já existe esse serviço nos seus pedidos');location.href='form.php'</script>";
}elseif ($servico == 'Formatar'){
	$servico = 'Formatar';
	
	$pdo->query("INSERT INTO servicos SET tipo= '$servico', cpf_cliente= '$cpf', cpf_func= '$cpf_func', nome_cliente= '$nome', telefone_do_cliente= '$telefone', situacao= '0'");
	
	echo "<script>alert('Enviado com sucesso aguarde o contato');location.href='areacliente.php'</script>";

}elseif ($servico == 'Montar_PC'){
	$servico = 'Montar_PC';
	$pdo->query("INSERT INTO servicos SET tipo= '$servico', cpf_cliente= '$cpf', cpf_func= '$cpf_func', nome_cliente= '$nome', telefone_do_cliente= '$telefone', situacao= '0'");

	echo "<script>alert('Enviado com sucesso aguarde o contato');location.href='areacliente.php'</script>";
}elseif ($servico == 'Trocar_Peças') {
	$servico = 'Trocar_Peças';
	$pdo->query("INSERT INTO servicos SET tipo= '$servico', cpf_cliente= '$cpf', cpf_func= '$cpf_func', nome_cliente= '$nome', telefone_do_cliente= '$telefone', situacao= '0'");
	
	echo "<script>alert('Enviado com sucesso aguarde o contato');location.href='areacliente.php'</script>";
}elseif ($servico == 'Suporte') {
	$servico = 'Suporte';
	$pdo->query("INSERT INTO servicos SET tipo= '$servico', cpf_cliente= '$cpf', cpf_func= '$cpf_func', nome_cliente= '$nome', telefone_do_cliente= '$telefone', situacao= '0'");
	
	echo "<script>alert('Enviado com sucesso aguarde o contato');location.href='areacliente.php'</script>";
}




?>