<!DOCTYPE HTML>
<?php
	session_start();
if($_SESSION['cliente'] != 1){
	echo "<script>alert('Você precisa estar logado para ter acesso a essa pagina!');location.href='index.php'</script>";

}else{
	echo "<script>alert('Bem vindo');</script>";
}

?>

<html>
	<head>
		<title>Area do Cliente</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<style type="text/css">
			#nome{
				color: green;

			}
			#nome1{
				color: green
			}
		</style>
	</head>
	<body class="homepage is-preload">
		<div id="page-wrapper">

			<!-- Header -->
				<section id="header" class="wrapper">

					<!-- Logo -->
						<div id="logo">
							<h1>Area do Cliente</h1>
							
						</div>

					<!-- Nav -->
						<nav id="nav">
							<ul>
								<li class="current"><a href="index.html">Inicio</a></li>
                                <li><a href="form.php">Solicitar Serviços</a></li>
								<li><a href="sair.php">Sair</a></li>
							
							</ul>
						</nav>

				</section>

			<!-- Intro -->
				<section id="intro" class="wrapper style1">
					<div class="title">Pedidos de Serviços</div>
					<div class="container">
<?php
	try {
		$dns = "mysql:dbname=infotec;host=localhost";
		$user = "root";
		$pass = "vertrigo";
		$pdo = new PDO($dns, $user, $pass);
	}catch (PDOException $e){
		echo "Falha: ". $e->getMessage();
    }
    
    $nome = $_SESSION['nome_cliente'];
    echo "<h1>Bem vindo cliente: "."<h4>".$_SESSION['nome_cliente']."</h4>"."</h1>";
    echo "<br>";
    echo "<a href='form.php' class='button style3 large'>Solicitar Serviços</a>";
    echo "<br><br><br><br>";
    echo "<h1>Meus pedidos</h1>";

        $sql1 = $pdo->query("SELECT * FROM cliente WHERE nome_cliente= '$nome'");
  
		$sql = $pdo->query("SELECT * FROM servicos WHERE nome_cliente= '$nome'");
	 
                foreach ($sql->fetchAll() as $variavel){
                echo "<h3 style='text-align:center'>"."Nome do Cliente: ".$variavel['nome_cliente']."</h3>";
                echo "<h3>"."CPF do Cliente: ".$variavel['cpf_cliente']."</h3>";
              	echo "<h3>"."Serviço solicitado: ".$variavel['tipo']."</h3>";
              
              	if($variavel['situacao']=='2'){
        			echo "Serviço foi concluido";

        		}else{
							echo "Serviço Pendente, aguarde o contato";
						}
        		echo "<form method='post' action='excluir1.php'>
					<input type='hidden' name='tipos' value=".$variavel['tipo'].">
					<input type='hidden' name='cpf' value=".$variavel['cpf_cliente'].">
					<input id='ff' type='submit' value='Excluir Pedido'>
					</form>";
        			echo "<hr>";
        		
        	
        }
              foreach ($sql->fetchAll() as $q){
             echo "<h3 style='text-align:center'>"."Telefone do Cliente: ".$q['tel_cliente']."</h3>"."</h3>";
        }
        
        		
        
?>
					</div>
				</section>
<section id="footer" class="wrapper">
					<div class="title">Rodapé</div>
					<div class="container">
						<header class="style1">
							<h2></h2>
							<p>
								
							</p>
						</header>
						<div class="row">
							<div class="col-6 col-12-medium">

								<!-- Contact Form -->
									

							</div>
							<div class="col-6 col-12-medium">

								<!-- Contact -->
									<section class="feature-list small">
										<div class="row">
											<div class="col-6 col-12-small">
												<section>
													<h3 class="icon fa-home">Endereço</h3>
													<p>
														tecinfo@gmail.com<br />
														Rua sete setembro<br />
														Curitiba centro
													</p>
												</section>
											</div>
											<div class="col-6 col-12-small">
												<section>
													<h3 class="icon fa-comment">Social</h3>
													<p>
														<a href="#">@untitled-corp</a><br />
														<a href="#">linkedin.com/untitled</a><br />
														<a href="#">facebook.com/untitled</a>
													</p>
												</section>
											</div>
											<div class="col-6 col-12-small">
												<section>
													<h3 class="icon fa-envelope">Email</h3>
													<p>
														<a href="#">info@untitled.tld</a>
													</p>
												</section>
											</div>
											<div class="col-6 col-12-small">
												<section>
													<h3 class="icon fa-phone">Telefone</h3>
													<p>
														(000) 555-0000
													</p>
												</section>
											</div>
										</div>
									</section>

							</div>
						</div>
						<div id="copyright">
							<ul>
								<li>Alunos do Colégio pedro macedo</li><li></a></li>
							</ul>
						</div>
					</div>
				</section>

		</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.dropotron.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>
			<!-- Main -->
				
			<!-- Footer -->

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.dropotron.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>

</html>