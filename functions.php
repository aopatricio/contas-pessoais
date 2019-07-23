<?php
	if(empty($_SESSION['usuarioNome'])){
    header("location:index.php");
}
?>
<?php
include('functions/config.php');
$con = getdb();

   if(isset($_POST["ImportExtrato"])){		
		echo $filename=$_FILES["file"]["tmp_name"];	

		 if($_FILES["file"]["size"] > 0)
		 {
		  	$file = fopen($filename, "r");
	        while (($getData = fgetcsv($file, 10000, ";")) !== FALSE)
			{
			 $var = $getData[0];
			 $novaData = str_replace('/', '-', $var);
			 $dataTime = new DateTime($novaData);
			 $dataFormatada=date_format ($dataTime, 'Y-m-d' );
			 $varmoeda = $getData[2];
			 $novoValor = str_replace(' R$ ', '', $varmoeda);
  			 if ($novoValor < 0){
			 	$sql = "INSERT into lancamento (data,historico,conta_debito,conta_credito,valor,pg,despfixa) values ('".$dataFormatada."','".$getData[1]."','1','2','".$novoValor."','1','2')";
	         }
			 else{
			 	$sql = "INSERT into lancamento (data,historico,conta_debito,conta_credito,valor,pg,despfixa) values ('".$dataFormatada."','".$getData[1]."','3','1','".$novoValor."','1','2')";
			 }
	         $result = mysqli_query($con, $sql);


				// var_dump(mysqli_error_list($con));
			    // exit();
				if(!isset($result))
				{
					echo "<script type=\"text/javascript\">
							alert(\"Invalid File:Please Upload CSV File.\");
							window.location = \"layout.php?a=import_extrato.php\"
						  </script>";		
				}
				else {
					  echo "<script type=\"text/javascript\">
						alert(\"CSV File has been successfully Imported.\");
						window.location = \"layout.php?a=lancamento.php\"
					</script>";
				}
	         }
			
	         fclose($file);	
		 }
	}	 

/* Finaliza funcao de importacao de extrato */

   if(isset($_POST["ImportNotasFiscais"])){		
		echo $filename=$_FILES["file"]["tmp_name"];	

		 if($_FILES["file"]["size"] > 0)
		 {
		  	$file = fopen($filename, "r");
	        while (($getData = fgetcsv($file, 10000, ";")) !== FALSE)
	         {
        	 $var = $getData[2];
			 $novaData = str_replace('/', '-', $var);
			 $dataTime = new DateTime($novaData);
			 $dataFormatada=date_format ($dataTime, 'Y-m-d' );
		     $sql = "INSERT into notas_fiscais (n_nfe,data,valor,tomador,link) values ('".$getData[0]."','".$dataFormatada."','".$getData[7]."','".$getData[16]."','".$getData[21]."')";
				$result = mysqli_query($con, $sql);
			    // var_dump(mysqli_error_list($con));
			    // exit();
				if(!isset($result))
				{
					echo "<script type=\"text/javascript\">
							alert(\"Invalid File:Please Upload CSV File.\");
							window.location = \"layout.php?a=import_extrato.php\"
						  </script>";		
				}
				else {
					  echo "<script type=\"text/javascript\">
						alert(\"CSV File has been successfully Imported.\");
						window.location = \"layout.php?a=viewnotasfiscais.php\"
					</script>";
				}
	         }
			
	         fclose($file);	
		 }
	}

/* Finaliza funcao de importacao de notas fiscais */

