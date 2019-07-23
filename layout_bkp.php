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
		<title>Contas Pessoais v1.3 - Principal</title>
		<link rel="stylesheet" href="css/estilo.css">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	 <!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">

	
	</head>
	
	<body>		

		<header id="header">
			<div  class="innertube">
				<h4>Header...</h4>
				<!-- <div style="width: 1200px; margin: 100 auto;" >-->
				<a href="sair.php" data-toggle="modal"><button style="padding: 5px;font-size: medium; float: right; margin: -35px -5px;" type='button' class='btn btn-danger btn-sm'> Sair</button></a>
				<!--</div>-->
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
						<li><a href="layout.php?a=lancamento.php">Lançamentos</a></li>
            			<li><a href="#">Contas</a>
            			<li><a href="layout.php?a=viewnotasfiscais.php">Notas Fiscais</a></li>
					</ul>
					<h3>Relatórios</h3>

					<ul>
						<li><a href="#">Extrato de Contas</a></li>
            			<li><a href="#">Receitas</a>
            				<ul class="submenu-1">
		                    	<li><a href="#">Receitas por data</a></li>
		                        <li><a href="#">Todas as Receitas</a></li>
                    			</ul>
             				</li>
            			<li><a href="#">Despesas</a>
            				    <ul class="submenu-1">
		                    		<li><a href="#">Despesas por data</a></li>
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