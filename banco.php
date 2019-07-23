<?php
	$db_name = "itservicestech";
	$db_user = "itservicestech";
	$db_password = "vq9E4KXO";
	$db_host = "mysql.itservicestech.com.br";
	$conexao = mysqli_connect($db_host, $db_user, $db_password, $db_name);
?>
<?php
	$servidor = "mysql.itservicestech.com.br";
	$usuario = "itservicestech";
	$senha = "vq9E4KXO";
	$dbname = "itservicestech";
	
	//Criar a conexao
	$conn = mysqli_connect($servidor, $usuario, $senha, $dbname);
	
	if(!$conn){
		die("Falha na conexao: " . mysqli_connect_error());
	}else{
		//echo "Conexao realizada com sucesso";
	}	
	
?>