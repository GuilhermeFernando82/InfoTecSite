<?php
	session_start();
if($_SESSION['usuario_adm'] != 1){
	echo "<script>alert('Areá reservada apenas para usarios Administradores');location.href='areaadm.php'</script>";

}else{
	echo "<script>alert('Bem vindo');</script>";
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<title>Cadastro de Funcionário</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images1/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor1/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts1/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor1/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor1/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor1/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css1/util.css">
	<link rel="stylesheet" type="text/css" href="css1/main.css">
<!--===============================================================================================-->
</head>
<body>

	<div class="bg-contact2" style="background-image: url('images/bg-01.jpg');">
		<div class="container-contact2">
			<div class="wrap-contact2">
				<form class="contact2-form validate-form" method="post" action="cadastrando.php">
					<span class="contact2-form-title">
						Cadastrar Funcionário
					</span>

					<div class="wrap-input2 validate-input" data-validate="Preencha o campo nome">
						<input class="input2" type="text" name="name">
						<span class="focus-input2" data-placeholder="Nome"></span>
					</div>

					<div class="wrap-input2 validate-input" data-validate = "Digite o cpf">
						<input class="input2" type="text" name="cpf">
						<span class="focus-input2" data-placeholder="CPF"></span>
					</div>
						<div class="wrap-input2 validate-input" data-validate = "Digite a senha">
						<input class="input2" type="password" name="senha">
						<span class="focus-input2" data-placeholder="Senha"></span>
					</div>
					
					<div class="wrap-input3 validate-input">
						<div>
							<h1>Selecione o Tipo de Funcionário</h1>
							<select class="selection-2" name="nivel">
								<option value="1">Funcionario Atendente</option>
								<option value="2">Funcionario Administrador</option>
								
							</select>
						</div>
						<span class="focus-input3"></span>
					</div>
					<div class="container-contact2-form-btn">
						<div class="wrap-contact2-form-btn">
							<div class="contact2-form-bgbtn"></div>
							<button class="contact2-form-btn">
								Cadastrar
							</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>




<!--===============================================================================================-->
	<script src="vendor1/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor1/bootstrap/js/popper.js"></script>
	<script src="vendor1/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor1/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="js1/main.js"></script>

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-23581568-13');
	</script>

</body>
</html>
