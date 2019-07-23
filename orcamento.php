<?php
include("banco.php");
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<title>Dashboard</title>

	<!-- Bootstrap -->
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="http://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css"></style>
	<script type="text/javascript" src="http://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>


	<link rel="stylesheet" href="css/jquery.dataTables.min.css">
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" href="css/responsive.bootstrap.min.css">
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
</head>

<body style="margin: 0px auto">  

<!-- Alteracao de layout para orcamento-->
	<nav style="clear: both; " >
		<p style="border: solid 1px; font-size: 20px; color: black; margin-left: 100px; text-align: center; background-color: gray;"> Plano de Orçamento - Valores Orçados </p>
	</nav>
	<nav> 
		<div class="container" style="margin: 5px 75px;">
			<div style="float: left; margin-left: 20px; margin-bottom: 20px;" >
				<form method="post" id="frmperiodo" action="layout.php?a=orcamento.php">
					<div class="content">
						<div class="row">
							<div class="col-md-12 col-md-12 col-md-12 col-md-12">
								<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
									<label style="margin-left: -20px" class="control-label" for="cmes"> Mês:</label>
									<select style="margin-left: -20px ; width: 100px" name="periodo" id="periodo" class="select select-primary select-exemploa form-control" data-toggle="select">
										<option value="1">Janeiro</option>
										<option value="2">Fevereiro</option>
										<option value="3">Março</option>
										<option value="4">Abril</option>
										<option value="5">Maio</option>
										<option value="6">Junho</option>
										<option value="7">Julho</option>
										<option value="8">Agosto</option>
										<option value="9">Setembro</option>
										<option value="10">Outubro</option>
										<option value="11">Novembro</option>
										<option value="12">Dezembro</option>
									</select>
								</div>
								<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
									<label class="control-label" for="Cano"> Ano:</label>
									<select class="select select-primary select-exemploa form-control"  name="ano" id="ano" data-toggle="select">
										<option value="2018">2018</option>
										<option selected value="2019">2019</option>
										<option value="2020">2020</option>
										<option value="2021">2021</option>
										<option value="2022">2022</option>
										<option value="2023">2023</option>
										<option value="2024">2024</option>
										<option value="2025">2025</option>
										<option value="2026">2026</option>
										<option value="2027">2027</option>
										<option value="2028">2028</option>
										<option value="2029">2029</option>
									</select>

								</div>
							</div>
						</div>
					</div>
						<br/>
									<a href="#" onclick="frmperiodo.submit()"><button title="Clique para consultar o intervalo solecionado!" style="float: center;color: black;" type='button' class='btn btn-default btn-sm glyphicon glyphicon-search'> PESQUISAR</button></a>
					</div>

					<div style=" float: left;">
						<p style="font-size: 20px;  color: black; margin-left: 50px;">Despesas com Mercado</p>

						<!-- Inserir aqui Codigo php para buscar dados do banco -->
						<?php
						if(!isset($_POST['periodo'])) {
							$varmesselecionado = date("m");


							$queryvalormercado = "Select valor FROM orcamento WHERE mes = $varmesselecionado and conta = 12"; 
							$queryvalormercado = mysqli_query($conexao, $queryvalormercado);

    // Tirando o while
							$dadosmercado = mysqli_fetch_array($queryvalormercado);
							$valormercado = $dadosmercado[0];
							$novovalormercado = 'R$ ' . number_format($valormercado, 2, ',', '.');
						}
						else {

						$varmesselecionado = $_POST['periodo'];


							$queryvalormercado = "Select valor FROM orcamento where mes = $varmesselecionado and conta = 12"; 
							$queryvalormercado = mysqli_query($conexao, $queryvalormercado);

    // Tirando o while
							$dadosmercado = mysqli_fetch_array($queryvalormercado);
							$valormercado=$dadosmercado[0];
							$novovalormercado = 'R$ ' . number_format($valormercado, 2, ',', '.');

						}

						?>

						<p style="font-size: 20px; text-align: center; border: solid 1px; border-color: black; background-color: grey; margin-left: 50px; color: blue;"><?php echo $novovalormercado; ?></p>

						<!-- acaba aqui a query para despesas com mercado -->

						<!--

						<p style="font-size: 20px; text-align: center; border: solid 1px; border-color: black; background-color: grey; margin-left: 50px; color: blue;">R$ 980,00</p>
						-->

					</div>

					<div style=" float: left;">
						<p style="font-size: 20px; color: black; margin-left: 50px;">Despesas Com Gasolina</p>
							<!-- Inicio do codigo -->

							<?php
						if(!isset($_POST['periodo'])) {
							$varmesselecionado = date("m");


							$queryvalorgas = "Select valor FROM orcamento WHERE mes = $varmesselecionado and conta = 23"; 
							$queryvalorgas = mysqli_query($conexao, $queryvalorgas);
							$dadosgas = mysqli_fetch_array($queryvalorgas);
							$valorgas = $dadosgas[0];
							$novovalorgas = 'R$ ' . number_format($valorgas, 2, ',', '.');
						}
						else {

						$varmesselecionado = $_POST['periodo'];


							$queryvalorgas = "Select valor FROM orcamento where mes = $varmesselecionado and conta = 23"; 
							$queryvalorgas = mysqli_query($conexao, $queryvalogas);
							$dadosgas = mysqli_fetch_array($queryvalorgas);
							$valorgas = $dadosgas[0];
							$novovalorgas = 'R$ ' . number_format($valorgas, 2, ',', '.');

						}

						?>

						<p style="font-size: 20px; text-align: center; border: solid 1px; border-color: black; background-color: grey; margin-left: 50px; color: blue;"><?php echo $novovalorgas; ?></p>

							<!-- Fim do codigo -->
							<!-- Inserir aqui Codigo php para buscar dados do banco -->
						<!-- 
						<p style="font-size: 20px; text-align: center; border: solid 1px; border-color: black; background-color: grey; margin-left: 50px; color: blue;">R$ 420,00</p>

						-->

					</div>

					<div style=" float: left;">
						<p style="font-size: 20px; color: black; margin-left: 50px;">Despesas com Açougue</p>
							<!-- Inserir aqui Codigo php para buscar dados do banco -->

							<?php
						if(!isset($_POST['periodo'])) {
							$varmesselecionado = date("m");


							$queryvaloracougue = "Select valor FROM orcamento WHERE mes = $varmesselecionado and conta = 52"; 
							$queryvaloracougue = mysqli_query($conexao, $queryvaloracougue);
							$dadosacougue = mysqli_fetch_array($queryvaloracougue);
							$valoracougue = $dadosacougue[0];
							$novovaloracougue = 'R$ ' . number_format($valoracougue, 2, ',', '.');
						}
						else {

						$varmesselecionado = $_POST['periodo'];


							$queryvaloracougue = "Select valor FROM orcamento where mes = $varmesselecionado and conta = 52"; 
							$queryvaloracougue = mysqli_query($conexao, $queryvaloacougue);
							$dadosacougue = mysqli_fetch_array($queryvaloracougue);
							$valoracougue = $dadosacougue[0];
							$novovaloracougue = 'R$ ' . number_format($valoracougue, 2, ',', '.');

						}

						?>

						<p style="font-size: 20px; border: solid 1px; text-align: center; border-color: black; background-color: grey; margin-left: 50px; text-align: center; color: blue"><?php echo $novovaloracougue; ?></p>

					</div>
					
					<div style=" float: left;">

						<p style="font-size: 20px; color: black; margin-left: 50px;">Despesas Com Feira</p>

						<?php
							if(!isset($_POST['periodo'])) {
							$varmesselecionado = date("m");


							$queryvalorfeira = "Select valor FROM orcamento WHERE mes = $varmesselecionado and conta = 8"; 
							$queryvalorfeira = mysqli_query($conexao, $queryvalorfeira);
							$dadosfeira = mysqli_fetch_array($queryvalorfeira);
							$valorfeira = $dadosfeira[0];
							$novovalorfeira = 'R$ ' . number_format($valorfeira, 2, ',', '.');
						}
						else {

						$varmesselecionado = $_POST['periodo'];


							$queryvalorfeira = "Select valor FROM orcamento where mes = $varmesselecionado and conta = 8"; 
							$queryvalorfeira = mysqli_query($conexao, $queryvalofeira);
							$dadosfeira = mysqli_fetch_array($queryvalorfeira);
							$valorfeira = $dadosfeira[0];
							$novovalorfeira = 'R$ ' . number_format($valorfeira, 2, ',', '.');

						}

						?>

						<p style="font-size: 20px; text-align: center; border: solid 1px; border-color: black; background-color: grey; margin-left: 50px; color: blue;"><?php echo $novovalorfeira; ?></p>

							<!-- Inserir aqui Codigo php para buscar dados do banco -->

					</div>

					<!-- aqui começa o dash maior gasto -->

					<div style=" float: left;">
						<p style="font-size: 20px; color: black; margin-left: 80px;">Despesas Nao Orçadas</p>
						
						

							<!-- Inserir aqui Codigo php para buscar dados do banco -->


						<p style="font-size: 20px; margin-left: 80px; border: solid 1px; border-color: black; background-color: grey; text-align: center; color: blue">R$ 500,00 </p>

					</div>

				</nav>
				
<!-- Inicia aqui as informacoes sobre orçamento realizados -->

				<div>
					<nav style="clear: both; " >
						<p style="border: solid 1px; font-size: 20px; color: black; margin-left: 100px; text-align: center; background-color: gray;"> Plano de Orçamento - Valores Realizados</p>
					</nav>
					<nav>
					</nav>
						<br>

						<div style=" float: left;">
						<img src="img/carrinho-compras.jpg" style="font-size: 20px;  color: black; margin-left: 150px; alt="some text" width=150 height=150>
						</div>

						<div style=" float: left;">
							
						<p style="font-size: 20px;  color: black; margin-left: 50px;">Despesas com Mercado</p>

						<!-- Inserir aqui Codigo php para buscar dados do banco -->


						<p style="font-size: 20px; text-align: center; border: solid 1px; border-color: black; background-color: grey; margin-left: 50px; color: blue;">R$ 980,00</p>

					</div>

					<div style=" float: left;">
						<p style="font-size: 20px; color: black; margin-left: 50px;">Despesas Com Gasolina</p>

							<!-- Inserir aqui Codigo php para buscar dados do banco -->

						<p style="font-size: 20px; text-align: center; border: solid 1px; border-color: black; background-color: grey; margin-left: 50px; color: blue;">R$ 420,00</p>

					</div>

					<div style=" float: left;">
						<p style="font-size: 20px; color: black; margin-left: 50px;">Despesas com Açougue</p>
							<!-- Inserir aqui Codigo php para buscar dados do banco -->

						<p style="font-size: 20px; border: solid 1px; text-align: center; border-color: black; background-color: grey; margin-left: 50px; text-align: center; color: blue">R$ 320,00 </p>

					</div>
					
					<div style=" float: left;">

						<p style="font-size: 20px; color: black; margin-left: 50px;">Despesas Com Feira</p>

							<!-- Inserir aqui Codigo php para buscar dados do banco -->

						<p style="font-size: 20px; margin-left: 50px; border: solid 1px; border-color: black; background-color: grey; text-align: center; color: blue"> R$ 580,00</p>

					</div>

					<!-- aqui começa o dash maior gasto -->

					<div style=" float: left;">
						<p style="font-size: 20px; color: black; margin-left: 80px;">Despesas Nao Orçadas</p>
							<!-- Inserir aqui Codigo php para buscar dados do banco -->


						<p style="font-size: 20px; margin-left: 80px; border: solid 1px; border-color: black; background-color: grey; text-align: center; color: blue">R$ 500,00</p>

					</div>


					</nav>
				</div>
				</html>