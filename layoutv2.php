<?php
session_start();
if(empty($_SESSION['usuarioNome'])){
	header("location:index.php");
}

?>	
<!DOCTYPE html>

<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Contas Pessoais v1.33.1 - Principal</title>
	<link rel="stylesheet" href="css/estilo.css">
	<link rel="icon" href="img/favicon.ico">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">

	
</head>

<body>		

	<header id="header">
		<div  class="innertube">
			<h4>Header...</h4>

			<a href="#" onclick="frmsair.submit()"><button style="padding: 5px;font-size: medium; float: right; margin: -35px -5px;" type='button' class='btn btn-danger btn-sm'> Sair</button></a>
			<form method="post" id="frmsair" action="sair.php"> </form>
		</div>
	</header>

	<div id="wrapper">
		
		<main>
			<div id="content">
				<div class="innertube">
					
					<?php 
					@$pagina = $_GET['a'];
					if (isset($pagina)) {
						include $pagina;
					}else{
						echo $pagina;
					}

					?>
					
				</div>
			</div>
		</main>
		<nav id="nav">
			<div class="innertube">
				<h4 style="padding-bottom: -10px;"><ul>
					<li><a href="layout.php?a=dashboard.php"> Home</h4></a></li>
				</ul>
				<h3>Gerenciar</h3>
				<ul>
					<li><a href="layout.php?a=dashboard.php">Dashboard</a></li>
							<ul class="submenu-1">
								<li><a href="layout.php?a=dashboard.php">Dashboard Geral</a></li>
								<li><a href="layout.php?a=orcamento.php">Dashboard Orçamentos</a></li>
							</ul>

					<li><a href="#">Lançamentos</a></li>
							<ul class="submenu-1">
								<li><a href="layout.php?a=lancamento.php">Lançamentos Gerais</a></li>
								<li><a href="#">Incluir Orçamentos</a></li>
							</ul>
					

					<li><a href="#">Contas</a>
						<li><a href="layout.php?a=viewnotasfiscais.php">Notas Fiscais</a></li>
					</ul>
					<h3>Relatórios</h3>

					<ul>
						<li><a href="#">Extrato de Contas</a></li>
						<li><a href="#">Receitas</a>
							<ul class="submenu-1">
								<li><a href="layout.php?a=lancamento_receitas.php">Receitas por data</a></li>
								<li><a href="#">Todas as Receitas</a></li>
							</ul>
						</li>
						<li><a href="#">Despesas</a>
							<ul class="submenu-1">
								<li><a href="layout.php?a=lancamento_despesas.php">Despesas por data</a></li>
								<li><a href="#">Todas as Despesas</a></li>
							</ul>
						</li>
						<li><a href="#">Cartão de Créditos</a></li>
					</ul>
					<h3>Ferramentas</h3>
					<ul>
						<li><a href="#">Backup</a></li>
						<li><a href="#">Configurar</a></li>
						<li><a href="#">Importar</a>
							<ul class="submenu-1">
								<li><a href="layout.php?a=import_extrato.php">Extrato bancário</a></li>
								<li><a href="layout.php?a=import_notasfiscais.php">Notas fiscais</a></li>
							</ul>
						</li>
					</ul>
				</div>
			</nav>

		</div>
		
		<footer id="footer">
			<div class="innertube">
				<p>Footer...</p>
			</div>
		</footer>

	</body>
	</html>