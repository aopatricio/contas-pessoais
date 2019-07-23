<?php
  if(empty($_SESSION['usuarioNome'])){
    header("location:index.php");
}
?>
<!DOCTYPE html>

<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Contas Pessoais v1.3 - Importação Notas Fiscais</title>
		<link rel="stylesheet" href="css/estilo.css">
	</head>
	
	<body>		

		<header id="header">
			<div class="innertube">
				<h1>Header...</h1>
			</div>
		</header>
		
		<div id="wrapper">
		
			<main>
				<div id="content">
					 <div class="innertube">
					
						<?php 
							 include("import_notasfiscais.php"); 
						
						?>
					
					</div>
				</div>
			</main>
			<nav id="nav">
				<div class="innertube">
					<h4 style="padding-bottom: -10px;"><ul>
					<li><a href="layout.php"> Home</h4></a></li>
					</ul>
					<h3>Gerenciar</h3>
					<ul>
						<li><a href="#">Orçamentos</a></li>
            			<li><a href="#">Períodos</a></li>
			            <li><a href="#">Contas</a>
            			<li><a href="#">Notas Fiscais</a></li>
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
		                        	<li><a href="extrato.php">Extrato bancário</a></li>
		                        	<li><a href="notasfiscais.php">Notas fiscais</a></li>
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