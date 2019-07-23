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
			 $varmoeda = $getData[5];
			 $removesifrao = str_replace('R$ ', '', $varmoeda);
			 $formtavalo = str_replace('.', '', $removesifrao);
			 $novoValor = str_replace(',', '.', $formtavalo);

			 /* Remover depois do import */

			 if ($getData[2] == '1') {
			 	$valornegativo = $novoValor * -1;

		 	$sql = "INSERT into lancamento (data,historico,conta_debito,conta_credito,valor,pg,despfixa) values ('".$dataFormatada."','".$getData[1]."','".$getData[2]."','".$getData[3]."','".$valornegativo."','".$getData[6]."','".$getData[8]."')";

	         }
			 else{
			 	$sql = "INSERT into lancamento (data,historico,conta_debito,conta_credito,valor,pg,despfixa) values ('".$dataFormatada."','".$getData[1]."','".$getData[2]."','".$getData[3]."','".$novoValor."','".$getData[6]."','".$getData[8]."')";
			 }
	         $result = mysqli_query($con, $sql);

	        // var_dump(mysqli_error_list($con));
			    // exit();
				if(!isset($result))
				{
					echo "<script type=\"text/javascript\">
							alert(\"Invalid File:Please Upload CSV File.\");
							window.location = \"import_extrato.php\"
						  </script>";		
				}
				else {
					  echo "<script type=\"text/javascript\">
						alert(\"CSV File has been successfully Imported.\");
						window.location = \"import_extrato.php\"
					</script>";
				}
	         }
			
	         fclose($file);	
		 }
	}	 

