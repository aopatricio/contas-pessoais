<?php
    include("banco.php");
?>
<?php
  if(empty($_SESSION['usuarioNome'])){
    header("location:index.php");
}
?>
<!DOCTYPE html>
<html lang="pt-br">
 
  <head>
    <meta Content-Type: text/html>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title></title>

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
<body style="margin: 0px auto;">  
<div class="container" style=" margin: 0px 85px;">
<div style="width: 100%; margin-left: 0px;">
    <div style="float: left; margin-left: 0px; margin-bottom: 20px;" >
    <p style="font-size: 20px; color: black;">Outros Períodos</p>
       <a href="#" onclick="frmperiodo.submit()"><button title="Clique para consultar periodo solecionado!" style="float: right;" type='button' class='btn btn-success btn-sm glyphicon glyphicon-edit'></button></a>
        <form method="post" id="frmperiodo" action="layout.php?a=viewnotasfiscais.php">

        <select style="width: 95px;" class="form-control" name="periodo" id="periodo" >
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
        </form>
    </div>
    
    <div style=" float: left;">
    <p style="font-size: 20px; color: black; margin-left: 100px;">Somatória NFe</p>
    
    <?php
        if(!isset($_POST['periodo'])) {
        $varmesselecionado = date("m");
        
        $queryvalor = "SELECT sum(valor) FROM notas_fiscais WHERE MONTH(data)=$varmesselecionado and YEAR(data)=2019 ORDER BY data ASC"; 
        $queryvalor = mysqli_query($conexao, $queryvalor);

    // Tirando o while
    $dados = mysqli_fetch_array($queryvalor);
    $valor=$dados[0];
    $novovalor = 'R$ ' . number_format($valor, 2, ',', '.');
    }
    else {

        $varmesselecionado = $_POST['periodo'];
        $queryvalor = "SELECT sum(valor) FROM notas_fiscais WHERE MONTH(data)=$varmesselecionado and YEAR(data)=2019 ORDER BY data ASC"; 
        $queryvalor = mysqli_query($conexao, $queryvalor);

    // Tirando o while
    $dados = mysqli_fetch_array($queryvalor);
    $valor=$dados[0];
    $novovalor = 'R$ ' . number_format($valor, 2, ',', '.');

    }
    
    ?>
     <p style="font-size: 20px; margin-left: 100px; text-align: left; color: blue;"><?php echo $novovalor; ?></p>

        </div>
         <div  style="float: left;">
         <p style="font-size: 20px; color: black; margin-left: 50px;">Imposto Aproximado</p>
         <?php
            $fator = 0.0829;
            $imposto = $valor * $fator;
            $valorimpost = 'R$ ' . number_format($imposto, 2, ',', '.');   
         ?>
         <p style="font-size: 20px; margin-left: 80px; text-align: left; color: red; "><?php echo $valorimpost; ?></p>

        </div>

         <div  style="float: left; margin-left: 100px;">
         <p style="font-size: 20px; color: black;">Cadastrar Imposto</p>
         <a href="#insereimposto" data-toggle="modal"><button title="Clique para gerar lançamento de impostos!" type='button' class='btn btn-danger btn-sm  '><span style="font-size: 10px;" class='glyphicon glyphicon-edit' aria-hidden='true'></span> Gerar Imposto</button></a>
        </div>

</div>

<table id="myTable" class="table table-hover">  
	
    <thead>  
      <tr>
      <th name="n_nfe" width=10px scope="col">NFE</th>
      <th name="data" width=150px scope="col">Emissão</th>
      <th name="tomador" width=700px scope="col">Tomador</th>
      <th name="link" width=600px scope="col">Link</th>
      <th name="valor" width=200px scope="col">Valor</th>
      <th name="acao" width=100px scope="col">Ação</th>
      </tr>
    </thead>  

<tbody>  
    <?php
    if(!isset($_POST['periodo'])) {
        
        $query = "Select * FROM notas_fiscais WHERE MONTH(data)=$varmesselecionado and YEAR(data)=2019 ORDER BY data ASC";
        $dados = mysqli_query($conexao, $query);
            
        while ($row = mysqli_fetch_row($dados)){
                
        $id=$row[0];
        $data=$row[1];
        $valor=$row[2];
        $tomador=$row[3];
        $link=$row[4];
        $novadata = date('d/m/Y', strtotime($data));	
        $novovalor = 'R$ ' . number_format($valor, 2, ',', '.');   
        echo "<tr>
        <td>$id</td>
        <td>$novadata</td>
        <td>$tomador</td>
        <td>$link</td>
        <td>$novovalor</td>	";
			
 ?> 
	<td>
		<div class='btn-group' role='group' aria-label='...'>
            <form method="post" id="id_imposto">
    		<a href="#" data-toggle="modal"><button type='button' class='btn btn-warning btn-sm'><span class='glyphicon glyphicon-edit' aria-hidden='true'></span></button></a>
    		<a href="#delete<?php echo $id;?>" data-toggle="modal"><button type='button' class='btn btn-danger btn-sm remove'><span class='glyphicon glyphicon-trash' aria-hidden='true'></span></button></a>

           </form>
    	</div>
    </td>

<!--Delete Modal -->
	<div id="delete<?php echo $id; ?>" class="modal fade" role="dialog">
    	<div class="modal-dialog">
    	<form method="post">
    <!-- Modal content-->
    	<div class="modal-content">
		<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title">Remover</h4>
    </div>
    <div class="modal-body">
		<input type="hidden" name="delete_id" value="<?php echo $id; ?>">
        <p>
        	<div class="alert alert-danger">Deseja remover o registro..:  <strong><?php echo $tomador; ?>?</strong></p>
	</div>
     	 <div class="modal-footer">
            <button type="submit" name="delete" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> YES</button>
            <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle "></span> NO</button>
            </div>
            </div>
            </form>
                </div>
            </div>
        </div>


<!-- Insere registro de Imposto -->
    <div id="insereimposto" class="modal fade" role="dialog">
        <div class="modal-dialog">
        <form method="post">
    <!-- Modal content-->
        <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Lançamento de Impostos</h4>
        </div>
        <div class="modal-body">
        <input type="hidden" name="insereimposto" value="<?php echo $id; ?>">
        <p>
            <div class="alert alert-success">Deseja adicionar o lançamento de imposto no valor de <strong><?php echo $valorimpost; ?> ?</strong>  </p>
    </div>
        <div class="modal-footer">
            <button type="submit" name="insereimposto" class="btn btn-success"><span class="glyphicon glyphicon-trash"></span> YES</button>
            <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle "></span> NO</button>
        </div>
        </div>
        </form>
        </div>
        </div>
        </div>



<?php
}
//}
if(isset($_POST['delete'])){
    // sql to delete a record
    $delete_id = $_POST['delete_id'];
    $sql = "DELETE FROM notas_fiscais WHERE n_nfe='$delete_id' ";
    if ($conexao->query($sql) === TRUE) {
} else {
    echo "Error deleting record: " . $conexao->error;
}
}
}
?>

<?php
{
if(isset($_POST['insereimposto'])){
        $varmesatual = date("m");
        $varmes = $varmesatual;
        $varmespagamento = $varmesatual +1;
        $pagamento = date("Y") . "-" . $varmesatual . "-" . "20";
        $datapagamento = date("Y") . "-" . $varmespagamento . "-" . "20";
                
        if ($varmes == '01') { $mesimposto = "Janeiro"; }
        elseif ($varmes == '02') { $mesimposto = "Fevereiro"; }
        elseif ($varmes == '03') { $mesimposto = "Março"; }
        elseif ($varmes == '04') { $mesimposto = "Abril"; }
        elseif ($varmes == '05') { $mesimposto = "Maio"; }
        elseif ($varmes == '06') { $mesimposto = "Junho"; }
        elseif ($varmes == '07') { $mesimposto = "Julho"; }
        elseif ($varmes == '08') { $mesimposto = "Agosto"; }
        elseif ($varmes == '09') { $mesimposto = "Setembro"; }
        elseif ($varmes == '10') { $mesimposto = "Outubro"; }
        elseif ($varmes == '11') { $mesimposto = "Novembro"; }
        elseif ($varmes == '12') { $mesimposto = "Dezembro"; }


    $alt_data = $datapagamento;
    $alt_debito = "1";
    $alt_credito = "21";
    $alt_valor = $imposto * -1;
    $alt_pago = "2";
    $alt_despfixa = "1";
    $alt_historico= "Pgto - Imposto referente ao mês de - $mesimposto ";  

    $sqllancamento = "INSERT INTO lancamento (data, historico, conta_debito, conta_credito, valor, pg, despfixa) VALUES ( '$alt_data', '$alt_historico', '$alt_debito', '$alt_credito', '$alt_valor', '$alt_pago', '$alt_despfixa')"; 
    if ($conexao->query($sqllancamento) === TRUE) {
} else {
    echo "Error inserting record: " . $conexao->error;
}
}
}

?>


<?php

if(isset($_POST['periodo'])){
        
        $varmesselecionado = $_POST['periodo'];
        $query = "Select * FROM notas_fiscais WHERE MONTH(data)=$varmesselecionado and YEAR(data)=2019 ORDER BY data ASC";
        $dados = mysqli_query($conexao, $query);
            
            while ($row = mysqli_fetch_row($dados)){
            $id=$row[0];
            $data=$row[1];
            $valor=$row[2];
            $tomador=$row[3];
            $link=$row[4];
            
            $novadata = date('d/m/Y', strtotime($data));    
            $novovalor = 'R$ ' . number_format($valor, 2, ',', '.');   
            echo "<tr>
            <td>$id</td>
            <td>$novadata</td>
            <td>$tomador</td>
            <td>$link</td>
            <td>$novovalor</td>             
            ";
?>
    <td>
        <div class='btn-group' role='group' aria-label='...'>
            <form method="post">
            <a href="#" data-toggle="modal"><button type='button' class='btn btn-warning btn-sm'><span class='glyphicon glyphicon-edit' aria-hidden='true'></span></button></a>
            <a href="#delete<?php echo $id;?>" data-toggle="modal"><button type='button' class='btn btn-danger btn-sm remove'><span class='glyphicon glyphicon-trash' aria-hidden='true'></span></button></a>

           </form>
        </div>
    </td>
<?php 


}
}

?>

</tbody>  
</table>  
</div>
</body>  
<script>
$(document).ready(function(){
    $('#myTable').dataTable();
});
</script>

<script type='text/javascript'>
$(window).load(function(){
$(function () {
    $("table#myTable").on("click", ".remove", function () {
        $(this).closest('tr').remove();
    });
});
});
</script>

</html>  